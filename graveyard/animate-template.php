<html>
<head>
	<title>Magic Mirror</title>
	<style type="text/css">
		<?php include('css/rich.css') ?>
	</style>
	<link rel="stylesheet" type="text/css" href="css/weather-icons.css">
	<script type="text/javascript">
		var gitHash = '<?php echo trim(`git rev-parse HEAD`) ?>';
	</script>
	<meta name="google" value="notranslate" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


	<style>


	.panel{
		height: 100%;
	}

	.fader {
    position: relative;

    height: 400px;
	}

	.main
	{
		margin: 0 auto;
		width: 100%;
		
	}

	.fader h2, .cal-panel h2 {
		font-size: 48px;
    font-family: "HelveticaNeue-Light";
		font-weight: normal;
	}

	.cal-panel ul
	{
		margin: 0;
		font-size: 85%;

	}

	.cal-panel
	{
		width: 25%;
		margin: 0 30px;
		display: inline-block;
		color: #000;
		background-color: rgba(255,255,255, 0.75);
		height: 470px;
		padding: 20px;
	}

	.cal-panel h2
	{
		margin: 0 0 20px 0;

	}


	</style>

</head>
<body>

	<section class="panel clear-night overlay-dark-gray">
		<div class="top">
				<div class="left">
					<div class="date small dimmed">Thursday, March 17, 2016</div>
					<div class="time">10:58<span class="sec">05</span></div>
				</div>

				<div class="right">
					<div class="large-weather"><i class="wi-day-cloudy-windy"></i> 48</div>

				</div>
		</div>

		<div class="main">
			<div class="cal-panel">
				<h2>Today</h2>
				<div class="cal-panel--content">
					<div class="cal-panel--content-time">3:00pm</div>
					Pack<br />
					<br />
					<div class="cal-panel--content-time">8:30pm</div>
					Dinner with Thomas<br />
				</div>
				
			</div>

			<div class="cal-panel">
				<h2>Tomorrow</h2>
				<div class="cal-panel--content">
					<div class="cal-panel--content-time">8:00am</div>
					Flight to New Orleans<br />
					<br />
					<div class="cal-panel--content-time">10:30am</div>
					Land in New Orleans<br />
				</div>
				
			</div>

			<div class="cal-panel">
				<h2>Monday</h2>
				<div class="cal-panel--content">
					<div class="cal-panel--content-time">8:00am</div>
					HigherEd Summit<br />
					<br />
					<div class="cal-panel--content-time">4:30pm</div>
					Summit Reception<br />
				</div>
				
			</div>

		</div>

		<div class="bottom">
			Scattered Showers, low 60's
		</div>
	</section>


<script src="js/jquery.js"></script>
<script src="js/jquery.feedToJSON.js"></script>
<script src="js/ical_parser.js"></script>
<script src="js/moment-with-locales.min.js"></script>
<script src="js/config.js"></script>
<script src="js/time/time.js" type="text/javascript"></script>
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('.fader').cycle({
		cleartypeNoBg:    true,
		speed: 1000,
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});

	time.init();
});
</script>

</body>
</html>
