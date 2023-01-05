import {getData} from "../common";

$(document).ready(function () {

    $("#province").on('change', function () {

        let provinceId = $("#province").val();

        $("#canton").empty().append($('<option>').val("").text('--Seleccionar--'));

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

});
