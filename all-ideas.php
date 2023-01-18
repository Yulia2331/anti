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
      <button class="board-ideas__more">Смотреть еще</button>
    </div>
  </div>
</section>
<?php
    get_footer(); ?>
