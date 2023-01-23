<?php
/**
 * Template name: Отслеживаемые идеи
 */
        get_header();
    ?>
 <section class="tracked-ideas padding-left"> 
 <? get_template_part('template-parts/ideas/nav-ideas'); ?>
      <div class="tracked-ideas__board board-ideas"> 
   <?   
   $args = array(
    'post_type' => 'ideas',
    'orderby'     => 'date',
    'order'       => 'DESC',
  );
  query_posts( $args ); 
  
  ?>
        <div class="board-ideas__wrapper">
        <?   
       $user_id = get_current_user_id(); 
       if (have_rows('subscribes_idea', 'user_'.$user_id)){
        $subs = get_field('subscribes_idea', 'user_'.$user_id);
        // print_r($subs);

          if ( have_posts() ) {
          while ( have_posts() ) : the_post();
          $idea_id = get_the_id();
          foreach($subs as $sub){
            
            if (in_array($idea_id,$sub['id_subscribes_idea'])){
              get_template_part('template-parts/ideas/idea');
            } 
          }
         
        endwhile;
        }
      
      }
    ?>

        </div>
        <!-- <button class="board-ideas__more">Смотреть еще</button> -->
      </div>
    </section>
<?php
        get_footer();