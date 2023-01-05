
var swiper = new Swiper(".mySwiper", {
    loop: true,
    loopFillGroupWithBlank: true,

    // pagination: {
    //   el: ".swiper-pagination",
    //   clickable: true,
    // },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: "auto",
            spaceBetween: 24,
        },
        // when window width is >= 480px
        480: {
            slidesPerView: "auto",
            spaceBetween: 24,
        },
        // when window width is >= 640px
        640: {
            slidesPerView: "auto",
            spaceBetween: 24,
        },
        1024: {
            slidesPerView: "auto",
            spaceBetween: 32,
        },
        1336: {
            slidesPerView: 3,
            spaceBetween: 32
        }
    }
});

function toggleMenu() {
    alert(1);
}
