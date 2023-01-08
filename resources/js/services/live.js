import {getData, postData, showErrorAlert, showSuccessAlert} from "../common";

$(document).ready(function () {
    function clearAndCloseModal() {
        //$("[name*='row']").remove();
        $("#addLiveModal").css('display',"none");
    }

    $("#addLiveBtn").on('click', function () {
        $("#addLiveModal").css('display',"block");
    });

    $("#btnCloseAddModal").click(function () {
        clearAndCloseModal();
    });

    $("#btnSaveAddLive").click(function (event) {
        event.preventDefault();

        let object = {
            'name' : $("#name").val(),
            'live_id' : $("#identifier").val(),
            'date' : $("#date").val(),
            'time' : $("#time").val(),
        }

        const token =  $('input[name="_token"]').val();

        let jsonData = JSON.stringify(object);
        postData(token, '/lives', jsonData, function (response) {
            if (response.status == null) {
                showSuccessAlert(function () {location.reload();});
            } else {
                showErrorAlert();
            }
            clearAndCloseModal();
        });
    })
});
