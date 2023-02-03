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
 * Проверяем доступ к курсу если нет редиректим на страницу профиля
 */
$user = learn_press_get_current_user();
$user_course = $user->get_course_data( get_the_ID() );

if (isset(array_values((array)$user_course)[19]['status'])){
    if (array_values((array)$user_course)[19]['status']!='enrolled'){
        wp_redirect('https://antinorma.com/dostup-k-kursu-zakryt/');
    }
}else{
   wp_redirect('https://antinorma.com/dostup-k-kursu-zakryt/');
}


/**
 * Header for page
 */
if ( empty( $is_block_theme ) ) {
	get_header();
}
/**
 * @since 3.0.0
 */



?>



<section class="materials padding-left">

<?php 


learn_press_get_template( 'content-single-course' );

//do_action( 'learn-press/single-course-summary' );

//do_action( 'learn-press/before-main-content' );
//do_action( 'learn-press/course-meta-secondary-left' );



// while ( have_posts() ) {
// 	the_post();
    
// } 




?>
</section>










<?php
if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> ---> single-course.php </div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > single-course.php //////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}

/**
 * Footer for page
 */
if ( empty( $is_block_theme ) ) {
	get_footer();
}

