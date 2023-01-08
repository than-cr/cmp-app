<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', 'CMP')}}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <!-- Scripts -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
        <script type="text/JavaScript" src="https://MomentJS.com/downloads/moment-with-locales.js"></script>

        <script>
            let isOpen = false;
            function toggleMenu() {
                if (isOpen) {
                    $("#MobileNavigation").attr("class","hidden sm:hidden mt-4 mx-auto");
                } else {
                    $("#MobileNavigation").attr("class","mt-4 mx-auto");
                }
                isOpen = !isOpen;
            }
        </script>

        @vite(['resources/css/app.css', 'resources/css/welcome.css', 'resources/js/common.js', 'resources/js/services/index.js'])
    </head>
    <body class="antialiased">
        <div class="bg-white dark:bg-gray-800 ">
            <nav class="2xl:container 2xl:mx-auto sm:py-6 sm:px-7 py-5 px-4">
                <!-- For large and Medium-sized Screen -->
                <div class="flex justify-between ">
                    <div class="hidden sm:flex flex-row items-center space-x-6">
                        <a class="text-blue-700" href="https://www.facebook.com/cenmiscr">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>

                        <a class="text-blue-700" href="https://www.instagram.com/cenmiscr">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="flex space-x-3 items-center">
                        <h1 class="font-normal text-2xl leading-6 text-blue-700 dark:text-white">Centro Misionero Pentecostés</h1>
                    </div>
                    <div class="hidden sm:flex flex-row space-x-4">
                        @if (Route::has('login'))
                            <div class="hidden sm:flex flex-row space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}"  class="rounded-md flex space-x-2 w-24 h-10 font-normal text-sm leading-3 text-blue-700 bg-white border border-blue-700 focus:outline-none focus:bg-gray-200 hover:bg-gray-200 duration-150 justify-center items-center">Perfil</a>
                                @else
                                    <a href="{{ route('login') }}"  class="rounded-md flex space-x-2 w-24 h-10 font-normal text-sm leading-3 text-blue-700 bg-white border border-blue-700 focus:outline-none focus:bg-gray-200 hover:bg-gray-200 duration-150 justify-center items-center">Iniciar sesión</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"  class="rounded-md flex space-x-2 w-24 h-10 font-normal text-sm leading-3 text-blue-700 bg-white border border-blue-700 focus:outline-none focus:bg-gray-200 hover:bg-gray-200 duration-150 justify-center items-center">Registro</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>

                    <!-- Burger Icon -->
                    <div id="bgIcon" onclick="toggleMenu()"  class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800  flex justify-center items-center sm:hidden cursor-pointer">
                        <img class="dark:bg-white" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/header-3-svg6.svg" alt="burger" />
                        <img class="dark:bg-white hidden" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/header-3-svg7.svg" alt="cross" />
                    </div>
                </div>

                <!-- Mobile and small-screen devices (toggle Menu) -->
                <div id="MobileNavigation" class="hidden sm:hidden mt-4 mx-auto">
                    <div class="flex flex-row items-center justify-center space-x-6">
                        <a class="text-blue-700" href="https://www.facebook.com/cenmiscr">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                            </svg>
                        </a>

                        <a class="text-blue-700" href="https://www.instagram.com/cenmiscr">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="flex flex-col gap-4 mt-4 w-80 mx-auto ">
                        @if (Route::has('login'))
                            @auth()
                                <a href="{{ url('/dashboard') }}" class="rounded-md flex space-x-2 w-full h-10 font-normal text-sm leading-3 text-indigo-700 bg-indigo-600 bg-opacity-0 hover:opacity-100 duration-100 border border-indigo-700 focus:outline-none focus:bg-gray-200 hover:bg-gray-200 duration-150 justify-center items-center">Perfil</a>
                            @else
                                <a href="{{ route('login') }}" class="rounded-md flex space-x-2 w-full h-10 font-normal text-sm leading-3 text-indigo-700 bg-indigo-600 bg-opacity-0 hover:opacity-100 duration-100 border border-indigo-700 focus:outline-none focus:bg-gray-200 hover:bg-gray-200 duration-150 justify-center items-center" >Iniciar sesión</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-md flex space-x-2 w-full h-10 font-normal text-sm leading-3 text-indigo-700 bg-indigo-600 bg-opacity-0 hover:opacity-100 duration-100 border border-indigo-700 focus:outline-none focus:bg-gray-200 hover:bg-gray-200 duration-150 justify-center items-center" >Registrarse</a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>
            </nav>
        </div>

        <div class="py-12 flex lg:flex-row flex-col items-start lg:items-center justify-between ">
            <div class="mx-4 md:w-2/3 lg:w-auto md:mx-6 xl:ml-20  flex flex-col justify-start items-start">
                <h1 class="text-xl md:text-2xl xl:text-4xl font-semibold leading-6 xl:leading-10" >Una iglesia sana y fuerte con relaciones sólidas <span class="text-blue-700 ">que honren a nuestro Señor Jesucristo</span>.</h1>
                <p class="mt-4 text-base leading-normal text-gray-600">Fortalecer por medio del acompañamiento cercano a los miembros del Centro Misionero y sus familias</p>
            </div>

            <div class="mainDiv pl-4 md:pl-6 ">
                <div class="h-5 mt-6 mb-4 md:mt-0 lg:mb-0 flex justify-end items-end space-x-6 ">
                    <button aria-label="back" onclick="" class=" swiper-button-prev">
                        <img class="" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/content_9_svg1.svg" alt="back">

                    </button>
                    <button aria-label="next" onclick="" class=" swiper-button-next">
                        <img class=" transform rotate-180" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/content_9_svg1.svg" alt="next">
                    </button>
                </div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper" id="swiper">
                    @foreach($lives as $live)

                            <div class="swiper-slide shadow-xl mb-10 mt-5  rounded-xl ">
                                <div class="flex flex-col  space-y-4">
                                    <div class="rounded-t-xl  group cursor-pointer relative flex justify-center items-center">
                                        <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fcenmiscr%2Fvideos%2F{{$live->live_id}}%2F&width=1080" width="100%" height="100%" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
                                    </div>
                                    <div class="px-4 py-6 rounded-b-xl w-full flex justify-between  flex-col items-start ">
                                        <p class="text-sm leading-none text-gray-600">{!! ucfirst(\Carbon\Carbon::createFromDate($live->date)->translatedFormat('l d M')) !!}</p>
                                        <p class="mt-3 text-base font-semibold leading-none text-gray-800">{!! \Carbon\Carbon::createFromTimeString($live->time)->format('g:i A') !!}</p>
                                        <p class="text-sm font-semibold leading-none text-blue-700">{{$live->name}}</p>
                                    </div>
                                </div>
                            </div>
                  @endforeach
                    </div>
                </div>


