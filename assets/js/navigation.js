const nav = document.querySelector('.navigation-block');
const burger = document.querySelector('.header__burger');
const navClose = document.querySelector('.navigation-block__button');
const navMin = document.querySelector('.navigation-block-close');

// const paddingLeft = document.querySelectorAll('.padding-left');

try {
burger.addEventListener('click', () => {
  nav.classList.add('active-navigation');
  nav.classList.add('active-animation');
})
} catch {}

try {
navClose.addEventListener('click', () => {
  if (window.innerWidth <= 992) {
    nav.classList.remove('active-navigation');
    nav.classList.remove('active-animation');
  } else {
    nav.style.left = '-20%';

    document.querySelectorAll('.padding-left').forEach(el => {
      el.style.paddingLeft = '88px';
    })

    navMin.classList.add('active');
  }
})
} catch {}

try {
const navOpen = document.querySelector('.navigation-block-close__button-open');

navOpen.addEventListener('click', () => {

  navMin.classList.remove('active');

  nav.style.left = '0';

  document.querySelectorAll('.padding-left').forEach(el => {
    el.style.paddingLeft = '295px';
  })
})
} catch {}

try {
const navigationItem = document.querySelectorAll('.navigation__item');
const activFlex = document.querySelectorAll('.active-flex');

navigationItem.forEach(item => {
  item.addEventListener('click', e => {
    const target = e.target;

    if (target.classList.contains('navigation__button')) {
      const path = target.dataset.value;

      document.querySelectorAll(`[data-target="${path}"]`).forEach(sub => {
        sub.closest('.navigation__sub-menu').classList.toggle('active-flex');
      })

      document.querySelectorAll(`[data-marker="${path}"]`).forEach(mark => {
        mark.closest('.navigation__marker').classList.toggle('marker-down');
      })
    }
  })
})
} catch {}