<?php
/**
 * Template name: Страница категории курса
 */
            get_header(); ?>
            <?php
// echo get_page_uri();
$url = $_SERVER['REQUEST_URI'];
	
$parts = parse_url($url); 
parse_str($parts['query'], $query); 
 
$curs_id = $query['id'];
?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						
						<!--begin::Post-->
						<div class="courses d-flex flex-column-fluid" id="kt_courses">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
                                <!--begin::Slider-->
                                <div class="banner-swiper swiper mb-9">

                                    <div class="swiper-wrapper">
      <?php $args = array( 
    'post_type' => 'lp_course',
    'tax_query' => array(
        array(
            'taxonomy' => 'course_category',
            'field'    => 'id',
            'terms'    => $curs_id
        ))
    ); 
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post(); ?>
     <div class="banner-swiper__slide swiper-slide">
                                        <div class="overflow w-100 h-100"></div>
                                            <div class="banner-swiper__content">
                                                <h1 class="banner-swiper__title"><?php the_title(); ?></h1>
                                                <span class="banner-swiper__autor"><?php the_field('curs_author'); ?></span>
                                                <p class="banner-swiper__descr"><?php the_field('curs_descr'); ?></p>
                                            </div>
                                            <img src="<?php the_field('curs_poster'); ?>" alt="Обложка курса">
                                            <a href="<?php echo get_home_url(); ?>/course_sing?id=<?php the_id(); ?>" class="banner-swiper__btn btn btn-sm btn-danger">Перейти к курсу</a>
                                    </div>
   <?php 
  }
} else {
  echo '<li>ничего</li>';
}

wp_reset_postdata();
?>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                    
                                    <div class="swiper-nav d-flex justify-content-between">
                                        <div class="swiper-nav__btn nav-prev d-flex justify-content-center align-items-center">
                                            <img src="<?php echo bloginfo('template_url');?>/assets/img/arrow-l.svg" alt="Предыдущий">
                                        </div>
                                        <div class="swiper-nav__btn nav-next d-flex justify-content-center align-items-center">
                                            <img src="<?php echo bloginfo('template_url');?>/assets/img/arrow-r.svg" alt="Следующий">
                                        </div>
                                    </div>
                                </div>
                                <!--end::Slider-->

                                <!--begin::Categories-->
                                <div class="categories">
                                    <ul class="categories__list d-flex flex-wrap justify-content-between">
                                         <?php 
                            $taxonomy     = 'course_category';
                            $orderby      = 'name';  
                            $show_count   = 0;
                            $pad_counts   = 0; 
                            $hierarchical = 1; 
                            $title        = '';  
                            $empty        = 0;
                            $course_category = array(
                            'taxonomy'     => $taxonomy,

                            );
                            $cat_product = get_categories( $course_category )?>
                            <?php foreach ($cat_product as $cat_p) : ?>
                            <?php $curs_term_id = $cat_p->cat_ID;
                               $id_term = 'term_' . $curs_term_id . ''; 
                               ?><?php if($curs_id == $curs_term_id){} else { ?>
                                <li class="categories__item" style="background: url(<?php the_field('izobrazhenie_rubriki', $id_term); ?>);">
                                        <a href="<?php echo get_home_url(); ?>/courses_arch/?id=<?php echo $curs_term_id ?>" class="categories__link w-100 h-100 d-flex justify-content-center align-items-center"><?php echo $cat_p->name; ?></a>
                                </li> <? } ?>
                            <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!--end::Categories-->

							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>

<?php
        get_footer(); ?>