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
                        $average_rating = get_post_meta( $idea_id, 'average_rating', true );
                        ?>
<div class="hidden"></div>
<div id="revform<? echo $idea_id; ?>" class="create-reviews">
  <button class="create-reviews__close close container__icon--18"><i class="fa-solid fa-xmark"></i></button>
  <div class="create-reviews__title">Отзыв на идею</div>
  <form action="/wp-comments-post.php" method="post" id="commentform" class="create-reviews__form">
    <div class="create-reviews__textarea">
      <textarea class="create-reviews__plus" name="reviews__plus" placeholder="Расскажите о плюсах" required="required"></textarea>
      <textarea class="create-reviews__minus" name="reviews__minus" placeholder="Расскажите о минусах" required="required"></textarea>
      <textarea id="comment" class="create-reviews__message" name="comment" placeholder="Общий комментарий" required="required"></textarea>
    </div>
    <div class="criteria_rate_idea">
   <input type="hidden" name="criteria_rate_id" value="<? echo $idea_id; ?>" class="criteria_rate_id">
   <input type="hidden" name="criteria_rate_av" value="<? echo $average_rating; ?>" class="criteria_rate_av">
   <div class="create-reviews__counters">
    <? 
    $val_1 = get_post_meta( $idea_id, 'criteria_1', true ); 
    $val_2 = get_post_meta( $idea_id, 'criteria_2', true );
    ?>
    <? if($val_1){ ?>
      <div class="create-reviews__counter-item">
        <div class="create-reviews__area">
          <?  echo $val_1; ?>
      </div>
        <div class="create-reviews__count"> 
          <input class="create-reviews__num" name="criteria_rate_1" value="3">
          <div class="create-reviews__count-button"> 
            <span class="create-reviews__more"><i class="fa-solid fa-caret-up"></i></i></span>
            <span class="create-reviews__less"><i class="fa-solid fa-caret-down"></i></span>
          </div>
        </div>
      </div> <? } ?>
      <? if($val_2){ ?>
      <div class="create-reviews__counter-item">
        <div class="create-reviews__area">
          <?  echo $val_2; ?>
      </div>
        <div class="create-reviews__count"> 
          <input class="create-reviews__num" name="criteria_rate_2" value="3">
          <div class="create-reviews__count-button"> 
            <span class="create-reviews__more"><i class="fa-solid fa-caret-up"></i></i></span>
            <span class="create-reviews__less"><i class="fa-solid fa-caret-down"></i></span>
          </div>
        </div>
      </div> <? } ?>
    </div>
    <button type="submit" class="create-reviews__button secondary__button" style="display:none;">Отправить</button>
    <p class="form-submit">
    <input name="submit" type="submit" id="submit" class="submit create-reviews__button secondary__button" value="Отправить"> 
    <input type="hidden" name="comment_post_ID" value="<? echo $idea_id; ?>" id="comment_post_ID">
    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
    </p>
    <span class="reviews_msg"></span>
   </form>
      </div>
</div>
<!-- Карточка -->
               <div class="board-ideas__item idea">
                
          <div class="idea__wrapper"> 
            <div class="idea__header"> 
              <div class="idea__data"><?php echo get_the_date(); ?></div>
              <div class="idea__avatar"> <img src="<?=get_user_image($a_id)?>" alt=""></div>
              <div class="idea__rating"> <span class="idea__rating_number">
              <? echo $average_rating; ?>
              </span><i class="fa-solid fa-star"></i></div>
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
      <div class="view-idea__rating"> <span class="view-idea__number"><? echo $average_rating; ?></span>
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
 
    <form action="" method="POST" class="hypothesis__add"> 
      <input class="input hypothesis__input" name="hypothesis_content" type="text" placeholder="Дополнить идею">
      <input type="hidden" value="<? 
      echo $idea_id; 
      ?>" name="hypothesis_content_id" class="hypothesis_content_id">
      <button type='submit' class="hypothesis__button">
        <div class="hypothesis__icon"><i class="fa-solid fa-location-arrow"></i></div>
      </button>
    </form> 
      <span class="hypothesis__msg"></span>
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
    <button data-rev="revform<? echo $idea_id ?>" class="view-idea__button view-idea__button-reviews additional-button">Оставить отзыв</button>
  </div>
   <div class="view-idea__reviews reviews-idea">
        <div class="reviews-idea__title">Отзывы участников</div>
        <div class="reviews-idea__board"> 
          <?php
