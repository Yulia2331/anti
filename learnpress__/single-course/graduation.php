<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/single-course/graduation.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/single-course/graduation.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying course graduation.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) or die;

if ( ! isset( $graduation ) ) {
	$graduation = _x( 'un-graduated', 'course graduation', 'learnpress' );
}

$classes = array(
	'course-graduation',
	'learn-press-message',
	$graduation,
	$graduation === 'passed' ? 'success' : ( $graduation === 'failed' ? 'error' : '' ),
);
?>

<div class="<?php echo implode( ' ', $classes ); ?>">
	<?php
	if ( $graduation === 'passed' ) {
		echo '<i class="far fa-check-circle icon"></i>';
	} else {
		echo '<i class="far fa-times-circle icon"></i>';
	}
	?>

	<span><?php learn_press_course_grade_html( $graduation ); ?></span>
</div>
