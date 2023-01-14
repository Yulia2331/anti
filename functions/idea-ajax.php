<?
add_action('wp_ajax_ideas_form', 'ideas_form');
add_action('wp_ajax_nopriv_ideas_form', 'ideas_form');

function ideas_form()
{
	$title = $_POST['title'];
	$cont = $_POST['cont'];
	$idea_tag = $_POST['tag'];
	$idea_tax = (int) $_POST['tax'];
	$time = current_time( 'timestamp' );
	$post_data = [
		'post_type' => 'ideas',
		'post_title'    => $title,
		'post_content'  => '',
		'post_status'   => 'publish',
		'meta_input'    => [ 
		  'online_offline' => $idea_tag,
		],
	];
	$post_id = wp_insert_post( $post_data );
	wp_set_object_terms( $post_id, $idea_tax, 'ideas_tax' );
  $field_key = "field_63b82d7710576";
  $value = array(
	  array(
		"hypothesis"	=> $cont,
	  	'hypothesis_date' => $time,
	  )
  );
  update_field( $field_key, $value, $post_id );

 $myArray = $_REQUEST['criteriasArr'];
 print_r($myArray);
 foreach( $myArray as $item ){
	$row = array(
	  'field_63c14fa8c5302'   => $item['val'],
	  'field_63c14fbec5303'   => 0,
	);
	add_row('field_63c14f5ec5301', $row, $post_id);
 }
 add_post_meta( $post_id, 'average_rating', 0);
wp_die(); 
}

add_action('wp_ajax_hypothesis_form', 'hypothesis_form');
add_action('wp_ajax_nopriv_hypothesis_form', 'hypothesis_form');

function hypothesis_form()
{
echo $_POST['name'];   
echo $_POST['id']; 
 $post_id = $_POST['id'];
  $cont = $_POST['name'];
  $time = current_time( 'timestamp' );
  $row = array(
    'field_63b82d9410577'   => $cont,
    'field_63b830eb2e22c'   => $time,
  );
  add_row('field_63b82d7710576', $row, $post_id);
wp_die(); 
}
add_action( 'comment_post', 'add_comment_metadata_field' );

function add_comment_metadata_field( $comment_id ) {
	$plus = $_POST['plus'];
	$minus = $_POST['minus'];
	$plus = sanitize_text_field( $_POST['reviews__plus'] );
	$minus = sanitize_text_field( $_POST['reviews__minus'] );

	add_comment_meta( $comment_id, 'reviews_plus', $plus );
	add_comment_meta( $comment_id, 'reviews_minus', $minus );
}

add_action('wp_ajax_trash_idea', 'trash_idea');
add_action('wp_ajax_nopriv_trash_idea', 'trash_idea');

function trash_idea()
{
$postid = $_POST['id']; 

wp_delete_post( $postid, true );
wp_die(); 
}

add_action('wp_ajax_trash_hypothesis', 'trash_hypothesis');
add_action('wp_ajax_nopriv_trash_hypothesis', 'trash_hypothesis');

function trash_hypothesis()
{
$postid = $_POST['id']; 
$row = $_POST['row']; 

delete_row('field_63b82d7710576', $row, $postid);
wp_die(); 
}

// add_action('wp_ajax_new', 'newbid_ajax');
// add_action( 'wp_ajax_nopriv_new', 'newbid_ajax' );
// function newbid_ajax() {
//     $post_id = $_POST['id'];
// 	echo $post_id;
//     //Get current bid
//     // $mybid = get_post_meta($post_id, 'start_price', true);

//     //Increase the bid, for example the amount here is 100€
//     // $mybid = $mybid + 100;

//     //Update the database with the increased bid value
//     // update_post_meta($post_id,'start_price',$mybid);


// // 	$time = current_time( 'timestamp' );
// // 	$field_key = "field_63b82d7710576";
// // $value = array(
// // 	array(
// // 		"hypothesis"	=> $cont,
// //     'hypothesis_date' => $time,
// // 	)
// // );
// // update_field( $field_key, $value, $post_id );


//     // In case you need to update another meta for the user, you 
//     // can access the user ID with the get_current_user_id() function

//     // Finally sending back the updated bid so the javascript can display it
//     wp_die();
// }
// function test_function() {
// 	// Set variables
// 	$input_test = $_POST['hypothesis_content'];
// 	$post_id = $_POST['hypothesis_content_id'];
// 	// Check variables for fallbacks
// 	// if (!isset($input_test) || $input_test == "") { $input_test = "Fall Back"; }
// 	// // Update the field
// 	// update_field('downloaded', $input_test);
// 	$time = current_time( 'timestamp' );
// 	$field_key = "field_63b82d7710576";
// 	$value = array(
// 	array(
// 		"hypothesis"	=> $cont,
//     'hypothesis_date' => $time,
// 	)
// );
// update_field( $field_key, $value, $post_id );
//  }
// add_action( 'wp_ajax_nopriv_test_function',  'test_function' );
// add_action( 'wp_ajax_test_function','test_function' );

// add_action('wp_ajax_contact_form', 'rate_form');
// add_action('wp_ajax_nopriv_contact_form', 'rate_form');

// function rate_form()
// { 

// echo $_POST['id'];
// echo $_POST['plus'];  
// echo $_POST['minus'];  
// echo $_POST['comment'];   
//  $post_id = $_POST['id'];
//   $plus = $_POST['plus'];
//   $minus = $_POST['minus'];
//   $com = $_POST['com'];

// // код из файла wp-comments-post.php
// $comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
// if ( is_wp_error( $comment ) ) {
// 	$data = (int) $comment->get_error_data();
// 	if ( ! empty( $data ) ) {
// 		wp_die(
// 			'<p>' . $comment->get_error_message() . '</p>',
// 			__( 'Comment Submission Failure' ),
// 			array(
// 				'response'  => $data,
// 				'back_link' => true,
// 			)
// 		);
// 	} else {
// 		exit;
// 	}
// }

// $user            = wp_get_current_user();
// $cookies_consent = ( isset( $_POST['wp-comment-cookies-consent'] ) );

// do_action( 'set_comment_cookies', $comment, $user, $cookies_consent );

// // код из файла comments.php вашей текущей темы
// wp_list_comments(
// 	array(
// 		'avatar_size' => 60,
// 		'style'       => 'ol',
// 		'short_ping'  => true,
// 	),
// 	array( $comment )
// );

// wp_die(); 
// }
