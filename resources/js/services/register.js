var Services = Services || {};

$(document).ready(function () {

    $("#province").on('change', function () {
        getData('https://api.agify.io/?name=meelad', function (response) {
            alert(response.age);
        });
    });

});
