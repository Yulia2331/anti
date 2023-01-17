<?php  
/*  
Template Name: Банк идей новый
*/

get_header();
?>
<? get_template_part('template-parts/ideas/create'); ?>
<section class="all-ideas padding-left">
  <div class="all-ideas__container"> 
    <div class="all-ideas__wrapper">
      <? get_template_part('template-parts/ideas/nav-ideas'); ?>
      <? get_template_part('template-parts/ideas/idea-filter'); ?>
    <div class="all-ideas__board board-ideas">
   <? 
  $args = array(
    'post_type' => 'ideas',
    'orderby'     => 'date',
    'order'       => 'DESC',
  );
  query_posts( $args );
                    ?>
      <div class="board-ideas__wrapper">
   <?   if ( have_posts() ) {
      while ( have_posts() ) : the_post();
      // тут вывод шаблона поста, например через get_template_part()
      get_template_part('template-parts/ideas/idea');
    endwhile;
    } else {
    echo 'Ничего не найдено';
    } ?>
      </div>
      <button class="board-ideas__more">Смотреть еще</button>
    </div>
  </div>
</section>
<script>
  // const sabscrBtn = document.querySelectorAll('.no-sabscr');
  // sabscrBtn.forEach((i) => {
    document.addEventListener('click', (e) =>{
      if(e.target.classList.contains('no-sabscr')){
      e.preventDefault();
      let postId = e.target.dataset.sabscr;
      let userId = e.target.dataset.user;
      $.ajax({ 
       data: {
        action: 'sabscr_idea', 
        postId: postId,
        userId: userId,
      },
       type: 'post',
       url: '/wp-admin/admin-ajax.php',
       beforeSend: function( xhr ) {
				e.target.innerText = 'Ожидание...';	
			},
      error: function (request, status, error) {
        e.target.innerText = error;
},
       success: function(data) {
        e.target.innerText ='Вы подписаны';	
        e.target.classList.remove('no-sabscr');
        e.target.classList.add('idea-sabscr');
      }
  });
      }})
  // })
</script>
<script>
  // const unsabscrBtn = document.querySelectorAll('.idea-sabscr');
  // document.forEach((i) => {
    document.addEventListener('click', (e) =>{
      if(e.target.classList.contains('idea-sabscr')){
      e.preventDefault();
      let postId = e.target.dataset.sabscr;
      let userId = e.target.dataset.user;
      $.ajax({ 
       data: {
        action: 'unsubscribe_idea', 
        postId: postId,
        userId: userId,
      },
       type: 'post',
       url: '/wp-admin/admin-ajax.php',
       beforeSend: function( xhr ) {
				e.target.innerText = 'Ожидание...';	
			},
      error: function (request, status, error) {
        e.target.innerText = error;
},
       success: function(data) {
        e.target.innerText ='Подписаться';	
        e.target.classList.remove('idea-sabscr');
        e.target.classList.add('no-sabscr');
      }
  });
      }})
  // })
</script>
<script>
  // const hh = document.querySelectorAll('.hypothesis__add');
  //     hh.forEach((i) => {
    
        document.addEventListener('submit', (e) =>{
          if(e.target.classList.contains('hypothesis__add')){
      e.preventDefault();
     
let name = e.target.querySelector('.hypothesis__input').value;
let id = e.target.querySelector('.hypothesis_content_id').value;
let per = e.target.closest('.view-idea__hypothesis').querySelector('.hypothesis__board');
let date = new Date().toLocaleDateString();
let msgWrapp = e.target.closest('.view-idea__hypothesis').querySelector('.hypothesis__msg');
  $.ajax({ 
       data: {
        action: 'hypothesis_form', 
        id: id,
        name: name,
      },
       type: 'post',
       url: '/wp-admin/admin-ajax.php',
       beforeSend: function( xhr ) {
				msgWrapp.innerText = 'Добавление гипотезы...';	
			},
       success: function(data) {
        msgWrapp.innerText ='Гипотеза добавлена';	
     
        let html = 
        `
        <div class="hypothesis__item">
          <div class="hypothesis__item_header">
            <div class="hypothesis__item_title">Гипотеза (${date})</div>
            <button class="hypothesis__item_icon"> <i class="fa-solid fa-trash"></i></button>
          </div>
          <div class="hypothesis__content">${name}</div>
        </div>
        `
        per.insertAdjacentHTML('beforeEnd', html);
        e.target.reset();
      }
  });
      }})
  // })
</script>
<script>
  // const ideaTrash = document.querySelectorAll('.view-idea__trash');
  // ideaTrash.forEach((i) => {
    document.addEventListener('click', (e) => {
      if(e.target.classList.contains('view-idea__trash')){
      let id = e.target.dataset.trash;
      let msgWrapp = e.target.closest('.view-idea').querySelector('.hypothesis__msg');
      $.ajax({ 
       data: {
        action: 'trash_idea', 
        id: id,
      },
       type: 'post',
       url: '/wp-admin/admin-ajax.php',
       beforeSend: function( xhr ) {
				msgWrapp.innerText = 'Удаление...';	
			},
       success: function(data) {
        msgWrapp.innerText = 'Идея удалена';	
      }
  });
    }})
  // })
</script>
<script>
  // const hypothesisTrash = document.querySelectorAll('.hypothesis__item_icon');
  // hypothesisTrash.forEach((i) => {
    document.addEventListener('click', (e) => {
      if(e.target.classList.contains('hypothesis__item_icon')){
      let id = e.target.dataset.trash;
      let row = i.closest('.hypothesis__item').dataset.row;
      let msgWrapp = e.target.closest('.view-idea__hypothesis').querySelector('.hypothesis__msg');
      $.ajax({ 
       data: {
        action: 'trash_hypothesis', 
        id: id,
        row: row
      },
       type: 'post',
       url: '/wp-admin/admin-ajax.php',
       beforeSend: function( xhr ) {
				msgWrapp.innerText = 'Удаление...';	
			},
       success: function(data) {
        msgWrapp.innerText = 'Гипотеза удалена';	
        e.target.closest('.hypothesis__item').remove();   
      }
  });
    }})
  // })
</script>
<script>
  // const revForm = document.querySelectorAll('.create-reviews__form');
  //  revForm.forEach((i) => {
    i.addEventListener('submit', (e) =>{
      if(e.target.classList.contains('create-reviews__form')){
      e.preventDefault();
      let id = e.target.querySelector('.criteria_rate_id').value,
          plus = e.target.querySelector('.create-reviews__plus').value,
          minus = e.target.querySelector('.create-reviews__minus').value,
          comment = e.target.querySelector('.create-reviews__message').value;
      let criterias = e.target.querySelectorAll('.create-reviews__num');
      let criteriasArr = [];
      criterias.forEach((c) => {
      let obj = {};
      obj.val = c.value;
      criteriasArr.push(obj);
    })
      $.ajax({ 
        data: {
        action: 'rate_form', 
        id: id,
        plus: plus,
        minus: minus,
        comment: comment,
        criteriasArr: criteriasArr
      },
       type: 'post',
       url: '/wp-admin/admin-ajax.php',
       beforeSend: function( xhr ) {
        $('.reviews_msg').text('Добавление отзыва...');
			},
      error: function (request, status, error) {
        $('.reviews_msg').text(error);
},
       success: function(data) {
        $('.reviews_msg').text('Отзыв добавлен');	
        e.target.reset();
      }
      });
    }});
    // })
</script>

<?php
    get_footer(); ?>
