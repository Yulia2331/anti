<?php

// добовление поля выбора учителя в админку
add_action('add_meta_boxes', 'add_teachers_fields', 1);

function add_teachers_fields() {
	add_meta_box( 'teachers_fields', 'Учителя курса', 'teachers_box_func', 'lp_course', 'normal', 'default'  );
}

function teachers_box_func( $post ){

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
			

		</style>

		<?php 

		// Получаем список пользователей с ролью учителя
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
				// ставим всех учителей что есть
				foreach ($users as $key => $value) {
					echo '"'.$value.'",';
				}
				?>      
		    ]; 

		    example4.add([
		    	<?php
		    	// добовляем сохраненых учителей
		    	$arr = get_post_meta($post->ID, 'teachers', 1);		    	
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
add_action( 'save_post', 'teachers_update', 0 );

## Сохраняем данные, при сохранении поста
function teachers_update( $post_id ){

	// проверяем на пустоту если пусто сохраняем пустой массив
	if ( empty( $_POST['taggles'] )){
		update_post_meta( $post_id, 'teachers', [] );
		return $post_id;
	}

	// Обновляем настройки
	update_post_meta( $post_id, 'teachers', $_POST['taggles'] );	

	return $post_id;
}