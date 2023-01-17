try{
const idea = document.querySelectorAll('.idea');
const close = document.querySelectorAll('.close');
const hidden = document.querySelector('.hidden');
const body = document.body;

// idea.forEach(btn => {
  document.addEventListener('click', e => {
    const target = e.target;

    if (target.classList.contains('idea__name')) {
      const path = target.dataset.view;

      document.querySelectorAll(`[data-idea="${path}"]`).forEach(idea => {
        idea.closest('.view-idea').classList.add('active')
      })

      hidden.classList.add('active');
      body.classList.add('no-scroll');
    }
  })
// })

// close.forEach(el => {
  document.addEventListener('click', (e) => {
    if (e.target.classList.contains('close')) {
    document.querySelectorAll('.view-idea').forEach(idea => {
      idea.classList.remove('active');
    })

    hidden.classList.remove('active');
    createIdeaForm.classList.remove('active');
    const createReviews = document.querySelectorAll('.create-reviews');
    createReviews.forEach((i) => {
      i.classList.remove('active');
    })
    // createReviews.classList.remove('active');

    body.classList.remove('no-scroll');
  }})
// })

const createIdea = document.querySelector('.filter__button');
const createIdeaForm = document.querySelector('.create-idea');

createIdea.addEventListener('click', () => {
  createIdeaForm.classList.add('active');
  hidden.classList.add('active');
  body.classList.add('no-scroll');
})


const reviewsButton = document.querySelectorAll('.view-idea__button-reviews');
// const createReviews = document.querySelector('.create-reviews');

// reviewsButton.forEach(btn => {
  document.addEventListener('click', (e) => {
    if (e.target.classList.contains('view-idea__button-reviews')) {
    document.querySelectorAll('.view-idea').forEach(idea => {
      idea.classList.remove('active');
    })
    let self = e.target;
    let ideaId = self.dataset.rev;
    let theRev = document.getElementById(ideaId);
    theRev.classList.add('active');
  }})
// })
} catch {}
// const btnIBody = document.querySelectorAll('.idea__name'),
// IBody = document.querySelector('.view-idea'),
// iId = document.querySelector('.idea_id');
// btnIBody.forEach((b) => {
//   b.addEventListener('click', (e) => {
//     // e.preventDefault();
//     let ideaID = b.dataset.view;
//     IBody.dataset.idea = ideaID;

//     // $.post('wp-admin/admin-ajax.php', {'action':'push_idea_id', 'id':ideaID}, function(response){
//     //   $('.modal-content.ajax').html(response);
//     // });
//   //   $.ajax({
//   //     type: 'POST',
//   //     url: '/wp-admin/admin-ajax.php',
//   //     data: {
//   //       action: 'push_idea_id',
//   //       id: ideaID
//   //     },
//   //     success: function(data)
//   //     {
//   //       alert( data );
//   //       html( data );
//   //     },
//   //     error: function(msg){
//   //         console.log('error');
//   //     }
//   // });
//   })
// })
try{
const up = document.querySelectorAll('.create-reviews__more');
const dwn = document.querySelectorAll('.create-reviews__less');
up.forEach((i) => {
  i.addEventListener('click', (e) => {
   let ff = e.target.closest('.create-reviews__count');
  let inp = ff.querySelector('.create-reviews__num');
  if(inp.value < 5){
    inp.value ++;
  }
  })
})
dwn.forEach((i) => {
  i.addEventListener('click', (e) => {
   let ff = e.target.closest('.create-reviews__count');
  let inp = ff.querySelector('.create-reviews__num');
  if(inp.value > 0){
  inp.value --;
  }
  })
})
} catch {}
try{
  const addInp = document.querySelector('.create-idea__plus');
  const per = document.querySelector('.create-idea__criteria-block');
  addInp.addEventListener('click', (e) => {
   let l = per.querySelectorAll('.create-idea__criteria');
   let ind;
   if(l.length == 0){
    ind = 1;
   }
   if(l.length == 1){
    ind = 2;
   }
   if(l.length == 2){
    ind = 3;
   }
   if(l.length == 3){
    ind = 4;
   }
   if(l.length == 4){
    ind = 5;
   }
   if(l.length == 5){
    return false;
   }
   let html = 
   `
   <input id="inp${ind}" class="create-idea__criteria" name="criteria_${ind}" type="text" value="">
   `
   per.insertAdjacentHTML('beforeEnd', html);
  });
} catch {}
// $('.hypothesis__add').submit(function(e){
//   e.preventDefault();
//   var name = $(".hypothesis_content").val();
//   $.ajax({ 
//        data: {action: 'contact_form', name:name},
//        type: 'post',
//        url: ajaxurl,
//        success: function(data) {
//             console.log(data); //should print out the name since you sent it along

//       }
//   });

// });