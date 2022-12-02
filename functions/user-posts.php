<?php
	add_action( 'wp_ajax_add_user_post', 'add_new_post' );
	add_action( 'wp_ajax_nopriv_add_user_post', 'add_new_post' );

	function add_new_post(){
		$image = $_POST['image'];
		$user_id = $_POST['user_id'];
		$content = $_POST['content'];
		$status = $_POST['status'];
		
		$post_data = array(
			'post_title'    => sanitize_text_field($user_id.date("Y-m-d H:i:s")  ),
			'post_content'  => $content,
			'post_status'   => $status,
			'post_author'   => $user_id,
			'post_type'     => 'user_post',
		);
		$post_id = wp_insert_post( $post_data );
		if ($image!='None'){
			update_field('post_image', $image, $post_id);
		}
		
		$result = array();
		$result['status'] = $post_id;
		echo json_encode($result);
		wp_die();
	}

	add_action( 'wp_ajax_get_user_post', 'get_user_post_callback' );
	add_action( 'wp_ajax_nopriv_get_user_post', 'get_user_post_callback' );

	function get_user_post_callback(){
		$id = $_POST['id'];
		$arr = array(
			'p' => $id,
			'post_type' => 'user_post'
		);
		$result=array();
		$query = new wp_query($arr);
		while ( $query->have_posts() ) {
			$query->the_post();
			ob_start();
			get_template_part('template-parts/user-post');
			$result['post'] = ob_get_contents();
			ob_end_clean();
		}
		
		wp_reset_query();
		wp_reset_postdata();
		echo json_encode($result);
		wp_die();

	}

	add_action( 'wp_ajax_filter_users_posts', 'filter_users_posts_callback' );
	add_action( 'wp_ajax_nopriv_filter_users_posts', 'filter_users_posts_callback' );

	function filter_users_posts_callback(){
	
		$user = $_POST['user'];
		$status = $_POST['target'];
		$arr = array(
			'post_status'   => $status,
			'post_type' => 'user_post',
			'author'   => $user,
			'posts_per_page' => -1,
			'orderby'   => array(
				'date' =>'ASC',
			  )
		);
		$result = array();
		$query = new wp_query($arr);
		if ($query->have_posts()){
			$i=0;
			while ( $query->have_posts() ) {
				$query->the_post();
				ob_start();
				get_template_part('template-parts/user-post');
				$result['post'][$i] = ob_get_contents();
				ob_end_clean();
				$i++;
			}
		}
		else{
			ob_start();
			get_template_part('template-parts/no-posts');
			$result['post'][0] = ob_get_contents();
			ob_end_clean();
		}

		wp_reset_query();
		wp_reset_postdata();
		echo json_encode($result);
		wp_die();
	}
	

//включение комментариев для страниц по умолчанию start
function wph_enable_comments_pages($status, $post_type, $comment_type) {
	if ('page' === $post_type) {
		 if (in_array($comment_type, array('pingback', 'trackback'))) {
			  $status = get_option('default_ping_status');
		 } else {
			  $status = get_option('default_comment_status');
		 }
	}
	return $status;
}
add_filter('get_default_comment_status', 'wph_enable_comments_pages', 10, 3);
//включение комментариев для страниц по умолчанию end




// AJAX загрузка постов 
function load_posts () {
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1; // следующая страница 

	query_posts( $args );
	if ( have_posts() ) {
		 while ( have_posts() ) { the_post();

			  if ($_POST['tpl'] === 'user_post') {
				get_template_part('template-parts/user-post');
			  }

			  if ($_POST['tpl'] === 'prices') {
					get_template_part( '/template-parts/loop-{шаблон2}');
			  }

		 }
		 die();
	}
}
add_action('wp_ajax_loadmore', 'load_posts');
add_action('wp_ajax_nopriv_loadmore', 'load_posts');
	




add_action( 'wp_ajax_delete_user_post', 'delete_user_post_callback' );
add_action( 'wp_ajax_nopriv_delete_user_post', 'delete_user_post_callback' );

function delete_user_post_callback(){
	$id = $_POST['id'];
	wp_delete_post( $id, true);
	$result = array(
		'status' => 'ok'
	);
	echo json_encode($result);
	wp_die();
}
?>