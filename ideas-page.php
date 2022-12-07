<?php
/**
 * Template name: Банк идей
 */
        get_header();
    ?>
        <div class="hidden"></div>
    <div class="create-idea">
      <button class="create-idea__close close container__icon--18"><i class="fa-solid fa-xmark"></i></button>
      <div class="create-idea__title">Создать идею</div>
      <form class="create-idea__form"> 
        <input class="create-idea__input input-field" type="text" placeholder="Придумайте название идеи">
        <div class="create-idea__select-block">
          <div class="create-idea__select select"> 
            <div class="select__header"> <span class="select__current">Категория</span>
              <div class="select__icon"> <i class="fa-solid fa-angle-down"></i></div>
            </div>
            <div class="select__body"> 
              <div class="select__item">Бизнес</div>
              <div class="select__item">Маркетинг</div>
              <div class="select__item">Финансы</div>
            </div>
          </div>
          <div class="create-idea__select select"> 
            <div class="select__header"> <span class="select__current">Категория</span>
              <div class="select__icon"> <i class="fa-solid fa-angle-down"></i></div>
            </div>
            <div class="select__body"> 
              <div class="select__item">Бизнес</div>
              <div class="select__item">Маркетинг</div>
              <div class="select__item">Финансы</div>
            </div>
          </div>
        </div>
        <textarea class="create-idea__textarea" name="" cols="30" rows="10" placeholder="Опишите вашу идею"> </textarea>
        <div class="create-idea__subtitle">Создайте до 5 критериев оценки вашей идеи</div>
        <div class="create-idea__add-criteria">
          <div class="create-idea__criteria-block">
            <div class="create-idea__criteria select">Востребованность</div>
            <div class="create-idea__criteria select">Легкость</div>
            <div class="create-idea__criteria select">Возможность</div>
            <div class="create-idea__criteria select">Статность</div>
            <div class="create-idea__criteria select">Денежность</div>
          </div>
          <button class="create-idea__plus container__icon--24"><i class="fa-solid fa-plus"></i></button>
        </div>
        <button class="create-idea__button secondary__button">Опубликовать</button>
      </form>
    </div>
    <div class="create-reviews">
      <button class="create-reviews__close close container__icon--18"><i class="fa-solid fa-xmark"></i></button>
      <div class="create-reviews__title">Отзыв на идею</div>
      <div class="create-reviews__form">
        <div class="create-reviews__textarea">
          <textarea class="create-reviews__plus" name="" placeholder="Расскажите о плюсах"></textarea>
          <textarea class="create-reviews__minus" name="" placeholder="Расскажите о минусах"></textarea>
          <textarea class="create-reviews__message" name="" placeholder="Общий комментарий"></textarea>
        </div>
        <div class="create-reviews__counters">
          <div class="create-reviews__counter-item">
            <div class="create-reviews__area">Востребованность</div>
            <div class="create-reviews__count"> 
              <div class="create-reviews__num">3</div>
              <div class="create-reviews__count-button"> 
                <button class="create-reviews__more"> <i class="fa-solid fa-sort-up"></i></button>
                <button class="create-reviews__less"><i class="fa-solid fa-caret-down"></i></button>
              </div>
            </div>
          </div>
          <div class="create-reviews__counter-item">
            <div class="create-reviews__area">Востребованность</div>
            <div class="create-reviews__count"> 
              <div class="create-reviews__num">3</div>
              <div class="create-reviews__count-button"> 
                <button class="create-reviews__more"> <i class="fa-solid fa-sort-up"></i></button>
                <button class="create-reviews__less"><i class="fa-solid fa-caret-down"></i></button>
              </div>
            </div>
          </div>
          <div class="create-reviews__counter-item">
            <div class="create-reviews__area">Востребованность</div>
            <div class="create-reviews__count"> 
              <div class="create-reviews__num">3</div>
              <div class="create-reviews__count-button"> 
                <button class="create-reviews__more"> <i class="fa-solid fa-sort-up"></i></button>
                <button class="create-reviews__less"><i class="fa-solid fa-caret-down"></i></button>
              </div>
            </div>
          </div>
          <div class="create-reviews__counter-item">
            <div class="create-reviews__area">Востребованность</div>
            <div class="create-reviews__count"> 
              <div class="create-reviews__num">3</div>
              <div class="create-reviews__count-button"> 
                <button class="create-reviews__more"> <i class="fa-solid fa-sort-up"></i></button>
                <button class="create-reviews__less"><i class="fa-solid fa-caret-down"></i></button>
              </div>
            </div>
          </div>
          <div class="create-reviews__counter-item">
            <div class="create-reviews__area">Востребованность</div>
            <div class="create-reviews__count"> 
              <div class="create-reviews__num">3</div>
              <div class="create-reviews__count-button"> 
                <button class="create-reviews__more"> <i class="fa-solid fa-sort-up"></i></button>
                <button class="create-reviews__less"><i class="fa-solid fa-caret-down"></i></button>
              </div>
            </div>
          </div>
        </div>
        <button class="create-reviews__button secondary__button">Отправить</button>
      </div>
    </div>
    <div class="hidden"></div>
    <div class="view-idea" data-idea="goodIdea1">
      <button class="view-idea__close close container__icon--18"><i class="fa-solid fa-xmark"></i></button>
      <button class="view-idea__trash container__icon--18"><i class="fa-solid fa-trash"></i></button>
      <div class="view-idea__header"> 
        <h2 class="view-idea__title">Хорошая идея номер 1</h2>
        <div class="view-idea__right"> 
          <div class="view-idea__rating"> <span class="view-idea__number">5</span>
            <div class="view-idea__icon container__icon--18"><i class="fa-solid fa-star"></i></div>
          </div>
          <apsn class="view-idea__data">08.09.22</apsn>
        </div>
      </div>
      <div class="view-idea__info"> 
        <div class="view-idea__user"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt="avatar">
          <div class="view-idea__user-name">Игорь Разинкин</div>
        </div>
        <div class="view-idea__center-block"> 
          <div class="view-idea__category">Категория</div>
          <div class="view-idea__meaning">онлайн/оффлайн</div>
        </div>
        <button class="view-idea__btn button-main">Написать автору</button>
      </div>
      <div class="view-idea__hypothesis hypothesis">
        <div class="hypothesis__add"> 
          <input class="input hypothesis__input" type="text" placeholder="Дополнить идею">
          <button class="hypothesis__button">
            <div class="hypothesis__icon"><i class="fa-solid fa-location-arrow"></i></div>
          </button>
        </div>
        <div class="hypothesis__board"> 
          <div class="hypothesis__item">
            <div class="hypothesis__item_header">
              <div class="hypothesis__item_title">Гипотиза (08.09.22)</div>
              <button class="hypothesis__item_icon"> <i class="fa-solid fa-trash"></i></button>
            </div>
            <div class="hypothesis__content">
               Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.</div>
          </div>
          <div class="hypothesis__item">
            <div class="hypothesis__item_header">
              <div class="hypothesis__item_title">Гипотиза (08.09.22)</div>
              <button class="hypothesis__item_icon"> <i class="fa-solid fa-trash"></i></button>
            </div>
            <div class="hypothesis__content">
               В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</div>
          </div>
          <div class="hypothesis__item">
            <div class="hypothesis__item_header">
              <div class="hypothesis__item_title">Гипотиза (08.09.22)</div>
              <button class="hypothesis__item_icon"> <i class="fa-solid fa-trash"></i></button>
            </div>
            <div class="hypothesis__content">
               По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст</div>
          </div>
          <div class="hypothesis__item">
            <div class="hypothesis__item_header">
              <div class="hypothesis__item_title">Гипотиза (08.09.22)</div>
              <button class="hypothesis__item_icon"> <i class="fa-solid fa-trash"></i></button>
            </div>
            <div class="hypothesis__content">
               При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия. Сайт рыбатекст поможет дизайнеру</div>
          </div>
        </div>
      </div>
      <div class="view-idea__button-block"> 
        <button class="view-idea__button secondary__button">Подписаться</button>
        <button class="view-idea__button view-idea__button-reviews additional-button">Оставить отзыв</button>
      </div>
      <div class="view-idea__reviews reviews-idea">
        <div class="reviews-idea__title">Отзывы участников</div>
        <div class="reviews-idea__board"> 
          <div class="reviews-idea__item">
            <div class="reviews-idea__header"> 
              <div class="reviews-idea__left"> 
                <div class="reviews-idea__user"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt="avatar">
                  <div class="reviews-idea__name">
                     Андрей Ярухин</div>
                </div>
              </div>
              <div class="reviews-idea__right"> <span class="view-idea__number">5</span>
                <div class="view-idea__icon"><i class="fa-solid fa-star"></i></div>
              </div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__plus container__icon--18"><i class="fa-solid fa-square-plus"></i></div>
              <div class="reviews-idea__content">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.</div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__minus container__icon--18"><i class="fa-solid fa-square-minus"></i></div>
              <div class="reviews-idea__content">В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__message container__icon--18"><i class="fa-solid fa-message"></i></div>
              <div class="reviews-idea__content">При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия. Сайт рыбатекст поможет дизайнеру</div>
            </div>
            <div class="reviews-idea__footer"> 
              <button class="reviews-idea__comment">Комментировать</button>
              <div class="reviews-idea__like"> 
                <div class="reviews-idea__like_number">12</div>
                <div class="reviews-idea__like_icon"><i class="fa-solid fa-heart"></i></div>
              </div>
            </div>
          </div>
          <div class="reviews-idea__item">
            <div class="reviews-idea__header"> 
              <div class="reviews-idea__left"> 
                <div class="reviews-idea__user"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt="avatar">
                  <div class="reviews-idea__name">
                     Андрей Ярухин</div>
                </div>
              </div>
              <div class="reviews-idea__right"> <span class="view-idea__number">5</span>
                <div class="view-idea__icon"><i class="fa-solid fa-star"></i></div>
              </div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__plus"><i class="fa-solid fa-square-plus"></i></div>
              <div class="reviews-idea__content">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.</div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__minus"><i class="fa-solid fa-square-minus"></i></div>
              <div class="reviews-idea__content">В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__message"><i class="fa-solid fa-message"></i></div>
              <div class="reviews-idea__content">При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия. Сайт рыбатекст поможет дизайнеру</div>
            </div>
            <div class="reviews-idea__footer"> 
              <button class="reviews-idea__comment">Комментировать</button>
              <div class="reviews-idea__like"> 
                <div class="reviews-idea__like_number">12</div>
                <div class="reviews-idea__like_icon"><i class="fa-solid fa-heart"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hidden"></div>
    <div class="view-idea" data-idea="goodIdea2">
      <button class="view-idea__close close container__icon--18"><i class="fa-solid fa-xmark"></i></button>
      <button class="view-idea__trash container__icon--18"><i class="fa-solid fa-trash"></i></button>
      <div class="view-idea__header"> 
        <h2 class="view-idea__title">Хорошая идея номер 1</h2>
        <div class="view-idea__right"> 
          <div class="view-idea__rating"> <span class="view-idea__number">5</span>
            <div class="view-idea__icon container__icon--18"><i class="fa-solid fa-star"></i></div>
          </div>
          <apsn class="view-idea__data">08.09.22</apsn>
        </div>
      </div>
      <div class="view-idea__info"> 
        <div class="view-idea__user"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt="avatar">
          <div class="view-idea__user-name">Игорь Разинкин</div>
        </div>
        <div class="view-idea__center-block"> 
          <div class="view-idea__category">Категория</div>
          <div class="view-idea__meaning">онлайн/оффлайн</div>
        </div>
        <button class="view-idea__btn button-main">Написать автору</button>
      </div>
      <div class="view-idea__hypothesis hypothesis">
        <div class="hypothesis__add"> 
          <input class="input hypothesis__input" type="text" placeholder="Дополнить идею">
          <button class="hypothesis__button">
            <div class="hypothesis__icon"><i class="fa-solid fa-location-arrow"></i></div>
          </button>
        </div>
        <div class="hypothesis__board"> 
          <div class="hypothesis__item">
            <div class="hypothesis__item_header">
              <div class="hypothesis__item_title">Гипотиза (08.09.22)</div>
              <button class="hypothesis__item_icon"> <i class="fa-solid fa-trash"></i></button>
            </div>
            <div class="hypothesis__content">
               В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</div>
          </div>
          <div class="hypothesis__item">
            <div class="hypothesis__item_header">
              <div class="hypothesis__item_title">Гипотиза (08.09.22)</div>
              <button class="hypothesis__item_icon"> <i class="fa-solid fa-trash"></i></button>
            </div>
            <div class="hypothesis__content">
               По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст</div>
          </div>
          <div class="hypothesis__item">
            <div class="hypothesis__item_header">
              <div class="hypothesis__item_title">Гипотиза (08.09.22)</div>
              <button class="hypothesis__item_icon"> <i class="fa-solid fa-trash"></i></button>
            </div>
            <div class="hypothesis__content">
               При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия. Сайт рыбатекст поможет дизайнеру</div>
          </div>
        </div>
      </div>
      <div class="view-idea__button-block"> 
        <button class="view-idea__button secondary__button">Подписаться</button>
        <button class="view-idea__button additional-button">Оставить отзыв</button>
      </div>
      <div class="view-idea__reviews reviews-idea">
        <div class="reviews-idea__title">Отзывы участников</div>
        <div class="reviews-idea__board"> 
          <div class="reviews-idea__item">
            <div class="reviews-idea__header"> 
              <div class="reviews-idea__left"> 
                <div class="reviews-idea__user"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt="avatar">
                  <div class="reviews-idea__name">
                     Андрей Ярухин</div>
                </div>
              </div>
              <div class="reviews-idea__right"> <span class="view-idea__number">5</span>
                <div class="view-idea__icon"><i class="fa-solid fa-star"></i></div>
              </div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__plus container__icon--18"><i class="fa-solid fa-square-plus"></i></div>
              <div class="reviews-idea__content">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.</div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__minus container__icon--18"><i class="fa-solid fa-square-minus"></i></div>
              <div class="reviews-idea__content">В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__message container__icon--18"><i class="fa-solid fa-message"></i></div>
              <div class="reviews-idea__content">При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия. Сайт рыбатекст поможет дизайнеру</div>
            </div>
            <div class="reviews-idea__footer"> 
              <button class="reviews-idea__comment">Комментировать</button>
              <div class="reviews-idea__like"> 
                <div class="reviews-idea__like_number">12</div>
                <div class="reviews-idea__like_icon"><i class="fa-solid fa-heart"></i></div>
              </div>
            </div>
          </div>
          <div class="reviews-idea__item">
            <div class="reviews-idea__header"> 
              <div class="reviews-idea__left"> 
                <div class="reviews-idea__user"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt="avatar">
                  <div class="reviews-idea__name">
                     Андрей Ярухин</div>
                </div>
              </div>
              <div class="reviews-idea__right"> <span class="view-idea__number">5</span>
                <div class="view-idea__icon"><i class="fa-solid fa-star"></i></div>
              </div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__plus"><i class="fa-solid fa-square-plus"></i></div>
              <div class="reviews-idea__content">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях.</div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__minus"><i class="fa-solid fa-square-minus"></i></div>
              <div class="reviews-idea__content">В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</div>
            </div>
            <div class="reviews-idea__block-content">
              <div class="reviews-idea__message"><i class="fa-solid fa-message"></i></div>
              <div class="reviews-idea__content">При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия. Сайт рыбатекст поможет дизайнеру</div>
            </div>
            <div class="reviews-idea__footer"> 
              <button class="reviews-idea__comment">Комментировать</button>
              <div class="reviews-idea__like"> 
                <div class="reviews-idea__like_number">12</div>
                <div class="reviews-idea__like_icon"><i class="fa-solid fa-heart"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="all-ideas">
      <div class="all-ideas__container"> 
        <div class="all-ideas__wrapper">
          <div class="page-navigation-ideas">
            <ul class="page-navigation-ideas__list"> 
              <li class="page-navigation-ideas__item"> <a class="page-navigation-ideas__link" href="/bank-idej/">Все идеи</a></li>
              <li class="page-navigation-ideas__item"> <a class="page-navigation-ideas__link" href="/otslezhivaemye-idei/">Отслеживаемые идеи</a></li>
              <li class="page-navigation-ideas__item"> <a class="page-navigation-ideas__link" href="/otzyvy-na-idei/">Мои отзывы</a></li>
            </ul>
          </div>
          <div class="all-ideas__filter filter">
            <div class="filter__wrapper"> 
              <div class="filter__side">
                <div class="filter__block filter__autor"> <span class="filter__block_title">Автор</span>
                  <div class="filter__select select"> 
                    <div class="select__header"> <span class="select__current">Автор</span>
                      <div class="select__icon"><i class="fa-solid fa-angle-down"></i></div>
                    </div>
                    <div class="select__body"> 
                      <div class="select__item">Евдакимов Сергей</div>
                      <div class="select__item">Авраам Линкольн</div>
                      <div class="select__item">Фёдорова Анна</div>
                    </div>
                  </div>
                </div>
                <div class="filter__block filter__city"><span class="filter__block_title">Город автора</span>
                  <div class="filter__select select"> 
                    <div class="select__header"> <span class="select__current">Город автора</span>
                      <div class="select__icon"> <i class="fa-solid fa-angle-down"></i></div>
                    </div>
                    <div class="select__body"> 
                      <div class="select__item">Москва</div>
                      <div class="select__item">Санкт-Петербург</div>
                      <div class="select__item">Новосибирск</div>
                    </div>
                  </div>
                </div>
                <div class="filter__block filter__category"><span class="filter__block_title">Категория</span>
                  <div class="filter__select select"> 
                    <div class="select__header"> <span class="select__current">Категория</span>
                      <div class="select__icon"> <i class="fa-solid fa-angle-down"></i></div>
                    </div>
                    <div class="select__body"> 
                      <div class="select__item">Бизнес</div>
                      <div class="select__item">Маркетинг</div>
                      <div class="select__item">Финансы</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="filter__side">
                <div class="filter__block filter__rating"><span class="filter__block_title">Рейтинг</span>
                  <div class="filter__rating-choice rating">
                    <div class="rating__item"> 
                      <button class="rating__button">
                        <div class="rating__radio"> </div><span class="rating__number">1</span>
                      </button>
                    </div>
                    <div class="rating__item"> 
                      <button class="rating__button">
                        <div class="rating__radio"> </div><span class="rating__number">2</span>
                      </button>
                    </div>
                    <div class="rating__item"> 
                      <button class="rating__button">
                        <div class="rating__radio"> </div><span class="rating__number">3</span>
                      </button>
                    </div>
                    <div class="rating__item"> 
                      <button class="rating__button">
                        <div class="rating__radio"> </div><span class="rating__number">4</span>
                      </button>
                    </div>
                    <div class="rating__item"> 
                      <button class="rating__button">
                        <div class="rating__radio"> </div><span class="rating__number">5</span>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="filter__block filter__category"><span class="filter__block_title">Сортировать по</span>
                  <div class="filter__select select"> 
                    <div class="select__header"> <span class="select__current">Сортировать по</span>
                      <div class="select__icon"><i class="fa-solid fa-angle-down"></i></div>
                    </div>
                    <div class="select__body"> 
                      <div class="select__item">Дате</div>
                      <div class="select__item">Рейтингу</div>
                      <div class="select__item">Алфавиту</div>
                    </div>
                  </div>
                </div>
                <div class="filter__block filter__button-block">
                  <button class="filter__button button-main">Добавить идею</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="all-ideas__board board-ideas"> 
          <div class="board-ideas__wrapper">
            <div class="board-ideas__item idea">
              <div class="idea__wrapper"> 
                <div class="idea__header"> 
                  <div class="idea__data">08.09.22</div>
                  <div class="idea__avatar"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt=""></div>
                  <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
                </div>
                <div class="idea__body"> 
                  <div class="idea__user-name">Игорь Разинкин</div>
                  <button class="idea__name" data-view="goodIdea1">Хорошая Идея номер 1</button>
                  <div class="idea__info"> 
                    <div class="idea__category">Категория</div>
                    <div class="idea__business-position">онлайн/оффлайн</div>
                  </div>
                </div>
                <button class="idea__buton secondary__button">Подписаться</button>
              </div>
            </div>
            <div class="bord-ideas__item idea">
              <div class="idea__wrapper"> 
                <div class="idea__header"> 
                  <div class="idea__data">08.09.22</div>
                  <div class="idea__avatar"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt=""></div>
                  <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
                </div>
                <div class="idea__body"> 
                  <div class="idea__user-name">Игорь Разинкин</div>
                  <button class="idea__name" data-view="goodIdea2">Хорошая Идея номер 1</button>
                  <div class="idea__info"> 
                    <div class="idea__category">Категория</div>
                    <div class="idea__business-position">онлайн/оффлайн</div>
                  </div>
                </div>
                <button class="idea__buton secondary__button">Подписаться</button>
              </div>
            </div>
            <div class="bord-ideas__item idea">
              <div class="idea__wrapper"> 
                <div class="idea__header"> 
                  <div class="idea__data">08.09.22</div>
                  <div class="idea__avatar"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt=""></div>
                  <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
                </div>
                <div class="idea__body"> 
                  <div class="idea__user-name">Игорь Разинкин</div>
                  <button class="idea__name">Хорошая Идея номер 1</button>
                  <div class="idea__info"> 
                    <div class="idea__category">Категория</div>
                    <div class="idea__business-position">онлайн/оффлайн</div>
                  </div>
                </div>
                <button class="idea__buton secondary__button">Подписаться</button>
              </div>
            </div>
            <div class="bord-ideas__item idea">
              <div class="idea__wrapper"> 
                <div class="idea__header"> 
                  <div class="idea__data">08.09.22</div>
                  <div class="idea__avatar"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt=""></div>
                  <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
                </div>
                <div class="idea__body"> 
                  <div class="idea__user-name">Игорь Разинкин</div>
                  <button class="idea__name">Хорошая Идея номер 1</button>
                  <div class="idea__info"> 
                    <div class="idea__category">Категория</div>
                    <div class="idea__business-position">онлайн/оффлайн</div>
                  </div>
                </div>
                <button class="idea__buton secondary__button">Подписаться</button>
              </div>
            </div>
            <div class="bord-ideas__item idea">
              <div class="idea__wrapper"> 
                <div class="idea__header"> 
                  <div class="idea__data">08.09.22</div>
                  <div class="idea__avatar"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt=""></div>
                  <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
                </div>
                <div class="idea__body"> 
                  <div class="idea__user-name">Игорь Разинкин</div>
                  <button class="idea__name">Хорошая Идея номер 1</button>
                  <div class="idea__info"> 
                    <div class="idea__category">Категория</div>
                    <div class="idea__business-position">онлайн/оффлайн</div>
                  </div>
                </div>
                <button class="idea__buton secondary__button">Подписаться</button>
              </div>
            </div>
            <div class="bord-ideas__item idea">
              <div class="idea__wrapper"> 
                <div class="idea__header"> 
                  <div class="idea__data">08.09.22</div>
                  <div class="idea__avatar"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt=""></div>
                  <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
                </div>
                <div class="idea__body"> 
                  <div class="idea__user-name">Игорь Разинкин</div>
                  <button class="idea__name">Хорошая Идея номер 1</button>
                  <div class="idea__info"> 
                    <div class="idea__category">Категория</div>
                    <div class="idea__business-position">онлайн/оффлайн</div>
                  </div>
                </div>
                <button class="idea__buton secondary__button">Подписаться</button>
              </div>
            </div>
            <div class="bord-ideas__item idea">
              <div class="idea__wrapper"> 
                <div class="idea__header"> 
                  <div class="idea__data">08.09.22</div>
                  <div class="idea__avatar"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt=""></div>
                  <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
                </div>
                <div class="idea__body"> 
                  <div class="idea__user-name">Игорь Разинкин</div>
                  <button class="idea__name">Хорошая Идея номер 1</button>
                  <div class="idea__info"> 
                    <div class="idea__category">Категория</div>
                    <div class="idea__business-position">онлайн/оффлайн</div>
                  </div>
                </div>
                <button class="idea__buton secondary__button">Подписаться</button>
              </div>
            </div>
            <div class="bord-ideas__item idea">
              <div class="idea__wrapper"> 
                <div class="idea__header"> 
                  <div class="idea__data">08.09.22</div>
                  <div class="idea__avatar"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt=""></div>
                  <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
                </div>
                <div class="idea__body"> 
                  <div class="idea__user-name">Игорь Разинкин</div>
                  <button class="idea__name">Хорошая Идея номер 1</button>
                  <div class="idea__info"> 
                    <div class="idea__category">Категория</div>
                    <div class="idea__business-position">онлайн/оффлайн</div>
                  </div>
                </div>
                <button class="idea__buton secondary__button">Подписаться</button>
              </div>
            </div>
            <div class="bord-ideas__item idea">
              <div class="idea__wrapper"> 
                <div class="idea__header"> 
                  <div class="idea__data">08.09.22</div>
                  <div class="idea__avatar"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt=""></div>
                  <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
                </div>
                <div class="idea__body"> 
                  <div class="idea__user-name">Игорь Разинкин</div>
                  <button class="idea__name">Хорошая Идея номер 1</button>
                  <div class="idea__info"> 
                    <div class="idea__category">Категория</div>
                    <div class="idea__business-position">онлайн/оффлайн</div>
                  </div>
                </div>
                <button class="idea__buton secondary__button">Подписаться</button>
              </div>
            </div>
            <div class="bord-ideas__item idea">
              <div class="idea__wrapper"> 
                <div class="idea__header"> 
                  <div class="idea__data">08.09.22</div>
                  <div class="idea__avatar"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt=""></div>
                  <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
                </div>
                <div class="idea__body"> 
                  <div class="idea__user-name">Игорь Разинкин</div>
                  <button class="idea__name">Хорошая Идея номер 1</button>
                  <div class="idea__info"> 
                    <div class="idea__category">Категория</div>
                    <div class="idea__business-position">онлайн/оффлайн</div>
                  </div>
                </div>
                <button class="idea__buton secondary__button">Подписаться</button>
              </div>
            </div>
            <div class="bord-ideas__item idea">
              <div class="idea__wrapper"> 
                <div class="idea__header"> 
                  <div class="idea__data">08.09.22</div>
                  <div class="idea__avatar"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt=""></div>
                  <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
                </div>
                <div class="idea__body"> 
                  <div class="idea__user-name">Игорь Разинкин</div>
                  <button class="idea__name">Хорошая Идея номер 1</button>
                  <div class="idea__info"> 
                    <div class="idea__category">Категория</div>
                    <div class="idea__business-position">онлайн/оффлайн</div>
                  </div>
                </div>
                <button class="idea__buton secondary__button">Подписаться</button>
              </div>
            </div>
            <div class="bord-ideas__item idea">
              <div class="idea__wrapper"> 
                <div class="idea__header"> 
                  <div class="idea__data">08.09.22</div>
                  <div class="idea__avatar"> <img src="<?php echo bloginfo('template_url');?>/assets/img/ava-1.png" alt=""></div>
                  <div class="idea__rating"> <span class="idea__rating_number">5</span><i class="fa-solid fa-star"></i></div>
                </div>
                <div class="idea__body"> 
                  <div class="idea__user-name">Игорь Разинкин</div>
                  <button class="idea__name">Хорошая Идея номер 1</button>
                  <div class="idea__info"> 
                    <div class="idea__category">Категория</div>
                    <div class="idea__business-position">онлайн/оффлайн</div>
                  </div>
                </div>
                <button class="idea__buton secondary__button">Подписаться</button>
              </div>
            </div>
          </div>
          <button class="board-ideas__more">Смотреть еще</button>
        </div>
      </div>
    </section>
<?php
        get_footer();