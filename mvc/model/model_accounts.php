<?php
/*******************************************************************************
Title:			model_accounts.php
Created By:		Ryan Quinlan
Created On:		02/13/2013
Purpose:		To post all site variables which will need to be used throughout
				the site.
*******************************************************************************/
function is_clean($form){
	$ERROR = array();
	//clean & validate form

	if(strlen($form['username'])<5 || strlen($form['username'])>15){
		$ERROR['username']='Your username must be between 5 and 15 chars long.';
	}
	if($form['password']!=$form['password2']){
		$ERROR['password2']='Your passwords must match';
	}
	if(strlen($form['password'])<5 || strlen($form['password'])>15){
		$ERROR['password']='Your password must be between 5 and 15 chars long.';
	}
	if(strlen($form['first_name'])<2){
		$ERROR['first_name']='You need a name!';
	}
	if(strlen($form['last_name'])<2){
		$ERROR['last_name']='You need a last name too!';
	}
	if(!filter_var($form['email'], FILTER_VALIDATE_EMAIL)){
		$ERROR['email']='Your email is invalid.';
	}
	if(count($ERROR)>0){
		$_SESSION['ERROR']=$ERROR;
		return false;
	}else{
		return true;
	}
}

function account_create($data){
	global $DB;
	$ePass=encrypt($data['username'], $data['password']);
	try{
		$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$DB->beginTransaction();

		$stmt = $DB->prepare('INSERT INTO user_list (username, password) VALUES (?,?)');
		$stmt->bindParam(1, $data['username']);
		$stmt->bindParam(2, $ePass);
		$stmt->execute();
		$user_id = $DB->lastInsertId();

		$stmt = $DB->prepare('INSERT INTO user_info (user_id, first_name, last_name, email) VALUES (?,?,?,?)');
		$stmt->bindParam(1, $user_id);
		$stmt->bindParam(2, $data['first_name']);
		$stmt->bindParam(3, $data['last_name']);
		$stmt->bindParam(4, $data['email']);
		$stmt->execute();

		$DB->commit();
		$return = true;
	}catch (Exception $e) {
		$DB->rollBack();
		$_SESSION['ERROR']['message']=$e->getMessage();
		$return = false;
	}
	return $return;
}
function account_update($data){
	global $DB;
	return $return;
}
function account_delete($data){
	
}

function account_login($data){
	global $DB;
	$sql = 'SELECT * FROM user_info WHERE user_id = (SELECT user_id FROM user_list WHERE username=:username AND password=:password)';
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(':username', $data['username']);
    $stmt->bindValue(':password', encrypt($data['username'], $data['password']));
    $stmt->execute();
    $result = $stmt->fetchAll();
    if(count($result)>0){
    	$_SESSION['valid']=$result[0];
    }else{
    	$result['error'][]='Your username or password are incorrect.';
    }
    return $result;
}

function encrypt($username, $password){
	$salt = hash('sha256', '84a848nwav8ona8ovjsfoa8w3' . strtolower($username));
	$hash = $salt . $password;
	for ( $i = 0; $i < 1000; $i ++ ) {
		$hash = hash('sha256', $hash);
	}
	$hash = $salt . $hash;
	return $hash;
}

?>
