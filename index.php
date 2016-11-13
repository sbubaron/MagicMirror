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
      <div class="cycle-slideshow temp-slideshow" data-cycle-fx="scrollHorz" data-cycle-speed="400" data-cycle-timeout="10000" data-cycle-pause-on-hover="false" data-cycle-slides="> div">
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
    <div id="main-slideshow" class="fade-container cycle-slideshow" data-cycle-fx="scrollHorz" data-cycle-pause-on-hover="true" data-cycle-speed="200" data-cycle-slides="> div">

      <div id="calendar-tomorrow-wrap" class="fullCalendar-container">
        <div id="calendar-tomorrow"></div>
      </div>

      <div id="calendar-month-wrap" class="fullCalendar-container">
        <div id="calendar-month"></div>
      </div>

      <div id="calendar-today-wrap" class="fullCalendar-container">
        <div id="calendar-today"></div>
      </div>

      <div id="countdown-wrap" class="item-wrap">
        <div id="countdown-vacation" class="item-container">
          <h1>52 days Until....</h1>
        </div>
      </div>

      <div id="time-wrap" class="item-wrap">
        <div id="clock" class="item-container">
          <div class="time"><span class="sec"></span></div>
          <div id="player"></div>
        </div>
      </div>

    </div>

  </section>


  <section class="bottom">
    <div class="bottom-text bottom-item">
      <div>You look awesome!</div>
        <div id="buttons">
          <button data-cycle-cmd="prev" data-cycle-context="#main-slideshow">Prev</button>
          <button data-cycle-cmd="next" data-cycle-context="#main-slideshow">Next</button>
          <button data-cycle-cmd="pause" data-cycle-context="#main-slideshow">Pause</button>
          <button data-cycle-cmd="resume" data-cycle-context="#main-slideshow">Resume</button>
          <button data-cycle-cmd="goto" data-cycle-arg="2" data-cycle-context="#main-slideshow">Goto Slide 3</button>
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
  <script src="js/lib/youtube.js"></script>
	<!--<script src="js/custom/mirror.cycler.js"></script>-->

<script type="text/javascript">


$(document).ready(function() {


	time.init();

  setTimeout(refreshCalendars, 15000);



});

$( '#main-slideshow' ).on( 'cycle-before', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
    console.log("before");
    
    console.log(event);
    console.log(incomingSlideEl.id);

    if(incomingSlideEl.id == "time-wrap") {
      $(".top-left").fadeOut();
      $(".top-right").fadeOut();
      player.playVideo();
    }
    else if(incomingSlideEl.id == "calendar-month-wrap") {
      $(".top-left").fadeIn();
      $(".top-right").fadeIn();
    }
    console.log(optionHash);
    // your event handler code here
    // argument opts is the slideshow's option hash
});

$('#main-slideshow').on('cycle-after', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
        
        console.log(incomingSlideEl.id);

        if(incomingSlideEl.id == "time-wrap") {
          $('#main-slideshow').cycle('pause');
          setTimeout(alarmTimeout, 15000);
        }
      
      
});


function alarmTimeout() {
  var ss = $('#main-slideshow');
  console.log(ss);
  
  console.log(ss.data("cycle.opts").currSlide);
  if(ss.data("cycle.opts").currSlide == 4 && ss.data("cycle.opts").paused) {
    player.stopVideo();
    ss.cycle('resume');
  }
}






</script>

</body>
</html>
