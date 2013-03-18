<?php
//False operator
//Ryan Quinlan

/*	
*	The false operator is more of a boolean comparison value.
*	an if statement will not evaluate if you say false
*/	

if(false){
	echo 'You will not see me.';
}else{
	echo 'It was false.';
}

//this checks if false (which it always will be)
//and therefore skips the first response
//and tells you the else