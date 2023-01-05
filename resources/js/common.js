function getData(url, callback) {
    $.ajax({
        type: 'GET',
        url: url,
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Accept", "application/json");
            xhr.setRequestHeader("Content-Type", "application/json");
        },

        success: function (response) {
            if (response) {
                if (response.status == 200) {
                    callback(response);
                } else {
                    //processError(`An error ocurred during the ${url} request.`);
                }
            }
        },
        error: function (e) {
            if (e.status !== 403) {
                //showToastr(ajaxError);
            }

        },
    });
}
