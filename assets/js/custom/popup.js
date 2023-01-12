try {
const reviewsBtn = document.querySelector('.banner-swiper__btn')
const overlay = document.querySelector('.overlay')
const popup = document.querySelector('.popup')
const popupClose = document.querySelector('.popup__close')
const body = document.body

reviewsBtn.addEventListener('click', () => {
    overlay.classList.add('active-p')
    popup.classList.add('active-p')
    body.classList.add('no-scroll')
})

popupClose.addEventListener('click', () => {
    overlay.classList.remove('active-p')
    popup.classList.remove('active-p')
    body.classList.remove('no-scroll')
})
} catch {}


try {
// rating >>>
const rating = document.querySelector('.rating')
const ratingItem = document.querySelectorAll('.rating__item')

rating.addEventListener('click', e => {
    const target = e.target
    if(target.classList.contains('rating__item')) {
        removeClass(ratingItem, 'current-active')
        target.classList.add('active', 'current-active')
    }
})

rating.addEventListener('mouseover', e => {
    const target = e.target
    if(target.classList.contains('rating__item')) {
        removeClass(ratingItem, 'active')
        target.classList.add('active')
        mouseOverActiveClass(ratingItem)
    }
})

rating.addEventListener('mouseout', e => {
    addClass(ratingItem, 'active')
    mouseOutActiveClass(ratingItem)
})
} catch {}

function removeClass(arr) {
    for(let i = 0, ilen = arr.length; i < ilen; i++) {
        for(let j = 1; j < arguments.length; j++) {
            ratingItem[i].classList.remove(arguments[j]);
        }
    }
}
function addClass(arr) {
    for(let i = 0, ilen = arr.length; i < ilen; i++) {
        for(let j = 1; j < arguments.length; j++) {
            ratingItem[i].classList.add(arguments[j]);
        }
    }
}

function mouseOverActiveClass(arr) {
    for(let i = 0, ilen = arr.length; i < ilen; i++) {
        if(arr[i].classList.contains('active')) {
            break;
        } else {
            arr[i].classList.add('active');
        }
    }
}

function mouseOutActiveClass(arr) {
    for(let i = arr.length-1; i >= 1; i--) {
        if(arr[i].classList.contains('current-active')) {
            break;
        } else {
            arr[i].classList.remove('active');
        }
    }
}