{{--                <div class="swiper mySwiper">--}}
{{--                    <div class="swiper-wrapper" id="swiper">--}}
{{--                        <div class="swiper-slide shadow-xl mb-10 mt-5  rounded-xl ">--}}
{{--                            <div class="flex flex-col  space-y-4">--}}
{{--                                <div class="rounded-t-xl  group cursor-pointer relative flex justify-center items-center">--}}
{{--                                    <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fcenmiscr%2Fvideos%2F946374376351922%2F&width=1080" width="100%" height="100%" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>--}}
{{--                                </div>--}}
{{--                                <div class="px-4 py-6 rounded-b-xl w-full flex justify-between  flex-col items-start ">--}}
{{--                                    <p class="text-sm leading-none text-gray-600">Domingo 8 de Enero </p>--}}
{{--                                    <p class="mt-3 text-base font-semibold leading-none text-gray-800">10:30 am</p>--}}
{{--                                    <p class="text-sm font-semibold leading-none text-blue-700">La iglesia funcional</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="swiper-slide shadow-xl mb-10 mt-5  rounded-xl ">--}}
{{--                            <div class="flex flex-col  space-y-4">--}}
{{--                                <div class="rounded-t-xl  group cursor-pointer relative flex justify-center items-center">--}}
{{--                                    <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fcenmiscr%2Fvideos%2F709508567329998%2F&width=1080" width="100%" height="100%" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>--}}
{{--                                </div>--}}
{{--                                <div class="px-4 py-6 rounded-b-xl w-full flex justify-between  flex-col items-start ">--}}
{{--                                    <p class="text-sm leading-none text-gray-600">Domingo 8 de Enero </p>--}}
{{--                                    <p class="mt-3 text-base font-semibold leading-none text-gray-800">8:30 am</p>--}}
{{--                                    <p class="text-sm font-semibold leading-none text-blue-700">Caminando hacia la madurez</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="swiper-slide shadow-xl mb-10 mt-5  rounded-xl ">--}}
{{--                            <div class="flex flex-col  space-y-4">--}}
{{--                                <div class="rounded-t-xl  group cursor-pointer relative flex justify-center items-center">--}}
{{--                                    <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fcenmiscr%2Fvideos%2F916516816387262%2F&width=1080" width="100%" height="100%" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>--}}
{{--                                </div>--}}
{{--                                <div class="px-4 py-6 rounded-b-xl w-full flex justify-between  flex-col items-start ">--}}
{{--                                    <p class="text-sm leading-none text-gray-600">Martes 3 de Enero </p>--}}
{{--                                    <p class="mt-3 text-base font-semibold leading-none text-gray-800">7:10 pm</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </body>
</html>
