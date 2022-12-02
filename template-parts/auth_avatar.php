<?php
$current_user = wp_get_current_user();
$id = $current_user -> ID

?>

<div class='avatar-image rounded-circle' style="background:url(<?=get_user_image($id)?> ); background-size:cover; background-position: center; background-repeat:no-repeat" class='rounded-circle'  alt=""></div>
	