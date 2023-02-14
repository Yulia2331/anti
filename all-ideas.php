<?php  
/*  
Template Name: Банк идей новый
*/

get_header();
?>
<? get_template_part('template-parts/ideas/create'); ?>
<section class="all-ideas padding-left">
  <div class="all-ideas__container"> 
    <div class="all-ideas__wrapper">
      <? get_template_part('template-parts/ideas/nav-ideas'); ?>
      <? get_template_part('template-parts/ideas/idea-filter'); ?>
    <div class="all-ideas__board board-ideas">
   <? 
  $args = array(
    'post_type' => 'ideas',
    'orderby'     => 'date',
    'order'       => 'DESC',
    'posts_per_page' => 9,
		'paged' => $paged,
  );
  query_posts( $args );
                    ?>
      <div class="board-ideas__wrapper">
   <?   if ( have_posts() ) {
      while ( have_posts() ) : the_post();
      // тут вывод шаблона поста, например через get_template_part()
      get_template_part('template-parts/ideas/idea');
    endwhile;
    } else {
    echo 'Ничего не найдено';
    } ?>
      </div>
      <?php
								if ( $wp_query->max_num_pages > 1 ) { ?>
									<script> var this_page = 1; </script>
									<button class="board-ideas__more" title="Загрузить еще"
										data-param-posts='<?php echo serialize($wp_query->query_vars); ?>'
										data-max-pages='<?php echo $wp_query->max_num_pages; ?>'
										data-tpl='ideas'
									 >
											  <span class="fas fa-redo"></span> Загрузить ещё
									</button>
								<?php
								  }
								
								?>
    </div>
  </div>
</section>
<?php
    get_footer(); ?>
