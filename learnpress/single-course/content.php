<?php

if (mydebbug()){
    echo '---> content.php';
}

/**
 * Template for displaying content of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/content.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

defined( 'ABSPATH' ) || exit();


//the_title();
?>



<div class="materials__crums crums">
    <?php learn_press_breadcrumb();?>
</div>

<?php
// the_content();
//get_comments();
?>

<!-- <div class="course-content course-summary-content"> -->

<div class="materials__flex">

    <div class="materials__wrapper"> 

          <div class="materials__content content-materials-block">

            <!-- Шапка курса -->
            <div class="content-materials-block__header"> 
              <div class="content-materials-block__summary">
                <?php do_action( 'custom_content_single_meta' ); ?>
              </div>
              <div class="content-materials-block__tabs"> 
                
                <?php 
                  $values = get_field('dostup');
                  $us = get_current_user_id();


              
                  if (in_array($us,$values)){
                 ?>
                <button class="content-materials-block__tab review-btn">Обзор</button>
                <button class="content-materials-block__tab curriculum-btn">Учебный план</button>
                <?php } ?>
              </div>
            </div>


            <!-- Обзор курса и Учебный план -->
             <?php 
             // echo '<pre>';
             // print_r(LearnPress::instance()->template( 'course' ));
             // echo '</pre>';

             // tabs.php
             do_action( 'custom_content_single_tab' ); 
             ?>
            <div class="content-video__review review">
              
            </div>            
            <div class="content-materials-block__curriculum curriculum">

            </div>

          </div>
        </div>

        <!-- Комментарии -->
        <div class="materials__comments comments">        
          <?php do_action( 'custom_content_single' ); ?>
        </div>

<?php //do_action( 'learn-press/course-content-summary' ); ?>



<?php
//do_action( 'custom_content_single' ); 

// $coment = LearnPress::instance()->template( 'course' )->func( 'course_comment_template' );
// print_r($coment);
?>
</div>
<!-- </div> -->

<?
if (mydebbug()){
    echo '---> content.php';
}
?>



