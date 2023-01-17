<?php  
/*  
Template Name: timeline
*/

?>

<?php get_header() ?>
<?php 

$current_user = wp_get_current_user();
$subs = array();
if (have_rows('subscribes', 'user_'.$current_user->ID)){
$subscribes = get_field('subscribes', 'user_'.$current_user->ID);
$subs = array(0 => $current_user->ID);
$k = 1;
foreach ($subscribes as $sub){
	$subs[$k] = $sub['id'];
	$k++;
}
}
?>
<div class="content d-flex flex-column flex-column-fluid padding-left" id="kt_content">

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">

<?php 
								if(  is_user_logged_in() ){
												
													get_template_part('template-parts/new_post_form');
												
											}
								?>
	<?php get_template_part('template-parts/filter-links') ?>
									<div id="posts-lists">

											<?php
											
												$arr = array(
													'author__in' =>$subs,
													'posts_per_page' => 10,
													'paged' => $paged,
													'post_status' => 'publish',
													'post_type' => 'user_post',
													'orderby'   => array(
														'date' =>'DESC',
													)
												);
												$query = new wp_query($arr);
								
												if ($query->have_posts()){

											
												while ( $query->have_posts() ) {
													$query->the_post();
													
													get_template_part('template-parts/user-post');
													// выведем заголовок поста
												}
												 
												}
											else{
												get_template_part('template-parts/no-posts');

											}
										?>
									</div>
								<?php
								if ( $query->max_num_pages > 1 ) { ?>
									<script> var this_page = 1; </script>
									<div class="btn-loadmore btn btn-primary" title="Загрузить еще"
										data-param-posts='<?php echo serialize($query->query_vars); ?>'
										data-max-pages='<?php echo $query->max_num_pages; ?>'
										data-tpl='user_post'
									 >
											  <span class="fas fa-redo"></span> Загрузить ещё
									</div>
								<?php
								  }
								
								?>

										</div>
										</div>
										</div>



<? get_footer() ?>