<html>
<head>
	<title>Magic Mirror</title>
  <link type="text/css" rel="stylesheet" href="/css/lib/fullcalendar/fullcalendar.css" media="all">
  <link type="text/css" rel="stylesheet" href="/css/flex.css" media="all">

  <link type="text/css" rel="stylesheet" href="/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/css/weather-icons.css">

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
      <div class="cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-speed="1000" data-cycle-slides="> div">
        <div>
          <div class="date-temp dimmed">Currently</div>
          <div class="temp large-weather"></div>
        </div>
        <div>
          <div class="date-temp dimmed">Tomorrow morning</div>
          <div class="temp large-weather"></div>
        </div>
        <div>
          <div class="date-temp dimmed">Tomorrow</div>
          <div class="temp large-weather"></div>
        </div>
      </div>
    </div>
  </section>



  <section class="middle">
    <div class="fade-container cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-speed="200" data-cycle-slides="> div">

      <div class="fullCalendar-container">
        <div id="calendar-tomorrow"></div>
      </div>

      <div class="fullCalendar-container">
        <div id="calendar-month"></div>
      </div>

      <div class="fullCalendar-container">
        <div id="calendar-today"></div>
      </div>

      <div class="">
        <div id="countdown-vacation">
          <h1>52 days Until....</h1>
        </div>
      </div>

    </div>

  </section>


  <section class="bottom">
    <div class="bottom-text bottom-item">
      <div>You look awesome!</div>
      <div style="display: none;">
			<button onclick="cycleTo(0);">Calendar</button>
			<button onclick="cycleTo(1);">Today Agenda</button>
			<button onclick="cycleTo(2);">Tomorrow Agenda</button>
			<button onclick="cycleTo(3);">Vacation</button>
			<button onclick="toggleCycle();">Toggle Cycle</button>
      </div>
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

  <script src="js/lib/cycle2/cycle2.js"></script>

  <script src="js/mmlib/weather/weather.js" type="text/javascript"></script>
  <script src="js/mmlib/time/time.js" type="text/javascript"></script>

  <script src="js/mmlib/main.js?nocache=<?php echo md5(microtime()) ?>"></script>

	<script src="js/custom/fullcalendar.config.js"></script>
	<!--<script src="js/custom/mirror.cycler.js"></script>-->

<script type="text/javascript">


$(document).ready(function() {


	time.init();



});







</script>

</body>
</html>
