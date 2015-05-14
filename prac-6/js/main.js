$(function() {
    $('.moreInfo').click(function() {
        var button = $(this);
        $(button).closest('.more-panel').find('.moreInfo-panel').slideToggle('fast', function() {
            if ($(this).is(':visible')) 
            {
                button.text('Hide');
            } 
            else 
                button.text('More Info');
        });
    });
});

/*
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
            required: true
        },
        description: {
            minlength: 4,
            required: true
        }
    },
    highlight: function(element) {
        $(element).closest(".form-group").removeClass("has-success").addClass("has-error");
    },
    success: function(element) {
        element.closest(".form-group").removeClass("has-error").addClass("has-success");
    },
    invalidHandler: function() {
        return false;
    }
});
*/