import {getData, saveData, showErrorAlert, showSuccessAlert} from "../common";

$(document).ready(function () {

    $("#province").on('change', function () {
        let provinceId = $("#province").val();

        $("#canton").empty().append($('<option>').val("").text('--Seleccionar--'));
        $("#district").empty().append($('<option>').val("").text('--Seleccionar--'));

        if (provinceId != "") {
            getData('/cantons/' + provinceId, function (response) {
                $.each(response, function () {
                    $("#canton").append($('<option>').val(this.id).text(this.name));
                });
            });
        }
    });

    $("#canton").on('change', function () {
        let cantonId = $("#canton").val();

        $("#district").empty().append($('<option>').val("").text('--Seleccionar--'));

        if (cantonId != "") {
            getData('/districts/' + cantonId, function (response) {
                $.each(response, function () {
                    $("#district").append($('<option>').val(this.id).text(this.name));
                });
            });
        }
    });

    function clearAndCloseModal() {
        $("#_identifier").val("0");
        $("#_update").val("false");
        $("#name").val("");
        $("#motherLastName").val("");
        $("#phoneNumber").val("");
        $("#birthDate").val("");
        $("#canton").empty().append($('<option>').val("").text('--Seleccionar--'));
        $("#district").empty().append($('<option>').val("").text('--Seleccionar--'));
        $("#addUserModal").css('display',"none");
    }

    $("#btnCloseAddModal").click(function () {
        clearAndCloseModal();
    });

    $("#btnSaveUser").click(function () {
        event.preventDefault();

        let object = {
            "name" : $("#name").val(),
            "lastName" : $("#lastName").val(),
            "motherLastName" : $("#motherLastName").val(),
            "phoneNumber" : $("#phoneNumber").val(),
            "email" : $("#email").val(),
            "birthDate" : $("#birthDate").val(),
            "district_id" : $("#district").val()
        };

        const token =  $('input[name="_token"]').val();
        let jsonData = JSON.stringify(object);
        let isUpdate = $("#_update").val() == "true";

        let url = 'users/' + $("#_identifier").val();

        saveData(token, url, jsonData, isUpdate, function (response) {
            if (response.status == null) {
                showSuccessAlert(function () {
                    clearAndCloseModal();
                    location.reload();}
                );
            } else {
                showErrorAlert(function () {
                    clearAndCloseModal();
                    location.reload();}
                );
            }
            clearAndCloseModal();
        })
    });
});

window.getUserData = function (id) {
    let url = '/users/' + id + '/edit'

    $("#_identifier").val(id);

    getData(url, function (response) {

        let userData = response;
        $("#_update").val(true);
        $("#name").val(userData.name);
        $("#lastName").val(userData.lastName);
        $("#motherLastName").val(userData.motherLastName);
        $("#phoneNumber").val(userData.phoneNumber);
        $("#email").val(userData.email);
        $("#birthDate").val(userData.birthDate);
        $("#district").empty()

        response = null;

        let provinceCantonUrl = '/users/provincecanton/' + id;
        getData(provinceCantonUrl, function (response) {

            let result = response;
            $("#province").children('[value=' + result.province + ']').attr('selected', true);

            getData('/cantons/' + result.province, function (response) {
                $.each(response, function () {
                    $("#canton").append($('<option>').val(this.id).text(this.name));
                });

                $("#canton").children('[value=' + result.canton + ']').attr('selected', true);
            });

            getData('/districts/' + result.canton, function (response) {
                $.each(response, function () {
                    $("#district").append($('<option>').val(this.id).text(this.name));
                });

                $("#district").children('[value=' + userData.district_id + ']').attr('selected', true);
            });
        });

        $("#addUserModal").css('display',"block");
    })
}
