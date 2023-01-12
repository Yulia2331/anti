<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/content-lesson/title.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/content-lesson/title.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying title of lesson.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.0
 */

defined( 'ABSPATH' ) || exit();

if ( ! isset( $lesson ) ) {
	return;
}

$title = $lesson->get_title( 'display' );

if ( ! $title ) {
	return;
}
?>

<h3 class="course-item-title lesson-title"><?php echo esc_html( $title ); ?></h3>
