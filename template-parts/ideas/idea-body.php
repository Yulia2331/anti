<? $idea = get_queried_object(); 
$idea_id = $idea->ID;
?>
<div class="view-idea" data-idea="<? echo $idea_id; ?>">
  <button class="view-idea__close close container__icon--18"><i class="fa-solid fa-xmark"></i></button>
  <button class="view-idea__trash container__icon--18"><i class="fa-solid fa-trash"></i></button>
  <div class="view-idea__header"> 
    <h2 class="view-idea__title"></h2>
    <div class="view-idea__right"> 
      <div class="view-idea__rating"> <span class="view-idea__number">5</span>
        <div class="view-idea__icon container__icon--18"><i class="fa-solid fa-star"></i></div>
      </div>
      <apsn class="view-idea__data"></apsn>
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
</div>

