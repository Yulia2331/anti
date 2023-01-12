<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/single-course/section/item-lesson.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/single-course/section/item-lesson.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying lesson item section in single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/section/item-lesson.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.0
 */

defined( 'ABSPATH' ) || exit();

if ( ! isset( $item ) ) {
	return;
}
?>

<span class="item-name"><?php echo esc_html( $item->get_title( 'display' ) ); ?></span>
