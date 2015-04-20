/*function initCountdown(countdown) {
    function getRemainder(time) {
        if(time < 0) {
            return '0:0'
        }
        var minutes = Math.floor(time / 60);
        var seconds = time - minutes * 60;
        return minutes + ':' + seconds;
    }

    var interval = setInterval(function() {
        countdown = countdown - 1;
        document.title = getRemainder(countdown) + ' till your session expires.';
        if(countdown < 0) {
			location.href	=	"logout_timeout.php";
        }
    }, 1000);
}*/

$(function() {
    $('.moreInfo').click(function() {
        var button = $(this);
        $(button).closest('.more-panel').find('.moreInfo-panel').slideToggle('fast', function() {
            if ($(this).is(':visible')) {
                button.text('Close...');
            } else {
                button.text('More Info...');
            }
        });
    });
});