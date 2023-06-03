@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-700">
                    {{ __("Transmisiones") }}
                </div>

                <div class="p-6 text-blue-700">
                       <table class="w-full whitespace-nowrap" style="display: block ;overflow-x: auto;">
                           <tbody>
                               <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 dark:border-gray-600 rounded">

                                   <td class="text-center">
                                       <div class="flex items-center pl-5">
                                           <p class="text-base font-medium leading-none text-blue-700 dark:text-white  mr-2">Nombre</p>
                                       </div>
                                   </td>

                                   <td class="text-center">
                                       <div class="flex items-center pl-5">
                                           <p class="text-base font-medium leading-none text-blue-700 dark:text-white  mr-2">Identificador</p>
                                       </div>
                                   </td>

                                   <td class="text-center">
                                       <div class="flex items-center pl-5">
                                           <p class="text-base font-medium leading-none text-blue-700 dark:text-white  mr-2">Fecha</p>
                                       </div>
                                   </td>

                                   <td class="text-center">
                                       <div class="flex items-center pl-5">
                                           <p class="text-base font-medium leading-none text-blue-700 dark:text-white  mr-2">Hora</p>
                                       </div>
                                   </td>

                                   <td class="content-center" style="width: 20%">
                                       <div class="flex items-center pl-5">
                                           <p class="text-base font-medium leading-none text-blue-700 dark:text-white  mr-2">Acción</p>
                                       </div>
                                   </td>
                               </tr>

                               <tr class="h-3"></tr>

                               @foreach($lives as $live)
                                   <tr tabindex="0" class="focus:outline-none  h-16 border border-gray-100 dark:border-gray-600  rounded">

                                       <td class="">
                                           <div class="flex items-center pl-5">
                                               <p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">{{ $live->name }}</p>
                                           </div>
                                       </td>

                                       <td class="">
                                           <div class="flex items-center pl-5">
                                               <p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">{{ $live->live_id }}</p>
                                           </div>
                                       </td>

                                       <td class="">
                                           <div class="flex items-center pl-5">
                                               <p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">{!! ucfirst(\Carbon\Carbon::createFromDate($live->date)->translatedFormat('l d M')) !!}</p>
                                           </div>
                                       </td>

                                       <td class="">
                                           <div class="flex items-center pl-5">
                                               <p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">{!! \Carbon\Carbon::createFromTimeString($live->time)->format('g:i A') !!}</p>
                                           </div>
                                       </td>

                                       <td class="">
                                           <div class="flex items-center pl-5">
                                               <button id="btnEditLive"  class="rounded-md flex space-x-2 w-24 h-10 font-normal text-sm leading-3 text-blue-700 bg-white border border-blue-700 focus:outline-none focus:bg-gray-200 hover:bg-gray-200 duration-150 justify-center items-center" onclick="getLiveData({{ $live->id }})">Editar</button>
                                               <button id="btnDeleteLive" class="rounded-md flex space-x-2 w-24 h-10 font-normal text-sm leading-3 text-blue-700 bg-white border border-blue-700 focus:outline-none focus:bg-gray-200 hover:bg-gray-200 duration-150 justify-center items-center" onclick="deleteLive({{ $live->id }})">Eliminar</button>
                                           </div>
                                       </td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>
                        {{ $lives->links() }}
                       <br>
                    <button id="addLiveBtn" class="focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 inline-flex ml-1.5 items-start justify-start px-6 py-3 bg-blue-700 hover:bg-blue-600 focus:outline-none rounded text-white" >Crear live</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal-->
    <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="addLiveModal">
        <!--modal content-->
        <div class="relative top-20 mx-auto p-5 border w-1/4 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <form method="POST" action="{{ route('lives.store') }}">
                    <input type="hidden" id="_update" value="false" />
                    <input type="hidden" id="_identifier" value="0" />
                    @csrf
                    <br>
                    <div class="flex flex-col lg:mr-16">
                        <label for="name" class="text-gray-800 dark:text-gray-100 text-sm font-bold leading-tight tracking-normal mb-2 text-left">Nombre del live</label>
                        <input id="name" name="name" autocomplete="off" class="text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 dark:focus:border-indigo-700 dark:border-gray-700 dark:bg-gray-800 bg-white font-normal w-64 h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" required placeholder="Nombre del live / Título del mensaje" />
                    </div>
                    <br>

                    <div class="flex flex-col lg:mr-16">
                        <label for="identifier" class="text-gray-800 dark:text-gray-100 text-sm font-bold leading-tight tracking-normal mb-2 text-left">Identificador</label>
                        <input id="identifier" name="identifier" autocomplete="off" class="text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 dark:focus:border-indigo-700 dark:border-gray-700 dark:bg-gray-800 bg-white font-normal w-64 h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" required placeholder="Identificador" />
                    </div>
                    <br>

                    <div class="flex flex-col lg:mr-16">
                        <label for="date" class="text-gray-800 dark:text-gray-100 text-sm font-bold leading-tight tracking-normal mb-2 text-left">Fecha</label>
                        <input type="date" id="date" name="date" autocomplete="off" class="text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 dark:focus:border-indigo-700 dark:border-gray-700 dark:bg-gray-800 bg-white font-normal w-64 h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" required/>
                    </div>
                    <br>

                    <div class="flex flex-col lg:mr-16">
                        <label for="time" class="text-gray-800 dark:text-gray-100 text-sm font-bold leading-tight tracking-normal mb-2 text-left">Hora</label>
                        <input type="time" id="time" name="time" autocomplete="off" class="text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 dark:focus:border-indigo-700 dark:border-gray-700 dark:bg-gray-800 bg-white font-normal w-64 h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" required/>
                    </div>
                    <br>

                    <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 inline-flex ml-1.5 items-start justify-start px-6 py-3 bg-blue-700 hover:bg-blue-600 focus:outline-none rounded" id="btnSaveAddLive">
                            <p class="text-sm font-medium leading-none text-white">Guardar</p>
                        </button>
                        <button id="btnCloseAddModal" type="button" class="focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 inline-flex ml-1.5 items-start justify-start px-6 py-3 bg-gray-100 hover:bg-blue-600 focus:outline-none rounded">
                            <p class="text-sm font-medium leading-none text-gray-800">Cancelar</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('layouts.delete')

@endsection

