<?php
if (mydebbug()){
	echo '--->loop-section-new.php';
}

/**
 * Template for displaying loop course of section.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/loop-section-new.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  4.0.2
 */

?>

<div class="curriculum__modul" style="margin-bottom: 15px;"> 
	<div class="curriculum__header">
	  <div class="curriculum__top">
	    <div class="curriculum__title">
	    	
		    	<?php
					$title = $section->get_title();
					echo wp_kses_post( ! $title ? _x( 'Untitled', 'template title empty', 'learnpress' ) : $title );
				?>
			
	    </div>
	    <div class="container__icon--18"><i class="fa-solid fa-angle-down"></i></div>
	  </div>
	  <div class="curriculum__progress"></div>
	</div>
	<div class="curriculum__body">
	

	<?php if ( ! $items ) : ?>
		<?php learn_press_display_message( __( 'No items in this section', 'learnpress' ) ); ?>
	<?php else : ?>		

		<?php
		foreach ( $items as $item ) :
			$can_view_item = $user->can_view_item( $item->get_id(), $can_view_content_course );

			$item_link = $can_view_item->flag ? $item->get_permalink() : false;
			$item_link = apply_filters( 'learn-press/section-item-permalink', $item_link, $item, $section, $course );
			?>

			<button class="curriculum__item">
				<div class="curriculum__btn-name">
				  <div class="container__icon--24"><i class="fa-regular fa-file"> </i></div>
				  	<span>
				  		<a href="<?php echo esc_url_raw( $item_link ? $item_link : 'javascript:void(0);' ); ?>">
					  		<?php
					  		//echo $can_view_item->flag;
							do_action( 'learn-press/before-section-loop-item-title', $item, $section, $course );

							learn_press_get_template(
								'single-course/section/' . $item->get_template(),
								array(
									'item'    => $item,
									'section' => $section,
								)
							);

							
							?>
						</a>
					</span>
				</div>
				<div class="curriculum__check container__icon--24">
					<?php
					$color_check = 'color:rgb(161, 165, 183);';

					if (esc_attr( $item->get_status_title() ) == 'Пройдено'){
						$color_check = 'color:rgb(67, 203, 146);';
					}

					?>
					<i class="fa-solid fa-check" style="<?php echo $color_check;?>"></i>
					<span class="item-meta course-item-status" title="<?php echo esc_attr( $item->get_status_title() ); ?>"></span>
				</div>
			</button>
			

				
			
		<?php endforeach; ?>
		
	<?php endif; ?>

	 
	</div>
</div>



