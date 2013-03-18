<?php
//Filter Input Function
//Matt

/*
 * This code checks to see if the value assigned to $value is a valid INT type 
 * or not and then displays whether it is or not.
 */

$value = 123;
   if (filter_var($value, FILTER_VALIDATE_INT)) {
    echo "$value is a valid INT";
} else {
    echo "$value is not a valid INT";
    exit;
}
?>