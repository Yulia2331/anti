<?php
/**
 * The base (and only) template
 *
 * @package WordPress
 * @subpackage intentionally-blank
 */

?>
<?php check_zar() ?>
<?php 


$currrent_userID =  get_current_user_id();
$image = get_field('photo', 'user_'.$currrent_userID); 
$user_info = get_userdata($currrent_userID);
												
					
?>
<!DOCTYPE html>
<html lang="ru">
	<!--begin::Head-->
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?php wp_head() ?>
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body>
	<header class="header">
      <div class="header__wrapper padding-left">
        <div class="header__title-block"> 
          <button class="header__burger"><i class="fa-solid fa-bars"></i></button>
          <h1 class="header__title main-title">Это название курса</h1>
        </div>
        <div class="header__general-function general-function">
          <button class="general-function__button general-function__notifications container__icon--24"> <i class="fa-solid fa-bell"></i></button>
          <button class="general-function__button general-function__messages container__icon--24"> <i class="fa-regular fa-message"></i></button>
          <button class="general-function__button general-function__search container__icon--24"> <i class="fa-solid fa-magnifying-glass"></i></button>
          <button class="general-function__button general-function__user"><img src="../img/user.png" alt=""></button>
        </div>
      </div>
    </header>
    <?php get_template_part('/template-parts/aside-left'); ?>