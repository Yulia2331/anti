<?php

if(is_user_logged_in()){
	
	echo '----------------- index ----------------'
	// else{
	// 	require ('user-page.php');
	// }
}
else{
	wp_redirect( '/auth' );
}

?>