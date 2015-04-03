function onLoadSequence () {
	promo_timer("legend1",6); //hard coded sample to test countdown
	promo_timer("legend2",getDateDiff("2014,4,11")); //dynamic countdown from date set (ends at midnight 0000 hours)
	promo_timer("legend3",getDateDiff("2014,4,12")); //dynamic countdown from date set (ends at midnight 0000 hours)
	promo_timer("legend4",getDateDiff("2014,4,13")); //dynamic countdown from date set (ends at midnight 0000 hours)
	promo_timer("legend5",getDateDiff("2014,4,14")); //dynamic countdown from date set (ends at midnight 0000 hours)
	promo_timer("legend6",getDateDiff("2014,4,15")); //dynamic countdown from date set (ends at midnight 0000 hours)

}


function logout_timer (count) {
	var mytimer=count;

	var thisFunction = function() {
		if(mytimer>=0){
		document.title = "Timeout: " + secFormat(mytimer);
		mytimer--;
		}
		else{
            clearInterval(thisFunction);
			window.location ="logout.php";
		}
	};
	setInterval(thisFunction,1000);
}



function promo_timer (promo_id, count) {
	var promo_id = promo_id;
	var mytimer = count;

	var thisFunction = function() {
		if(mytimer>=0){
		document.getElementById(promo_id).innerHTML=" Promotion ends in: " + secFormat(mytimer) + " ";
		
		mytimer--;
		}
		else{
			clearInterval(thisFunction);
			document.getElementById(promo_id).innerHTML=" This promotion has ended  ";
		}
	};
	setInterval(thisFunction,1000);
}



function getDateDiff (promo_end) {
	var dateNow = new Date().getTime();
	var dateLater = new Date(promo_end).getTime();
	var secDiff = Math.round((dateLater - dateNow)/1000);
	return secDiff;
}



function secFormat (seconds) {
    var hours   = Math.floor(seconds / 3600);
    var minutes = Math.floor((seconds - (hours * 3600)) / 60);
    var seconds = seconds - (hours * 3600) - (minutes * 60);
    var time = "";

    if (hours != 0) {
      time = hours+":";
    }
    if (minutes != 0 || time !== "") {
      minutes = (minutes < 10 && time !== "") ? "0"+minutes : String(minutes);
      time += minutes+":";
    }
    if (time === "") {
      time = seconds+"s";
    }
    else {
      time += (seconds < 10) ? "0"+seconds : String(seconds);
    }
    return time;
}
