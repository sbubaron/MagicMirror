var onthisday = {
    
    list: [],
	
	apiURL: 'http://history.muffinlabs.com/date',
    updateDataInterval: config.onthisday.dataInterval || 1000 * 60 * 60 * 24,
	//fadeInterval: config.weather.fadeInterval || 1000,
	intervalId: null,
    intervalDataId: null
}


/**
 * Retrieves the current temperature and weather patter from the OpenWeatherMap API
 */
onthisday.updateData = function () {
	
	//if(mainController.state === "running") {

		$.ajax({
			type: 'GET',
			url: onthisday.apiURL,
			dataType: 'json',
			success: function (data) {

                this.data = data;
                console.log(data);

                for(var i=0; i<data.length; i++) {
                    this.countdownList[i] = countdown.buildSentence(data[i]);
                }
               // this.updateCountdownSlide();
				
			}.bind(this),
			error: function () {

			}
		});
	//}

}


onthisday.init = function () {

    this.updateData();
    

	this.intervalDataId = setInterval(function () {
		this.updateData();
	}.bind(this), this.updateDataInterval);

    
}


onthisday.getFacts = function() {
	return this.list;
}


countdown.buildSentence = function(obj) {
    
    console.log(obj);

    return "On this day...";
}