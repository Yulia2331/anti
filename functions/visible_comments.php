<?php

// добовление поля выбора учителя в админку
add_action('add_meta_boxes', 'visible_comments', 1);

function visible_comments() {
	add_meta_box( 'visible_comments_fields', 'Отоброжение коментариев', 'visible_comments_box_func', null, 'normal', 'default'  );
}

function visible_comments_box_func( $post ){

	$checked = '';
			
	if (get_post_meta($post->ID, 'dont_visible', 1) == 'on'){
		$checked = 'checked';
	}
	?>

		<input id="html" type="checkbox" name="dont_visible" <?php echo $checked; ?>>
  		<label for="html">Не показывать комментарии</label>

	<?php
}


// включаем обновление полей при сохранении
add_action( 'save_post', 'visible_comments_update', 0 );

## Сохраняем данные, при сохранении поста
function visible_comments_update( $post_id ){

	if(isset( $_POST['dont_visible'])){		
		$visible = $_POST['dont_visible'];	
	}else{
		$visible = '';	
	}
	update_post_meta( $post_id, 'dont_visible', $visible );	

	return $post_id;
}