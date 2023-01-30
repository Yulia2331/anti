<?php
/**
 * Template name: Мои задания список
 */

defined( 'ABSPATH' ) || exit;

get_header(null, array('title'=>'Страница учителя'));

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

if (isset($_GET['tutorial'])){
  $tutorial = $_GET['tutorial'];
}else{
  $tutorial = '';
}

//print_r(learn_press_get_course( $id_cours ));
//do_action( 'learn-press/before-single-course' );

$course = learn_press_get_course();
//$user   = learn_press_get_current_user();
$user = learn_press_get_user($_GET['student']);

if ( ! $course || ! $user ) {
  return;
}

$id_cours = $course->get_id();

$can_view_content_course = $user->can_view_content_course( $id_cours );

$curriculum  = $course->get_curriculum();

$user_course = $user->get_course_data( get_the_ID() );
$user = learn_press_get_user($_GET['student']);

$arr_dead_line = [];





?> 

      </div></div>
      
      <section class="course padding-left" style="display: table;">
      <div class="course__crums crums"> 
        <ul class="crums__list"> 
            <a class="crums__link" href="/home-work"><li class="crums__item">Страница учителя</li></a>
            <a class="crums__link" href="/home-work"><li class="crums__item"><?php echo $post->post_title; ?></li></a>
            <li class="crums__item"><?php echo get_user_by( 'ID', $_GET['student'] )->user_email; ?></li>
        </ul>

      </div>
      <script>
        let arr_deadline = [];
      </script>

<?php

