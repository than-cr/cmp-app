var Services = Services || {};

$(document).ready(function () {
    $('#addRoleBtn').on('click', function(e){
        $('#addRoleModal').removeClass('invisible');
    });
    // $('.addRoleBtn').on('click', function(e){
    //     $('#interestModal').addClass('invisible');
    // });

    $("#all_permission").on('click', function() {

        if($(this).is(':checked')) {
            $.each($('[class*=permission]'), function() {
                $(this).prop('checked',true);
            });
        } else {
            $.each($('[class*=permission]'), function() {
                $(this).prop('checked',false);
            });
        }

    });
});


