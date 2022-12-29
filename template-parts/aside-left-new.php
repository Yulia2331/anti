<?php 

$user_info = get_userdata(get_current_user_id());

?>
<section class="navigation-block-close">
      <div class="navigation-block-close__header">
        <button class="navigation-block-close__button-open"><i class="fa-solid fa-angles-right"></i></button>
      </div>
      <div class="navigation-block__body">
        <nav class="navigation-block__pages navigation">
          <ul class="navigation__list">
            <li class="navigation__item"><a class="navigation__link" href="#">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-user"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="#">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-calendar"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="#">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-solid fa-chart-line"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="#">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-address-book"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="#">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-file-excel"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="#">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-newspaper"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="#">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-window-restore"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="#">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-regular fa-lightbulb"></i></div></a></li>
            <li class="navigation__item"><a class="navigation__link" href="#">
                <div class="container__icon--18 navigation-close__icon"><i class="fa-solid fa-list-check"></i></div></a></li>
          </ul>
        </nav>
      </div>
    </section>
    <section class="navigation-block">
      <div class="navigation-block__wrapper"> 
        <div class="navigation-block__header"><a href="#"> <img class="navigation-block__logo" src="../img/logo.svg" alt="logo"></a>
          <button class="navigation-block__button"> <i class="fa-solid fa-angles-left"></i></button>
        </div>
        <div class="navigation-block__body">
          <nav class="navigation-block__pages navigation">
            <ul class="navigation__list">
              <li class="navigation__item"><a class="navigation__link" href="#">
                  <div class="navigation__link-name">
                    <div class="container__icon--18 navigation__icon"><i class="fa-regular fa-user"></i></div>
                    <p>Учетная запись</p>
                  </div>
                  <div class="navigation__marker"><i class="fa-solid fa-angle-right"></i></div></a></li>
              <li class="navigation__item">
                <button class="navigation__button" data-value="calendar">
                  <div class="navigation__block">
                    <div class="navigation__link-name">
                      <div class="container__icon--18 navigation__icon"><i class="fa-regular fa-calendar"></i></div>
                      <p>Календарь</p>
                    </div>
                    <div class="navigation__marker" data-marker="calendar"><i class="fa-solid fa-angle-right"></i></div>
                  </div>
                </button>
                <div class="navigation__sub-menu" data-target="calendar"><a class="navigation__sub-menu-link" href="#"> Календарь клуба</a><a class="navigation__sub-menu-link" href="#">Календарь ПКМ</a></div>
              </li>
              <li class="navigation__item"><a class="navigation__link" href="#">
                  <div class="navigation__link-name">
                    <div class="container__icon--18 navigation__icon"><i class="fa-solid fa-chart-line"></i></div>
                    <p>Аналитика</p>
                  </div>
                  <div class="navigation__marker"><i class="fa-solid fa-angle-right"></i></div></a></li>
              <li class="navigation__item"><a class="navigation__link" href="#">
                  <div class="navigation__link-name">
                    <div class="container__icon--18 navigation__icon"><i class="fa-regular fa-address-book"></i></div>
                    <p>Список пользователей</p>
                  </div>
                  <div class="navigation__marker"><i class="fa-solid fa-angle-right"></i></div></a></li>
              <li class="navigation__item"><a class="navigation__link" href="#">
                  <div class="navigation__link-name">
                    <div class="container__icon--18 navigation__icon"><i class="fa-regular fa-file-excel"></i></div>
                    <p>Список разрешений</p>
                  </div>
                  <div class="navigation__marker"><i class="fa-solid fa-angle-right"></i></div></a></li>
              <li class="navigation__item"><a class="navigation__link" href="#">
                  <div class="navigation__link-name">
                    <div class="container__icon--18 navigation__icon"><i class="fa-regular fa-newspaper"></i></div>
                    <p>Блог и новости</p>
                  </div>
                  <div class="navigation__marker"><i class="fa-solid fa-angle-right"></i></div></a></li>
              <li class="navigation__item"><a class="navigation__link" href="#">
                  <div class="navigation__link-name">
                    <div class="container__icon--18 navigation__icon"><i class="fa-regular fa-window-restore"></i></div>
                    <p>Лента</p>
                  </div>
                  <div class="navigation__marker"><i class="fa-solid fa-angle-right"></i></div></a></li>
              <li class="navigation__item">
                <button class="navigation__button" data-value="ideas">
                  <div class="navigation__block">
                    <div class="navigation__link-name">
                      <div class="container__icon--18 navigation__icon"><i class="fa-regular fa-lightbulb"></i></div>
                      <p>Банк идей</p>
                    </div>
                    <div class="navigation__marker" data-marker="ideas"><i class="fa-solid fa-angle-right"></i></div>
                  </div>
                </button>
                <div class="navigation__sub-menu" data-target="ideas"><a class="navigation__sub-menu-link" href="#">Мои идеи</a><a class="navigation__sub-menu-link" href="#">Отслеживаемые идеи</a><a class="navigation__sub-menu-link" href="#">Мои отзывы</a></div>
              </li>
              <li class="navigation__item"><a class="navigation__link" href="#">
                  <div class="navigation__link-name">
                    <div class="container__icon--18 navigation__icon"><i class="fa-solid fa-list-check"></i></div>
                    <p>Мои задания</p>
                  </div>
                  <div class="navigation__marker"><i class="fa-solid fa-angle-right"></i></div></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </section>