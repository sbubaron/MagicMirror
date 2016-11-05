<html>
<head>
	<title>Magic Mirror</title>
  <link type="text/css" rel="stylesheet" href="/fullcalendar/fullcalendar.css" media="all">
  <link type="text/css" rel="stylesheet" href="/css/flex.css" media="all">

  <link type="text/css" rel="stylesheet" href="/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/css/weather-icons.css">
	<script type="text/javascript">
		var gitHash = '<?php echo trim(`git rev-parse HEAD`) ?>';
	</script>
	<meta name="google" value="notranslate" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

</head>
<body>

  <main class="container clear-night">

  <section class="top">
  <div class="top-left top-item">
    <div class="date dimmed"></div>
    <div class="time"><span class="sec"></span></div>
  </div>
  <div class="top-right top-item">
    <div class="temp large-weather"></div>
  </div>
  </section>



  <section class="middle">
<div class="fade-container">
	<div class="cycle-1 fullCalendar-container">

	  <div id="calendar-tomorrow"></div>
	</div>

</div>

  </section>


  <section class="bottom">
    <div class="bottom-text bottom-item">
      You look awesome!
			<button onclick="pause();">Pause</button>
    </div>
  </section>

  </main>


  <script src="js/jquery.js"></script>
  <script src="js/jquery.feedToJSON.js"></script>
  <script src="js/ical_parser.js"></script>
  <script src="js/moment-with-locales.min.js"></script>
  <script src="js/config.js"></script>
  <script src="js/rrule.js"></script>
  <script src="js/version/version.js" type="text/javascript"></script>

  <script type="text/javascript">

  </script>


  <script src="js/gcal-reminders/gcal-reminders.js" type="text/javascript"></script>


  <script src="js/countdown/jquery.countdown.js" type="text/javascript"></script>
  <!--<script src="js/countdown/gcal-countdown.js" type="text/javascript"></script>-->

  <script src="js/compliments/compliments.js" type="text/javascript"></script>
  <script src="js/weather/weather.js" type="text/javascript"></script>
  <script src="js/time/time.js" type="text/javascript"></script>
  <!--<script src="js/news/news.js" type="text/javascript"></script>-->
  <script src="js/main.js?nocache=<?php echo md5(microtime()) ?>"></script>
  <!-- <script src="js/socket.io.min.js"></script> -->

  <script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
  <script src="js/jquery.matchHeight.js"></script>

    <script src="fullcalendar/fullcalendar.js"></script>
<script type='text/javascript' src='fullcalendar/gcal.js'></script>

<script type="text/javascript">

function pause() {
	cycle=!cycle;
}
$(document).ready(function() {


	time.init();

  $('.cal-panel').matchHeight({});

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
 	           url: 'http://magicmirror.php-apps.localhost.stonybrook.edu/gcal.php' // use the `url` property
 	       }


				]
 		});

		$('#calendar-today').fullCalendar({

				height: 'parent',
				defaultView: 'agendaDay',

				eventSources: [

				 {
						 url: 'http://magicmirror.php-apps.localhost.stonybrook.edu/gcal.php' // use the `url` property
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
						 url: 'http://magicmirror.php-apps.localhost.stonybrook.edu/gcal.php' // use the `url` property
				 }


				]
		});






</script>

</body>
</html>
