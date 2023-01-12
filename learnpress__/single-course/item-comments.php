<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/single-course/item-comments.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/single-course/item-comments.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying comments of a course item.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( comments_open() || get_comments_number() ) {
	?>
	<div id="learn-press-item-comments">
		<div class="learn-press-comments">
			<?php
			add_filter( 'deprecated_file_trigger_error', '__return_false' );
			comments_template();
			remove_filter( 'deprecated_file_trigger_error', '__return_false' );
			?>
		</div>
	</div>
<?php } ?>
