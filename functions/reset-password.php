<?php
 add_action( 'wp_ajax_nopriv_ajaxforgotpassword', 'ajax_forgotPassword' );
 add_action( 'wp_ajax_ajaxforgotpassword', 'ajax_forgotPassword' );

function ajax_forgotPassword(){
	 
	// First check the nonce, if it fails the function will break
   //check_ajax_referer( 'ajax-forgot-nonce', 'security' );
	
	global $wpdb;
	
	$account = $_POST['user_login'];
	
	if( empty( $account ) ) {
		$error = 'Введите логин или email';
	} else {
		if(is_email( $account )) {
			if( email_exists($account) ) 
				$get_by = 'email';
			else	
				$error = 'По данному email никто не зарегестрирован';			
		}
		else if (validate_username( $account )) {
			if( username_exists($account) ) 
				$get_by = 'login';
			else	
				$error = 'По данному email никто не зарегестрирован';				
		}
		else
			$error = 'Неверный логин';		
	}	
	
	if(empty ($error)) {
		// lets generate our new password
		//$random_password = wp_generate_password( 12, false );
		$random_password = wp_generate_password();
 
			
		// Get user data by field and data, fields are id, slug, email and login
		$user = get_user_by( $get_by, $account );
			
		$update_user = wp_update_user( array ( 'ID' => $user->ID, 'user_pass' => $random_password ) );
			
		// if  update user return true then lets send user an email containing the new password
		if( $update_user ) {
			
			$from = get_option( 'admin_email' ); // Set whatever you want like mail@yourdomain.com
			
			if(!(isset($from) && is_email($from))) {		
				$sitename = strtolower( $_SERVER['SERVER_NAME'] );
				if ( substr( $sitename, 0, 4 ) == 'www.' ) {
					$sitename = substr( $sitename, 4 );					
				}
				$from = 'admin@'.$sitename; 
			}
			
			$to = $user->user_email;
			$subject = 'Ваш новый пароль для сайта ' . get_site_url();
			$sender = 'From: '.get_option('name').' <'.$from.'>' . "\r\n";
			
			$message = 'Ваш новый пароль: '.$random_password;
				
			$headers[] = 'MIME-Version: 1.0' . "\r\n";
			$headers[] = 'Content-type: text/html; charset=UTF-8' . "\r\n";
			$headers[] = "X-Mailer: PHP \r\n";
			$headers[] = $sender;
				
			$mail = wp_mail( $to, $subject, $message, $headers );
			if( $mail ) 
				$success = 'Проверьте новый пароль на почте.';
			else
				$error = 'Система не может отправить вам письмо, содержащее ваш новый пароль';						
		} else {
			$error = 'Ой! Что-то пошло не так при обновлении вашей учетной записи.';
		}
	}
	
	if( ! empty( $error ) )
		echo json_encode(array('loggedin'=>false, 'message'=>__($error)));
			
	if( ! empty( $success ) )
		echo json_encode(array('loggedin'=>true, 'message'=>__($success)));
				
	wp_die();
}




add_filter( 'password_change_email', 'change_password_mail_message', 10, 3 );
function change_password_mail_message( $pass_change_mail, $user, $userdata ){
	$new_message_txt = __( 'Привет, ###USERNAME###,

Это уведомление подтверждает успешную смену Вашего пароля на сайте ###SITENAME###.
Письмо с новым паролем Вам придет в отдельном сообщении, если Вы его не можете найти проверьте папку "Спам"
Если Вы не меняли пароль, пожалуйста, напишите администратору сайта на ###ADMIN_EMAIL###

Это сообщение ыло отправлено на ###EMAIL###

Успехов,
Команда сайта ###SITENAME###
###SITEURL###' );

	$pass_change_mail[ 'message' ] = $new_message_txt;

	return $pass_change_mail;
}

?>