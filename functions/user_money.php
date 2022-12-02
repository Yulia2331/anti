<?php 
	add_action( 'wp_ajax_add_user_money', 'add_new_money' );
	add_action( 'wp_ajax_nopriv_add_user_money', 'add_new_money' );


	function add_new_money(){
		$current_user = wp_get_current_user();
		$id = $current_user->ID;
		$this_money = $_POST['this_money'];
		$next_money = $_POST['next_money'];
		$date = new DateTime();
		$date->modify('-1 month');
		$current_date = $date->format('d.m.Y');
		
		$zarabotok_value = array(
			'mesyacz'=> $current_date,
			'money_this_month' => str_replace(' ', '', $this_money),
			'money_next_month' => str_replace(' ', '', $next_money)
		);
		add_row('zarabotok', $zarabotok_value, 'user_'.$id);
		
		$response['status'] = 'ok';
		$response['url'] = get_author_posts_url( $id );
		echo json_encode($response);
		wp_die();
	}
?>