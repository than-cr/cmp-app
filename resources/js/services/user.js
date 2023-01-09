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

        let userData = response;
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
