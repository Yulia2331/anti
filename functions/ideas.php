<?php

add_action( 'wp_ajax_push_idea_id', 'my_action_callback' );
add_action( 'wp_ajax_nopriv_push_idea_id', 'my_action_callback' );
function my_action_callback($idea_id){
	$idea_id = $_POST['id'];

	echo $idea_id;
    $args = array(
        'p' => $idea_id, 
        );
    
        $recent = new WP_Query($args); ?>
    <div class="hidden"></div>
    <?    while ( $recent->have_posts() ) : $recent->the_post(); ?>
    <div class="view-idea" data-idea="">
        <?    the_title(); ?>
    </div>
       <?  endwhile; 
	wp_die();
}