<?php
//PHP Filter
require('../../php/init.php');

function valString($string){
	$string = filter_var($string, FILTER_SANITIZE_STRING);
	return $string;
}


function emailExists($email){
	global $DB;
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	if($email){
		$stmt = $DB->prepare('SELECT user_id FROM user_info WHERE email = ?');
		if ($stmt->execute([$email])){
			if($stmt->fetchColumn())
				return true;
			else
				return false;
		}else{
			return true;
		}
	}else{
		return true;
	}
}

if(emailExists($_GET['email']))
	echo 'You can not use that';
else
	echo 'go ahead';
?>