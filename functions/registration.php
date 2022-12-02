<?php
	add_action( 'wp_ajax_registration', 'my_registration' );
	add_action( 'wp_ajax_nopriv_registration', 'my_registration' );

	function my_registration(){
		$user_form = unserializeForm($_POST['user']);

		$response = array();
		$userdata = [
			'user_login'           => $user_form['email'],      // (string) Имя пользователя для входа в систему.
			'user_nicename'        => $user_form['email'],      // (string) Имя пользователя, удобное для URL.
			'user_pass'   =>  $user_form['password'],
			'user_email'           => $user_form['email'],      // (string) Адрес электронной почты пользователя.
			'display_name'         =>  $user_form['first-name'],     // (string) Отображаемое имя пользователя. По умолчанию - user_login.
			'nickname'             => $user_form['email'],      // (string) Псевдоним пользователя. По умолчанию - user_login.
			'first_name'           => $user_form['first-name'],      // (string) Имя пользователя.
			'last_name'           => $user_form['last-name'],      // (string) Имя пользователя.
			'admin_color'          => 'fresh', // (string) Цветовая схема администратора для пользователя. По умолчанию 'fresh'.
			'use_ssl'              => 'false', // (string) Должен ли пользователь всегда получать доступ к админке по https.
			'user_registered'      => '',      // (string) Дата регистрации пользователя. Формат - 'Y-m-d H:i:s'.
			'show_admin_bar_front' => 'false',  // (string) Отображать ли панель администратора для пользователя на лицевой стороне сайта.
			'role'                 => 'subscriber',      // (string) Роль пользователя.
			'locale'               => '',      // (string) Локаль пользователя.
			
		];

		$id = wp_insert_user( $userdata );
		if ( is_wp_error( $id ) ) {
			// Невозможно создать пользователя, записываем результат в массив.
			$result[ 'status' ] = false;
			$result[ 'content' ] = $id->get_error_message();
			echo json_encode($result);
			wp_die();
	  }
	  else{
		$d1 = strtotime($user_form['date']);
		$date = date("Y-m-d", $d1);
		update_field( 'father_name', $user_form['father-name'] , 'user_'.$id );
		update_field( 'user_type', $user_form['reg-user-type'] , 'user_'.$id );
		update_field( 'data_birth', $user_form['date'] , 'user_'.$id );
		update_field( 'male', $user_form['gendre'] , 'user_'.$id );
		update_field( 'telefon', $user_form['phone'] , 'user_'.$id );
		update_field( 'telegram', $user_form['telegram'] , 'user_'.$id );
		update_field( 'instagram', $user_form['instagram'] , 'user_'.$id );
		update_field( 'city', $user_form['city'] , 'user_'.$id );
		update_field( 'sfera_deyatelnosti', $user_form['sphera'] , 'user_'.$id );

		update_field( 'kod_strany', $user_form['code'] , 'user_'.$id );
		$date = new DateTime();
		$date->modify('-1 month');
		$current_date = $date->format('d.m.Y');
		$zarabotok_value = array(
			'mesyacz'=> $current_date,
			'money_this_month' =>str_replace(' ', '', $user_form['money_this_month']),
			'money_next_month' =>str_replace(' ', '', $user_form['money_next_month']),

		);
		add_row('zarabotok', $zarabotok_value, 'user_'.$id);


		$creds = array(
			'user_login' =>  $user_form['email'], // Логин пользователя.
			'user_password' => $user_form['password'], // Пароль пользователя.
			'remember' => true // Запоминаем.
	  );
	if (!is_user_logged_in()){

				$signon = wp_signon( $creds, false );
				if ( is_wp_error( $signon ) ) {
					// Авторизовать не получилось.
					$result[ 'status' ] = false;
					$result[ 'content' ] = $signon->get_error_message();
			} else {
					// Авторизация успешна, устанавливаем необходимые куки.
					wp_clear_auth_cookie();
					clean_user_cache( $signon->ID );
					wp_set_current_user( $signon->ID );
					wp_set_auth_cookie( $signon->ID );
					update_user_caches( $signon );
					// Записываем результаты в массив.
					$result[ 'status' ] = true;
			}
	  }
	  else{
		$result[ 'status' ] = true;
	  }
	}
	
		//$result['url'] = 
		echo json_encode($result);
		wp_die();

	}

	function unserializeForm($str) {
		$returndata = array();
		$strArray = explode("&", $str);
		$i = 0;
		foreach ($strArray as $item) {
			 $array = explode("=", $item);
			 $returndata[$array[0]] = urldecode($array[1]);
		}
		
		return $returndata;
		}

		
?>