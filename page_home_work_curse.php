<?php
/**
 * Template name: Мои задания список
 */

defined( 'ABSPATH' ) || exit;

get_header();

// function clear_time($string){
//   $arr = explode(' ', $string);
//   $int = (int)$arr[0];
//   return $int;
// }

// echo get_current_user_id();

// echo $_GET['id'];

//$course = learn_press_get_course( $_GET['id'] );
//$course = learn_press_get_the_course();
//$course = learn_press_get_course();
//print_r($course);

//$id_cours = $_GET['id'];
$post = get_post($_GET['id']);

//print_r(learn_press_get_course( $id_cours ));
//do_action( 'learn-press/before-single-course' );

$course = learn_press_get_course();
$user   = learn_press_get_current_user();

//print_r($course);

if ( ! $course || ! $user ) {
  return;
}

$id_cours = $course->get_id();

$can_view_content_course = $user->can_view_content_course( $id_cours );

$curriculum  = $course->get_curriculum();

$user_course = $user->get_course_data( get_the_ID() );
$user        = learn_press_get_current_user();

   
?> 

      </div></div>
      
      <section class="course padding-left">
      <div class="course__crums crums"> 
        <ul class="crums__list"> <a class="crums__link" href="/home-work">
            <li class="crums__item">Мои задания</li></a>
            <li class="crums__item"><?php echo $post->post_title; ?></li></ul>
      </div>
      <script>
        let arr_deadline = [];
      </script>

<?php

