$(function() {
    $('.moreInfo').click(function() {
        var button = $(this);
        $(button).closest('.more-panel').find('.moreInfo-panel').slideToggle('fast', function() {
            if ($(this).is(':visible')) 
            {
                button.text('Collapse');
            } 
            else 
                button.text('More Info');
        });
    });
});

$(document).ready(function() 
{
    $("#formEdit").validate({
        rules: {
            name: {
                minlength: 4,
                required: true
            },
            address: {
                minlength: 4,
                required: true
            },
            phoneno: {
                minlength: 4,
                required: true
            },
            images: {
                minlength: 4,
                required: true,
            },
            description: {
                minlength: 4,
                required: true
            }
            // messages: {
            //     name: "Please enter name of the restaurant.",
            //     address: "Please enter address of the restaurant.",
            //     phoneno: "Plese enter a contact number of the restaurant.",
            //     images: "Please enter valid image links.",
            //     description: "Please enter a decription of the restaurant."
            // }
        }
    });
});