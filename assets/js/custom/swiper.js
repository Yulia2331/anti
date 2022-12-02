const bannerSlider = new Swiper('.swiper', {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    navigation: {
        nextEl: '.nav-next',
        prevEl: '.nav-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        type: 'fraction',
    },
});