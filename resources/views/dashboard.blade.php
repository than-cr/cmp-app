@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-700">
                    <p class=" font-normal text-xs leading-3 text-blue-600 dark:text-gray-200 ">Romanos 15:13</p>
                    <h3 class=" font-bold text-xl leading-5 text-blue-800 dark:text-white  mt-2">Que Dios, quien nos da seguridad, los llene de alegría. Que les dé la paz que trae el confiar en él. Y que, por el poder del Espíritu Santo, los llene de esperanza.</h3>
                </div>

                <div class="p-6">
                    @can('lives.index')
                        <a href="{{ url('/lives') }}"  class="rounded-md flex space-x-2 w-28 h-10 font-normal text-sm leading-3 text-blue-700 bg-white border border-blue-700 focus:outline-none focus:bg-gray-200 hover:bg-gray-200 duration-150 justify-center items-center">Transmisiones</a>
                    @endcan

                </div>

            </div>
        </div>
    </div>
@endsection
