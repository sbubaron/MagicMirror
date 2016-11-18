var fullCalendars = {
	eventData: [],
    flipHour: 00,
    flipMinute: 09,
    calendars: {
        agendaTomorrow: {
            controlId: "#calendar-tomorrow",
            fullCalendarOptions: {
                header: {
                    center: false,
                    right: false,
                    left: false
                },

                maxTime: "24:00:00",
                minTime: "6:00:00",
                height: 'parent',
                defaultView: 'agendaDay',
                defaultDate: moment().add(1, 'days'),

                eventSources: [
                    // your event source
                    {
                        events: function(start, end, timezone, callback) {
                            var events = [];
                            
                            
                            events = fullCalendars.eventData;
                            callback(events);       // ...
                        },
                        //color: 'yellow',   // an option!
                        //textColor: 'black' // an option!
                    },
                    /*{
                        events: [ // put the array in the `events` property
                        {
                                title  : 'event1',
                                start  : '2016-11-17'
                        }]
                    }*/
                ]
            }
        },
        agendaToday: {
            controlId: "#calendar-today",
            fullCalendarOptions: {
                header: {
                    center: false,
                    right: false,
                    left: false
                },
                
                maxTime: "24:00:00",
                minTime: "6:00:00",
                height: 'parent',
                defaultView: 'agendaDay',
                defaultDate: moment(),
                eventSources: [
                    // your event source
                    {
                        events: function(start, end, timezone, callback) {
                            var events = [];
                            
                            
                            events = fullCalendars.eventData;
                            callback(events);       // ...
                        },
                        //color: 'yellow',   // an option!
                        //textColor: 'black' // an option!
                    },
                    /*{
                        events: [ // put the array in the `events` property
                        {
                                title  : 'event1',
                                start  : '2016-11-17'
                        }]
                    }*/
                ]
            }
        },
        calendarMonth: {
            controlId: "#calendar-month",
            fullCalendarOptions: {
                header: {
                    center: false,
                    right: false,
                    left: false
                },

                height: 'parent',
                defaultDate: moment(),
                eventSources: [
                    // your event source
                    {
                        events: function(start, end, timezone, callback) {
                            var events = [];
                            
                            
                            events = fullCalendars.eventData;
                            callback(events);       // ...
                        },
                        //color: 'yellow',   // an option!
                        //textColor: 'black' // an option!
                    },
                    /*{
                        events: [ // put the array in the `events` property
                        {
                                title  : 'event1',
                                start  : '2016-11-17'
                        }]
                    }*/
                ]
            }
        },
    },
	updateInterval: config.fullCalendars.interval || 3000,
	intervalId: null

};


fullCalendars.init = function() {

    //console.log(this.calendars.agendaTomorrow);

    $(this.calendars.agendaTomorrow.controlId).fullCalendar(this.calendars.agendaTomorrow.fullCalendarOptions);
    $(this.calendars.agendaToday.controlId).fullCalendar(this.calendars.agendaToday.fullCalendarOptions);
    $(this.calendars.calendarMonth.controlId).fullCalendar(this.calendars.calendarMonth.fullCalendarOptions);
  
       //$('#calendar-tomorrow').fullCalendar(this.calendars.agendaTomorrow.fullCalendarOptions);
                 

    this.updateFullCalendars();

    flipTime = moment().startOf('day').hour(this.flipHour).minute(this.flipMinute);
    console.log(flipTime);

    // parse time using 24-hour clock and use UTC to prevent DST issues
    var start = moment.utc(moment(), "HH:mm");
    var end = moment.utc(flipTime, "HH:mm");

    // account for crossing over to midnight the next day
    if (end.isBefore(start)) {
        end.add(1, 'day');
    }

    var d = moment.duration(end.diff(start));

    console.log(d);

    setTimeout(this.changeDates.bind(this), d._milliseconds);


    this.intervalId = setInterval(function () {
		this.updateFullCalendars();
	}.bind(this), this.updateInterval);
   
}


fullCalendars.updateFullCalendars = function() {
    if(mainController.state === "running") {

        
        $.ajax({
			type: 'GET',
			url: '/api/gcal.php',
			dataType: 'json',
			//data: weather.params,
			success: function (data) {
				var evnt = {
                    events: data
                };

                this.eventData = data;
		
			}.bind(this),
			error: function () {

			}
		});

        console.log("refreshing cals");
    }
}


fullCalendars.changeDates = function() {
    console.log("changing full cal dates");
    var curDate = $(this.calendars.agendaTomorrow.controlId).fullCalendar('option', 'defaultDate');
    console.log(curDate);
    var newDate = curDate.add(1,'days');
     console.log(newDate);
    $(this.calendars.agendaTomorrow.controlId).fullCalendar('gotoDate', newDate);

    curDate = $(this.calendars.agendaToday.controlId).fullCalendar('option', 'defaultDate');
    console.log(curDate);
    var newDate = curDate.add(1,'days');
     console.log(newDate); 
    $(this.calendars.agendaToday.controlId).fullCalendar('gotoDate', newDate);

    curDate = $(this.calendars.calendarMonth.controlId).fullCalendar('option', 'defaultDate');
    console.log(curDate);
    var newDate = curDate.add(1,'days');
     console.log(newDate); 
    $(this.calendars.calendarMonth.controlId).fullCalendar('gotoDate', newDate);

    setTimeout(this.changeDates.bind(this), 1000 * 60 * 60 * 24);
}