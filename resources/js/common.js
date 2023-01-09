import swal from "sweetalert";

export function getData(url, callback) {
    $.ajax({
        type: 'GET',
        url: url,
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Content-Type", "application/json");
        },

        success: function (response) {
            if (response) {
                callback(response);
            }
        },
        error: function (e) {
            if (e.status !== 403) {
                showErrorAlert();
            }
        },
    });
};

export function postData(token, url, jsonData, callback) {
    $.ajaxSetup({
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', token);
        }
    });
    $.ajax({
        url: url,
        type: "POST",
        contentType: "application/json; charset=utf-8",
        data: jsonData,
        success: function (response) {
            if (callback) {
                callback(response);
            }
        },
        error: function (response) {
            if (callback) {
                callback(response);
            }
        }
    });
}

export function updateData(token, url, jsonData, callback) {
    $.ajaxSetup({
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-CSRF-Token', token);
        }
    });
    $.ajax({
        url: url,
        type: "PUT",
        contentType: "application/json; charset=utf-8",
        data: jsonData,
        success: function (response) {
            if (callback) {
                callback(response);
            }
        },
        error: function (response) {
            if (callback) {
                callback(response);
            }
        }
    });
}

export function saveData(token, url, jsonData, update, callback) {
    if (update) {
        updateData(token, url, jsonData, callback);
    } else {
        postData(token, url, jsonData, callback);
    }
}

function showSuccess(text, callback) {
    swal({
        title: "Bien hecho",
        text: text,
        icon: "success",
        dangerMode: false
    }).then(function () {
        if (callback) {
            callback();
        }
    });
}
function showError(text, callback) {
    swal({
        title: "Oops",
        text: text,
        icon: "warning",
        dangerMode: true
    }).then(function () {
        if (callback) {
            callback();
        }
    });;
}

export function showSuccessAlert(callback) {
    showSuccess('', callback)
}

export function showErrorAlert(callback) {
    showError("Algo malo pasó. Intentaremos solucionarlo prontamente.", callback);
}
