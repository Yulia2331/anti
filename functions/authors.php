<?php

add_action( 'wp_ajax_change_user_info', 'change_user_info_callback' );
add_action( 'wp_ajax_nopriv_change_user_info', 'change_user_info_callback' );


function change_user_info_callback(){
	$id = get_current_user_id();
	$user_info = get_userdata($id);
	wp_update_user([
		'ID' => $id,
		'last_name' => $_POST['last-name'],
		'first_name' => $_POST['first-name'],
	]);
	$d1 = strtotime($_POST['date']);
	$date = date("Y-m-d", $d1);
	update_field('father_name',$_POST['fathers-name'], 'user_'.$id);
	update_field('data_birth',$date, 'user_'.$id);
	update_field('telefon',$_POST['telefon'], 'user_'.$id);
	update_field('telegram',$_POST['telegram'], 'user_'.$id);
	update_field('whatsapp',$_POST['whatsapp'], 'user_'.$id);
	update_field('city',$_POST['city'], 'user_'.$id);
	update_field('sfera_deyatelnosti',$_POST['sphera'], 'user_'.$id);
	update_field('kod_strany',$_POST['code'], 'user_'.$id);
	$result['type']= gettype($_POST['date']);

	if ($_POST['new_avatar']!=''){
		update_field('photo',$_POST['new_avatar'], 'user_'.$id);
		//update_field('field_512e085a9372a',$att['url'],$watch);
	}

	$result['status'] = 'ok';
	echo json_encode($result);
	wp_die();
}



add_action( 'wp_ajax_user_subscribe', 'user_subscribe_callback' );
add_action( 'wp_ajax_nopriv_user_subscribe', 'user_subscribe_callback' );


function user_subscribe_callback(){
	$queried = $_POST['queried'];
	$current = get_current_user_id();
	$row_queried = array(
		'id' => $queried
	);
	$row_current = array(
		'id' => $current
	);
	add_row('subscribes',$row_queried, 'user_'.$current );
	add_row('subscribers',$row_current, 'user_'.$queried );
	$result['status'] = 'ok';
	echo json_encode($result);
	wp_die();
}



add_action( 'wp_ajax_user_desubscribe', 'user_desubscribe_callback' );
add_action( 'wp_ajax_nopriv_user_desubscribe', 'user_desubscribe_callback' );


function user_desubscribe_callback(){
	$queried = $_POST['queried'];
	$current = get_current_user_id();
	$result = array();
	if (have_rows('subscribes','user_'.$current )){

		while( have_rows('subscribes','user_'.$current ) ) {
			the_row();
			
			if( get_sub_field('id') == $queried ) {
				$row = get_row_index();
				delete_row('subscribes', $row, 'user_'.$current);
			}
		
		}
	}

	if (have_rows('subscribers','user_'.$queried )){
	
		while( have_rows('subscribers','user_'.$queried ) ) {
			the_row();
			
			if( get_sub_field('id') == $current ) {
				$row = get_row_index();
				delete_row('subscribers', $row, 'user_'.$queried);
			}
	
		}
	}
	$result['status'] = 'ok';
	echo json_encode($result);
	wp_die();
}



add_action('wp', 'update_online_users_status'); 
function update_online_users_status(){

  if(is_user_logged_in()){

    // get the online users list
    if(($logged_in_users = get_transient('users_online')) === false) $logged_in_users = array();
	 $time_limit = 15;
    $current_user = wp_get_current_user();
    $current_user = $current_user->ID;  
    $current_time = current_time('timestamp');

    if(!isset($logged_in_users[$current_user]) || ($logged_in_users[$current_user] < ($current_time - ($time_limit * 60)))){
      $logged_in_users[$current_user] = $current_time;
      set_transient('users_online', $logged_in_users, 30 * 60);
    }

  }
}



function is_user_online($user_id) {
  $logged_in_users = get_transient('users_online');
  return isset($logged_in_users[$user_id]) && $logged_in_users[$user_id] > (current_time('timestamp') - (15 * 60));
}


// function action_login($user_login, $user) {
// 	update_user_meta( $user->ID, 'login_state', 'on');
// }
// add_action('wp_login', 'action_login', 10, 2);

// function action_logout() {
// 	$user_id = get_current_user_id();
//  update_user_meta( $user_id, 'login_state', 'off');
// }
// // add_action('wp_logout', 'action_logout');

// add_action('clear_auth_cookie', 'action_logout', 10);


