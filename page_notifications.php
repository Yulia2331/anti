<?php
/**
 * Template name: Страница учителя
 */
         get_header();
       
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
        <div class="my-assignments__cuourses"> 

          <?php 

            

          ?>
          
        </div>
      </div>
   </section>
  
   <div class="d-flex flex-column flex-root" style="display: none !important;">
  <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
  
  <?php
        // get_footer();