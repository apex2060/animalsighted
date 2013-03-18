<?php
//For Loop
//Matt

/*
 * When this code is executed it will pass through the for loop and 
 * the "i++" will keep incrementing "i" until its condition of being less than 10 is met. 
 * It will echo the results after each pass onto the screen.
 */

echo "<ul>";
for ($i=1; $i<10; $i++)
  {
  echo "<li>The " . $i . " pass through the loop </li><br>";
  }
echo "</ul>";
?>