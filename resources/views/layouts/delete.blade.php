<!--Modal-->
<div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="deleteModal">
    <!--modal content-->
    <div class="relative top-20 mx-auto p-5 border w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <form method="POST" action="" id="deleteForm">
                @method('delete')
                @csrf

                <div class="form-group">
                    <button type="submit" id="btnDelete" class="rounded-md flex space-x-2 w-24 h-10 font-normal text-sm leading-3 text-blue-700 bg-white border border-blue-700 focus:outline-none focus:bg-gray-200 hover:bg-gray-200 duration-150 justify-center items-center">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
