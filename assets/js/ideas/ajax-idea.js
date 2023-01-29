try {
    document.addEventListener('click', (e) => {
     if (e.target.classList.contains('view-idea__button-reviews')) {
     const hidden = document.querySelector('.hidden');
     hidden.classList.add('active');
     let self = e.target;
     let ideaId = self.dataset.rev;
     let theRev = document.getElementById(ideaId);
     theRev.classList.add('active');
   }})
 } catch {}
 try{
  document.addEventListener('click', (e) => {
   if (e.target.classList.contains('close ')) {
     hidden.classList.remove('active');
     const createReviews = document.querySelectorAll('.create-reviews');
    createReviews.forEach((i) => {
      i.classList.remove('active');
    })
  }})
} catch {}
try{
  const oo = document.querySelector('.create-idea__form');
  oo.addEventListener('submit', (e) =>{
    e.preventDefault();
    let title = e.target.querySelector('#idea_title').value;
    let cont = e.target.querySelector('.create-idea__textarea').value;
    let tag = e.target.querySelector('input[name="idea_tag"]:checked').value;
    let tax = e.target.querySelector('input[name="idea_cat"]:checked').value;
    let date = new Date().toLocaleDateString();
    let btn = e.target.querySelector('.create-idea__button');
    let criterias = e.target.querySelectorAll('.create-idea__criteria');
    let criteriasArr = [];
    criterias.forEach((c) => {
      let obj = {};
      obj.val = c.value;
      criteriasArr.push(obj);
    })
    btn.disabled = true;
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
      error: function (request, status, error) {
        $('.create-idea__msg').text(error);
        btn.disabled = false;	
},
       success: function(data) {
        console.log(data);
        $('.create-idea__msg').text('Идея добавлена');
        btn.disabled = false;	
        e.target.reset();
      }
  });
  })
} catch {}
try{
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
    const sabscrBtn = e.target.closest('.idea').querySelectorAll('.no-sabscr');
        sabscrBtn.forEach((i) => {
        e.target.innerText ='Вы подписаны';	
    i.classList.remove('no-sabscr');
    i.classList.add('idea-sabscr');
       });
      }
  });
      }})
  // })
} catch { }
try{
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
        const sabscrBtn = e.target.closest('.idea').querySelectorAll('.idea-sabscr');
        sabscrBtn.forEach((i) => {
        e.target.innerText ='Подписаться';	
    i.classList.remove('idea-sabscr');
        i.classList.add('no-sabscr');
    });
      }
  });
      }})
  // })
} catch { }
try{
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
} catch { }
try{
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
} catch { }
try{
  // const hypothesisTrash = document.querySelectorAll('.hypothesis__item_icon');
  // hypothesisTrash.forEach((i) => {
    document.addEventListener('click', (e) => {
      if(e.target.classList.contains('hypothesis__item_icon')){
      let id = e.target.dataset.trash;
      let row = e.target.closest('.hypothesis__item').dataset.row;
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
} catch { }
try{
  // const revForm = document.querySelectorAll('.create-reviews__form');
  //  revForm.forEach((i) => {
    document.addEventListener('submit', (e) =>{
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
        console.log(data);
        e.target.reset();
      }
      });
    }});
    // })
} catch { }
try{
  // const revForm = document.querySelectorAll('.create-reviews__form');
  //  revForm.forEach((i) => {
    document.addEventListener('submit', (e) =>{
      if(e.target.classList.contains('msg-form')){
      e.preventDefault();
      let id = e.target.querySelector('.msg-author').value;
      let text = e.target.querySelector('.create-reviews__message').value;
      let msgWrapp = e.target.querySelector('.response-msg');
      $.ajax({ 
        data: {
        action: 'private_message', 
        id: id,
        text: text
      },
       type: 'post',
       url: '/wp-admin/admin-ajax.php',
       beforeSend: function( xhr ) {
        msgWrapp.innerText = 'Отправка сообщения...';	
			},
      error: function (request, status, error) {
        msgWrapp.innerText = error;	
},
       success: function(data) {
        msgWrapp.innerText = 'Сообщение отправлено!';	
        e.target.reset();
      }
      });
    }});
    // })
} catch { }
try{
document.addEventListener('click', (e) => {
  if(e.target.classList.contains('view-idea__btn')){
   let msgForm = e.target.closest('.view-idea__info').querySelector('.msg-form');
   msgForm.classList.toggle('active');
  }
})
} catch { }
try{
  document.addEventListener('click', (e) => {
    if(e.target.classList.contains('general-function__messages')){
     let msgForm = document.querySelector('.private-messages');
     msgForm.classList.toggle('active');
    }
  })
} catch { }
try{
  document.addEventListener('click', (e) => {
    if(e.target.classList.contains('comments__button')){
      e.preventDefault();
      let self = e.target.closest('.comments__add');
      let id = self.querySelector('.comments__input_par').value;
      let postId = self.querySelector('.comments__input_pid').value;
      let text = self.querySelector('.comments__input').value;
      let msgWrapp = e.target.closest('.comments__wrapper').querySelector('.comments__add_msg');
      e.target.disabled = true;
      $.ajax({ 
        data: {
        action: 'answ_idearev', 
        postId: postId,
        id: id,
        text: text
      },
       type: 'post',
       url: '/wp-admin/admin-ajax.php',
       beforeSend: function( xhr ) {
        msgWrapp.innerText = 'Публикация...';	
			},
      error: function (request, status, error) {
        msgWrapp.innerText = error;	
        e.target.disabled = false;
},
       success: function(data) {
        msgWrapp.innerText = 'Опубликованно!';	
        self.reset();
        e.target.disabled = false;
      }
      });
    }
  })
} catch { }
try{
  document.addEventListener('click', (e) => {
    if(e.target.classList.contains('main-comment__button')){
      let par = e.target.closest('.comments__block');
      let val = par.dataset.subcommid;
      let name = par.querySelector('.main-comment__firstname').textContent;
      let blockPar = par.closest('.comment-idea');
      blockPar.querySelector('.comments__input_par').value = val;
      blockPar.querySelector('.comments__input').value = name + ',';
    }
  })
} catch { }
try{
  document.addEventListener('click', (e) => {
    if(e.target.classList.contains('sub-comment__button')){
      let par = e.target.closest('.comments__block');
      let val = par.dataset.subcommid;
      let name = par.querySelector('.sub-comment__firstname').textContent;
      let blockPar = par.closest('.comment-idea');
      console.log(val);
      blockPar.querySelector('.comments__input_par').value = val;
      blockPar.querySelector('.comments__input').value = name + ',';
    }
  })
} catch { }
document.addEventListener('click', (e) => {
  if(e.target.closest('.reviews-idea__like')){
    let self = e.target.closest('.reviews-idea__like');
    let id = self.dataset.likeid;
    let user = self.dataset.user;
    let c = Number(self.querySelector('.reviews-idea__like_number').textContent);
    $.ajax({ 
      data: {
      action: 'com_liked', 
      id: id,
      user: user
    },
     type: 'GET',
     url: '/wp-admin/admin-ajax.php',
success: function ( answer ) {
  console.log(answer.data.action);
  console.log(c);
  if ( answer.data.action == 'add' ) {
    self.classList.add( 'liked' );
    c++;
    self.querySelector('.reviews-idea__like_number').textContent = c;
  } else {
    self.classList.remove( 'liked' );
    c--;
    self.querySelector('.reviews-idea__like_number').textContent = c;
  }
 },
    });
  }
})