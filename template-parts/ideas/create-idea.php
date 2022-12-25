<div class="create-idea">
  <button class="create-idea__close close container__icon--18"><i class="fa-solid fa-xmark"></i></button>
  <div class="create-idea__title">Создать идею</div>
  <form action="<? get_permalink(); ?>" method="POST" class="create-idea__form"> 
    <input class="create-idea__input input-field" name="idea_title" type="text" placeholder="Придумайте название идеи">
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
                            <?php $curs_term_id = $cat_p->cat_ID; ?>
                            <div class="select__item">
                            <input type="radio" name="idea_cat" value="7">
                            <?php echo $cat_p->name; ?></div>     
                            <?php endforeach; ?>
        </div>
      </div>
      <div class="create-idea__select select"> 
        <div class="select__header"> <span class="select__current">онлайн/оффлайн</span>
          <div class="select__icon"> <i class="fa-solid fa-angle-down"></i></div>
        </div>
        <div class="select__body"> 
          <div class="select__item">Бизнес</div>
          <div class="select__item">Маркетинг</div>
          <div class="select__item">Финансы</div>
        </div>
      </div>
    </div>
    <textarea class="create-idea__textarea" name="idea_content" cols="30" rows="10" placeholder="Опишите вашу идею"> </textarea>
    <!-- <div class="create-idea__subtitle">Создайте до 5 критериев оценки вашей идеи</div>
    <div class="create-idea__add-criteria">
      <div class="create-idea__criteria-block">
        <div class="create-idea__criteria select">Востребованность</div>
        <div class="create-idea__criteria select">Легкость</div>
        <div class="create-idea__criteria select">Возможность</div>
        <div class="create-idea__criteria select">Статность</div>
        <div class="create-idea__criteria select">Денежность</div>
      </div>
      <button class="create-idea__plus container__icon--24"><i class="fa-solid fa-plus"></i></button>
    </div> -->
    <button type='submit' class="create-idea__button secondary__button">Опубликовать</button>
  </form>
</div>
<?  

if($_POST){
  testfun();
}

function testfun()
{
  $title = sanitize_text_field( $_POST['idea_title'] );
  if (!get_page_by_title($title, 'OBJECT', 'ideas') ){
  $post_data = [
      'post_type' => 'ideas',
    	'post_title'    => $title,
      'post_content'  => sanitize_text_field( $_POST['idea_content'] ),
    	'post_status'   => 'publish',
  ];
  $post_id = wp_insert_post( $post_data );
  //  if(isset($_POST["idea_cat"]))
  // {
  //   $idea_tax = $_POST["idea_cat"];
  //   wp_set_object_terms( $post_id, $idea_tax, 'ideas_tax' );
  // } 
  // $idea_tax = $_POST['idea_cat'];
  // $idea_tax = strip_tags($_POST["idea_cat"]);
  // // $idea_tax = 7;
  // wp_set_object_terms( $post_id, $idea_tax, 'ideas_tax' );
}
}






//     $title = $_POST[ 'idea_title' ];
// $ars = [
//     'post_type' => 'ideas',
//     'post_title' => $title,
//     'post_status' => 'publish',
// ]

//  $post_id = wp_insert_post($ars);

// $post_data = array(
// 	'post_title'    => sanitize_text_field( $_POST['post_title'] ),
// 	'post_content'  => $_POST['post_content'],
// 	'post_status'   => 'publish',
// 	'post_author'   => 1,
// 	'post_category' => array( 8,39 )
// );

// // Вставляем запись в базу данных
// $post_id = wp_insert_post( $post_data );