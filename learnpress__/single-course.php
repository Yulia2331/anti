<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/single-course.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/single-course.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying content of single course.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Header for page
 */
if ( empty( $is_block_theme ) ) {
	get_header( 'course' );
}

/**
 * @since 3.0.0
 */
do_action( 'learn-press/before-main-content' );
do_action( 'learn-press/before-main-content-single-course' );

while ( have_posts() ) {
	the_post();
	learn_press_get_template( 'content-single-course' );
}

/**
 * @since 3.0.0
 */
do_action( 'learn-press/after-main-content-single-course' );
do_action( 'learn-press/after-main-content' );

/**
 * LP sidebar
 */
do_action( 'learn-press/sidebar' );

/**
 * Footer for page
 */
if ( empty( $is_block_theme ) ) {
	get_footer( 'course' );
}
