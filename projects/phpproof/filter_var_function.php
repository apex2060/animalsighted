<?php
//Filter Variable Function
//Matt

/*
 * This code can be used to "sanitize" the INT string stored in $value, meaning 
 * it will remove the additional characters.
 */

$value = abc123;
$value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
echo "$value";

?>