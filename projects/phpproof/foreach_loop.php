<?php
//For Each Loop
//Matt

/*
 * This foreach loop is used to access birthday information stored in an array. 
 * It will pass through every item in the loop and then display the information in the echo statement.
 */

echo "<ul>";
$birthdays["Matthew"] = "Jan 2";
$birthdays["Mark"] = "Feb 4";
$birthdays["Luke"] = "Mar 6";
$birthdays["John"] = "Apr 8";
 
foreach($birthdays as $key => $value){
      echo "<li>$key's birthday is: $value </li><br>";
}
echo "</ul>";

?>