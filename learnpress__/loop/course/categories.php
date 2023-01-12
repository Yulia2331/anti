<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/loop/course/categories.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/loop/course/categories.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying categories of a course in loop.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

$categories = get_the_term_list( '', 'course_category' );
?>

<?php if ( ! empty( $categories ) ) : ?>
	<div class="course-categories">
		<?php echo wp_kses_post( $categories ); ?>
	</div>
<?php endif; ?>
