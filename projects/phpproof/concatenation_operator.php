<?php
//Concatenation operator
//Ryan Quinlan

/*	
*	The . Concatenation operator is used to link multiple items together.
*/	

$favoriteNumber = 21;
$isBest = ($favoriteNumber==22);
if(!$isBest){
	echo $favoriteNumber.' is not the best number.  Quick!  Get a new favorite number.';
}

//this checks if your number is NOT the best number
//and advises you to get a better number if it isn't