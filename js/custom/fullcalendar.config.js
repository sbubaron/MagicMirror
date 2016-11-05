$('#calendar-month').fullCalendar({

    header: {
      center: false,
      right: false,
      left: false
    },

    height: 'parent',

    eventSources: [

     {
         url: 'http://magicmirror.php-apps.localhost.stonybrook.edu/api/gcal.php' // use the `url` property
     }


    ]
});

$('#calendar-today').fullCalendar({
    header: {
      center: false,
      right: false,
      left: false
    },
    height: 'parent',
    defaultView: 'agendaDay',

    eventSources: [

     {
         url: 'http://magicmirror.php-apps.localhost.stonybrook.edu/api/gcal.php' // use the `url` property
     }


    ]
});

$('#calendar-tomorrow').fullCalendar({

    header: {
      center: false,
      right: false,
      left: false
    },

    height: 'parent',
    defaultView: 'agendaDay',
    defaultDate: moment().add(1, 'days'),
    eventSources: [

     {
         url: 'http://magicmirror.php-apps.localhost.stonybrook.edu/api/gcal.php' // use the `url` property
     }


    ]
});
