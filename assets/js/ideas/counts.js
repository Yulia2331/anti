const counters = document.querySelectorAll('.create-reviews__count');
const moreBtn = document.querySelectorAll('.create-reviews__more')

if (counters) {
  counters.forEach(counter => {
    counter.addEventListener('click', e => {
      const target = e.target;

      if (target.closest('.create-reviews__btn')) {
        let value = parseInt(target.closest('.create-reviews__count').querySelector('.create-reviews__num').innerText)

        if(target.classList.contains('create-reviews__more')) {
          value++;
        } else {
          --value;
        }

        if (value <= 0) {
          target.closest('.create-reviews__count').querySelector('.create-reviews__less').classList.add('disabled');
        } else {
          target.closest('.create-reviews__count').querySelector('.create-reviews__less').classList.remove('disabled');
        }

        if (value >= 5) {
          target.closest('.create-reviews__count').querySelector('.create-reviews__more').classList.add('disabled');
        } else {
          target.closest('.create-reviews__count').querySelector('.create-reviews__more').classList.remove('disabled');
        }

        target.closest('.create-reviews__count').querySelector('.create-reviews__num').innerText = value;
      }
    })
  })
}