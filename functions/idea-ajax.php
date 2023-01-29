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

 $idea_data = [
	'post_type' => 'ideas_timeline',
	'post_title'    => $title,
	'post_content'  => '',
	'post_status'   => 'publish',
	'meta_input'    => [ 
		'idea_action' => 'creation',
		'idea_id' => $post_id,
	  ],
];
$idea_timeline_id = wp_insert_post( $idea_data );
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
$rating = ceil($s/$l);

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

$arr = array();
$args = array(
	'no_found_rows'       => true,
	'post_id'             => $post_id,
	'post_type'           => 'ideas',
	'status'              => 'all',
	'count'               => false,
	'date_query'          => null, // See WP_Date_Query
	'hierarchical'        => false,
	'parent'       => 0,
	'update_comment_meta_cache'  => true,
	'update_comment_post_cache'  => false,
);
if( $comments = get_comments( $args ) ){
	foreach( $comments as $comment ){ 
	$rat = get_comment_meta ( $comment->comment_ID, 'reviews_rating', true ); 
	array_push($arr, $rat);
	 }} 
	 $ll = count($arr);
	 $ss = array_sum($arr);
	 $rating_all = ceil($ss/$ll);
	 update_post_meta( $post_id, 'average_rating', $rating_all);

	 $title = get_the_title( $post_id );
	 $idea_data = [
		'post_type' => 'ideas_timeline',
		'post_title'    => $title,
		'post_content'  => '',
		'post_status'   => 'publish',
		'meta_input'    => [ 
			'idea_action' => 'review',
			'idea_id' => $post_id,
		  ],
	];
	$idea_timeline_id = wp_insert_post( $idea_data );
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
$sbc = array(
	    'field_63d233373622f'   => $user_id,
	  );
	  add_row('field_63d232dc3622e', $sbc, $post_id);
	  $title = get_the_title( $post_id );
	  $idea_data = [
		'post_type' => 'ideas_timeline',
		'post_title'    => $title,
		'post_content'  => '',
		'post_status'   => 'publish',
		'meta_input'    => [ 
			'idea_action' => 'subscription',
			'idea_id' => $post_id,
		  ],
	];
	$idea_timeline_id = wp_insert_post( $idea_data );
wp_die(); 
}

add_action('wp_ajax_unsubscribe_idea', 'unsubscribe_idea');
add_action('wp_ajax_nopriv_unsubscribe_idea', 'unsubscribe_idea');

function unsubscribe_idea() { 
 $post_id = $_POST['postId'];
 $user_id = $_POST['userId'];
 if (have_rows('subscribes_idea', 'user_'.$user_id)){
	the_row();
	$subs = get_field('subscribes_idea', 'user_'.$user_id);
	foreach($subs as $sub){
            
		if (in_array($post_id,$sub['id_subscribes_idea'])){
			$row = get_row_index();
			delete_row('field_63c3c51689bb1', $row, 'user_'.$user_id);
		}
	  }
}
if (have_rows('subscribes_idea_post', $post_id)){
	the_row();
	$subs = get_field('subscribes_idea_post', $post_id);
	foreach($subs as $sub){
            
		if (in_array($user_id,$sub['subscriber_id_post'])){
			$row = get_row_index();
			delete_row('field_63d232dc3622e', $row, $post_id);
		}
	  }
}
wp_die(); 
}

add_action('wp_ajax_private_message', 'private_message');
add_action('wp_ajax_nopriv_private_message', 'private_message');

function private_message() { 
$user_id = $_POST['id'];
 $text = $_POST['text'];
 $time = current_time( 'timestamp' );
 $current_user_id = get_current_user_id();
$row = array(
	    'field_63cc34ce2a7bb'   => $text,
		'field_63cc35002a7bc'   => $time,
		'field_63cc35272a7bd'   => $current_user_id,
	  );
	  add_row('field_63cc34b12a7ba', $row, 'user_'.$user_id);

wp_die(); 
}

add_action('wp_ajax_myfilter', 'myfilter');
add_action('wp_ajax_nopriv_myfilter', 'myfilter');

function myfilter() { 
	$d;
	$o;
	if($_POST[ 'filter_sort_date' ]){
		$d = 'date';
		$o = $_POST[ 'filter_sort_date' ];
	};
	if($_POST[ 'filter_sort' ]){
		$d = 'meta_value_num';
		$o = $_POST[ 'filter_sort' ];
	};
 $args = array(	
	'post_type' => 'ideas',
	'author' => $_POST[ 'filter_author' ],
	'orderby' => $d, // сортировка по дате у нас будет в любом случае (но вы можете изменить/доработать это)
	'order'	=> $o, // ASC или DESC
	'meta_query' => array(
		array(
			'key' => 'average_rating',
		)
	)
);
// для таксономий
if( isset( $_POST[ 'filter_cat' ] )) {
	$args[ 'tax_query' ] = array(
		array(
			'taxonomy' => 'ideas_tax',
			'field' => 'id',
			'terms' => $_POST[ 'filter_cat' ]
		)
	);
}
if( isset( $_POST[ 'filter_rat' ] ) ) {
	$args[ 'meta_query' ][] = array(
		'key' => 'average_rating',
		'value' => $_POST[ 'filter_rat' ],
	);
}
if( isset( $_POST[ 'filter_city' ] ) ) {
	$args[ 'meta_query' ][] = array(
		'key' => 'author_city',
		'value' => $_POST[ 'filter_city' ],
	);
}
query_posts( $args );
if ( have_posts() ) {
	while ( have_posts() ) : the_post();
  // тут вывод шаблона поста, например через get_template_part()
  get_template_part('template-parts/ideas/idea');
endwhile;
} else {
echo 'Ничего не найдено';
}

wp_die(); 
}
add_action('wp_ajax_answ_idearev', 'answ_idearev');
add_action('wp_ajax_nopriv_answ_idearev', 'answ_idearev');

function answ_idearev()
{  
  $post_id = $_POST['postId'];
  $parent = $_POST['id'];
  $comment = $_POST['text'];
  $current_user_id = get_current_user_id();
  $user       = get_userdata( $current_user_id );
$user_email   = $user->user_email;
$first_name = $user->first_name;
$last_name  = $user->last_name;

  $commentdata = [
	'comment_post_ID'      => $post_id,
	'comment_author'       => [ $first_name, $last_name],
	'comment_author_email' => $user_email,
	'comment_content'      =>  $comment,
	'comment_type'         => 'comment',
	'user_ID'              => $current_user_id,
	'comment_parent'       => $parent,
];

wp_new_comment( $commentdata );

wp_die(); 
}

 add_action( 'wp_ajax_com_liked', 'com_liked' );
 add_action( 'wp_ajax_nopriv_com_liked', 'com_liked' );

 function com_liked(){
	$com_id = $_GET[ 'id' ];
	$user = $_GET[ 'user' ];
	$liked = get_comment_meta(  $com_id, '_liked', false );
	$action = '';
	if ( in_array( $user, $liked ) ) {
					// усли ставил, то удаляем лайк, и присваиваем соответствующий ответ для переменной $action
					delete_comment_meta( $com_id, '_liked', $user );
					$action = 'delete';
				 } else {
					// добавляем новый лайт и ответ в переменной $action
					add_comment_meta( sanitize_key( $com_id ), '_liked', $user, false );
					$action = 'add';
				 }
				 wp_send_json_success( array(
					'action' => $action,
					'count'  => count( get_post_meta(  $com_id, '_liked', false ) ),
				 ) );
	wp_die();
 }