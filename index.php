<?php

if(is_user_logged_in()){
	
	// echo '----------------- index! ----------------';
	// global $wp;
	// echo '<br>';
	// echo $wp->request;
	
	
	// echo add_query_arg( $wp->query_vars, home_url() );

	if(strcmp($wp->request,'home-work')==0){
		require ('page_home_work.php');
	}

	if(strcmp($wp->request,'home-work-curse')==0){
		require ('page_home_work_curse.php');
	}

	// else{
	// 	require ('user-page.php');
	// }
}
else{
	wp_redirect( '/auth' );
}

?>