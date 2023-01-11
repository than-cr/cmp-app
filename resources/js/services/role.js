import {getData, postData, saveData, showErrorAlert, showSuccessAlert} from "../common";

$(document).ready(function () {

    function clearAndCloseModal() {
        $("#_identifier").val("0");
        $("#_update").val("false");
        $("#all_permission").prop('checked', false);
        $("[name*='permission']").prop('checked', false);
        $("#addRoleModal").css('display',"none");
    }

    $("#addRoleBtn").on('click', function () {
        $("#_update").val("false");
        $("#_identifier").val("0");

        $("[name*='row']").prop('checked', false);

        $("#saveRoleLabel").text("Crear Rol");
        $("#addRoleModal").css('display',"block");
    });

    $("#btnCloseAddModal").click(function () {
        clearAndCloseModal();
    });

    $("#btnSaveAddRole").click(function (event) {
        event.preventDefault();
        let permissions = []

        $.each($("[name*='permission']"), function () {
            if (this.checked) {
                permissions.push(this.value);
            }
        });

        let object = {
            'name' : $('#name').val(),
            'permission' : permissions
        }

        const token =  $('input[name="_token"]').val();
        let jsonData = JSON.stringify(object);

        let isUpdate = $("#_update").val() == "true";

        let url = '/roles'
        if (isUpdate)
        {
            url += '/' + $("#_identifier").val();
        }

        saveData(token, url, jsonData, isUpdate, function (response) {
            if (response.status == null) {
                showSuccessAlert(function () {
                    location.reload();
                });
            } else {
                showErrorAlert(function () {
                    location.reload();
                });
            }
            clearAndCloseModal();
        });
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

window.getRole = function (id)
{
    let url = '/roles/' + id + '/edit'

    $("#_identifier").val(id);
    $("#_update").val("true");

    getData(url, function (response) {
        const nameIndex = 0;
        const permissionIndex = 1;

        $("#name").val(response[nameIndex].name);

        $.each(response[permissionIndex], function () {
            $("[name='permission[" + this + "]").prop("checked", true);
        });
    });

    $("#saveRoleLabel").text("Actualizar Rol");

    $("#addRoleModal").css('display',"block");
}

