var headlines = {
	headlineLocation: '.headlines',
	currentHeadline: '',
    list: [],
	updateInterval: config.headlines.interval || 30000,
	fadeInterval: config.headlines.fadeInterval || 4000,
	intervalId: null
};

/**
 * Changes the compliment visible on the screen
 */
headlines.updateHeadline = function () {
    console.log("pulling headline lists");
    headlines.list = [];
    var _list = [];

    _list = compliments.getCompliments();
    //console.log(_list);

    headlines.list = headlines.list.concat(_list);

	_list = countdown.getCountdowns();
    console.log(_list);

    headlines.list = headlines.list.concat(_list);

    _list = news.getNews();
    //console.log(_list);

    //headlines.list = headlines.list.concat(_list);

    //console.log(headlines.list);
	// Search for the location of the current compliment in the list
	var _spliceIndex = headlines.list.indexOf(headlines.currentHeadline);

	// If it exists, remove it so we don't see it again
	if (_spliceIndex !== -1) {
		headlines.list.splice(_spliceIndex, 1);
	}

	// Randomly select a location
	var _randomIndex = Math.floor(Math.random() * headlines.list.length);
	headlines.currentHeadline = headlines.list[_randomIndex];

	$(headlines.headlineLocation).updateWithText(headlines.currentHeadline, compliments.fadeInterval);

}

headlines.init = function () {
	console.log("headlines init");
	this.updateHeadline();

	this.intervalId = setInterval(function () {
		this.updateHeadline();
	}.bind(this), this.updateInterval)

}