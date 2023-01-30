<?php
/**
 * Template name: Страница учителя
 */
        get_header(null, array('title'=>'Страница учителя'));

        $post = get_post($_GET['id']);
        $course = learn_press_get_course();
        $user   = learn_press_get_current_user();

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

    
   
    <section class="my-assignments padding-left">
      <div class="my-assignments__wrapper">
        <h2 class="my-assignments__title">Опции</h2>
        <div class="my-assignments__cuourses"> 

          <?php

          $current_user = wp_get_current_user();

          //echo $current_user->roles[0];

          if ($current_user->roles[0]=='lp_teacher'){
            echo 'вы учитель';
          }elseif($current_user->roles[0]=='administrator'){
            echo 'вы админ';
          }else{
            echo 'тут тебе делать не чего';
          }

          echo '<br><br><br>';





        function out_curse_info( $curriculum,$users=0,$get_user=0){
            //$users = get_field('dostup');

            $module = [];
            $lessons = [];
            $student =[];

            if($get_user!=0){
                $student = [get_user_by( 'ID', $get_user )->user_email];
                
            }
            
            //print_r($users);

            foreach ( $curriculum as $section ) {

                $items = $section->get_items();
                //$section->get_title();

                foreach ( $items as $item ) {

                    array_push($lessons,$item->get_title( 'display' ));

                    if($users!=0 ){

                        foreach($users as $id_user){

                            ## собираем ячейку для таблицы

                            if ($id_user == $get_user){
                        
                                $comments = get_comments( [
                                    'post_id' => $item->get_id(),
                                    'user_id' => $id_user,
                                  ] ); 

                                $old_status = get_status_home_work_students_by_id($item->get_id(),get_user_meta( $id_user,'home_works_status'));
                                $end_link = '';                         

                                if ($comments != []){ 

                                    if ($old_status=='non'){                                        
                                        $end_link = 'class="badge badge-light-warning fs-7 m-1"> + ';
                                    }else if($old_status=='yes'){
                                        
                                        $end_link = ' class="badge badge-light-success fs-7 m-1">Зач';
                                    }else if($old_status=='no'){
                                        
                                        $end_link = ' class="badge badge-light-danger fs-7 m-1">Нет';
                                    }

                                }else{
                                     $end_link = ' class="badge badge-light-warning fs-7 m-1"> - ';
                                }

                                if (get_post_meta($item->get_id(), 'date_home_work', 1) != '' and get_post_meta($item->get_id(), 'time_home_work', 1) == 'on'){



                                    $arr_dead = explode('/',get_post_meta($item->get_id(), 'date_home_work', 1));                                    
                                    $time_end = mktime( $arr_dead[4], $arr_dead[3], 00, $arr_dead[1], $arr_dead[0], $arr_dead[2]);

                                    //echo $arr_dead[4].' '.$arr_dead[3].' '.$arr_dead[0].' '.$arr_dead[1].' '.$arr_dead[2].'  / ';
                                    //echo time().' '.$time_end.'  / ';
                                    //echo time() > $time_end;

                                    if (time() > $time_end and $comments != [] || time() > $time_end and $old_status=='non'){
                                        
                                        $end_link = ' class="badge badge-light-danger fs-7 m-1"> ! ';
                                    }
                                } 

                                $end_link .= '</a>';
                                array_push($student,'<a href="/home-work-teacher/?id='.$_GET['id'].'&student='.$id_user.'" '.$end_link);

                            }

                        } 
                    }                
                }

                array_push($module,[$section->get_title(),count($items)]);

            }

            return [$module,$lessons,$student];

        }


        
        // print_r($users);
        // echo $users[0];

        //print_r(out_curse_info($curriculum,$users,$users[0]));

        $curse_info = out_curse_info($curriculum);
        //print_r($curse_info);

          ?>
         
          </div> 
        
      
   
        <h2 class="my-assignments__title">Таблица успеваемости по курсу <?php echo $post->post_title; ?></h2>

            <div class="table-responsive" >

                <style type="text/css">
                    td {
                        text-align: center;
                    }
                </style>

                <div style="height: 100px; width: 3000px; overflow-y: hidden; overflow-x: visible; background-color: #fff; position: relative; z-index: 333;">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable no-footer" id="kt_permissions_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start fw-bold text-dark fs-7 text-uppercase gs-0">

                                <th class="min-w-125px sorting" rowspan="1" colspan="1" style="width: 10px;" aria-label="Действия">
                                </th>

                                <?php

                                    foreach($curse_info[0] as $name_module){

                                        ?>
                                            <th class="min-w-125px sorting" rowspan="1" colspan="<?php echo $name_module[1]; ?>"  style="width: 10px; text-align: center; border-left: 1px solid #EFF2F5;" aria-label="Действия">
                                                <?php echo $name_module[0]; ?>
                                            </th>
                                        <?php

                                    }
                                ?>

                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">                       

                            <tr class="odd">
                                <!--begin::Name=-->
                                <td class="min-w-125px sorting" rowspan="1" colspan="1" style="width: 10px;" aria-label="Действия">
                                   Ученики
                                </td>

                                <?php

                                foreach($curse_info[1] as $name_lesson){
                                        ?>
                                            <td >
                                                <?php echo $name_lesson; ?>
                                            </td>
                                        <?php

                                    }

                                ?> 
                            </tr>
                        
                            <!-- <tr class="odd"> -->
                                <!--begin::Name=-->
                                <?php
                                    $users = get_field('dostup');

                                    foreach($users as $student){                                    
                                        $data_stud = out_curse_info($curriculum,$users,$student);
                                        echo '<tr class="odd">';
                                        foreach($data_stud[2] as $data_item){
                                            ?><td><?php echo $data_item; ?></td><?php
                                        }
                                        echo '</tr>';

                                    }

                                ?>



                                <!-- <td>
                                    Кукольщиков Егор Андреевич
                                </td>
                                
                                
                                <td>
                                    <a href="roles?role=administrator" class="badge badge-light-primary fs-7 m-1">Yes</a>
                                </td>
                                
                                <td>
                                    No
                                </td>
                                
                                
                                <td>
                                    <a href="roles?role=administrator" class="badge badge-light-primary fs-7 m-1">Yes</a>
                                </td>
                            
                                <td>
                                    <a href="roles?role=administrator" class="badge badge-light-primary fs-7 m-1">Yes</a>
                                </td>
                                
                                <td>
                                    No
                                </td>
                                
                                <td>
                                    <a href="roles?role=administrator" class="badge badge-light-primary fs-7 m-1">Yes</a>
                                </td> -->
                                
                            <!-- </tr> -->

                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>

                <div style="max-height: 600px; width: 3000px; overflow-y: scroll; overflow-x: visible; margin-top: -100px;">

                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0 dataTable no-footer" id="kt_permissions_table">
                        <!--begin::Table head-->
                        <thead >
                            <!--begin::Table row-->
                            <tr class="text-start fw-bold text-dark fs-7 text-uppercase gs-0">

                                <th class="min-w-125px sorting" rowspan="1" colspan="1" style="width: 10px;" aria-label="Действия">
                                </th>

                                <?php

                                    foreach($curse_info[0] as $name_module){

                                        ?>
                                            <th class="min-w-125px sorting" rowspan="1" colspan="<?php echo $name_module[1]; ?>"  style="width: 10px; text-align: center;" aria-label="Действия">
                                                <?php echo $name_module[0]; ?>
                                            </th>
                                        <?php

                                    }
                                ?>

                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">                       

                            <tr class="odd" >
                                <!--begin::Name=-->
                                <td class="min-w-125px sorting" rowspan="1" colspan="1" style="width: 10px;" aria-label="Действия">
                                   Ученики
                                </td>

                                <?php

                                foreach($curse_info[1] as $name_lesson){
                                        ?>
                                            <td >
                                                <?php echo $name_lesson; ?>
                                            </td>
                                        <?php

                                    }

                                ?> 
                            </tr>
                        
                            <!-- <tr class="odd"> -->
                                <!--begin::Name=-->
                                <?php
                                    $users = get_field('dostup');

                                    foreach($users as $student){                                    
                                        $data_stud = out_curse_info($curriculum,$users,$student);
                                        echo '<tr class="odd">';
                                        foreach($data_stud[2] as $data_item){
                                            ?><td><?php echo $data_item; ?></td><?php
                                        }
                                        echo '</tr>';

                                    }

                                ?>



                                <!-- <td>
                                    Кукольщиков Егор Андреевич
                                </td>
                                
                                
                                <td>
                                    <a href="roles?role=administrator" class="badge badge-light-primary fs-7 m-1">Yes</a>
                                </td>
                                
                                <td>
                                    No
                                </td>
                                
                                
                                <td>
                                    <a href="roles?role=administrator" class="badge badge-light-primary fs-7 m-1">Yes</a>
                                </td>
                            
                                <td>
                                    <a href="roles?role=administrator" class="badge badge-light-primary fs-7 m-1">Yes</a>
                                </td>
                                
                                <td>
                                    No
                                </td>
                                
                                <td>
                                    <a href="roles?role=administrator" class="badge badge-light-primary fs-7 m-1">Yes</a>
                                </td> -->
                                
                            <!-- </tr> -->

                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>

            </div>


        <!-- <div class="wrap-table100">
            <div class="table">

                <div class="row header_table">
                    <div class="cell">
                        Ученики
                    </div> -->
                    <?php 
                      // $users = get_field('dostup');
                      // //print_r($users);

                      // foreach ( $curriculum as $section ) {

                      //   $items = $section->get_items();
                      //   //echo $section->get_title(); 
                      //   foreach ( $items as $item ) {
                      //       echo '<div class="cell">';
                      //       echo esc_html( $item->get_title( 'display' ));
                      //       echo '</div>';
                      //   }
                      // }
                    ?> 
                <!-- </div> -->
                
                
                <?php 
                

                
            ?> 
                
                <!-- <div class="row">
                    <div class="cell" data-title="Full Name">
                        Vincent Williamson
                    </div>
                    <div class="cell" data-title="Age">
                        31
                    </div>
                    <div class="cell" data-title="Job Title">
                        iOS Developer
                    </div>
                    <div class="cell" data-title="Location">
                        Washington
                    </div>
                </div> -->
                
            <!-- </div>
        </div>    -->
          
      </div>
   </section>
  
   <div class="d-flex flex-column flex-root" style="display: none !important;">
  <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
  
  <?php
         get_footer();