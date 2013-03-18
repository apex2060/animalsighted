<?php
//Or and || operators
//Ryan Quinlan

/*	
*	The || and 'or' operators are used to join comparisons in an if statement
*	If one, the other, or both are correct it will return true.
*/	

$favoriteNumber = 22;
if($favoriteNumber < 21 || $favoriteNumber > 23){
	echo 'Sorry your number is not the best.';
}