<?php
//$_GET array
//Simon

/*
$_GET array is a build array which contains the values passed by the GET method
When HTML <form> tag uses the GET method to pass data to PHP file the values are stored in a $_GET array because is part of PHP
 GET method mostly used when the page is going to get or read data from the Database Server. 
When request is received by web server, the value that are passed to it stored in the $_GET arrays.                          
Example of $_GET array; if you are looking to get or read someone’s last name from data Server.
*/

$last_name = $_GET['last_name'];
?>