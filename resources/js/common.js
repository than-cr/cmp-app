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
                //showToastr(ajaxError);
                alert('Error');
            }
        },
    });
}


