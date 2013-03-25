<?php
/*******************************************************************************
Title:			model_accounts.php
Created By:		Ryan Quinlan
Created On:		02/13/2013
Purpose:		To post all site variables which will need to be used throughout
				the site.
				*******************************************************************************/
function account_create($data){
	$response = is_clean_create($data);
	if($response['status']!='success'){
		return $response;
	}else{
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
			$return['status'] = 'success';
		}catch (Exception $e) {
			$DB->rollBack();
			$return['status'] = 'error';
			$return['error']['message'] = $e->getMessage();
			$return = $return;
		}
		return $return;
	}
}

function account_update($data){
	$response = is_clean_update($data);
	if($response['status']!='success'){
		return $response;
	}else{
		global $DB;
		$ePass=encrypt(user('username'), $data['password']);
		try{
			$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$DB->beginTransaction();

			if(count($data['password'])>=5){
				$sql = "UPDATE user_list SET password=? WHERE user_id=?";
				$stmt = $DB->prepare($sql);
				$stmt->execute(array($ePass, user('user_id')));
			}

			$sql = "UPDATE user_info SET first_name=?, last_name=?, email=? WHERE user_id=?";
			$stmt = $DB->prepare($sql);
			$stmt->execute(array($data['first_name'], $data['last_name'], $data['email'], user('user_id')));

			$DB->commit();
			$return['status'] = 'success';
		}catch (Exception $e) {
			$DB->rollBack();
			$return['status'] = 'error';
			$return['error']['message'] = $e->getMessage();
			$return = $return;
		}
		return $return;
	}
}

function account_delete($data){
//delete data added
	global $DB;

	try {
		$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$DB->beginTransaction();

		$sql = "DELETE from user_list WHERE user_id=?";
		$stmt = $DB->prepare($sql);
		$stmt->bindParam(1, $data['id']);
		$stmt->execute();
		$return['status'] = 'success';
	} catch (Exception $e) {
		$return['status'] = 'error';
		$return['error']['message'] = $e->getMessage();
	}

	return $return;
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








function is_clean_create($form){
	$error = array();
//clean & validate form
	if(strlen($form['username'])<5 || strlen($form['username'])>15){
		$error['username']='Your username must be between 5 and 15 chars long.';
	}
	if($form['password']!=$form['password2']){
		$error['password2']='Your passwords must match';
	}
	if(strlen($form['password'])<5 || strlen($form['password'])>15){
		$error['password']='Your password must be between 5 and 15 chars long.';
	}
	if(strlen($form['first_name'])<2){
		$error['first_name']='You need a name!';
	}
	if(strlen($form['last_name'])<2){
		$error['last_name']='You need a last name too!';
	}
	if(!filter_var($form['email'], FILTER_VALIDATE_EMAIL)){
		$error['email']='Your email is invalid.';
	}
	if(count($error)>0){
		$response['status']='error';
		$response['error']=$error;
		return $response;
	}else{
		$response['status']='success';
		return $response;
	}
}
function is_clean_update($form){
	$error = array();
//clean & validate form
	if(strlen($form['first_name'])<2){
		$error['first_name']='You need a name!';
	}
	if(strlen($form['last_name'])<2){
		$error['last_name']='You need a last name too!';
	}
	if(!filter_var($form['email'], FILTER_VALIDATE_EMAIL)){
		$error['email']='Your email is invalid.';
	}
	if(count($error)>0){
		$response['status']='error';
		$response['error']=$error;
		return $response;
	}else{
		$response['status']='success';
		return $response;
	}
}
?>