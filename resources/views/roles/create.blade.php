@extends('layouts.app')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-700">
                    {{ __("Crear rol") }}
                </div>

                <div class="p-6 text-blue-700">
                   <form method="POST" action="{{ route('roles.store') }}">
                       @csrf

                       <div class="flex flex-col lg:mr-16">
                           <label for="name" class="text-gray-800 dark:text-gray-100 text-sm font-bold leading-tight tracking-normal mb-2">Nombre del rol</label>
                           <input id="name" name="name" autocomplete="off" class="text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 dark:focus:border-indigo-700 dark:border-gray-700 dark:bg-gray-800 bg-white font-normal w-64 h-10 flex items-center pl-3 text-sm border-gray-300 rounded border shadow" placeholder="Rol" />
                       </div>

                       <br>
                       <label for="permissions" class="form-label">Asignar permisos</label>

                       <table class="w-full whitespace-nowrap">
                           <tbody>
                               <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 dark:border-gray-600 rounded">

                                   <!-- Assign all permissions -->
                                   <td class="text-center">
                                       <div class="ml-5">
                                           <div class="bg-gray-200 dark:bg-gray-800  rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative">
                                               <input placeholder="checkbox" type="checkbox" class="focus:opacity-100 checkbox w-full h-full" id="all_permission"/>
                                               <div class="check-icon hidden bg-indigo-700 text-white rounded-sm">
                                                   <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/tasks-svg7.svg" alt="check-icon">
                                               </div>
                                           </div>
                                       </div>
                                   </td>

                                   <td class="text-center">
                                       <div class="flex items-center pl-5">
                                           <p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">Permiso</p>
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-check" viewBox="0 0 16 16">
                                               <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708L7.293 1.5Z"/>
                                               <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
                                           </svg>
                                       </div>
                                   </td>

                                   <td class="content-center">
                                       <div class="flex items-center pl-5">
                                           <p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">Guardia</p>
                                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-check" viewBox="0 0 16 16">
                                               <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                                               <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                           </svg>
                                       </div>
                                   </td>
                               </tr>

                               <tr class="h-3"></tr>

                               @foreach($permissions as $permission)
                                   <tr tabindex="0" class="focus:outline-none  h-16 border border-gray-100 dark:border-gray-600  rounded">
                                       <td>
                                           <div class="ml-5">
                                               <div class="bg-gray-200 dark:bg-gray-800  rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative">
{{--                                                   <input placeholder="checkbox" type="checkbox" class="permission focus:opacity-100 checkbox opacity-0 absolute cursor-pointer w-full h-full" name="permission[{{ $permission->name }}]" value="{{ $permission->name }}"/>--}}
                                                   <input placeholder="checkbox" type="checkbox" class="focus:opacity-100 checkbox w-full h-full permission" name="permission[{{ $permission->name }}]" value="{{ $permission->name }}"/>
                                                   <div class="check-icon hidden bg-indigo-700 text-white rounded-sm">
                                                       <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/tasks-svg7.svg" alt="check-icon">
                                                   </div>
                                               </div>
                                           </div>
                                       </td>

                                       <td class="">
                                           <div class="flex items-center pl-5">
                                               <p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">{{ $permission->name }}</p>
                                           </div>
                                       </td>

                                       <td class="">
                                           <div class="flex items-center pl-5">
                                               <p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">{{ $permission->guard_name }}</p>
                                           </div>
                                       </td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>

                       <br>

                       <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 inline-flex ml-1.5 items-start justify-start px-6 py-3 bg-blue-700 hover:bg-blue-600 focus:outline-none rounded">
                           <p class="text-sm font-medium leading-none text-white">Crear rol</p>
                       </button>
                   </form>
                </div>
            </div>
        </div>
    </div>
@endsection
