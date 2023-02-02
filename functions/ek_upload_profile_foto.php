<?php 
function ek_form_upload_images(){
	
	
	?>
		<div style="display: flex; ">
			<input type="file" name="my_image_upload" class="ek_image_upload" id="ek_image_upload"  multiple="false" style="display:block;" />
			<button class="btn btn-sm btn-danger me-2 upload_user_images">Выберете фаил</button>
			<input type="hidden" name="new_avatar" class="upload_image_avatar">
		</div>

		<!-- <input type="hidden" name="post_id" id="post_id" value="55" />			
		<input id="submit_my_image_upload" name="submit_my_image_upload" type="submit" value="Upload" /> -->
		

	<?php
	
}


add_action( 'wp_ajax_ek_upload_profile_foto', 'ek_upload_profile_foto' );
function ek_upload_profile_foto(){

	$post_id = (int) $_POST['post_id'];
	
	$result =  array();

	if (isset($_FILES)) {
		// все ок! Продолжаем.
		// Эти файлы должны быть подключены в лицевой части (фронт-энде).
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		
		foreach( $_FILES as $file_id => $data ){
			$attach_id = media_handle_upload( $file_id, $post_id );

			// ошибка
			if( is_wp_error( $attach_id ) )
				$uploaded_imgs[] = 'Ошибка загрузки файла `'. $data['name'] .'`: '. $attach_id->get_error_message();
			else
				$uploaded_imgs[] = wp_get_attachment_url( $attach_id );
		}

	} else {
		echo "Проверка не пройдена. Невозможно загрузить файл.";
	}

	$result['url'] = wp_get_attachment_image_url($attach_id);
	$result['id'] = $attach_id;
	echo $result['id'];
	wp_die();
}
