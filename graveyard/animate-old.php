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
		background-color: #fff;
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
		float: left;
		color: #fff;
	}

	.cal-panel h2
	{
		margin: 0;

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
					<div class="fader">
						<div class="reminders"><h2>Reminders</h2>
							<ul>
								<li>Take out garbage</li>
								<li>Pick up milk</li>
								<li>File taxes</li>
							</ul>
						</div>

						<div class="schedule"><h2>Today</h2>
							<ul>
								<li>Meeting at 10am</li>
								<li>Lunch with Diana</li>
								<li>Volleyball vs Ghost</li>
							</ul>
						</div>

						<div class="calendar"><h2>Calendar</h2>
							<ul>
								<li>First</li>
								<li>Second</li>
								<li>Third</li>
							</ul>
						</div>

					</div>

				</div>
		</div>

		<div class="main">
			<div class="cal-panel">
				<h2>Today</h2>
				<ul>
					<li>Event 1 this is an event</li>
					<li>Event 2 another event goes here</li>
				</ul>
			</div>

			<div class="cal-panel">
				asdfasfdasfasdf
			</div>

			<div class="cal-panel">
				asdfasfdasfasdf
			</div>
		</div>

		<div class="bottom">
			Clear skies tonight, low 60's
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