function user_last_login( $user_login, $user ) {
		 update_user_meta( $user->ID, 'last_login', time() );
	}
	
	add_action( 'wp_login', 'user_last_login', 10, 2 );

	function wpb_lastlogin($id) {
		 $last_login = get_the_author_meta('last_login', $id);
		 $the_login_date = human_time_diff($last_login);
		 if ($the_login_date == '1 секунда'){
			$the_login_date = 'Никогда';
		 }
		 return $the_login_date;
	}



add_action( 'wp_ajax_search_users', 'search_users_callback' );
add_action( 'wp_ajax_nopriv_search_users', 'search_users_callback' );

function search_users_callback(){
	$searchword = $_POST['query'];
	if( ! empty( $searchword ) ){

		$parts = explode( ' ', $searchword );
	
		$qv['orderby']  = 'display_name';
		$qv['order']    = 'ASC';

		if( ! empty( $parts ) ){
	
			 $qv['meta_query'] = [];
			 $qv['meta_query']['relation'] = 'OR';
	
			 foreach( $parts as $part ){
				  $qv['meta_query'][] = array(
						'key'     => 'first_name',
						'value'   => $part,
						'compare' => 'LIKE'
				  );
				  $qv['meta_query'][] = array(
						'key'     => 'last_name',
						'value'   => $part,
						'compare' => 'LIKE'
				  );
				  $qv['meta_query'][] = array(
					'key'     => 'sfera_deyatelnosti',
					'value'   => $part,
					'compare' => 'LIKE'
			  );
					$qv['meta_query'][] = array(
						'key'     => 'city',
						'value'   => $part,
						'compare' => 'LIKE'
				);
			 }
	
		}
	
	};
	$user_query = get_users($qv);
	$result=array();
	$i=0;
	foreach ($user_query as $query){
		$id = $query->ID;
		$user_info = get_userdata($id);
		$photo = get_field('photo', 'user_'.$id);
		$result['users'][$i]['photo'] = $photo==""?"https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y":"";
		$result['users'][$i]['nice'] = $query->user_nicename;
		$result['users'][$i]['fathers_name'] = get_field('father_name', 'user_'.$id);
		$result['users'][$i]['first_name'] = $user_info ->first_name;
		$result['users'][$i]['last_name'] = $user_info->last_name;
		$result['users'][$i]['sphera'] = get_field('sfera_deyatelnosti', 'user_'.$id);
		$i++;
	}
	$result['status'] = 'ok';
	echo json_encode($result);
	wp_die();
}

add_action( 'wp_ajax_delete_user', 'delete_user_callback' );
add_action( 'wp_ajax_nopriv_delete_user', 'delete_user_callback' );

function delete_user_callback(){
	 	$current_id = get_current_user_id();
		$user = $_POST['user'];
		wp_delete_user( $user, $current_id );
		echo json_encode($user);
		wp_die();
}



add_action( 'wp_ajax_make_user_user', 'make_user_user_callback' );
add_action( 'wp_ajax_nopriv_make_user_user', 'make_user_user_callback' );


function make_user_user_callback(){
	$id = $_POST['user'];
	$user_id = wp_update_user( array( 'ID' => $id, 'role' => 'subscriber' ) );
	 $result['status'] = 'ok';
	 echo json_encode($result);
	 wp_die();
}



add_action( 'wp_ajax_make_user_admin', 'make_user_admin_callback' );
add_action( 'wp_ajax_nopriv_make_user_admin', 'make_user_admin_callback' );


function make_user_admin_callback(){
	$id = $_POST['user'];
	if(wp_update_user( array( 'ID' => $id, 'role' => 'administrator' ) )){
		$result['status'] = 'ok';
	}
	else{
		$result['status'] = 'error';
	}
	 
	 echo json_encode($result);
	 wp_die();
}


function get_phone_code_by_iso2($code){
	$codes = json_decode(file_get_contents("http://country.io/phone.json"), true);
	return $codes[strtoupper($code)];
}

function mb_ucfirst($str, $encoding='UTF-8')
{
	 $str = mb_ereg_replace('^[\ ]+', '', $str);
	 $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
			  mb_substr($str, 1, mb_strlen($str), $encoding);
	 return $str;
}


function YearTextArg($year) {
	
	$year = abs($year);
	$t1 = $year % 10;
	$t2 = $year % 100;
	return ($t1 == 1 && $t2 != 11 ? "год" : ($t1 >= 2 && $t1 <= 4 && ($t2 < 10 || $t2 >= 20) ? "года" : "лет"));
}
?>