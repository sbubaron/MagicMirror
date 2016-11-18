


function alarmTimeout() {
  var ss = $('#main-slideshow');
  //console.log(ss);
  
  //console.log(ss.data("cycle.opts").currSlide);
  if(ss.data("cycle.opts").currSlide == 4 && ss.data("cycle.opts").paused) {
    player.stopVideo();
    mainController.run();
  }
}


function checkAlarmState() {

  var ss = $('#main-slideshow');
  if(ss.data("cycle.opts").currSlide == 4 && ss.data("cycle.opts").paused) {
    console.log("checking alarm status");
    $.ajax({
		type: 'GET',
    cache: false,
		url: '/json-tests/test.json',
		data: weather.params,
		success: function (data) {
			console.log(data);
      if(data.date) {
        var datePress = moment(data.date);
        console.log(datePress);
        console.log(document.alarmStart);

        if(datePress > document.alarmStart) {
          console.log("stop alarm");
          alarmTimeout();
        }
        else {
          console.log("continue playing");
          setTimeout(checkAlarmState, 5000);
        }
        
      }
      else {
        console.log("continue playing");
        setTimeout(checkAlarmState, 5000);
      }
    }
    });

    
  }
}