<?php  
/*  
Template Name: Банк идей новый
*/

get_header();
?>
<? get_template_part('template-parts/ideas/create'); ?>
<section class="all-ideas">
  <div class="all-ideas__container"> 
    <div class="all-ideas__wrapper">
      <? get_template_part('template-parts/ideas/nav-ideas'); ?>
    <div class="all-ideas__board board-ideas"> 
      <div class="board-ideas__wrapper">
      <?php
                        $posts = get_posts( array(
                        'numberposts' => -1,
                        'category_name'    => '',
                        'orderby'     => 'date',
                        'order'       => 'DESC',
                        'include'     => array(),
                        'exclude'     => array(),
                        'meta_key'    => '',
                        'meta_value'  =>'',
                        'post_type'   => 'ideas',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    foreach( $posts as $post ){
                        setup_postdata($post);
                        $a_id = $post->post_author;
                        $idea_id = get_the_id();
                        $gg = get_the_terms( $idea_id, 'ideas_tax' );
                        ?>
               <div class="board-ideas__item idea">
                
          <div class="idea__wrapper"> 
            <div class="idea__header"> 
              <div class="idea__data"><?php echo get_the_date(); ?></div>
              <div class="idea__avatar"> <img src="<?=get_user_image($a_id)?>" alt=""></div>
              <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
            </div>
            <div class="idea__body"> 
              <div class="idea__user-name"><?php echo get_the_author(); ?></div>
              <button class="idea__name" data-view="goodIdea1"><? echo the_title(); ?></button>
              <div class="idea__info"> 
                <div class="idea__category"><? if($gg){ foreach( $gg as $g ){ 
                  echo  $g->name; }
                } ?></div>
                <div class="idea__business-position"><?php the_field('online_offline'); ?></div>
              </div>
            </div>
            <button class="idea__buton secondary__button">Подписаться</button>
          </div>
          </div>
                                        <?php }
                                wp_reset_postdata();
                                ?>
      </div>
      <button class="board-ideas__more">Смотреть еще</button>
    </div>
  </div>
</section>
<?php
    get_footer();