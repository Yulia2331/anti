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

  document.addEventListener('click', (e) => {
   if (e.target.classList.contains('close ')) {
     hidden.classList.remove('active');
     const createReviews = document.querySelectorAll('.create-reviews');
    createReviews.forEach((i) => {
      i.classList.remove('active');
    })
  }})

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