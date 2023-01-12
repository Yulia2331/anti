<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/global/block-content.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/global/block-content.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying block lesson content.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/content-lesson/block-content.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.0
 */

defined( 'ABSPATH' ) || exit();
?>

<div class="learn-press-content-protected-message content-item-block">
	<?php esc_html_e( 'The content of this item has been blocked because the course has exceeded its duration.', 'learnpress' ); ?>
</div>
