<?php

if (mydebbug()){
    echo '<div style="display: block;background-color: red;width: 300px;padding: 20px;"> --->templates_test/profile/dashboard.php</div>';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
    echo '<!--//// > templates_test/profile/dashboard.php//////-->';
    echo '<!--/////////////////////////////////////////////////////////////////////////////////////////////////////-->';
}
/**
 * Template for displaying Dashboard of user profile.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/profile/dashboard.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.0
 */

defined( 'ABSPATH' ) || exit();
?>

<div class="learn-press-profile-dashboard">

	<?php
	/**
	 * Before dashboard
	 */
	do_action( 'learn-press/profile/before-dashboard' );

	/**
	 * Dashboard summary
	 */
	do_action( 'learn-press/profile/dashboard-summary' );

	/**
	 * After dashboard
	 */
	do_action( 'learn-press/profile/after-dashboard' );

	?>

</div>