foreach ( $curriculum as $section ) {
          
      // пример для вывода
      // learn_press_get_template( 'single-course/loop-section.php', $args );
      //print_r($section);
      //echo $section;

      //echo learn_press_get_post_translated_duration( get_the_ID(), esc_html__( 'Lifetime access', 'learnpress' ) );
      //echo get_the_ID();
      //echo esc_html__( 'Lifetime access', 'learnpress' );

      //echo get_post_meta( get_the_ID(), '_lp_duration', true );

      // Пременная для проверки наличия ДЗ
      $modul_home_work = false;


      $time = learn_press_get_post_translated_duration( get_the_ID(), esc_html__( 'Lifetime access', 'learnpress' ) ); 

      ////////////////////////////////////// Список уроков ////////////////////////////////////////
      
      $items = $section->get_items();
      $ordinal = 0;

      $time_section = 0;

      $string_list_tutorial = '';

      $arr_dead_line = [];

      $test_string = '--------->';

      foreach ( $items as $item ) :

        //проверка на домашнее задание
        if(get_post_meta($item->get_id(), 'files_home_work', 1)!=''){

          $ordinal++;
          $can_view_item = $user->can_view_item( $item->get_id(), $can_view_content_course );

          $item_link = $can_view_item->flag ? $item->get_permalink() : false;
          $item_link = apply_filters( 'learn-press/section-item-permalink', $item_link, $item, $section, $course );

          $title_tutorial = esc_html( $item->get_title( 'display' ) );
          $link_tutorial = esc_url_raw( $item_link ? $item_link : 'javascript:void(0);' );
          
          //$time_section += clear_time(get_post_meta( $item->get_id(), '_lp_duration', true ));
          //echo get_post_meta( $item->get_id(), '_lp_duration', true );
          
          //<button class="tutor_btn active" data-tab="modul1_tutorial_1">1.<span>Урок в модуле целеполагание</span></button>
          $string_list_tutorial .= '<li class="module-block__item">';
          $string_list_tutorial .= '<button class="tutor_btn'; 
          $string_list_tutorial .= ($ordinal==1)?' tab_active':'';
          $string_list_tutorial .= '" data-tab="modul'.$section->get_id().'_tutorial_'.$ordinal .'" data-id='.$item->get_id().'>';
          $string_list_tutorial .=  $ordinal .'.<span>'. $title_tutorial .'</span>';
          $string_list_tutorial .= '</button>';                                      
          $string_list_tutorial .= '</li>';

          //
          //$coments_tutorial = (array)$item;
          //get_home_work_comments(array_values($coments_tutorial)[9],$id_cours);
          //$coments_tutorial = json_decode(json_encode($item), true);
          $modul_home_work = true;

          //$test_string .=$item->get_id();
          //$test_string .= get_post_meta($item->get_id(), 'time_home_work', 1);

          if (get_post_meta($item->get_id(), 'time_home_work', 1) == 'on'){
            array_push($arr_dead_line,[$item->get_id(), explode('/',get_post_meta($item->get_id(), 'date_home_work', 1))] );            
          }

          //$time_section = clear_time(get_post_meta( $item->get_id(), '_lp_duration', true ));
          //print_r(get_post_meta($item->get_id(), 'date_home_work', 1));

          //$time_section = get_the_date( 'd/m/Y/h/m/s',get_post_meta($item->get_id(), 'date_home_work', 1));
          $end_time = explode('/',get_post_meta($item->get_id(), 'date_home_work', 1));
          //$time_section = date('d-m-Y h:m',mktime(0, $end_time[4], $end_time[3], $end_time[0], $end_time[1], $end_time[2]));

          
          //$time_section = date('d - m - Y');

        }

      endforeach; 

      ////////////////////////////////////// Список уроков ////////////////////////////////////////

      //echo $test_string;

      if ($modul_home_work){  
        ?>

        <div class="course__wrapper ">
          <div class="course__module module-block" style="margin-bottom:15px;">

            <div class="module-block__header">
              <div class="module-block__left"> 
                <div class="module-block__doc container__icon--24"><i class="fa-regular fa-file"></i></div>
                <div class="module-block__title"><?php echo $section->get_title();?> <?php //echo $section->get_id(); ?></div>
              </div>
              <div class="module-block__right"> 
                <div class="module-block__clock container__icon--24"><i class="fa-regular fa-clock"></i></div>
                
                <script type="text/javascript">
                  
                  arr_deadline.push(                
                <?php 
                 
                  foreach($arr_dead_line as $arr_dead ){
                    echo "['".$arr_dead[0]."','";
                    
                    $time_end = mktime(0, $arr_dead[1][4], $arr_dead[1][3], $arr_dead[1][0], $arr_dead[1][1], $arr_dead[1][2]);
                    $time_section = get_remaining_time($time_end);

                    echo $time_section."'],";
                  }
                 
                ?>
                );
                </script>
              
                <div class="module-block__time"><?php 

                  //echo get_remaining_time(strtotime(get_the_date( 'd-m-Y', $id_cours)),$time_section); 
                  echo $time_section;

                ?></div>
                <div class="module-block__arrow container__icon--18"><i class="fa-solid fa-angle-down"></i></div>
              </div>
            </div>

            <div class="module-block__body">

              <div class="module-block__menu">
                <ul class="module-block__list">                
                  <?php echo $string_list_tutorial; ?>
                </ul>
              </div>

              <?php 
              $ordinal = 0;

              foreach ( $items as $item ) :
                $ordinal++;

                // собираем атрибуты дива
                $modul = $section->get_id();              
                $display = ($ordinal == 1)?'display:block;':'display:none;';
                $ferst_div = 'id="modul'.$modul.'_tutorial_'.$ordinal.'" class="tutorial" style="'.$display.' grid-area: A"';

                ?>
                  <div <?php echo $ferst_div;?> >
                    <!-- <h1>Урок <?php echo $ordinal;?></h1> -->
                    <?php 
                      //echo get_current_user_id();
                      $comments = get_comments( [
                          'post_id' => $item->get_id(),
                          'user_id' => get_current_user_id(),
                        ] );

                      //echo get_post_meta($item->get_id(), 'files_home_work', 1);

                      //проверка на домашнее задание
                      if(get_post_meta($item->get_id(), 'files_home_work', 1)!=''){
                        
                        if ($comments == []){  

                          // вывод формы комментария ( обязательный параметр $item )
                          include ('template-parts/comments/comments-forms-home-work.php');
                          
                        }else{

                          // Получаем преподов
                          $teachers = get_post_meta($id_cours, 'teachers', 1);
                          // Получаем данные юзера
                          $data_teacher = get_user_by('email',$teachers[0]);  
                          //print_r($data_teacher);
                          //echo get_user_image($data_teacher->ID);                    

                          ?>
                          <div class="module-block__comments comments">
                            <div class="comments__wrapper">
                              <div class="module-block__teacher"> 
                                <div class="avatar_40">
                                  <img src="<?php echo get_user_image($data_teacher->ID); ?>" alt="teacher">
                                </div>

                                <span><?php echo $data_teacher->display_name; ?></span></div>
                              <?php

                              // вывод формы 2 комментария ( обязательный параметр $item )
                              include ('template-parts/comments/comments-forms-home-work-2.php');

                              //get_template_part('/template-parts/comments/comments-forms-home-work-2',$item); 

                              // Вывод коментариев по шаблону
                              get_home_work_comments($item->get_id(),$id_cours); 

                              ?> 

                            </div>
                          </div>

                        <?php } 
                      }else{
                        echo 'Домашнего задания нет!';
                      }


                        ?>

                  </div>
                <?php

              endforeach;

              ?>

              

            </div>
          </div>
        </div>

        <?php
      }
          
    }

      

?>
    </section>
   
  <div class="d-flex flex-column flex-root" style="display: none !important;">
  <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

  
  <?php
         get_footer();