foreach ( $curriculum as $section ) {

      $modul_home_work = false;
          
      // пример для вывода
      // learn_press_get_template( 'single-course/loop-section.php', $args );
      //print_r($section);
      //echo $section;

      //echo learn_press_get_post_translated_duration( get_the_ID(), esc_html__( 'Lifetime access', 'learnpress' ) );
      //echo get_the_ID();
      //echo esc_html__( 'Lifetime access', 'learnpress' );

      //echo get_post_meta( get_the_ID(), '_lp_duration', true );


      $time = learn_press_get_post_translated_duration( get_the_ID(), esc_html__( 'Lifetime access', 'learnpress' ) ); 

      ////////////////////////////////////// Список уроков ////////////////////////////////////////
      
      $items = $section->get_items();
      $ordinal = 0;

      $time_section = 0;

      $string_list_tutorial = '';

      foreach ( $items as $item ) :
        if(get_post_meta($item->get_id(), 'files_home_work', 1)!=''){

          $ordinal++;
          $can_view_item = $user->can_view_item( $item->get_id(), $can_view_content_course );

          $item_link = $can_view_item->flag ? $item->get_permalink() : false;
          $item_link = apply_filters( 'learn-press/section-item-permalink', $item_link, $item, $section, $course );

          $title_tutorial = esc_html( $item->get_title( 'display' ) );
          $link_tutorial = esc_url_raw( $item_link ? $item_link : 'javascript:void(0);' );
          
          $time_section += clear_time(get_post_meta( $item->get_id(), '_lp_duration', true ));
          //echo get_post_meta( $item->get_id(), '_lp_duration', true );
          
          //<button class="tutor_btn active" data-tab="modul1_tutorial_1">1.<span>Урок в модуле целеполагание</span></button>
          $string_list_tutorial .= '<li class="module-block__item">';
          $string_list_tutorial .= '<button class="tutor_btn'; 

          if($item->get_id() == $tutorial){
            $string_list_tutorial .= ' tab_active';
          }else if($tutorial == ''){
            $string_list_tutorial .= ($ordinal==1)?' tab_active':'';
          }
          
          $string_list_tutorial .= '" data-tab="modul'.$section->get_id().'_tutorial_'.$ordinal .'" data-id='.$item->get_id().'>';
          $string_list_tutorial .=  $ordinal .'.<span>'. $title_tutorial .'</span>';
          $string_list_tutorial .= '</button>';                                      
          $string_list_tutorial .= '</li>';

          $modul_home_work = true;

          if($item->get_id() == $tutorial){
            $module_visible = true;
          }

          //
          //$coments_tutorial = (array)$item;
          //get_home_work_comments(array_values($coments_tutorial)[9],$id_cours);
          //$coments_tutorial = json_decode(json_encode($item), true);

          if (get_post_meta($item->get_id(), 'time_home_work', 1) == 'on'){
            array_push($arr_dead_line,[$item->get_id(), explode('/',get_post_meta($item->get_id(), 'date_home_work', 1))] );            
          }

          $end_time = explode('/',get_post_meta($item->get_id(), 'date_home_work', 1));
         
        }

      endforeach; 

      ////////////////////////////////////// Список уроков ////////////////////////////////////////


      if ($modul_home_work){
    ?>

      <div class="course__wrapper ">
        <div class="course__module module-block <?php echo $module_visible ?'module-block-active' : '';?>" style="margin-bottom:15px;">

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
                    
                    $time_end = mktime( $arr_dead[1][4], $arr_dead[1][3], 00, $arr_dead[1][1], $arr_dead[1][0], $arr_dead[1][2]);
                    $time_section = get_remaining_time($time_end);
                    //$time_section = $arr_dead[1][4].' '.$arr_dead[1][3].' 00 '.$arr_dead[1][1].' '.$arr_dead[1][0].' '.$arr_dead[1][2].'-'.date('h i s m d Y',time());

                    echo $time_section."'],";
                  }
                 
                ?>
                );
                </script>
              <div class="module-block__time">
                <?php 

                  if($tutorial != ''){
                  $flag = true;
                  foreach($arr_dead_line as $arr_dead ){ 
                    
                    if($tutorial == $arr_dead[0]){
                      $time_end = mktime( $arr_dead[1][4], $arr_dead[1][3], 00, $arr_dead[1][1], $arr_dead[1][0], $arr_dead[1][2]);
                      $time_section2 = get_remaining_time($time_end);
                      echo $time_section2;
                      $flag = false;
                      break;
                    }else{
                      $flag = true;
                      //echo $time_section;
                      //break;
                    }

                  }
                  if($flag){
                    echo $time_section;
                  }
                }else if($tutorial == ''){
                  echo $time_section;
                }

                ?>
              </div>

              

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

              // Открываем нужный урок
                $display ='display:none;';

                if($tutorial == $item->get_id()){
                  $display ='display:block;';
                }else{
                  //$display = ($ordinal == 1 )?'display:block;':'display:none;';
                }



              $ferst_div = 'id="modul'.$modul.'_tutorial_'.$ordinal.'" class="tutorial" style="'.$display.' grid-area: A"';

              ?>
                <div <?php echo $ferst_div;?> >
                  <!-- <h1>Урок <?php echo $ordinal;?></h1> -->
                  <?php 
                    $teachers = get_post_meta($id_cours, 'teachers', 1);
                    $teacher = get_user_by( 'email', $teachers[0] )->ID;

                    //echo get_current_user_id();
                    $comments = get_comments( [
                        'post_id' => $item->get_id(),
                        'author__in' => $_GET['student'],
                      ] );
                      
                    if ($comments == []){  
                      //echo 'чет не так';
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
                          <div class="module-block__teacher" style="justify-content:space-between;"> 
                            
                            <div class="avatar_40">
                              <img src="<?php echo get_user_image($data_teacher->ID); ?>" alt="teacher">
                              <span style="padding-top: 0px !important; margin-top: 20px !important;display: inline-block;"><?php echo $data_teacher->display_name; ?></span>
                            </div>


                            
                           
                            <!-- Зачет ДЗ -->
                            <?php 
                              //print_r(get_user_meta( $_GET['student'],'home_works_status'));

                              $old_status = get_status_home_work_students_by_id($item->get_id(),get_user_meta( $_GET['student'],'home_works_status'));

                              if ($old_status=='non'){
                                echo 'Оценки нет';
                              }else if($old_status=='yes'){
                                echo 'Зачет';
                              }else if($old_status=='no'){
                                echo 'Не зачет';
                              }
                              //echo $_GET['student'];
                            ?>
                            <div class="module-block__buttons" style="margin-left: 30px; text-align:right;"> 
                              <button class="module-block__button-check module-block__buttons-item add_status_home_work" 
                              zach="yes" 
                              studens="<?php echo $_GET['student']; ?>" 
                              old-status="<?php echo $old_status; ?>"
                              tutorial="<?php echo $item->get_id();?>"
                              >
                                <div class="container__icon--24"><i class="fa-solid fa-check"></i></div>
                              </button>
                              <button class="module-block__button-not module-block__buttons-item add_status_home_work" 
                              zach="no" 
                              studens="<?php echo $_GET['student']; ?>" 
                              old-status="<?php echo $old_status; ?>"
                              tutorial="<?php echo $item->get_id();?>"
                              >
                                <div class="container__icon--24"><i class="fa-solid fa-xmark"></i></div>
                              </button>
                            </div>

                          </div>
                          <?php

                          // вывод формы 2 комментария ( обязательный параметр $item )
                          include ('template-parts/comments/comments-forms-home-work-2.php');

                          // Вывод коментариев по шаблону
                          get_home_work_comments($item->get_id(),$id_cours,$_GET['student']); 

                          ?> 

                        </div>
                      </div>

                    <?php } ?>

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
   
  

  
  <?php
         get_footer();