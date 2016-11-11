<html>
<head>
	<title>Magic Mirror</title>
  <link type="text/css" rel="stylesheet" href="/css/lib/fullcalendar/fullcalendar.css" media="all">
  <link type="text/css" rel="stylesheet" href="/css/flex.css" media="all">

  <link type="text/css" rel="stylesheet" href="/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/css/weather-icons.css">

	<meta name="google" value="notranslate" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <style>
    .fc-content .fc-time {
      display: none;
    }
  </style>
</head>
<body>

  <main class="container clear-night">

  <section class="top">
  <div class="top-left top-item">
    <div class="date dimmed"></div>
    <div class="time"><span class="sec"></span></div>
  </div>
  <div class="top-right top-item">
    <div class="temp-date dimmed">Currently</div>
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
      <div>You look awesome!</div>
    </div>
  </section>

  </main>


  <script src="js/lib/jQuery/jquery.js"></script>
  <!--<script src="js/lib/jquery.feedToJSON.js"></script>-->
  <!-- <script src="js/ical_parser.js"></script> -->
  <script src="js/lib/moment/moment-with-locales.min.js"></script>
	<script src="js/lib/jquery/jquery.matchHeight.js"></script>
  <script src="js/lib/fullcalendar/fullcalendar.js"></script>


	<script src="js/mmlib/config.js"></script>
  <!--<script src="js/rrule.js"></script>-->
  <!-- <script src="js/version/version.js" type="text/javascript"></script> -->


  <!-- <script src="js/gcal-reminders/gcal-reminders.js" type="text/javascript"></script> -->
  <!-- <script src="js/countdown/jquery.countdown.js" type="text/javascript"></script> -->
  <!--<script src="js/countdown/gcal-countdown.js" type="text/javascript"></script>-->


  <script src="js/mmlib/weather/weather.js" type="text/javascript"></script>
  <script src="js/mmlib/time/time.js" type="text/javascript"></script>

  <script src="js/mmlib/main.js?nocache=<?php echo md5(microtime()) ?>"></script>

	

<script type="text/javascript">


$(document).ready(function() {


	time.init();



});

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






</script>

</body>
</html>
