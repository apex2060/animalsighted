<?php
session_start();
require_once('php/config.php');
require_once('php/init.php');
require_once('php/functions.php');
require_once('mvc/controller/index.php');
echo json_encode($_SESSION);
?>