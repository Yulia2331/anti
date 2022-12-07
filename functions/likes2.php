<?php
function get_like_button( $post_id = false, $user_id ) {
	if ( ! $post_id ) {
	  $post_id = get_the_ID();
	}
	$arrLikes = get_post_meta( $post_id, '_liked', false ) ;
	
	$count = count( $arrLikes );
	// if ($user_id)
	return sprintf(
		 '<button class="like  like-btn meta-btn %4$s" data-like-id="%1$s" data-liked-count="%2$s">
				<span class="icon">
					<svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M11 17C10.8684 17.0008 10.7379 16.9756 10.6161 16.9258C10.4943 16.876 10.3834 16.8027 10.29 16.71L2.51999 8.93002C1.54536 7.94519 0.998657 6.61558 0.998657 5.23002C0.998657 3.84445 1.54536 2.51484 2.51999 1.53002C3.50226 0.550528 4.83283 0.000488281 6.21999 0.000488281C7.60716 0.000488281 8.93773 0.550528 9.91999 1.53002L11 2.61002L12.08 1.53002C13.0623 0.550528 14.3928 0.000488281 15.78 0.000488281C17.1672 0.000488281 18.4977 0.550528 19.48 1.53002C20.4546 2.51484 21.0013 3.84445 21.0013 5.23002C21.0013 6.61558 20.4546 7.94519 19.48 8.93002L11.71 16.71C11.6166 16.8027 11.5057 16.876 11.3839 16.9258C11.2621 16.9756 11.1316 17.0008 11 17ZM6.21999 2.00002C5.79667 1.9981 5.37717 2.0802 4.9858 2.24155C4.59443 2.40291 4.23897 2.64031 3.93999 2.94002C3.33605 3.54714 2.99703 4.36866 2.99703 5.22502C2.99703 6.08137 3.33605 6.9029 3.93999 7.51002L11 14.58L18.06 7.51002C18.6639 6.9029 19.003 6.08137 19.003 5.22502C19.003 4.36866 18.6639 3.54714 18.06 2.94002C17.4437 2.35773 16.6279 2.03331 15.78 2.03331C14.9321 2.03331 14.1163 2.35773 13.5 2.94002L11.71 4.74002C11.617 4.83375 11.5064 4.90814 11.3846 4.95891C11.2627 5.00968 11.132 5.03581 11 5.03581C10.868 5.03581 10.7373 5.00968 10.6154 4.95891C10.4936 4.90814 10.383 4.83375 10.29 4.74002L8.49999 2.94002C8.20102 2.64031 7.84556 2.40291 7.45419 2.24155C7.06282 2.0802 6.64332 1.9981 6.21999 2.00002Z" 
						/>
					</svg>
				</span>
				<div class="count">%3$s</div>
			</button>',
	 
	  $post_id,
	  ( empty( $count ) ) ? '' : esc_attr( $count ),  
	  __( $count),
		(in_array($user_id, $arrLikes) ? 'liked':'')
	);
 }


 function like_processing() {
	// проверяем код безопасности
	if ( isset( $_GET[ 'security' ] ) && wp_verify_nonce( $_GET[ 'security' ], 'liked' ) ) {
	  // проверяем есть ли идентификатор поста и пользователя, без этих параметров можно дальше не продолжать
	  if ( isset( $_GET[ 'post_id' ] ) && ! empty( get_current_user_id()) && ! empty( $_GET[ 'client_id' ] ) ) {
		 // очищаем идентификатор поста
		 $post_id = sanitize_key( $_GET[ 'post_id' ] );
		 // очищаем идентификатор пользователя
		 $client_id = sanitize_text_field( get_current_user_id() );
		 // получаем массив лайком для текущего поста
		 $liked = get_post_meta(  $post_id, '_liked', false );
		 // инициализируем переменную для ответа браузеру пользователя
		 $action = '';
		 // провверяем ставил ли уже пользователь лайк текущему посту
		 if ( in_array( $client_id, $liked ) ) {
			// усли ставил, то удаляем лайк, и присваиваем соответствующий ответ для переменной $action
			delete_post_meta( $post_id, '_liked', $client_id );
			$action = 'delete';
		 } else {
			// добавляем новый лайт и ответ в переменной $action
			add_post_meta( sanitize_key( $_GET[ 'post_id' ] ), '_liked', $client_id, false );
			$action = 'add';
		 }
		 // формируем ответ браузеру пользователя
		 // будет передано количество поставленных лайков и информация
		 // о выполненном на сервере действии (добавили или удалили)
		 wp_send_json_success( array(
			'action' => $action,
			'count'  => count( get_post_meta(  $post_id, '_liked', false ) ),
		 ) );
	  }
	}
	// обравыем работу скрипта
	wp_die();
 }
 // цепляем хуки, action в нашем случае равен 'liked'
 add_action( 'wp_ajax_liked', 'like_processing' );
 add_action( 'wp_ajax_nopriv_liked', 'like_processing' );



 function liked_scripts() {
	wp_enqueue_script( 'liked', get_template_directory_uri() .'/assets/js/custom/liked.js', array(), '1.0.0', true );
	wp_localize_script( 'liked', 'ThemeLiked', array(
	  'ajaxurl'  => admin_url( 'admin-ajax.php' ),
	  'liked'    => wp_create_nonce( 'liked' ),
	) );
 }
 add_action( 'wp_enqueue_scripts', 'liked_scripts' );
?>