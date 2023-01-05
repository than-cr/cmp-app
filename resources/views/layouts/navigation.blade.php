<div class=" h-full relative">
    <div class="bg-white dark:bg-gray-800">
        <div class="2xl:container 2xl:mx-auto">
            <nav class="">
                <div class=" flex flex-row justify-between">
                    <div class=" flex space-x-3 items-center py-5 lg:pl-7 sm:pl-6 py-6 pl-4 pr-8">
                        <a href="/">
                            <h1 class="dark:text-white  font-normal text-2xl leading-6 text-blue-700">CMP</h1>
                        </a>
                    </div>

                    <!-- For large (i.e. desktop and laptop sized screen) -->
                    <div class="lg:flex hidden flex-auto justify-between flex-row px-7 border-l border-r border-gray-200 py-6">
                        <div class="">
                            <p class=" font-normal text-xs leading-3 text-blue-600 dark:text-gray-200 ">{{ Auth::user()->name }}</p>
                            <h3 class=" font-bold text-xl leading-5 text-blue-800 dark:text-white  mt-2">Bienvenido</h3>
                        </div>
                    </div>
                    <div class=" hidden sm:flex justify-end flex-row lg:pr-7 sm:pr-6 py-6 pr-4 pl-8">
                        <div class=" flex justify-center items-center flex-row">
                            <div class="text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                            </div>


                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                            <div class="ml-2">
                                                <p class="text-lg leading-4 font-semibold text-gray-800 dark:text-white ">{{ Auth::user()->name }}</p>
                                                <p class=" font-normal text-xs leading-3 text-gray-600 dark:text-gray-200  mt-1">{{ Auth::user()->district->name }}</p>
                                            </div>

                                            <div class="ml-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Perfil') }}
                                        </x-dropdown-link>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                {{ __('Cerrar sesión') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>

                        </div>
                    </div>

                    <!-- Burger Icon -->
                    <button id="toggleMenu">
                        <div id="bgIcon" class=" focus:outline-none focus:ring focus:ring-offset-2 focus:ring-gray-800 block sm:hidden cursor-pointer lg:pr-7 sm:pr-6 py-6 pr-4">
                            <img class="dark:bg-white" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/header-4-svg5.svg" alt="burger" />
                            <img class=" hidden dark:bg-white" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/header-4-svg6.svg" alt="cross" />
                        </div>
                    </button>
                </div>
            </nav>
        </div>
    </div>
    <!-- Mobile and Small devices Navigation -->

    <div id="MobileNavigation" class="hidden transform duration-150 sm:hidden h-full bg-white dark:bg-gray-800 ">
        <div class=" flex flex-col justify-between h-auto ">
            <div class=" flex flex-col lg:px-7 sm:px-6 px-4">
                <hr class=" w-full bg-gray-200 ">
                <div class="lg:hidden flex flex-auto justify-between mt-3 flex-row pb-4">
                    <div class="">
                        <p class=" font-normal text-xs leading-3 text-blue-700 dark:text-gray-200 ">{{ Auth::user()->name }}</p>
                        <h3 class=" font-bold text-xl leading-5 text-gray-800 dark:text-white  mt-2">Bienvenido</h3>
                    </div>
                </div>
                <div class=" w-auto sm:w-96 focus:outline-none focus:ring foucs:ring-offset-2 focus:ring-gray-800 bg-gray-50 flex items-center pl-4  space-x-3 rounded mt-4 ">

                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Inicio') }}
                        </x-responsive-nav-link>
                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-responsive-nav-link>
                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
