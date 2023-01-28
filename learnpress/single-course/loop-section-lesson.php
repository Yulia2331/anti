<?php
if (mydebbug()){
	echo '--->loop-section-lesson.php';
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


$active = '';

?>

<li class="navigation__item" >
    <button class="navigation__button" data-value="module-<?php echo $section->get_id();?>">
      <div class="navigation__block nav-structure__header">
        <div class="navigation__link-name nav-structure__name">
          <p>

          	<?php
							$title = $section->get_title();
							echo wp_kses_post( ! $title ? _x( 'Untitled', 'template title empty', 'learnpress' ) : $title );
						?>

          </p>
        </div>
        <div class="navigation__marker" data-marker="module-<?php echo $section->get_id();?>"><i class="fa-solid fa-angle-right"></i></div>
      </div>
      <div class="nav-structure__progress progress">
        <div class="progress__line"></div>
      </div>
    </button>

    <?php  
    // echo $section->get_id();
    // echo '<br>'; 
    // echo $course->get_id();
    // echo '<br>';
    // echo $section->get_slug(); 
    // echo '<br>';    
		// echo $wp->request;

		

    ?>

    

    <?php if ( ! $items ) { ?>
			<?php learn_press_display_message( __( 'No items in this section', 'learnpress' ) ); ?>
		<?php }else { 

			

			foreach ( $items as $item ) {
				
				$can_view_item = $user->can_view_item( $item->get_id(), $can_view_content_course );
				$item_link = $can_view_item->flag ? $item->get_permalink() : false;
				$item_link = apply_filters( 'learn-press/section-item-permalink', $item_link, $item, $section, $course );
				//echo $section->get_id();
				// echo '<br>';
				// echo $item->get_id().'+';
				// echo '<br>';
				// echo $post->ID;

				if($item_link == 'http://localhost:8000/'.$wp->request){
					$active = 'active-flex';
				}	
				
			}

		?>
			<div class="navigation__sub-menu nav-structure__submenu <?php echo $active;?>" data-target="module-<?php echo $section->get_id();?>">
		<?php

		foreach ( $items as $item ) {
			$can_view_item = $user->can_view_item( $item->get_id(), $can_view_content_course );

			$item_link = $can_view_item->flag ? $item->get_permalink() : false;
			$item_link = apply_filters( 'learn-press/section-item-permalink', $item_link, $item, $section, $course );

			?>

		     <div class="nav-structure__module-link">
		        <div class="container__icon--18 nav-structure__icon">
		        	<i class="fa-regular fa-file"></i>
		        </div>
		        <a class="navigation__sub-menu-link" href="<?php echo $item_link;?>">
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
		    </div>      

		<?php }} ?>
    </div>
</li>



