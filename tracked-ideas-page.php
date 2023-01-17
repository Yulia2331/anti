<?php
/**
 * Template name: Отслеживаемые идеи
 */
        get_header();
    ?>
 <section class="tracked-ideas padding-left"> 
 <? get_template_part('template-parts/ideas/nav-ideas'); ?>
      <div class="tracked-ideas__board board-ideas"> 
   <?   $args = array(
    'post_type' => 'ideas',
    'orderby'     => 'date',
    'order'       => 'DESC',
  );
  query_posts( $args ); ?>
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
    </section>
<?php
        get_footer();