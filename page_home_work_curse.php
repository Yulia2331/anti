<?php
/**
 * Template name: Мои задания список
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
    
    
  
   
      
      <section class="course padding-left">
      <div class="course__crums crums"> 
        <ul class="crums__list"> <a class="crums__link" href="#">
            <li class="crums__item">Список курсов</li></a><a class="crums__link" href="#">
            <li class="crums__item">Название курса</li></a></ul>
      </div>
      <div class="course__wrapper">
        <div class="course__module module-block">
          <div class="module-block__header">
            <div class="module-block__left"> 
              <div class="module-block__doc container__icon--24"><i class="fa-regular fa-file"></i></div>
              <div class="module-block__title">Модуль 2. Целеполагание</div>
            </div>
            <div class="module-block__right"> 
              <div class="module-block__clock container__icon--24"><i class="fa-regular fa-clock"></i></div>
              <div class="module-block__time">1 д - 13 ч - 38 мин</div>
              <div class="module-block__arrow container__icon--18"><i class="fa-solid fa-angle-down"></i></div>
            </div>
          </div>
          <div class="module-block__body">
            <div class="module-block__menu"> 
              <ul class="module-block__list"> 
                <li class="module-block__item"> 
                  <button data-tab="?">1.<span>Урок в модуле целеполагание</span></button>
                </li>
                <li class="module-block__item">
                  <button data-tab="?">2.<span>Урок в модуле целеполагание</span></button>
                </li>
                <li class="module-block__item">
                  <button data-tab="?">3.<span>Урок в модуле целеполагание</span></button>
                </li>
              </ul>
            </div>
            <div class="module-block__add">
              <div class="module-block__add-message"> 
                <input class="module-block__input" type="text" placeholder="Написать сообщение">
                <button class="module-block__send">
                  <div class="container__icon--18"><i class="fa-solid fa-share"></i></div>
                </button>
              </div>
              <div class="module-block__add-file">
                <div class="module-block__all-files"> </div>
                <input type="file" id="open-file" accept=".pdf,.rar,.zip">
                <button class="module-block__btn secondary__button">Загрузить файл</button>
              </div>
            </div>
            <div class="module-block__comments comments">
              <div class="comments__wrapper">
                <div class="module-block__teacher"> <img src="../img/user.png" alt="teacher"><span>Иван Комин</span></div>
                <div class="module-block__new-comment">
                  <input class="module-block__input" type="text" placeholder="Написать преподавателю">
                  <button class="module-block__btn-file module-block__send-file">
                    <div class="container__icon--18"><i class="fa-solid fa-file"></i></div>
                  </button>
                  <button class="module-block__send-comment module-block__send">
                    <div class="container__icon--18"><i class="fa-solid fa-share"></i></div>
                  </button>
                </div>
                <div class="comments__block">
                  <div class="comments__maint main-comment">
                    <div class="main-comment__avatar"> <img src="../img/user.png" alt="ava"></div>
                    <div class="main-comment__body"> 
                      <div class="main-comment__name">Андрей Ярухин</div>
                      <div class="main-comment__message">Какими качествами похож на них?</div>
                      <div class="main-comment__file">
                        <div class="module-block__file">
                          <div class="module-block__link">
                            <div class="module-block__doc container__icon--18"><i class="fa-solid fa-file"></i></div>
                            <div class="module-block__name">ava-1.png</div>
                            <button>
                              <div class="container__icon--18"><i class="fa-solid fa-xmark"></i></div>
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="main-comment__footer"> 
                        <div class="main-comment__data">20 мар в 8:10</div>
                        <button class="main-comment__button">Ответить</button>
                      </div>
                    </div>
                  </div>
                  <div class="comments__sub sub-comment">
                    <div class="sub-comment__avatar"> <img src="../img/user.png" alt="ava"></div>
                    <div class="sub-comment__body"> 
                      <div class="sub-comment__name">Андрей Ярухин</div>
                      <div class="sub-comment__message">Какими качествами похож на них?</div>
                      <div class="sub-comment__footer"> 
                        <div class="sub-comment__data">20 мар в 8:10</div>
                        <button class="sub-comment__button">Ответить</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   
  

  
  <?php
        // get_footer();