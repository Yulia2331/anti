<?php
/**
 * Template for displaying course level in secondary section.
 *
 * @author  ThimPress
 * @package LearnPress/Templates
 * @version 4.0.0
 * @see LP_Template_Course::count_object()
 */

defined( 'ABSPATH' ) || exit;

if ( ! isset( $object ) || ! isset( $count ) ) {
	return;
}


if (esc_attr( $object ) == 'lesson'):

?>

<div class="content-materials-block__summary-item"> 
    <div class="container__icon--24 icon-list"><i class="fa-solid fa-list-ul"></i></div><span><?php echo wp_kses_post( $count ); ?> в модуле</span>
</div>

<?php

elseif (esc_attr( $object ) == 'quiz'): {
    null;
}

else:

?>

<div class="content-materials-block__summary-item"> 
    <div class="container__icon--24 icon-list"><i class="fa-regular fa-user"></i></div><span><?php echo wp_kses_post( $count ); ?></span>
</div>



<?php endif ?>