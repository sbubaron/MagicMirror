$('#calendar-tomorrow').fullCalendar({

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

     {
         url: '/api/gcal.php' // use the `url` property
     }


    ]
});


$('#calendar-month').fullCalendar({

    header: {
      center: false,
      right: false,
      left: false
    },

    height: 'parent',

    eventSources: [

     {
         url: '/api/gcal.php' // use the `url` property
     }


    ]
});

$('#calendar-today').fullCalendar({
    header: {
      center: false,
      right: false,
      left: false
    },
    
    maxTime: "24:00:00",
    minTime: "6:00:00",
    height: 'parent',
    defaultView: 'agendaDay',

    eventSources: [

     {
         url: '/api/gcal.php' // use the `url` property
     }


    ]
});


