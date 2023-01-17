<? $args = array(
    'post_type' => 'ideas',
    'orderby'     => 'date',
    'order'       => 'DESC',
  );
  query_posts( $args );
  $author_arr = array();
  $author_city = array();
   if ( have_posts() ) {
    while ( have_posts() ) : the_post();
    // тут вывод шаблона поста, например через get_template_part()
    $i_id = get_the_id();
    $postData = get_post($i_id);
    $a_id = $postData->post_author;
   array_push($author_arr, $a_id);
   $meta = get_field('city', 'user_'.$a_id);
  add_post_meta( $i_id, 'author_city', $meta, true);
  $m = get_post_meta( $i_id, 'author_city', true);
  array_push($author_city, $m);
  // update_post_meta($i_id, 'av_city', $meta);
  endwhile;
  } else {
  echo 'Ничего не найдено';
  } 
  // print_r(array_unique($author_city));
                    ?>
                    <div class="all-ideas__filter filter">
        <form id="filter" class="filter__wrapper"> 
          <div class="filter__side">
            <div class="filter__block filter__autor"> <span class="filter__block_title">Автор</span>
              <div class="filter__select select"> 
                <div class="select__header"> <span class="select__current">Автор</span>
                  <div class="select__icon"><i class="fa-solid fa-angle-down"></i></div>
                </div>
                
                <div class="select__body"> 
                <? foreach( array_unique($author_arr) as $author ){ 
                  $user       = get_userdata( $author );
                  $first_name = $user->first_name;
                  $last_name  = $user->last_name;?>
                <label for="author_<? echo $first_name ?>" class="select__item">
                <input id="author_<? echo $first_name ?>" type="radio" name="filter_author" class="idea_term" value="<? echo $author; ?>" class="select__item-radio">
                <?php echo $first_name; echo '&nbsp'; echo $last_name; ?>
                </label> 
              <?  } ?>
                </div>
              </div>
            </div>
            <div class="filter__block filter__city"><span class="filter__block_title">Город автора</span>
              <div class="filter__select select"> 
                <div class="select__header"> <span class="select__current">Город автора</span>
                  <div class="select__icon"> <i class="fa-solid fa-angle-down"></i></div>
                </div>
                <div class="select__body"> 
                <? foreach( array_unique($author_city) as $city ){ ?>
                  <label for="city_<? echo $city ?>" class="select__item">
                <input id="city_<? echo $city ?>" type="radio" name="filter_city" class="idea_term" value="<? echo $city; ?>" class="select__item-radio">
                <?php echo $city; ?>
                </label> 
                  <?  } ?>
                </div>
              </div>
            </div>
            <div class="filter__block filter__category"><span class="filter__block_title">Категория</span>
              <div class="filter__select select"> 
                <div class="select__header"> <span class="select__current">Категория</span>
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
                            );
                            $cat_product = get_categories( $course_category )?>
                            <?php foreach ($cat_product as $cat_p) : ?>
                            <?php $idea_term_id = $cat_p->cat_ID; ?>
                            <label for="cat_<? echo $idea_term_id; ?>" class="select__item">
                            <input id="cat_<? echo $idea_term_id; ?>" type="radio" name="filter_cat" class="idea_term" value="<? echo $idea_term_id; ?>" class="select__item-radio">
                            <?php echo $cat_p->name; ?>
                           </label> 
                            <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="filter__side">
            <div class="filter__block filter__rating"><span class="filter__block_title">Рейтинг</span>
              <div class="filter__rating-choice rating">
              <label for="rat_1" class="rating__button">
                            <input id="rat_1" type="radio" name="filter_rat" class="idea_term" value="1" class="select__item-radio">
                           <span class="rating__number">1</span>
                           </label> 
                           <label for="rat_2" class="rating__button">
                            <input id="rat_2" type="radio" name="filter_rat" class="idea_term" value="2" class="select__item-radio">
                            <span class="rating__number">2</span>
                           </label> 
                           <label for="rat_3" class="rating__button">
                            <input id="cat_3" type="radio" name="filter_rat" class="idea_term" value="3" class="select__item-radio">
                            <span class="rating__number">3</span>
                           </label> 
                           <label for="rat_4" class="rating__button">
                            <input id="rat_4" type="radio" name="filter_rat" class="idea_term" value="4" class="select__item-radio">
                           <span class="rating__number">4</span>
                           </label> 
                           <label for="rat_5" class="rating__button">
                            <input id="rat_5" type="radio" name="filter_rat" class="idea_term" value="5" class="select__item-radio">
                           <span class="rating__number">5</span>
                           </label> 
              </div>
            </div>
            <div class="filter__block filter__category"><span class="filter__block_title">Сортировать по</span>
              <div class="filter__select select"> 
                <div class="select__header"> <span class="select__current">Сортировать по</span>
                  <div class="select__icon"><i class="fa-solid fa-angle-down"></i></div>
                </div>
                <div class="select__body"> 
                  <label for="sort_date" class="select__item">
                    <input id="sort_date" type="radio" name="filter_sort" class="idea_term" value="date" class="select__item-radio">
                    <span class="rating__number">Дате</span>
                  </label> 
                  <label for="sort_rating" class="select__item">
                    <input id="sort_rating" type="radio" name="filter_sort" class="idea_term" value="rating" class="select__item-radio">
                    <span class="rating__number">Рейтингу</span>
                  </label> 
                  <label for="sort_title" class="select__item">
                    <input id="sort_title" type="radio" name="filter_sort" class="idea_term" value="title" class="select__item-radio">
                    <span class="rating__number">Алфавиту</span>
                  </label> 
                </div>
              </div>
            </div>
            <div class="filter__block filter__button-block">
            <input type="hidden" name="action" value="myfilter">
            <input class="filter__apply" type="submit" value="Фильтровать">
              <a href="#" class="filter__button button-main">Добавить идею</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script>
      jQuery( function( $ ){
	$( '#filter' ).submit(function(){
		var filter = $(this);
		$.ajax({
			url : '/wp-admin/admin-ajax.php', // обработчик
			data : filter.serialize(), // данные
			type : 'POST', // тип запроса
			success : function( data ){
				$( '.board-ideas__wrapper' ).html(data);
        // console.log(data);
			}
		});
		return false;
	});
});
    </script>