<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/single-course/title.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/single-course/title.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying title of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/title.php.
 *
 * @author  ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.0
 */

defined( 'ABSPATH' ) || exit();
?>

<h1 class="course-title"><?php the_title(); ?></h1>
