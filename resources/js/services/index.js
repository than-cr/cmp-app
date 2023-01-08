import {getData} from "../common";
import * as moment from 'moment';
import 'moment/locale/es-us';

var swiper = new Swiper(".mySwiper", {
    loop: true,
    loopFillGroupWithBlank: true,

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
//
// $(document).ready(function () {
//     getData('/lives', function (response) {
//
//         var localLocale = moment('1993-10-23');
//
//         moment.locale('es');
//         alert(moment.locale());
//         localLocale.locale(false);
//         alert(localLocale.format('MMMM -DD-YYYY'));
//
//         $.each(response, function () {
//             $("#swiper").append(
//                 '<div class="swiper-slide shadow-xl mb-10 mt-5  rounded-xl ">' +
//                 '<div class="flex flex-col  space-y-4">' +
//                 '<div class="rounded-t-xl  group cursor-pointer relative flex justify-center items-center">' +
//                 '<iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fcenmiscr%2Fvideos%2F709508567329998%2F&width=1080" width="100%" height="100%" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>' +
//                 '</div>' +
//                 '<div class="px-4 py-6 rounded-b-xl w-full flex justify-between  flex-col items-start ">' +
//                 '<p class="text-sm leading-none text-gray-600">Domingo 8 de Enero </p>' +
//                 '<p class="mt-3 text-base font-semibold leading-none text-gray-800">8:30 am</p>' +
//                 '<p class="text-sm font-semibold leading-none text-blue-700">Caminando hacia la madurez</p>' +
//                 '</div></div></div>');
//         });
//     });
// })
//
//
