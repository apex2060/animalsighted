<?php
//Not (!) operator
//Ryan Quinlan

/*	
*	The ! operator can be used to reverse a return
*/	

$favoriteNumber = 21;
$isBest = ($favoriteNumber==22);
if(!$isBest){
	echo 'You need a new favorite number.';
}else{
	echo 'You have a good favorite number';
}