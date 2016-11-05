var bCycle = true;
var cycleSpeed=6000;

var divs = $('div[class^="cycle-"]').hide(),
  i = 0;

	cycle();

function cycle() {
	console.log(bCycle);
	if(bCycle) {
		divs.eq(i).fadeIn(400)
		           .delay(cycleSpeed)
		           .fadeOut(400, cycle);

		  i = ++i % divs.length;
	}
};


function toggleCycle() {

	bCycle=!bCycle;
	console.log("Cycle: " + bCycle);

	if(!bCycle) {

			if(i===0) {
				i = divs.length-1;
			}
			else {
				i = i-1;
			}
			//is there a better way to cancel fade?
			divs.eq(i).fadeIn(400);
	}

	else {
		cycle();
	}
}


function cycleTo(index) {
  console.log("Cycling to: " + index);
  console.log(divs);

  //if we are cycling, we already updated i to next val, so to get current one, dec by 1.
  if(bCycle) {
      cur = i--;
      bCycle = false;

      if(cur < 0) {
        cur = divs.length-1;
      }
  }
  else {
    cur = i;
  }

  console.log("hiding: " + cur);
  divs.eq(cur).fadeOut(100);

  console.log("showing: " + index);
  divs.eq(index).delay(200).fadeIn(400);
  i = index;
}
