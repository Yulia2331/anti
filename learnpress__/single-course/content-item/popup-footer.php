<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/single-course/content-item/popup-footer.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/single-course/content-item/popup-footer.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying footer of single course popup.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/footer.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

defined( 'ABSPATH' ) || exit();

$course = learn_press_get_course();
$user   = learn_press_get_current_user();
?>

<div id="popup-footer">
	<?php do_action( 'learn-press/popup-footer' ); ?>
</div>
