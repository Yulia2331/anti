<?php
/**
 * Content Poup.
 * Use for React Quiz.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.0
 */

?>

<div id="popup-content">
	<?php
	LearnPress::instance()->template( 'course' )->course_content_item();
    //print_r(LearnPress::instance()->template( 'course' ));

    //learn_press_get_template( 'content-single-course' );
    //the_content();

	LearnPress::instance()->template( 'course' )->course_item_comments();
	?>
</div>
