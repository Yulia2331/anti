<?php
/**
 * Template name: Курс
 */
            get_header();

if (mydebbug()){
    echo '---> course_sing.php';    
}
           
         ?>
<?php
// echo get_page_uri();
$url = $_SERVER['REQUEST_URI'];

$parts = parse_url($url); 
parse_str($parts['query'], $query); 
 
$curs_id = $query['id'];
$course = learn_press_get_course();

?>

<div class="content d-flex flex-column flex-column-fluid padding-left" id="kt_content">

        <?php
        $post = get_post($curs_id);
        setup_postdata($post); ?>
            <div class="curses__banner p-9 d-flex flex-column justify-content-between" style="background-image:url(<?php the_field('curs_poster'); ?>);"">
                <div class="curses__banner-top d-flex justify-content-between">
                    <div class="curses__rating d-flex align-items-center">
                        <span class="curses__rating-name">Рейтинг АнтиНормы</span>
                        <img src="<?php echo bloginfo('template_url');?>/assets/img/curses/star.svg" alt="Звезда" class="curses__rating-img">
                        
                        <span class="curses__rating-value"><?php echo do_shortcode('[ratemypost-result id="' . $curs_id . '"]  '); ?></span>
                    </div>
                    <div class="curses__day">
                        <span class="curses__day-value"><?php echo learn_press_get_post_translated_duration( get_the_ID(), esc_html__( 'Lifetime access', 'learnpress' ) ); ?></span>
                    </div>
                </div>
                <div class="curses__banner-bottom">
                    <h1 class="curses__title mb-9"><?php the_title(); ?></h1>
                    <span class="content__bunner-autor"><?php the_field('curs_author'); ?></span>
                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-danger mt-5">Перейти к материалам курса</a>
                </div>
            </div>
            <div class="card p-9">
                <div class="card__curses d-flex align-items-center mb-9">
                    <div class="card__video-block">
                        <!-- <button class="card__video-btn">
                            <img src="img/curses/play.svg" alt="play" class="card__video-play">
                        </button> -->
                        <video class="card__video video-js vjs-theme-sea" id="video-1" controls poster="<?php the_field('poster_dlya_preview'); ?>">
                            <source src="<?php the_field('promo_rolik'); ?>" type="video/mp4">
                        </video>
                    </div>
                    <div class="card__content">
                        <span class="card__total-person mb-9">Прошли 285 человек</span>
                        <p class="card__descr mb-9">
                          <?php the_field('curs_descr'); ?>
                        </p>
                        <a href="#" class="banner-swiper__btn no-abs btn btn-sm btn-danger">Оставить отзыв</a>
                    </div>
                </div>
                
                <!-- <div class="module-block__add">
                  <div class="module-block__add-message"> 
                    <input class="module-block__input" type="text" placeholder="Написать сообщение">
                    <button class="module-block__send">
                      <div class="container__icon--18"><i class="fa-solid fa-share"></i></div>
                    </button>
                  </div>
                  <div class="module-block__add-file">
                    <div class="module-block__all-files"> </div>
                    <input type="file" id="open-file" accept=".pdf,.rar,.zip">
                    <button class="module-block__btn secondary__button">Загрузить файл</button>
                  </div>
                </div> -->

                <div class="card__reviews reviews">
                    <?php


                        if ( comments_open()) {

                            $args = array(
                            	'no_found_rows'       => true,
                            	'orderby'             => '',
                            	'order'               => 'DESC',
                            	'post_id'             => $curs_id,
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
                            	<?php $com_id = get_comment_ID(); ?>
                                    <div class="reviews__item p-5 d-flex align-items-center">
                                        <div class="reviews__img"><?php  echo get_avatar($com_id, '50');?></div>
                                        <span class="reviews__content"><?php echo $comment->comment_content; ?></span>
                                    </div>
                                <?php
                                }
                            }
                        }
                    ?>
                        </div>
                    </div>
    			</div>
                <?php wp_reset_postdata(); ?>

				<!--end::Container-->
			</div>
			<!--end::Post-->
		</div>
		<div class="overlay"></div>
    <div class="popup">
        <div class="popup__wrapper p-12 flex-column align-items-center">
            <button class="popup__close">
                <img src="<?php echo bloginfo('template_url');?>/assets/img/curses/close.svg" alt="close">
            </button>
            <h2 class="popup__title mb-10">Оставьте отзыв</h2>
            <?php echo do_shortcode('[ratemypost id="' . $curs_id . '"]  '); ?>
            <?php comment_form($args = array(), $post_id = $curs_id); ?>
        </div>
    </div>
<?php
        get_footer();