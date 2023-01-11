const idea = document.querySelectorAll('.idea');
const close = document.querySelectorAll('.close');
const hidden = document.querySelector('.hidden');
const body = document.body;

idea.forEach(btn => {
  btn.addEventListener('click', e => {
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
})



close.forEach(el => {
  el.addEventListener('click', () => {
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
  })
})



const createIdea = document.querySelector('.filter__button');
const createIdeaForm = document.querySelector('.create-idea');

createIdea.addEventListener('click', () => {
  createIdeaForm.classList.add('active');
  hidden.classList.add('active');
  body.classList.add('no-scroll');
})


const reviewsButton = document.querySelectorAll('.view-idea__button-reviews');
// const createReviews = document.querySelector('.create-reviews');

reviewsButton.forEach(btn => {
  btn.addEventListener('click', (e) => {
    document.querySelectorAll('.view-idea').forEach(idea => {
      idea.classList.remove('active');
    })
    let self = e.target;
    let ideaId = self.dataset.rev;
    console.log(ideaId);
    // idea.classList.add('pale');
    let theRev = document.getElementById(ideaId);
    console.log(theRev);
    theRev.classList.add('active');
    // let theRev = self.querySelector('.create-reviews');
    // theRev.classList.add('nopale');
    // createReviews.classList.add('active');

  })
})

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
