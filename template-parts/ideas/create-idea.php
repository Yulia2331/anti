<div class="create-idea">
  <button class="create-idea__close close container__icon--18"><i class="fa-solid fa-xmark"></i></button>
  <div class="create-idea__title">Создать идею</div>
  <form  id="create-idea__form" action="<? get_permalink(); ?>" method="POST" class="create-idea__form" name="createidea"> 
    <input id="idea_title" class="create-idea__input input-field" minlength="2" name="idea_title" type="text" required="required" placeholder="Придумайте название идеи">
    <div class="create-idea__select-block">
      <div class="create-idea__select select"> 
        <div class="select__header"> <span class="select__current" name="idea_cat">Категория</span>
          <div class="select__icon"> <i class="fa-solid fa-angle-down"></i></div>
        </div>
        <div class="select__body"> 
        <?php 
                            $taxonomy     = 'ideas_tax';
                            $orderby      = 'name';  
                            $show_count   = 0;
                            $pad_counts   = 0; 
                            $hierarchical = 1; 
                            $title        = '';  
                            $empty        = 0;
                            $course_category = array(
                            'taxonomy'     => $taxonomy,
                            'hide_empty' => $empty,
                            );
                            $cat_product = get_categories( $course_category )?>
                            <?php foreach ($cat_product as $cat_p) : ?>
                            <?php $idea_term_id = $cat_p->cat_ID; ?>
                            <label for="ci_<? echo $idea_term_id; ?>" class="select__item">
                            <input id="ci_<? echo $idea_term_id; ?>" type="radio" name="idea_cat" value="<? echo $idea_term_id; ?>" class="select__item-radio">
                            <?php echo $cat_p->name; ?>
                           </label>     
                            <?php endforeach; ?>
        </div>
      </div>
      <div class="create-idea__select select"> 
        <div class="select__header"> <span class="select__current">онлайн/оффлайн</span>
          <div class="select__icon"> <i class="fa-solid fa-angle-down"></i></div>
        </div>
        <div class="select__body"> 
        <label for="ci_online" class="select__item">
            <input id="ci_online" type="radio" name="idea_tag" value="онлайн" class="select__item-radio">онлайн
          </label>     
          <label for="ci_offline" class="select__item">
            <input id="ci_offline" type="radio" name="idea_tag" value="оффлайн" class="select__item-radio">оффлайн
          </label>  
          <label for="ci_online_offline" class="select__item">
            <input id="ci_online_offline" type="radio" name="idea_tag" value="онлайн/оффлайн" class="select__item-radio">онлайн/оффлайн
          </label> 
        </div>
      </div>
    </div>
    <textarea minlength="6" class="create-idea__textarea" name="idea_content" cols="30" rows="10" placeholder="Опишите вашу идею" required="required"></textarea>
    <div class="create-idea__subtitle">Создайте до 5 критериев оценки вашей идеи</div>
    <div class="create-idea__add-criteria">
      <div class="create-idea__criteria-block">
      </div>
      <span class="create-idea__plus container__icon--24"><i class="fa-solid fa-plus"></i></span>
    </div>
    <button type='submit' name="create-idea-submit" class="create-idea__button secondary__button">Опубликовать</button>
    <span class="create-idea__msg"></span>
  </form>
</div>
