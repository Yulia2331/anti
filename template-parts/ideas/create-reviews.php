<form action="<? get_permalink(); ?>" method="POST" class="create-reviews">
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
    </div>
    <button type="submit" class="create-reviews__button secondary__button">Отправить</button>
  </div>
</form>

<?php
//  comment_form($args = array(), $post_id = $curs_id); 
?>