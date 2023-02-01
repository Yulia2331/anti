try{
const idea = document.querySelectorAll('.idea');
const close = document.querySelectorAll('.close');
const hidden = document.querySelector('.hidden');
const body = document.body;

// idea.forEach(btn => {
  document.addEventListener('click', e => {
    // const target = e.target.closest('.idea');

    if (e.target.closest('.idea') && !e.target.closest('.idea__info')) {
      if(!e.target.classList.contains('idea__buton')){
      const target = e.target.closest('.idea');
      const path = target.dataset.view;

      document.querySelectorAll(`[data-idea="${path}"]`).forEach(idea => {
        idea.closest('.view-idea').classList.add('active')
      })

      hidden.classList.add('active');
      body.classList.add('no-scroll');
    }
    }
  })
// })
try{
// close.forEach(el => {
  document.addEventListener('click', (e) => {
    if (e.target.classList.contains('close')) {
    document.querySelectorAll('.view-idea').forEach(idea => {
      idea.classList.remove('active');
    })
    const hidden = document.querySelector('.hidden');
    hidden.classList.remove('active');
    // createIdeaForm.classList.remove('active');
    const createReviews = document.querySelectorAll('.create-reviews');
    createReviews.forEach((i) => {
      i.classList.remove('active');
    })
    // createReviews.classList.remove('active');

    body.classList.remove('no-scroll');
  }})
} catch {}
try{
  // close.forEach(el => {
    document.addEventListener('click', (e) => {
      if (e.target.classList.contains('create-idea__close')) {
      const hidden = document.querySelector('.hidden');
      hidden.classList.remove('active');
      createIdeaForm.classList.remove('active');
  
      body.classList.remove('no-scroll');
    }})
  } catch {}
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
   <input id="inp${ind}" class="create-idea__criteria" name="criteria_${ind}" minlength="3" required="required" type="text" value="">
   `
   per.insertAdjacentHTML('beforeEnd', html);
  });
} catch {}
document.addEventListener('click', (e) => {
  if(e.target.classList.contains('reviews-idea__comment')){
    let par = e.target.closest('.reviews-idea__item');
    let comWr = par.querySelector('.comment-idea');
    comWr.classList.add('active');

  }
})
document.addEventListener('click', (e) => {
  if(e.target.classList.contains('comment-idea__back')){
    let par = e.target.closest('.comment-idea');
    par.classList.remove('active');

  }
})