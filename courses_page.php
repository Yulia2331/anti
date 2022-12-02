<?php
/*
Template Name: Страница курсов
*/
?>
<?php get_header() ?>
<style>
    body{
        background: #000;
    }
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						
						<!--begin::Post-->
						<div class="courses d-flex flex-column-fluid" id="kt_courses">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
                                <!--begin::Slider-->
                                <div class="banner-swiper swiper mb-9">

                                    <div class="swiper-wrapper">
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
							'post_type'   => 'lp_course',
							'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
						) );

						foreach( $posts as $post ){
							setup_postdata($post);
							?>
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
                                        	<?php }
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
                               ?>
                                <li class="categories__item" style="background: url(<?php the_field('izobrazhenie_rubriki', $id_term); ?>);">
                                        <a href="<?php echo get_home_url(); ?>/courses_arch/?id=<?php echo $curs_term_id ?>" class="categories__link w-100 h-100 d-flex justify-content-center align-items-center"><?php echo $cat_p->name; ?></a>
                                </li>
                            <?php endforeach; ?>
                                    </ul>
                                </div>
                                <!--end::Categories-->

							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
			<?php get_footer() ?>