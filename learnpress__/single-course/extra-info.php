<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/single-course/extra-info.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/single-course/extra-info.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying extra info as toggle
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! isset( $title ) || ! isset( $items ) ) {
	return;
}
?>

<div class="course-extra-box">
	<h3 class="course-extra-box__title">
		<?php echo esc_html( $title ); ?>
	</h3>

	<div class="course-extra-box__content">
		<div class="course-extra-box__content-inner">
			<ul>
				<?php foreach ( $items as $item ) : ?>
					<li><?php echo wp_kses_post( $item ); ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
