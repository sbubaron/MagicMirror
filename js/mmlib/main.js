jQuery.fn.updateWithText = function(text, speed)
{
	var dummy = $('<div/>').html(text);

	if ($(this).html() != dummy.html())
	{
		$(this).fadeOut(speed/2, function() {
			$(this).html(text);
			$(this).fadeIn(speed/2, function() {
				//done
			});
		});
	}
}

jQuery.fn.outerHTML = function(s) {
    return s
        ? this.before(s).remove()
        : jQuery("<p>").append(this.eq(0).clone()).html();
};

function roundVal(temp)
{
	return Math.round(temp * 10) / 10;
}


//This will sort your array
function SortByDate(a, b){
  var aDate = a.start;
  var bDate = b.start;
  return ((aDate < bDate) ? -1 : ((aDate > bDate) ? 1 : 0));
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

jQuery(document).ready(function($) {

	var eventList = [];

	var lastCompliment;
	var compliment;

    moment.locale(config.lang);

	//connect do Xbee monitor
	// var socket = io.connect('http://rpi-alarm.local:8082');
	// socket.on('dishwasher', function (dishwasherReady) {
	// 	if (dishwasherReady) {
	// 		$('.dishwasher').fadeIn(2000);
	// 		$('.lower-third').fadeOut(2000);
	// 	} else {
	// 		$('.dishwasher').fadeOut(2000);
	// 		$('.lower-third').fadeIn(2000);
	// 	}
	// });
	mainController.init();


	time.init();
	fullCalendars.init();

//	calendar.init();

//	reminder.init();

	//countdown.init();

	//compliments.init();

	weather.init();

	countdown.init();
	


});
