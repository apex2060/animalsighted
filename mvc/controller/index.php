<?php
foreach ($_POST as $key => $value) {
	$invalid_characters = array("$", "%", "#", "<", "(", ")", ">", "|", "\'", "\"", "&", "*", "^");
	$form[$key] = str_replace($invalid_characters, "", $value);
}
foreach ($_GET as $key => $value) {
	$invalid_characters = array("$", "%", "#", "<", "(", ")", ">", "|", "\'", "\"", "&", "*", "^");
	$url[$key] = str_replace($invalid_characters, "", $value);
}

if($_GET['account']){
	require_once('mvc/model/model_accounts.php');
	require_once('mvc/controller/ctrl_accounts.php');
}else if($_GET['animal']){
	require_once('mvc/model/model_animals.php');
	require_once('mvc/controller/ctrl_animals.php');
}else{
	require_once('mvc/model/model_animals.php');
	include('mvc/view/site/main.php');
}
echo JSON_encode($_SESSION);
?>