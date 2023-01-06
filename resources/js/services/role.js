import {getData} from "../common";

$(document).ready(function () {
    $("#addRoleBtn").on('click', function () {
        getData('roles/create', function (response) {
            let tableBody = $("#tbody");
            let index = 0;
            $.each(response, function () {
                tableBody.append(
                    '<tr name="row' + index + '">' +
                    '<td><div className="ml-5"><div className="bg-gray-200 dark:bg-gray-800  rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative">' +
                    '<input placeholder="checkbox" type="checkbox" className="focus:opacity-100 checkbox w-full h-full permission" name="permission[' + this.name + ']" value="' + this.name + '" />' +
                    '<div className="check-icon hidden bg-indigo-700 text-white rounded-sm"><img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/tasks-svg7.svg" alt="check-icon"></div></div></div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="flex items-center pl-5">' +
                    '<p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">' + this.name +'</p>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="flex items-center pl-5">' +
                    '<p class="text-base font-medium leading-none text-gray-700 dark:text-white  mr-2">' + this.guard_name +'</p>' +
                    '</div>' +
                    '</td>' +
                    '</tr>');
            });
        });

        $("#addRoleModal").css('display',"block");
    })

    $("#btnCloseAddModal").click(function () {
        $("[name*='row']").remove();
        $("#addRoleModal").css('display',"none");
    })

    $("#all_permission").on('click', function() {

        if($(this).is(':checked')) {
            $.each($("[name*='permission']") , function() {
                $(this).prop('checked',true);
            });

        } else {
            $.each($("[name*='permission']") , function() {
                $(this).prop('checked',false);
            });
        }
    });
});


