<?php 

	add_action( 'wp_ajax_authorization', 'my_authorization' );
	add_action( 'wp_ajax_nopriv_authorization', 'my_authorization' );


	function my_authorization(){
		$user = array();
		$user['user_login'] = $_POST['login'];
		$user['user_password']=$_POST['pass'];
		$user['remember'] = true;

		$auth = wp_signon( $user, false );
		if ( is_wp_error($auth) ) {
			echo $auth->get_error_message();
			$response['starus'] = 'error';
			echo json_encode($response);
			wp_die();
		}

		$response['starus'] = 'ok';
		$response['url'] = get_author_posts_url($auth->ID);
		echo json_encode($response);
		wp_die();
	
	}
?>