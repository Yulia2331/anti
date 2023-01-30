<?php
/**
 * Template name: Оповищения
 */
         get_header(null, array('title'=>'Оповищения'));
       
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

          echo '<br>';
          //print_r($current_user);

          echo '<br><br><br>';

          ?>
         
          </div> 
        
      
   
        <h2 class="my-assignments__title">Центр уведомлений</h2>
        
          
          <?php 
          //print_r(get_user_meta( $current_user->ID,'notifications' ));
          ?>
          

          <?php 
            
            $notifications = get_user_meta( wp_get_current_user()->ID,'notifications');
            // print_r(get_user_meta(wp_get_current_user()->ID,'notifications-idea'));
            foreach($notifications as $key => $notification){
              ?>
                <div class="module-block__menu">
                  <?php echo $notification[0]; ?>
                  <br><br>
                  <label id="open-file" class="del_notification comment-form-attachment__label module-block__btn secondary__button" notificationKey='notifications' notificationId='<?php echo $notification[1];?>' notificationContent='<?php echo $notification[0]; ?>' >Просмотренно</label>
                  
                </div>
              <?php
            }
          ?>
          <? 
           $notifications_idea = get_user_meta( wp_get_current_user()->ID,'notifications-idea');
           foreach($notifications_idea as $key => $notification_idea){
            // delete_user_meta( $user_id, 'notifications-idea', [$notification_idea[0], $notification_idea[1], $notification_idea[2]]);
            // $user_id = $notification_idea[1];
            // $post_id = $notification_idea[2];
            // echo $notification_idea[0];
            // echo $notification_idea[1];
            $str = $notification_idea[1];
            $arr = explode("/", $str);
            $user_id = $arr[0];
            $post_id = $arr[1];
            $user       = get_userdata( $user_id );
            $first_name = $user->first_name;
            $last_name  = $user->last_name;
            $user_url = $user->user_url;
            $postData = get_post( $post_id);
           ?>
           <div class="module-block__menu">
            Пользователь
            <a href="/author/<?php echo  get_the_author_meta( 'nicename', $user_id) ?>"><? echo $first_name; echo '&nbsp'; echo $last_name; ?></a>
            <? if($notification_idea[0] == 'rev'){ 
             echo 'оставил отзыв на идею:';
            } 
            if($notification_idea[0] == 'sbc'){
              echo 'подписался на идею:';
            }
            if($notification_idea[0] == 'comment'){
              echo 'оставил комментарий на идею:';
            }
            if($notification_idea[0] == 'like'){
              echo 'поставил лайк на ваш отзыв к идее:';
            }
            ?> 
             <a href="<? echo $postData->guid; ?>"><? echo $postData->post_title; ?></a> 
             <button class="del_notification comment-form-attachment__label module-block__btn secondary__button" style="display: block; margin-top: 10px;" notificationKey='notifications-idea' notificationId='<?php echo $notification_idea[1];?>' notificationContent='<?php echo $notification_idea[0]; ?>'>Просмотренно</button>
            </div>
          <? } ?>
        
      </div>
   </section>
  
   <div class="d-flex flex-column flex-root" style="display: none !important;">
  <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
  
  <?php
         get_footer();