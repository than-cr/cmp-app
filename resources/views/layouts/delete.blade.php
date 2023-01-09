<!--Modal-->
<div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="deleteModal">
    <!--modal content-->
    <div class="relative top-20 mx-auto p-5 border w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <form method="POST" action="" id="deleteForm">
                @method('delete')
                @csrf

                <label class="form-label">Presione eliminar, para confirmar que desea eliminar este registro</label>

                <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="focus:ring-2 focus:ring-offset-2 focus:ring-red-700 inline-flex ml-1.5 items-start justify-start px-6 py-3 bg-red-700 hover:bg-red-600 focus:outline-none rounded" id="btnSaveAddLive">
                        <p class="text-sm font-medium leading-none text-white">Eliminar</p>
                    </button>
                    <button id="btnCloseDeleteModal" type="button" class="focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 inline-flex ml-1.5 items-start justify-start px-6 py-3 bg-gray-100 hover:bg-blue-600 focus:outline-none rounded">
                        <p class="text-sm font-medium leading-none text-gray-800">Cancelar</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
