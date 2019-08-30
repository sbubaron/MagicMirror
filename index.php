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
      <div class="cycle-slideshow temp-slideshow" data-cycle-fx="scrollHorz" data-cycle-speed="400" data-cycle-timeout="5000" data-cycle-pause-on-hover="false" data-cycle-slides="> div">
        <div>
          <div class="temp-date dimmed">Currently</div>
          <div class="temp large-weather"></div>
        </div>
        <div>
          <div class="forecast"></div>
        </div>
        
      </div>
    </div>
  </section>



  <section class="middle">
    <div id="main-slideshow" class="fade-container cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-pause-on-hover="false" data-cycle-speed="1000" data-cycle-timeout="15000" data-cycle-slides="> div">

      <div id="loading-wrap" class="item-wrap">
        <div id="loading" class="item-container">
          <h1>Loading.....</h1>
        </div>
      </div>
    

      
      <div id="calendar-tomorrow-wrap" class="fullCalendar-container">
        <div id="calendar-tomorrow"></div>
      </div>

      <div id="calendar-month-wrap" class="fullCalendar-container">
        <div id="calendar-month"></div>
      </div>

      <div id="calendar-today-wrap" class="fullCalendar-container">
        <div id="calendar-today"></div>
      </div>

   <!--   <div id="countdown-wrap" class="item-wrap">
        <div id="countdown-vacation" class="item-container">
          <h1>52 days Until....</h1>
        </div>
      </div>-->

  <!--    <div id="time-wrap" class="item-wrap">
        <div id="clock" class="item-container">
          <div class="time"><span class="sec"></span></div>
          <div id="player"></div>
        </div>
      </div>-->

    </div>

  </section>


  <section class="bottom">
    <div class="bottom-text bottom-item">
      <div class="headlines">
      
      </div>

        <div id="buttons" style="display: none;">
          <button data-cycle-cmd="prev" data-cycle-context="#main-slideshow">Prev</button>
          <button data-cycle-cmd="next" data-cycle-context="#main-slideshow">Next</button>
          <button data-cycle-cmd="pause" data-cycle-context="#main-slideshow">Pause</button>
          <button data-cycle-cmd="resume" data-cycle-context="#main-slideshow">Resume</button>
          <button data-cycle-cmd="goto" data-cycle-arg="2" data-cycle-context="#main-slideshow">Goto Slide 3</button>
        </div>
    </div>
  </section>

  </main>


  <script src="/js/lib/jQuery/jquery.js"></script>
  <!--<script src="js/lib/jquery.feedToJSON.js"></script>-->
  <!-- <script src="js/ical_parser.js"></script> -->
  <script src="/js/lib/moment/moment-with-locales.min.js"></script>
	<script src="/js/lib/jquery/jquery.matchHeight.js"></script>
  <script src="/js/lib/fullcalendar/fullcalendar.js"></script>


	<script src="/js/mmlib/config.js"></script>

  <script src="/js/custom/controller.js"></script>
  <!--<script src="js/rrule.js"></script>-->
  <!-- <script src="js/version/version.js" type="text/javascript"></script> -->


  <!-- <script src="js/gcal-reminders/gcal-reminders.js" type="text/javascript"></script> -->
  <!-- <script src="js/countdown/jquery.countdown.js" type="text/javascript"></script> -->
  <!--<script src="js/countdown/gcal-countdown.js" type="text/javascript"></script>-->

  <script src="/js/lib/cycle2/cycle2.js"></script>

  <script src="/js/mmlib/compliments/compliments.js" type="text/javascript"></script>

  <script src="/js/mmlib/weather/weather.js" type="text/javascript"></script>
  <script src="/js/mmlib/time/time.js" type="text/javascript"></script>


  <script src="/js/mmlib/main.js?nocache=<?php echo md5(microtime()) ?>"></script>

	<script src="/js/custom/fullcalendar.config.js"></script>
  <script src="/js/custom/countdown.js"></script>
  <script src="/js/custom/onthisday.js"></script>
  <script src="/js/lib/youtube.js"></script>
	

</body>
</html>
