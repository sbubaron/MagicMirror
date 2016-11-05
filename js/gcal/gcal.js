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


				  $.each( $events, function( key, val ) {
				  	var days = moment(val.start).diff(moment(), 'days');
				  	var startDateTime = moment(val.start);
				  	
				  	myList.push({'description':val.summary,'days':days,'calendar':val.cssClass, 'start':startDateTime});

				    
				  });

			myList.sort(SortByDate);   
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


function getDateString(dt)
{


	var res = dt.calendar();

	res = res.toLowerCase();

	if(res.indexOf("today") >= 0)
		return "Today";
	else if(res.indexOf("tomorrow") >= 0)
		return "Tomorrow";
	else if(res.indexOf("monday") >= 0)
		return "Monday";
	else if(res.indexOf("tuesday") >= 0)
		return "Tuesday";
	else if(res.indexOf("wednesday") >= 0)
		return "Wednesday";
	else if(res.indexOf("thursday") >= 0)
		return "Thursday";
	else if(res.indexOf("friday") >= 0)
		return "Friday";
	else if(res.indexOf("saturday") >= 0)
		return "Saturday";
	else if(res.indexOf("sunday") >= 0)
		return "Sunday";
	else
		return "Later...";

}

calendar.updateCalendar = function (eventList) {

	table = $('<table/>').addClass('xsmall').addClass('calendar-table');
	opacity = 1;
	
	var curHeading = '';
	var potentialHeading = '';
	for (var i in eventList) {
		var e = eventList[i];
		potentialHeading = getDateString(e.start);



		if(curHeading != potentialHeading)
		{
			var row = $('<tr/>').css('opacity',opacity).addClass('calendar-heading');
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
			row.append($('<td/>').html(dateString).addClass('cal-dt'));
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
