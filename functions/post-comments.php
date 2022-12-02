<?php 
function mytheme_comment( $comment, $args, $depth ) {
	?>
		<?php 
		$user_id = $GLOBALS['comment']->user_id;
		$user_info = get_userdata($user_id);
		$username = $user_info->first_name;
		$last_name = $user_info->last_name;

		?>
		
		<li <?php comment_class('comments__item main-comment d-flex flex-column')  ?> id="comment-<?php comment_ID() ?>">
					<div class="d-flex">
						<div class="comments__avatar">
							<div class="author-image lazy" style='background:url(<?=get_user_image($user_id)?>)'>

							</div>
						</div>
						<div class="comments_body d-flex flex-column flex-grow-1">
						<a href = '/author/<?php echo $user_info->user_nicename ?>' data-name='<?php echo $last_name?>' class="comments__name">
							 <?php echo $username?> <?php echo $last_name?>
						</a>
							<div class="comments__text">
								<?php comment_text() ?>
							</div>
							<div class="comments__data d-flex align-items-center">
								<span class="data">
									<?php comment_date( 'j F Y в H:i' ) ?>
								</span>
								<button data-name='<?php echo $username?>' class="comments__answer" data-comment='<?php comment_ID() ?>' data-post = '<?php echo get_the_ID() ?>' id='answer-<?php comment_ID() ?>' >
									Ответить
								</button>
							
							</div>
						</div>
				
					</div>
				
		
		<?php // без закрывающего </li> (!)
		
	}

	add_action( 'wp_ajax_sendcomment', 'true_comment' );
	add_action( 'wp_ajax_nopriv_sendcomment', 'true_comment' );

	function true_comment() {
		 
		$post_id = $_POST['post'];
		$text = $_POST['text'];
		$answer = $_POST['answer'];
		$data = [
			'comment_post_ID'      => $post_id,
			'comment_content'      => $text,
			'comment_type'         => 'comment',
			// 'comment_parent'       => $answer,
			'comment_parent'       => 0,
			'user_id'              => get_current_user_id(),
			'comment_date'         => null, // получим current_time('mysql')
			'comment_approved'     => 1,
		];
		$comment_id = wp_new_comment($data);
		
		$user_id = get_current_user_id();
		$comment = get_comment($comment_id, ARRAY_A);
		$user_info = get_userdata($user_id);
		$username = $user_info->first_name;
		$last_name = $user_info->last_name;
		$date = $comment['comment_date'];
		$d1 = strtotime($date);
		$date2 = date_i18n("'j F Y в H:i'", $d1);

		$result=array();

		$result['children'] = $answer==0 ? 'child' : '';
		$result['user_photo'] = get_user_image($user_id);
		$result['comment_id']= $comment_id;
		$result['author_link']= get_author_posts_url($user_id);
		$result['user_name'] = $username;
		$result['user_lastname'] = $last_name;
		$result['text'] = $text;
		$result['date'] = $date2;
		$result['post_id'] = $post_id;
		
		echo json_encode($result);
		wp_die();


	}

remove_all_filters('comment_flood_filter');
add_filter('comment_flood_filter', 'custom_throttle_comment_flood');
function custom_throttle_comment_flood() {
		return false;
	}


add_action( 'wp_ajax_get_comments', 'get_comments_callback' );
add_action( 'wp_ajax_nopriv_get_comments', 'get_comments_callback' );

function get_comments_callback() {
	$post_id = $_POST['post_id'];
	$args = array(
		'post_id'             => $post_id,
		'status'              => 'all',
		'hierarchical'        => false,
	);
	$comms = get_comments($args);
	
	$result = array();
	foreach ($comms as $com ){
		$user_id = $com->user_id;
		$user_info = get_userdata($user_id);
		$username = $user_info->first_name;
		$last_name = $user_info->last_name;
		$date = $com -> comment_date;
		$d1 = strtotime($date);
		$date2 = date_i18n("'j F Y в H:i'", $d1);
		$result[] = array(
			'children' =>0,
			'user_photo' => get_user_image($user_id),
			'author_link' => get_author_posts_url($user_id),
			'user_name' => 	$username,
			'user_lastname' => $last_name,
			'text' => $com ->comment_content,
			'date' => $date2,
			'post_id' => $com->comment_post_ID
		);
	} 
	
	echo json_encode($result);
	wp_die();
}