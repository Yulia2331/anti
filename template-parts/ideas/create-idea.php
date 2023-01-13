<div class="create-idea">
  <button class="create-idea__close close container__icon--18"><i class="fa-solid fa-xmark"></i></button>
  <div class="create-idea__title">Создать идею</div>
  <form id="create-idea__form" action="<? get_permalink(); ?>" method="POST" class="create-idea__form"> 
    <input id="idea_title" class="create-idea__input input-field" name="idea_title" type="text" placeholder="Придумайте название идеи">
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
            <input id="ci_online_offline" type="radio" name="idea_tag" value="онлайн/оффлайн" class="select__item-radio" checked>онлайн/оффлайн
          </label> 
        </div>
      </div>
    </div>
    <textarea class="create-idea__textarea" name="idea_content" cols="30" rows="10" placeholder="Опишите вашу идею"> </textarea>
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
<script>
  const oo = document.querySelector('.create-idea__form');
  oo.addEventListener('submit', (e) =>{
    e.preventDefault();
    let title = e.target.querySelector('#idea_title').value;
    let cont = e.target.querySelector('.create-idea__textarea').value;
    let tag = e.target.querySelector('input[name="idea_tag"]:checked').value;
    let tax = e.target.querySelector('input[name="idea_cat"]:checked').value;
    let date = new Date().toLocaleDateString();
    let criterias = e.target.querySelectorAll('.create-idea__criteria');
    // let criteriasArr = [];
    let criteriasLength;
    criterias.forEach((c) => {
      // console.log(c.length)
    })

    $.ajax({ 
       data: {
        action: 'ideas_form', 
        title: title,
        cont: cont,
        tag: tag,
        tax: tax,
        criteriasArr: criteriasArr
      },
       type: 'post',
       url: '/wp-admin/admin-ajax.php',
       beforeSend: function( xhr ) {
				$('.create-idea__msg').text('Добавление идеи...');	
			},
       success: function(data) {
        console.log(data);
        $('.create-idea__msg').text('Идея добавлена');	
        e.target.reset();
      }
  });
  })
</script>

<?
// function testfun() { 
//   $title = sanitize_text_field( $_POST['idea_title'] );
//   $cont = sanitize_text_field( $_POST['idea_content'] );
//   $time = current_time( 'timestamp' );
//   if(!empty($_POST['idea_tag'])) {
//     $idea_tag = $_POST['idea_tag'];
//   }
//   if (!get_page_by_title($title, 'OBJECT', 'ideas') ){
//   $post_data = [
//       'post_type' => 'ideas',
//     	'post_title'    => $title,
//       'post_content'  => '',
//     	'post_status'   => 'publish',
//       'meta_input'    => [ 
//         'online_offline' => $idea_tag,
//       ],
//   ];
//   $post_id = wp_insert_post( $post_data );
//     if(!empty($_POST['idea_cat'])) {
//       $idea_tax = (int) $_POST['idea_cat'];
//       wp_set_object_terms( $post_id, $idea_tax, 'ideas_tax' );
//     }
// $field_key = "field_63b82d7710576";
// $value = array(
// 	array(
// 		"hypothesis"	=> $cont,
//     'hypothesis_date' => $time,
// 	)
// );
// update_field( $field_key, $value, $post_id );
// $average_rating = 'average_rating';
// $average_rating_val = (int)0;
// $criteria = 'criteria_1';
// $val = sanitize_text_field( $_POST['criteria_1'] );
// $criteria_rat = 'criteria_1_rat';
// $val_rat = (int) 0;
// $criteria_2 = 'criteria_2';
// $val_2 = sanitize_text_field( $_POST['criteria_2'] );
// $criteria_rat_2 = 'criteria_2_rat';
// $val_rat_2 = (int) 0;
// add_post_meta( $post_id, $average_rating, $average_rating_val);
// add_post_meta( $post_id, $criteria, $val);
// add_post_meta( $post_id, $criteria_rat, $val_rat);
// add_post_meta( $post_id, $criteria_2, $val_2);
// add_post_meta( $post_id, $criteria_rat_2, $val_rat_2);
// }
// }