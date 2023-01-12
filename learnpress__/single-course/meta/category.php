<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/single-course/meta/category.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/single-course/meta/category.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying categories of course in primary-meta section.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="meta-item meta-item-categories">
	<div class="meta-item__value">
		<label><?php esc_html_e( 'Category', 'learnpress' ); ?></label>
		<div>
			<?php
			if ( ! get_the_terms( get_the_ID(), 'course_category' ) ) {
				esc_html_e( 'Uncategorized', 'learnpress' );
			} else {
				echo get_the_term_list( get_the_ID(), 'course_category', '', '<span>|</span>' );
			}
			?>
		</div>
	</div>
</div>
