$(document).ready(function () {

    $("#toggleMenu").click(function (event) {
        var icon = document.getElementById('bgIcon');
        const childEle = icon.children;

        childEle[0].classList.toggle('hidden');
        childEle[1].classList.toggle('hidden');

        document.getElementById('MobileNavigation').classList.toggle('hidden');
    });
})
