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