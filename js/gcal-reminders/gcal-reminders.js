var reminder = {
	eventList: [],
	reminderLocation: '.reminders',
	updateInterval: 60000,
	updateDataInterval: 60000,
	fadeInterval: 1000,
	intervalId: null,
	dataIntervalId: null,
	maximumEntries: config.reminder.maximumEntries || 10
}






reminder.updateData = function (callback) {

	

		 $.ajax({ // ajax call starts
      url: 'reminder.php', // JQuery loads serverside.php
      //data: 'button=' + $(this).val(), // Send value of the clicked button
      dataType: 'json', // Choosing a JSON datatype
    })
    .done(function(data) {
    	
		myReminder = [];

					

				  $events = data.events;


				  $.each( $events, function( key, val ) {
				  	var days = moment(val.start).diff(moment(), 'days');
				  	var startDateTime = moment(val.start);
				  	
				  	myReminder.push({'description':val.summary,'days':days,'calendar':val.cssClass, 'start':startDateTime});

				    
				  });

			myReminder.sort(SortByDate);   


			//console.log(myReminder);

    	if (callback !== undefined && Object.prototype.toString.call(callback) === '[object Function]') {
			callback(myReminder);
		}
    });

}




reminder.updateReminder = function (eventList) {



	table = $('<table/>').addClass('xsmall').addClass('reminder-table');
	opacity = 1;
	
	var curHeading = '';
	var potentialHeading = '';
	for (var i in eventList) {
		var e = eventList[i];
		potentialHeading = getDateString(e.start);

		

		if(curHeading != potentialHeading)
		{
			var row = $('<tr/>').css('opacity',opacity).addClass('reminder-heading');
			row.append($('<td/>').html(potentialHeading));
			row.append($('<td/>').html());
			row.append($('<td/>').html());
			table.append(row);
			curHeading = potentialHeading;
		}
		
			var dateString = '';

			if(curHeading != "Later...")
			{
				dateString = e.start.format('h:mm a');
			}
			else
			{
				dateString = e.start.format('MMM Do h:mm a');	
			}

			var row = $('<tr/>').css('opacity',opacity).addClass(e.calendar);
			row.append($('<td/>').html(e.description).addClass('description'));
			//row.append($('<td/>').html(dateString).addClass('cal-dt'));
			table.append(row);	
		


		

		opacity -= 1 / eventList.length;
	}

	$(this.reminderLocation).updateWithText(table, this.fadeInterval);

}

reminder.init = function () {

	this.updateData(this.updateReminder.bind(this));
/*
	this.intervalId = setInterval(function () {
		this.updateCalendar(this.eventList)
	}.bind(this), this.updateInterval);
*/
	this.dataIntervalId = setInterval(function () {
		this.updateData(this.updateReminder.bind(this));
	}.bind(this), this.updateDataInterval);
}
