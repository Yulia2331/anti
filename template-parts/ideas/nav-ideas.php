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
                            <?php $curs_term_id = $cat_p->cat_ID; ?>
                                <div class="select__item"><?php echo $cat_p->name; ?></div>
                            <?php endforeach; ?>
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