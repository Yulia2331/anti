<?php
/**
 * Template name: Мои задания список
 */       



get_header(null, array('title'=>'Мои задания список'));    

          //$GLOBALS['wp_query']->query_vars['title'] = 'Мои задания список';
          //set_query_var('my_title', '23');

          
          //do_action( 'get_header', 'null', array('title'=>'Мои задания список') );
          //locate_template( 'header.php', true, true, 'Мои задания список' )
          //$my_sup_title = '12312';
          //include 'header.php';

         
       
    ?>

<!-- <header class="header">
      <div class="header__wrapper padding-left">
        <div class="header__title-block"> 
          <button class="header__burger"><i class="fa-solid fa-bars"></i></button>
          <h1 class="header__title main-title">Мои задания</h1>
        </div>
        <div class="header__general-function general-function">
          <button class="general-function__button general-function__notifications container__icon--24"> <i class="fa-solid fa-bell"></i></button>
          <button class="general-function__button general-function__messages container__icon--24"> <i class="fa-regular fa-message"></i></button>
          <button class="general-function__button general-function__search container__icon--24"> <i class="fa-solid fa-magnifying-glass"></i></button>
          <button class="general-function__button general-function__user"><img src="../img/user.png" alt=""></button>
        </div>
      </div>
    </header> -->
    
    
    </div></div>
   
    <section class="my-assignments padding-left">

      <div class="my-assignments__wrapper">
          
        <h2 class="my-assignments__title">Список курсов, по которым доступны домашние задания</h2>
        <div class="my-assignments__cuourses"> 

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

            //print_r($posts);


            foreach( $posts as $post ){ 

              $values = get_field('dostup');
              $us = get_current_user_id();
              
              if (in_array($us,$values)){
              ?>
                <div class="my-assignments__cours my-assignments__cours-2" 
                  style="background-image: url(' <?php the_field('curs_poster'); ?>');">

                  <div class="my-assignments__subtitle">
                    <?php the_title();?>                    
                  </div>
                  
                  <a class="my-assignments__btn button-main" 
                     href="home-work-curse/?id=<?php the_id(); ?>">
                    Перейти
                  </a>

                </div>
              <?php
              }

            }


              
              

              

            //print_r($posts);

            // foreach( $posts as $post )
            //   setup_postdata($post);
            //   the_title(); 
            //   the_field('curs_author'); 
            //   the_field('curs_descr'); 
            //   the_field('curs_poster');
            //   echo get_home_url(); 
            //   the_id(); 
            //   wp_reset_postdata();
            //   echo bloginfo('template_url');
            //   echo bloginfo('template_url');

            //   $taxonomy     = 'course_category';
            //   $orderby      = 'name';  
            //   $show_count   = 0;
            //   $pad_counts   = 0; 
            //   $hierarchical = 1; 
            //   $title        = '';  
            //   $empty        = 0;
            //   $course_category = array(
            //     'taxonomy'     => $taxonomy,
            //     );
            //   $cat_product = get_categories( $course_category )

                // foreach ($cat_product as $cat_p) : 
                //   $curs_term_id = $cat_p->cat_ID;
                //   $id_term = 'term_' . $curs_term_id . ''; 
                //   the_field('izobrazhenie_rubriki', $id_term);
                //   echo get_home_url();
                //   echo $curs_term_id;
                //   echo $cat_p->name; 
                //endforeach; 
          //endforeach; 

          ?>
          <!-- <div class="my-assignments__cours my-assignments__cours-1" style="background-image: url(' <?php echo get_template_directory_uri(); ?>/assets/img/cours-1.png');">
            <div class="my-assignments__subtitle">Это название курса</div><a class="my-assignments__btn button-main" href="home-work-curse">Перейти</a>
          </div>
          <div class="my-assignments__cours my-assignments__cours-2" style="background-image: url(' <?php echo get_template_directory_uri(); ?>/assets/img/cours-2.png');">
            <div class="my-assignments__subtitle">Это название курса</div><a class="my-assignments__btn button-main" href="home-work-curse">Перейти</a>
          </div>
          <div class="my-assignments__cours my-assignments__cours-1" style="background-image: url(' <?php echo get_template_directory_uri(); ?>/assets/img/cours-1.png');">
            <div class="my-assignments__subtitle">Это название курса</div><a class="my-assignments__btn button-main" href="home-work-curse">Перейти</a>
          </div>
          <div class="my-assignments__cours my-assignments__cours-2" style="background-image: url(' <?php echo get_template_directory_uri(); ?>/assets/img/cours-2.png');">
            <div class="my-assignments__subtitle">Это название курса</div><a class="my-assignments__btn button-main" href="#">Перейти</a>
          </div> -->
        </div>
      </div>
   </section>
  
   <div class="d-flex flex-column flex-root" style="display: none !important;">
  <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
  
  <?php
         get_footer();