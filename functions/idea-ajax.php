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

add_action('wp_ajax_rate_form', 'rate_form');
add_action('wp_ajax_nopriv_rate_form', 'rate_form');

function rate_form()
{ 

echo $_POST['id'];
echo $_POST['plus'];  
echo $_POST['minus'];   
echo $_POST['comment'];  
 $post_id = $_POST['id'];
  $plus = $_POST['plus'];
  $minus = $_POST['minus'];
  $comment = $_POST['comment'];
  $current_user_id = get_current_user_id();
  $user       = get_userdata( $current_user_id );
$user_email   = $user->user_email;
$first_name = $user->first_name;
$last_name  = $user->last_name;
$myArray = $_REQUEST['criteriasArr'];
$stack = array();
foreach( $myArray as $item ){
	$val = $item['val'];
	array_push($stack, $val);
}
$l = count($stack);
$s = array_sum($stack);
$rating = $s/$l;

  $commentdata = [
	'comment_post_ID'      => $post_id,
	'comment_author'       => [ $first_name, $last_name],
	'comment_author_email' => $user_email,
	'comment_content'      =>  $comment,
	'comment_type'         => 'comment',
	'user_ID'              => $current_user_id,
    'comment_meta'         => [ 
        'reviews_plus' => $plus,
        'reviews_minus' => $minus,
		'reviews_rating' => $rating
      ],
];

wp_new_comment( $commentdata );


wp_die(); 
}
add_action('wp_ajax_sabscr_idea', 'sabscr_idea');
add_action('wp_ajax_nopriv_sabscr_idea', 'sabscr_idea');

function sabscr_idea() { 
 $post_id = $_POST['postId'];
 $user_id = $_POST['userId'];
$row = array(
	    'field_63c3c54589bb2'   => $post_id,
	  );
	  add_row('field_63c3c51689bb1', $row, 'user_'.$user_id);

wp_die(); 
}