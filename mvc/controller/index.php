<?php
foreach ($_POST as $key => $value) {
	$invalid_characters = array("$", "%", "#", "<", "(", ")", ">", "|", "\'", "\"", "&", "*", "^");
	$form[$key] = str_replace($invalid_characters, "", $value);
}
if($_GET['account']){
	require_once('mvc/model/model_accounts.php');
	if($_GET['account']=='signup'){
		if($_POST['submit'])
			$result=account_create($form);
		if($result['status']=='success')
			include('mvc/view/account/welcome.php');
		else
			include('mvc/view/account/signup.php');
	}else if($_GET['account']=='manage'){
		if($_POST['submit'])
			$result=account_update($form);
		include('mvc/view/account/update.php');
	}else if($_GET['account']=='delete'){
		account_delete(user('user_id'), $_GET['token']);
		include('mvc/view/account/login.php');
	}else if($_GET['account']=='login'){
		if($_POST['submit']){
			$result=account_login($form);
			if($result['status']=='success'){
				include('mvc/view/account/welcome.php');
			}else{
				include('mvc/view/account/login.php');
			}
		}else{
			include('mvc/view/account/login.php');
		}
	}else if($_GET['account']=='logout'){
		session_destroy();
		session_start();
		include('mvc/view/account/login.php');
	}
}else{
	include('mvc/view/site/main.php');
}
echo JSON_encode($_SESSION);
?>