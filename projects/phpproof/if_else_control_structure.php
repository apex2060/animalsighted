<?php
//if-else control structure
//M.J. LaFond


//The if-else control structure is also Boolean. It determines whether something is true or false and then
//either executes the code or moves on to the else statement and executes that code. The code below is
//showing that if the dinosaur is bigger than the dog, it will execute the code and display ‘That Dinosaur is
//bigger than that Dog. If it is not true, it will move onto the else statement and display ‘That Dinosaur is
//not bigger than that Dog.’

$dinosaur = 5;
$dog = -10000;
if($dinosaur>$dog){
	echo "That Dinosaur is bigger than that Dog";
} else {
	echo "That Dinosaur is not bigger than that Dog";
}
?>