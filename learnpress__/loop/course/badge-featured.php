<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/loop/course/badge-featured.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/loop/course/badge-featured.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying 'Featured' badge in archive course page for each course.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

$course = learn_press_get_course();

if ( ! $course ) {
	return;
}

if ( ! $course->is_featured() ) {
	return;
}
?>

<span class="lp-badge featured-course" data-text="<?php esc_attr_e( 'Featured', 'learnpress' ); ?>"></span>
