import {deleteData, getData, postData, saveData, showErrorAlert, showSuccessAlert} from "../common";

$(document).ready(function () {
    function clearAndCloseModal() {
        $("#_identifier").val("0");
        $("#_update").val("false");
        $("#name").val("");
        $("#identifier").val("");
        $("#date").val("");
        $("#time").val("");
        $("#addLiveModal").css('display',"none");
    }

    $("#addLiveBtn").on('click', function () {
        $("#_update").val("false");
        $("#_identifier").val("0");
        $("#addLiveModal").css('display',"block");
    });

    $("#btnCloseAddModal").click(function () {
        clearAndCloseModal();
    });

    $("#btnCloseDeleteModal").click(function () {
        $("#deleteModal").css('display',"none");
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

        let isUpdate = $("#_update").val() == "true";

        let url = '/lives'
        if (isUpdate)
        {
            url += '/' + $("#_identifier").val();
        }

        saveData(token, url , jsonData, isUpdate, function (response) {
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
        });
    })
});

window.getLiveData = function (id) {
    const url = 'lives/' + id + '/edit'
    $("#_identifier").val(id);

    getData(url, function (response) {
        $("#_update").val("true");
        $("#name").val(response.name);
        $("#identifier").val(response.live_id);
        $("#date").val(response.date);
        $("#time").val(response.time);

        $("#addLiveModal").css('display',"block");
    });
}

window.deleteLive = function (id) {
    $('#deleteForm').attr('action', '/lives/' + id);
    $("#deleteModal").css('display',"block");
}
