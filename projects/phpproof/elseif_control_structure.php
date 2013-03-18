<?php
//elseif control structure
//M.J. LaFond

//The elseif control structure is Boolean. It is like the else structure except you can put multiple of
//them in there. The example below is showing that if the dinosaur is bigger than the dog, display ‘That
//Dinosaur is bigger than that Dog’. If that is not true, then jump down to the next code and if that is true,
//display ‘That Dinosaur is not bigger than that Dog’. And if that is not true, it will jump down to the next
//code. If that code is true, then it will display ‘The Dinosaur and the Dog are the same size’.

$dinosaur = 5;
$dog = -10000;
if($dinosaur>$dog){
	echo "That dinosaur is bigger than that Dog";
} elseif ($dinosaur<$dog){
	echo "That Dinosaur is not bigger than that Dog";
} elseif ($dinosaur == $dog) {
	echo "The Dinosaur and the Dog are the same size";
}
?>