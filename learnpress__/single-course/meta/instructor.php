<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/single-course/meta/instructor.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/single-course/meta/instructor.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying course instructor in primary-meta section.
 *
 * @version 4.0.0
 * @author  ThimPress
 * @package LearnPress/Templates
 */

defined( 'ABSPATH' ) || exit;

$course = learn_press_get_course();
if ( ! $course ) {
	return;
}
?>

<div class="meta-item meta-item-instructor">
	<div class="meta-item__image">
		<?php echo wp_kses_post( $course->get_instructor()->get_profile_picture() ); ?>
	</div>
	<div class="meta-item__value">
		<label><?php esc_html_e( 'Instructor', 'learnpress' ); ?></label>
		<div><?php echo wp_kses_post( $course->get_instructor_html() ); ?></div>
	</div>
</div>
