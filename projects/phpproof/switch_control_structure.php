<?php
//Switch control structure
//M.J. LaFond

/*
The switch control structure is like the if structure except that it deals with one variable that can be
executed with a few different options. The example below is showing that depending on what day of the
week it is, it will display ‘today is (day of the week)’.
*/

switch($today){
	case monday:
		echo "today is monday";
	break;
	case tuesday:
		echo "today is tuesday";
	break;
	case wednesday:
		echo "today is wednesday";
	break;
	case thursday:
		echo "today is thursday";
	break;
	case friday:
		echo "today is friday";
	break;
	case saturday:
		echo "today is saturday";
	break;
	case sunday:
		echo "today is sunday";
	break;
}
?>