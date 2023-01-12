<?php
/**
 * Template for displaying course duration in secondary section.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) or die;

$course = learn_press_get_course();
?>

<div class="content-materials-block__summary-item">
    <div class="container__icon--24 icon-clock"><i class="fa-regular fa-clock"></i></div><span><?php echo learn_press_get_post_translated_duration( get_the_ID(), esc_html__( 'Lifetime access', 'learnpress' ) ); ?></span>
</div>

<!-- <div class="meta-item meta-item-duration"> -->
<?php 
    //echo learn_press_get_post_translated_duration( get_the_ID(), esc_html__( 'Lifetime access', 'learnpress' ) ); 
?>    
<!-- </div> -->

