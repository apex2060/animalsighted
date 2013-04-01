<?php
/*******************************************************************************
Title:			init.php
Created By:		Ryan Quinlan
Created On:		02/13/2013
Purpose:		Initate
*******************************************************************************/
require_once('config.php');
$_SESSION['ERROR']=array();

try {
    $DB = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USERNAME, DB_PASSWORD);
} catch (PDOException $e) {
    include('/mvc/view/site/error/500.php');
    die();
}
?>