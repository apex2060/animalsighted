<?php
//Concatenation operator
//Ryan Quinlan

/*	
*	The .= Append operator is used to append values to the right of what already exists
*	inside a given varible.
*/	

$favoriteNumber = 21;
$isBest = ($favoriteNumber==22);
if(!$isBest){
	echo $favoriteNumber.' is not the best number.  Quick!  Get a new favorite number.';
}else{
	$str = 'Your number ';
	$str .= $favoriteNumber;
	$str .= ' is the best number ever!';
	echo $str;
}

//	This code checks if your favorite number is the best number (22)
//	if it is the best number it appends strings together to tell
//	you that you have the best number ever
//	otherwise it says you had better get a new better number