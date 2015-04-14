function initCountdown(countdown) {
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
			location.href="logout.php";
			console.log("Logout by timer");
        }
    }, 1000);
}