var calendar = {
	eventList: [],
	calendarLocation: '.calendar',
	updateInterval: 60000,
	updateDataInterval: 60000,
	fadeInterval: 1000,
	intervalId: null,
	dataIntervalId: null,
	maximumEntries: config.calendar.maximumEntries || 10
}

calendar.updateData = function (callback) {

	

		 $.ajax({ // ajax call starts
      url: 'gcal.php', // JQuery loads serverside.php
      //data: 'button=' + $(this).val(), // Send value of the clicked button
      dataType: 'json', // Choosing a JSON datatype
    })
    .done(function(data) {
    	
		myList = [];

					

				  $events = data.events;
				  console.log(data);

				  $.each( $events, function( key, val ) {
				  	console.log(key);
				  	console.log(val);
				  	var days = moment(val.start).diff(moment(), 'days');
				  	console.log(days);
				  	myList.push({'description':val.summary,'days':days});

				    
				  });

   
    	if (callback !== undefined && Object.prototype.toString.call(callback) === '[object Function]') {
			callback(myList);
		}
    });


    
/*
			$.getJSON( "/gcal.php", function( data ) {

					this.eventList = [];
				  var items = [];

					console.log(data);

				  $events = data.events;
				  console.log($events);

				  $.each( $events, function( key, val ) {
				  	console.log(key);
				  	console.log(val);
				  	this.eventList.push(val);

				    
				  });
				});
*/
	//this.eventList.push({'description':'Testing 1 2 3','seconds':'1000','days':'i dont know'});
	


		

//	}.bind(this));

}

calendar.updateCalendar = function (eventList) {

	table = $('<table/>').addClass('xsmall').addClass('calendar-table');
	opacity = 1;

	for (var i in eventList) {
		var e = eventList[i];

		var row = $('<tr/>').css('opacity',opacity);
		row.append($('<td/>').html(e.description).addClass('description'));
		row.append($('<td/>').html(e.days).addClass('days dimmed'));
		table.append(row);

		opacity -= 1 / eventList.length;
	}

	$(this.calendarLocation).updateWithText(table, this.fadeInterval);

}

calendar.init = function () {

	this.updateData(this.updateCalendar.bind(this));
/*
	this.intervalId = setInterval(function () {
		this.updateCalendar(this.eventList)
	}.bind(this), this.updateInterval);
*/
	this.dataIntervalId = setInterval(function () {
		this.updateData(this.updateCalendar.bind(this));
	}.bind(this), this.updateDataInterval);
}
