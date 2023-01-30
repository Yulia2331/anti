<?php
/**
 * Template for displaying tab nav of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/tabs/tabs.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.1
 */

defined( 'ABSPATH' ) || exit();

if (mydebbug()){
echo '---> tabs.php';
}

$tabs = learn_press_get_course_tabs();

if ( empty( $tabs ) ) {
  return;
}

$active_tab = learn_press_cookie_get( 'course-tab' );

if ( ! $active_tab ) {
  $tab_keys   = array_keys( $tabs );
  $active_tab = reset( $tab_keys );
}

// Show status course
$lp_user = learn_press_get_current_user();

if ( $lp_user && ! $lp_user instanceof LP_User_Guest ) {
  $can_view_course = $lp_user->can_view_content_course( get_the_ID() );

  if ( ! $can_view_course->flag ) {
    if ( LP_BLOCK_COURSE_FINISHED === $can_view_course->key ) {
      learn_press_display_message(
        esc_html__( 'You finished this course. This course has been blocked', 'learnpress' ),
        'warning'
      );
    } elseif ( LP_BLOCK_COURSE_DURATION_EXPIRE === $can_view_course->key ) {
      learn_press_display_message(
        esc_html__( 'This course has been blocked for expiration', 'learnpress' ),
        'warning'
      );
    }
  }
}
?>

<?php foreach ( $tabs as $key => $tab ) : ?>
  <div class="course-tab-panel-<?php echo esc_attr( $key ); ?> "
        id="<?php echo esc_attr( $tab['id'] ); ?>">
     <?php       

        // Обзор
        if ($key == 'overview'){
          ?>
          <div class="content-video__review review">
            <?php call_user_func( $tab['callback'], $key, $tab ); ?>
          </div>
          <?php       
        }

        // Учебная программа
        if ($key == 'curriculum'){
          ?>
          <div class="content-materials-block__curriculum curriculum v1">
            <?php call_user_func( $tab['callback'], $key, $tab ); ?>
          </div>
          <?php
        }
          
       
      ?>
  </div>

<?php endforeach; ?>



