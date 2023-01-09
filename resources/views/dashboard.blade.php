@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-700">
                    <p class=" font-normal text-xs leading-3 text-blue-600 dark:text-gray-200 ">Romanos 15:13</p>
                    <h3 class=" font-bold text-xl leading-5 text-blue-800 dark:text-white  mt-2">Que Dios, quien nos da seguridad, los llene de alegría. Que les dé la paz que trae el confiar en él. Y que, por el poder del Espíritu Santo, los llene de esperanza.</h3>
                </div>

                <div class="w-full">
                    <div class="2xl:container 2xl:mx-auto">
                        <div class="bg-white dark:bg-gray-800 rounded shadow-lg py-5 px-7">
                            <nav class="flex justify-between">
                                <!-- For medium and plus-sized devices -->
                                <ul class="hidden md:flex flex-auto space-x-2">
                                    @can('lives.index')
                                        <a href="{{ url('/lives') }}"><li class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-blue-700 border border-blue-700 bg-gray-50 cursor-pointer px-3 py-2.5 font-normal text-sm leading-3 shadow-md rounded">Transmisiones</li></a>
                                    @endcan
                                    @can('roles.index')
                                        <a href="{{ url('/roles') }}"><li class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-blue-700 border border-blue-700 bg-gray-50 cursor-pointer px-3 py-2.5 font-normal text-sm leading-3 shadow-md rounded">Roles</li></a>
                                    @endcan
                                    @can('users.index')
                                        <a href="{{ url('/users') }}"><li class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-blue-700 border border-blue-700 bg-gray-50 cursor-pointer px-3 py-2.5 font-normal text-sm leading-3 shadow-md rounded">Usuarios</li></a>
                                    @endcan
                                </ul>
                            </nav>

                            <!-- for smaller devicees -->
                            <div class="block md:hidden w-full mt-5">
                                <div onclick="selectNew()" class="cursor-pointer px-4 py-3 text-white bg-blue-700 rounded flex justify-between items-center w-full">
                                    <div class="flex space-x-2">
                                        <span id="s1" class="font-semibold text-sm leading-3 hidden">Selected: </span>
                                        <p id="textClicked" class="font-normal text-sm leading-3 focus:outline-none hover:bg-gray-800 duration-100 cursor-pointer">Menú</p>
                                    </div>
                                    <img id="ArrowSVG" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/header-1-svg4.svg" alt="down arrow" class="rotate-180 transform" />
                                </div>
                                <div class="relative">
                                    <ul id="list" class="hidden font-normal text-base leading-4 absolute top-2 w-full rounded shadow-md z-20">
                                        <a href="{{ url('/lives') }}"><li class="px-4 py-3 text-gray-600 bg-gray-50 border border-gray-50 focus:outline-none focus:bg-gray-100 hover:bg-gray-100 duration-100 cursor-pointer text-sm leading-3 font-normal focus:text-black">Transmisiones</li></a>
                                        <a href="{{ url('/roles') }}"><li class="px-4 py-3 text-gray-600 bg-gray-50 border border-gray-50 focus:outline-none focus:bg-gray-100 hover:bg-gray-100 duration-100 cursor-pointer text-sm leading-3 font-normal focus:text-black">Roles</li></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
