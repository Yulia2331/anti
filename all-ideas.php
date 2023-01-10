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
              <button class="idea__name" data-view="<? the_id(); ?>"><? echo the_title(); ?></button>
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
<!-- тело -->
<div class="view-idea" data-idea="<? the_id(); ?>">
  <button class="view-idea__close close container__icon--18"><i class="fa-solid fa-xmark"></i></button>
  <button class="view-idea__trash container__icon--18"><i class="fa-solid fa-trash"></i></button>
  <div class="view-idea__header"> 
    <h2 class="view-idea__title"><? echo the_title(); ?></h2>
    <div class="view-idea__right"> 
      <div class="view-idea__rating"> <span class="view-idea__number">5</span>
        <div class="view-idea__icon container__icon--18"><i class="fa-solid fa-star"></i></div>
      </div>
      <apsn class="view-idea__data"><?php echo get_the_date(); ?></apsn>
    </div>
  </div>
  <div class="view-idea__info"> 
    <div class="view-idea__user"> <img src="<?=get_user_image($a_id)?>" alt="avatar">
      <div class="view-idea__user-name"><?php echo get_the_author(); ?></div>
    </div>
    <div class="view-idea__center-block"> 
      <div class="view-idea__category"><? if($gg){ foreach( $gg as $g ){ 
                  echo  $g->name; }
                } ?></div>
      <div class="view-idea__meaning"><?php the_field('online_offline'); ?></div>
    </div>
    <button class="view-idea__btn button-main">Написать автору</button>
  </div>
  <div class="view-idea__hypothesis hypothesis">
    <form method="POST" class="hypothesis__add"> 
      <input class="input hypothesis__input" name="hypothesis_content" type="text" placeholder="Дополнить идею">
      <!-- <input type="text" value="1511" name="hypothesis_content_id"> -->
      <button type='submit' name="hypothesis__button" class="hypothesis__button">
        <div class="hypothesis__icon"><i class="fa-solid fa-location-arrow"></i></div>
      </button>
    </form> 

    <!-- <script>
      jQuery("a#btn-download").click(function(){
   var data_count = $('#data-download').attr('data-count');    
   data_count = parseInt(data_count)+1;
   $('#data-download').attr('data-count',data_count);
   $('#data-download').text(data_count +' downloads');
			
   var ajaxurl = 'http://'+window.location.host+'/wp-admin/admin-ajax.php';
   var form = "#test-form";
   jQuery.ajax({
   url: ajaxurl + "?action=test_function",
   type: 'POST',
   data: {'input_test_int' : $('.hypothesis_content').val()},
     success: function(data) {
     console.log(data);
     console.log("SUCCESS!");
   },
     error: function(data) {
     console.log("FAILURE");
   }
}); });
    </script> -->

    
    <!-- <script>

jQuery('.hypothesis__button').click(function(e) {
e.preventDefault();
var ajaxurl = "/wp-admin/admin-ajax.php";
jQuery.ajax({
       type: "POST",
       url: ajaxurl,
       data: "action=new"+,  
       success: function(msg){
           alert(msg);
       }
   });
})
</script> -->
    <div class="hypothesis__board"> 
  <?  if( have_rows('hypothesis_rep') ):
  while ( have_rows('hypothesis_rep') ) : the_row();
?>
  <div class="hypothesis__item">
    <div class="hypothesis__item_header">
      <div class="hypothesis__item_title">Гипотеза (<? the_sub_field('hypothesis_date'); ?>)</div>
      <button class="hypothesis__item_icon"> <i class="fa-solid fa-trash"></i></button>
    </div>
    <div class="hypothesis__content"><? the_sub_field('hypothesis'); ?></div>
  </div>
<?
  endwhile;
else :
endif; ?>

    </div>
  </div>
  <div class="view-idea__button-block"> 
    <button class="view-idea__button secondary__button">Подписаться</button>
    <button class="view-idea__button view-idea__button-reviews additional-button">Оставить отзыв</button>
  </div>
</div>
                                        <?php }
                                wp_reset_postdata();
                                ?>
<style>
.view-idea{
  top: 10%;
}
.create-reviews{
  top: 10%;
}
</style>
      </div>
      <button class="board-ideas__more">Смотреть еще</button>
    </div>
  </div>
</section>
<?

// if($_POST['criteria_rate_id']){
//   tt();
// }
// function tt()
// { 
//     $post_id = sanitize_text_field( (int) $_POST['criteria_rate_id'] );
//     $key_1 = 'criteria_1_rat';
//     $val_1 = sanitize_text_field( (int) $_POST['criteria_rate_1'] );
//     $key_2 = 'criteria_2_rat';
//     $val_2 = sanitize_text_field( (int) $_POST['criteria_rate_2'] );
//     update_post_meta( $post_id, $key_1, $val_1);
//     update_post_meta( $post_id, $key_2, $val_2);
// }
?>
<? 
// $meta_values = get_post_meta( 1511 );
// print_r($meta_values);
// if($_POST){ hypothesis_update(); }

// function hypothesis_update() {
// $post_id = 1511;
// $cont = sanitize_text_field( $_POST['hypothesis_content'] );
// $time = current_time( 'timestamp' );
// // $field_key = "field_63b82d7710576";
// $fruit_field_key = 'field_63b82d7710576';
// $fruit_subfield_name = 'field_63b82d9410577';
// $fruit_subfield_colour = 'field_63b830eb2e22c';

// $value = array(
//   array(
//     "hypothesis_rep_1_hypothesis"	=> $cont,
//     'hypothesis_rep_1_hypothesis_date' => $time,
//   )
// );
// update_field( $field_key, $value, $post_id );

// } 
// Array ( [online_offline] => Array ( [0] => онлайн ) [hypothesis_rep_0_hypothesis] => Array ( [0] => пицца ) [_hypothesis_rep_0_hypothesis] => Array ( [0] => field_63b82d9410577 ) [hypothesis_rep_0_hypothesis_date] => Array ( [0] => 1673283089 ) [_hypothesis_rep_0_hypothesis_date] => Array ( [0] => field_63b830eb2e22c ) [hypothesis_rep] => Array ( [0] => 1 ) [_hypothesis_rep] => Array ( [0] => field_63b82d7710576 ) [_edit_lock] => Array ( [0] => 1673272579:137 ) [_last_editor_used_jetpack] => Array ( [0] => classic-editor ) )
?>
<?php
    get_footer();