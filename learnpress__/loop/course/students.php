<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/loop/course/students.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/loop/course/students.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying course students within the loop.
 *
 * Do not use in LP4.
 * Will remove after LearnPress and Eduma and all guest update 4.0.0
 *
 * @author  ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$course = learn_press_get_course();
if ( ! $course ) {
	return;
}
?>

<span class="course-students">

	<?php echo esc_html( $course->get_users_enrolled() ); ?>

</span>
