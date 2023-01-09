import {getData} from "../common";

$(document).ready(function () {

    function clearAndCloseModal() {
        $("#_identifier").val("0");
        $("#_update").val("false");
        $("#name").val("");
        $("#motherLastName").val("");
        $("#phoneNumber").val("");
        $("#birthDate").val("");
        $("#district").empty().append($('<option>').val("").text('--Seleccionar--'));
        $("#addUserModal").css('display',"none");
    }

    $("#btnCloseAddModal").click(function () {
        clearAndCloseModal();
    });
});

window.getUserData = function (id) {
    let url = '/users/' + id

    $("#_identifier").val(id);

    getData(url, function (response) {
        $("#name").val(response.name);
        $("#lastName").val(response.lastName);
        $("#motherLastName").val(response.motherLastName);
        $("#phoneNumber").val(response.phoneNumber);
        $("#email").val(response.email);
        $("#birthDate").val(response.birthDate);
        $("#district").empty()

        // getData('/cantons/' + provinceId, function (response) {
        //     $.each(response, function () {
        //         $("#canton").append($('<option>').val(this.id).text(this.name));
        //     });
        // });
        //
        // getData('/districts/' + cantonId, function (response) {
        //     $.each(response, function () {
        //         $("#district").append($('<option>').val(this.id).text(this.name));
        //     });
        // });

        $('#district[value="' + response.district_id + '"]').prop("selected", true);


        $("#addUserModal").css('display',"block");
    })
}
