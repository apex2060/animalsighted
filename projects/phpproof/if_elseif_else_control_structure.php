<?php
//if-elseif-else control structure
//M.J. LaFond

/*
If-elseif-else control structure is Boolean. It is the last 3 put together. The example below is showing that
if the first statement is true, execute that code and display to the user ‘That Dinosaur is bigger than that
Dod’. If it is not true, got to the next line of code. If that line of code is true, display ‘The Dinosaur and
the Dog are the same size’. If that code is not true then just display the else statement ‘That Dinosaur
is not bigger than that Dog’. The else makes it so that if none of the if statements are true, then display
that.
*/

$dinosaur = 5;
$dog = -10000;
if($dinosaur>$dog){
	echo "That Dinosaur is bigger than that Dog";
} elseif ($dinosaur == $dog) {
	echo "The Dinosaur and the Dog are the same size";
} else {
	echo "That Dinosaur is not bigger than that Dog";
}
?>