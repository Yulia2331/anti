<?php
/**
 * Template name: Мои задания
 */
        get_header();
       
    ?>
<header class="header">
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
    </header>
    
    <section class="my-assignments padding-left">
      <div class="my-assignments__wrapper">
        <h2 class="my-assignments__title">Список курсов, по которым доступны домашние задания</h2>
        <div class="my-assignments__cuourses"> 
          <div class="my-assignments__cours my-assignments__cours-1">
            <div class="my-assignments__subtitle">Это название курса</div><a class="my-assignments__btn button-main" href="#">Перейти</a>
          </div>
          <div class="my-assignments__cours my-assignments__cours-2">
            <div class="my-assignments__subtitle">Это название курса</div><a class="my-assignments__btn button-main" href="#">Перейти</a>
          </div>
          <div class="my-assignments__cours my-assignments__cours-1">
            <div class="my-assignments__subtitle">Это название курса</div><a class="my-assignments__btn button-main" href="#">Перейти</a>
          </div>
          <div class="my-assignments__cours my-assignments__cours-2">
            <div class="my-assignments__subtitle">Это название курса</div><a class="my-assignments__btn button-main" href="#">Перейти</a>
          </div>
        </div>
      </div>
    </section>
  <?php
        get_footer();