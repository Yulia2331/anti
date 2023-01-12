<?php



/**
 * Template for displaying content of single course.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Header for page
 */



if ( empty( $is_block_theme ) ) {
	get_header();
}
/**
 * @since 3.0.0
 */
 
echo '---> single-course.php';
?>


<section class="materials padding-left">

<?php 

do_action( 'learn-press/before-main-content' );

do_action( 'learn-press/before-main-content-single-course' );

while ( have_posts() ) {
	the_post();
$values = get_field('dostup');
$us = get_current_user_id();

if(is_user_role_in( [ 'administrator' ] )){
    learn_press_get_template( 'content-single-course' );
}elseif($values){
	foreach($values as $value) {
		if($value == $us ){
		    learn_press_get_template( 'content-single-course' );
		} 
	} 
} 
?>
<div class="" style="opacity: 0;">
<?php do_action( 'learn-press/course-buttons' ); ?>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() { // когда весь HTML загружен
        try{
            const btn = document.querySelector('.button-enroll-course');
            if(btn) {
            setTimeout(function() { // таймер-планировщик
                btn.click(); // вызвать клик на кнопку
                }, 2000); // через две секунды
            }
        } catch {}
    });
</script> 
<?php
} 

/**
 * @since 3.0.0
 */
do_action( 'learn-press/after-main-content-single-course' );
do_action( 'learn-press/after-main-content' );

/**
 * LP sidebar
 */
do_action( 'learn-press/sidebar' );


?>
</section>
<?

/**
 * Footer for page
 */
if ( empty( $is_block_theme ) ) {
	get_footer();
}

echo '---> single-course.php';