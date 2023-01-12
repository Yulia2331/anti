<?php

add_action('add_meta_boxes', 'my_extra_fields', 1);

function my_extra_fields() {
	add_meta_box( 'extra_fields', 'Учителя курса', 'extra_fields_box_func', 'lp_course', 'normal', 'default'  );
}

function extra_fields_box_func( $post ){

	//print_r($_POST);
	?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri() .'/assets/css/taggle.css'?>" media="all">
<style type="text/css">
	.taggle_input{
		border-block-color: white;
		border: 0px !important;
	}

	.taggle_input:focus{
    	min-width: 100px;
    	border: 0px !important;
	}

	.taggle_input:focus {
	  border-color: inherit !important;;
	  -webkit-box-shadow: none !important;;
	  box-shadow: none !important;;
	}

	.close{
		opacity: 1 !important;
	}

	::selection{
		background: rgba(0,0,0,0)!important;
	}
	.taggle_list .taggle .close{
		font-size: 1.1rem;
		position: relative !important; 
		top: 0px !important; 
		right: 0px !important; 
		text-decoration: none;
		padding: 0px !important; 
		line-height: 1; 
		color: #ccc;
		color: rgba(0, 0, 0, 0.2);
		margin-left: 10px;
		display: inline-block;
		opacity: 0;
		pointer-events: none;
		border: 0;
		background: none;
		cursor: pointer;
	}
	/*.taggle_input:focus {

	  border-style: solid 1px; 
	  border-color: white;           
	}*/
</style>

<?php 

$args = [
	'blog_id'      => $GLOBALS['blog_id'],
	'role'         => 'lp_teacher',
	'role__in'     => array(),
	'role__not_in' => array(),
	'capability'          => '',
	'capability__in'      => array(),
	'capability__not_in'  => array(),
	'login'        => '',
	'login__in'    => array(),
	'meta_key'     => '',
	'meta_value'   => '',
	'meta_compare' => '',
	'meta_query'   => array(),
	'include'      => array(),
	'exclude'      => array(),
	'orderby'      => 'login',
	'order'        => 'ASC',
	'offset'       => '',
	'search'       => '',
	'search_columns' => array(),
	'number'       => '',
	'paged'        => 1,
	'count_total'  => false,
	'fields'       => 'user_email',
	'who'          => '',
	'has_published_posts' => null,
	'date_query'   => array() // смотрите WP_Date_Query
];


$users = get_users( $args );

//echo $GLOBALS["price"];
//print_r(array_keys($GLOBALS));

//print_r(get_post_meta($post->ID, 'taggles', 1));
?>
<div class="mytugle">
	<div id="example4"></div>
</div>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src='<?php echo get_template_directory_uri() . '/assets/js/taggle.js'?>'></script>
<script type="text/javascript">
jQuery(function($) {
	var example4 = new Taggle('example4');
	var container = example4.getContainer();
	var input = example4.getInput();
	var availableTags = [
		<?php
		foreach ($users as $key => $value) {
			echo '"'.$value.'",';
		}
		?>      
    ]; 

    example4.add([
    	<?php

    	$arr = get_post_meta($post->ID, 'taggles', 1);
    	
    	if ( $arr != ''){
			foreach ($arr as $value) {
				echo '"'.$value.'",';
			}
		}
		
		?>
		]);

	$(input).autocomplete({
	    source: availableTags, // See jQuery UI documentaton for options
	    appendTo: container,
	    position: { at: "left bottom", of: container },
	    select: function(event, data) {
	        event.preventDefault();
	        //Add the tag if user clicks
	        if (event.which === 1) {
	            example4.add(data.item.value);
	        }
	    }
	});
});
</script>
    

	<?php
}


// включаем обновление полей при сохранении
add_action( 'save_post', 'my_extra_fields_update', 0 );

## Сохраняем данные, при сохранении поста
function my_extra_fields_update( $post_id ){
	//echo '123';
	// базовая проверка
	//$data= $_POST['taggles'];

	if ( empty( $_POST['taggles'] )){
		//echo 'work';
		update_post_meta( $post_id, 'taggles', [] );
		return $post_id;
	}



	update_post_meta( $post_id, 'taggles', $_POST['taggles'] );


	// Все ОК! Теперь, нужно сохранить/удалить данные
	// $_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] ); // чистим все данные от пробелов по краям
	// foreach( $_POST['extra'] as $key => $value ){
	// 	if( empty($value) ){
	// 		delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
	// 		continue;
	// 	}

	// 	update_post_meta( $post_id, $key, $value ); // add_post_meta() работает автоматически
	// }

	return $post_id;
}