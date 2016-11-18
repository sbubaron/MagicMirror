var mainController = {
	//complimentLocation: '.compliment',
	//currentCompliment: '',
    state: '', //state should be paused, running
	updateInterval: config.mainController.interval || 3000,
	intervalId: null
};

/**
 * Changes the compliment visible on the screen
 */
mainController.pause = function() {   
    this.state = 'pausing';

     //var ss = $('#main-slideshow');
     $('#main-slideshow').cycle('pause');
    
    this.state = 'paused';
}

mainController.run = function() {
    this.state = 'running'

    $('#main-slideshow').cycle('resume');
}

mainController.updateMainController = function() {
    //console.log(this.state);
}

mainController.init = function () {

	this.state = 'running';
    this.updateMainController();

	this.intervalId = setInterval(function () {
		this.updateMainController();
	}.bind(this), this.updateInterval)

}



$( '#main-slideshow' ).on( 'cycle-before', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
    
        $('#calendar-tomorrow').fullCalendar( 'refetchEvents' );
         $('#calendar-today').fullCalendar( 'refetchEvents' );
         $('#calendar-month').fullCalendar( 'refetchEvents' );

    //console.log(event);
    //console.log(incomingSlideEl.id);

    if(incomingSlideEl.id == "time-wrap") {
      $(".top-left").fadeOut();
      $(".top-right").fadeOut();
      player.playVideo();
    }
    else if(incomingSlideEl.id == "calendar-month-wrap") {
      $(".top-left").fadeIn();
      $(".top-right").fadeIn();


    }
   // console.log(optionHash);
    // your event handler code here
    // argument opts is the slideshow's option hash
});

$('#main-slideshow').on('cycle-after', function(event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
        
      //  console.log(incomingSlideEl.id);

      if(outgoingSlideEl.id == "loading-wrap") {
          $('#main-slideshow').cycle('remove', 0)
      }

        if(incomingSlideEl.id == "time-wrap") {
          document.alarmStart = moment();
          mainController.pause();
          checkAlarmState();
          setTimeout(alarmTimeout, 240000);
        }
      
      
});