var countdown = {
	eventList: [],
	reminderLocation: '.countdown',
	updateInterval: 60000,
	updateDataInterval: 60000,
	fadeInterval: 1000,
	intervalId: null,
	dataIntervalId: null,
	maximumEntries: config.reminder.maximumEntries || 10
}






countdown.updateData = function (callback) {

	
		 $.ajax({ // ajax call starts
      url: 'gcal.php', // JQuery loads serverside.php
      //data: 'button=' + $(this).val(), // Send value of the clicked button
      dataType: 'json', // Choosing a JSON datatype
    })
    .done(function(data) {
    	
		myCountdown = [];

					

				  $events = data.events;


				  $.each( $events, function( key, val ) {
				  	
				  	if(val.details != null && val.details.toLowerCase().indexOf('**countdown') > 0)
				  	{
				  		var days = moment(val.start).diff(moment(), 'days');
				  		var startDateTime = moment(val.start);
				  	
				  		myCountdown.push({'description':val.summary,'days':days,'calendar':val.cssClass, 'start':startDateTime, 'details':val.details});
				  	}
				    
				  });

			myCountdown.sort(SortByDate);   


			console.log(myCountdown);

    	if (callback !== undefined && Object.prototype.toString.call(callback) === '[object Function]') {
			callback(myCountdown);
		}
    });

}




countdown.updateCountdown = function (eventList) {

console.log("countdown");


		var e = eventList[0];
var endDate = e.start.format('MMMM DD, YYYY HH:mm:ss'); //e.startDateTime;//"June 7, 2087 15:03:25";

console.log(endDate);


	$('.countdown').countdown({
          date: endDate,
          render: function(data) {
            $(this.el).html(this.leadingZeros(data.days, 0) + " <span>days</span> " + this.leadingZeros(data.hours, 2) + " <span>hrs</span> " + this.leadingZeros(data.min, 2) + " <span>min</span> " + this.leadingZeros(data.sec, 2) + " <span>sec</span> until " + e.description);
          }
        });


	//$(this.reminderLocation).updateWithText(table, this.fadeInterval);

}

countdown.init = function () {

	this.updateData(this.updateCountdown.bind(this));
/*
	this.intervalId = setInterval(function () {
		this.updateCalendar(this.eventList)
	}.bind(this), this.updateInterval);
*/
	this.dataIntervalId = setInterval(function () {
		this.updateData(this.updateCountdown.bind(this));
	}.bind(this), this.updateDataInterval);
}
