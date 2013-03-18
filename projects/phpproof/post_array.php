<?php
//$_POST array
//Simon

/*
$_POST array is a build array which contains the values passed by the POST method
This post method used when the page is going to post or write data to the Database Server. 
Size  matters, if you what to use more than 4KB of parameters of data, then POST method is the one to use, GET method will not work.
POST method run slower compared to GET method.
Use POST if the form contains sensitive data which you don’t want to display in the URL, example password.
Example of $_POST array;  if you are looking to post or write someone’s last name from data Server.
*/

$last_name = $_POST['last_name'];
?>