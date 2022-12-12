const nav = document.querySelector('.navigation-block');
const burger = document.querySelector('.header__burger');
const navClose = document.querySelector('.navigation-block__button');
const navMin = document.querySelector('.navigation-block-close');

// const paddingLeft = document.querySelectorAll('.padding-left');

burger.addEventListener('click', () => {
  nav.classList.add('active-navigation');
  nav.classList.add('active-animation');
})

navClose.addEventListener('click', () => {
  if (window.innerWidth <= 992) {
    nav.classList.remove('active-navigation');
    nav.classList.remove('active-animation');
  } else {
    nav.style.left = '-100%';

    document.querySelectorAll('.padding-left').forEach(el => {
      el.style.paddingLeft = '88px';
    })

    navMin.classList.add('active');
  }
})



const navOpen = document.querySelector('.navigation-block-close__button-open');

navOpen.addEventListener('click', () => {

  navMin.classList.remove('active');

  nav.style.left = '0';

  document.querySelectorAll('.padding-left').forEach(el => {
    el.style.paddingLeft = '295px';
  })
})