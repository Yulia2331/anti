
const rating = document.querySelector('.rating')
const ratingItem = document.querySelectorAll('.rating__item')

rating.addEventListener('click', e => {
  const target = e.target;
  if (target.classList.contains('rating__item')) {
    removeClass(ratingItem, 'current-active')
    target.classList.add('rating-active', 'current-active');
  }
})

rating.addEventListener('mouseover', e => {
    const target = e.target
    if(target.classList.contains('rating__item')) {
        removeClass(ratingItem, 'rating-active')
        target.classList.add('rating-active')
        mouseOverActiveClass(ratingItem)
    }
})

rating.addEventListener('mouseout', e => {
  addClass(ratingItem, 'rating-active')
  mouseOutActiveClass(ratingItem)
})

function addClass(arr) {
    for(let i = 0, ilen = arr.length; i < ilen; i++) {
        for(let j = 1; j < arguments.length; j++) {
            ratingItem[i].classList.add(arguments[j]);
        }
    }
}

function removeClass(arr) {
    for(let i = 0, ilen = arr.length; i < ilen; i++) {
        for(let j = 1; j < arguments.length; j++) {
            ratingItem[i].classList.remove(arguments[j]);
        }
    }
}

function mouseOverActiveClass(arr) {
    for(let i = 0, ilen = arr.length; i < ilen; i++) {
        if(arr[i].classList.contains('rating-active')) {
            break;
        } else {
            arr[i].classList.add('rating-active');
        }
    }
}

function mouseOutActiveClass(arr) {
    for(let i = arr.length-1; i >= 1; i--) {
        if(arr[i].classList.contains('current-active')) {
            break;
        } else {
            arr[i].classList.remove('rating-active');
        }
    }
}