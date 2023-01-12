<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/single-course/content-item/popup-content.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/single-course/content-item/popup-content.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
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

	LearnPress::instance()->template( 'course' )->course_item_comments();
	?>
</div>
