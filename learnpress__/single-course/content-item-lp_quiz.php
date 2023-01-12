<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/single-course/content-item-lp_quiz.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/single-course/content-item-lp_quiz.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying quiz item content in single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/content-item-lp_quiz.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

defined( 'ABSPATH' ) || exit();

$quiz = LP_Global::course_item_quiz();
?>

<div id="content-item-quiz" class="content-item-summary">
	<?php
	/**
	 * @see learn_press_content_item_summary_title()
	 * @see learn_press_content_item_summary_content()
	 */
	do_action( 'learn-press/before-content-item-summary/' . $quiz->get_item_type() );
	?>

	<?php
	/**
	 * @see learn_press_content_item_summary_question()
	 */
	do_action( 'learn-press/content-item-summary/' . $quiz->get_item_type() );
	?>

</div>
