$(document).ready(function() {

    let isRegInput = $('#is_registered')
    let regNumDiv = $("#registration_number_div");
    let regNumInput = $('#registration_number');

    if (!isRegInput.is(':checked'))
    {
        regNumDiv.addClass('d-none')
    }
    else
        regNumInput.attr('required' , true)

    isRegInput.on('click', function() {

        regNumDiv.toggleClass('d-none');

        if (regNumDiv.hasClass('d-none'))
            regNumInput.attr('required' , false)
        else
            regNumInput.attr('required' , true)
    });


});
