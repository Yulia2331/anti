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

//echo '----------------------> tabs';

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

<div id="learn-press-course-tabs" class="course-tabs">
	<?php foreach ( $tabs as $key => $tab ) : ?>
		<input type="radio" name="learn-press-course-tab-radio" id="tab-<?php echo esc_attr( $key ); ?>-input"
			<?php checked( $active_tab === $key ); ?> value="<?php echo esc_attr( $key ); ?>"/>
	<?php endforeach; ?>

	<ul class="learn-press-nav-tabs course-nav-tabs" data-tabs="<?php echo esc_attr( count( $tabs ) ); ?>">
		<?php foreach ( $tabs as $key => $tab ) : 

			if ( esc_attr( $key ) == 'instructor' ):
				null;
			else:

				?>
				<?php
				$classes = array( 'course-nav course-nav-tab-' . esc_attr( $key ) );

				if ( $active_tab === $key ) {
					$classes[] = 'active';
				}
				?>

				<li class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
					<label for="tab-<?php echo esc_attr( $key ); ?>-input"><?php echo esc_html( $tab['title'] ); ?></label>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>

	</ul>

	<div class="course-tab-panels">
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<div class="course-tab-panel-<?php echo esc_attr( $key ); ?> course-tab-panel"
				id="<?php echo esc_attr( $tab['id'] ); ?>">
				<?php
				if ( isset( $tab['callback'] ) && is_callable( $tab['callback'] ) ) {
					call_user_func( $tab['callback'], $key, $tab );
				} else {
					do_action( 'learn-press/course-tab-content', $key, $tab );
				}
				?>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<div class="structure__download download">
    <div class="download__title"> 
      <div class="container__icon--24"><i class="fa-solid fa-circle-exclamation"></i></div>Для вас есть домашнее задание tab
    </div>
    <div class="download__wrapper">
      <div class="download__files"> 
        <div class="download__item"> <a class="download__link" href="../../img/ava-1.png" download>
            <div class="container__icon--18 download__icon"><i class="fa-solid fa-file"></i></div>
            <div class="download__name">ava-1.png </div></a></div>
        <div class="download__item"> <a class="download__link" href="../../img/ava-1.png" download>
            <div class="container__icon--18 download__icon"><i class="fa-solid fa-file"></i></div>
            <div class="download__name">ava-1.png </div></a></div>
      </div>
      <button class="secondary__button download__btn">Скачать файлы</button>
    </div>
</div>

<? //echo '----------------------> tabs'; ?>