$args = array(
	'no_found_rows'       => true,
	'orderby'             => '',
	'order'               => 'DESC',
	'post_id'             => $idea_id,
	'post_type'           => '',
	'status'              => 'all',
	'count'               => false,
	'date_query'          => null, // See WP_Date_Query
	'hierarchical'        => false,
	'update_comment_meta_cache'  => true,
	'update_comment_post_cache'  => false,
);

if( $comments = get_comments( $args ) ){
	foreach( $comments as $comment ){ ?>
  <?php $com_id = get_comment_ID(); 
        $vote = get_comment_meta ( $comment->comment_ID, 'reviews_plus', true ); 
        $vote2 = get_comment_meta ( $comment->comment_ID, 'reviews_minus', true ); 
  ?>
      <div class="reviews-idea__item">
            <div class="reviews-idea__header"> 
              <div class="reviews-idea__left"> 
                <div class="reviews-idea__user"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt="avatar">
                  <div class="reviews-idea__name">
                     Андрей Ярухин</div>
                </div>
              </div>
              <div class="reviews-idea__right"> <span class="view-idea__number">5</span>
                <div class="view-idea__icon"><i class="fa-solid fa-star"></i></div>
              </div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__plus container__icon--18"><i class="fa-solid fa-square-plus"></i></div>
              <div class="reviews-idea__content"><? echo $vote; ?></div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__minus container__icon--18"><i class="fa-solid fa-square-minus"></i></div>
              <div class="reviews-idea__content"><? echo $vote2; ?></div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__message container__icon--18"><i class="fa-solid fa-message"></i></div>
              <div class="reviews-idea__content"><?php echo $comment->comment_content; ?></div>
            </div>
            <div class="reviews-idea__footer"> 
              <button class="reviews-idea__comment">Комментировать</button>
              <div class="reviews-idea__like"> 
                <div class="reviews-idea__like_number">12</div>
                <div class="reviews-idea__like_icon"><i class="fa-solid fa-heart"></i></div>
              </div>
            </div>
          </div>    
          <?php }} ?>
          </div>
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
<script>
  const hh = document.querySelectorAll('.hypothesis__add');
      hh.forEach((i) => {
    i.addEventListener('submit', (e) =>{
      e.preventDefault();
     
let name = e.target.querySelector('.hypothesis__input').value;
let id = e.target.querySelector('.hypothesis_content_id').value;
let per = e.target.closest('.view-idea__hypothesis').querySelector('.hypothesis__board');
let date = new Date().toLocaleDateString();
  $.ajax({ 
       data: {
        action: 'hypothesis_form', 
        id: id,
        name: name,
      },
       type: 'post',
       url: '/wp-admin/admin-ajax.php',
       beforeSend: function( xhr ) {
				$('.hypothesis__msg').text('Добавление гипотезы...');	
			},
       success: function(data) {
        $('.hypothesis__msg').text('Гипотеза добавлена');	
     
        let html = 
        `
        <div class="hypothesis__item">
    <div class="hypothesis__item_header">
      <div class="hypothesis__item_title">Гипотеза (${date})</div>
      <button class="hypothesis__item_icon"> <i class="fa-solid fa-trash"></i></button>
    </div>
    <div class="hypothesis__content">${name}</div>
  </div>
        `
        per.insertAdjacentHTML('beforeEnd', html);

      }
  });
      })
  })
</script>
<?php
    get_footer();