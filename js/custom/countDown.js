var countdown = {
    countdownData: [],
	countdownLocation: '.countdown',
	apiBase: '/api/gcal-countdown.php',
	updateInterval: config.countdown.interval || 1000 * 60 * 60,
    updateDataInterval: config.countdown.dataInterval || 1000 * 60 * 60 * 24,
	//fadeInterval: config.weather.fadeInterval || 1000,
	intervalId: null,
    intervalDataId: null
}


/**
 * Retrieves the current temperature and weather patter from the OpenWeatherMap API
 */
countdown.updateCountdownData = function () {
	
	//if(mainController.state === "running") {

		$.ajax({
			type: 'GET',
			url: countdown.apiBase,
			dataType: 'json',
			success: function (data) {

                this.countdownData = data;
				
			}.bind(this),
			error: function () {

			}
		});
	//}

}

countdown.updateCountdownSlide = function() {

    var index = 0;
    if(this.countdownData.length === 0) {
        return;
    }
    else if(this.countdownData.length === 1) {
        
    }
    else {
        index = Math.floor((Math.random() * this.countdownData.length));
    }
    var start = moment();
    

    var end = moment(this.countdownData[index].start);
    console.log(end);
    // account for crossing over to midnight the next day
    
    var d = moment.duration(end.diff(start));
    console.log(d.asDays());

    var days = Math.round(d.asDays());

    var _html = "<h1>" + days + " days until " + this.countdownData[index].title + "</h1>";

    $(this.countdownLocation).updateWithText(_html);
}

countdown.init = function () {

    this.updateCountdownData();

	

	this.intervalDataId = setInterval(function () {
		this.updateCountdownData();
	}.bind(this), this.updateDataInterval);

    this.intervalId = setInterval(function () {
		this.updateCountdownSlide();
	}.bind(this), this.updateInterval);

}
