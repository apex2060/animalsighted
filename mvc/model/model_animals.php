<?php
/*******************************************************************************
Title:			model_animals.php
Created By:		Ryan Quinlan
Created On:		03/26/2013
Purpose:		To manage all animal models.
				*******************************************************************************/
function animal_sighting($data){
	//Clean Data
	$data['lat'] 		= filter_var($data['lat'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$data['lng'] 		= filter_var($data['lng'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	$data['category_id'] 	= filter_var($data['category_id'], FILTER_SANITIZE_NUMBER_INT);
	$data['category'] 		= filter_var($data['category'], FILTER_SANITIZE_STRING);
	$data['animal_id'] 		= filter_var($data['animal_id'], FILTER_SANITIZE_NUMBER_INT);
	$data['name'] 		= filter_var($data['name'], FILTER_SANITIZE_STRING);
	$data['note'] 		= filter_var($data['note'], FILTER_SANITIZE_SPECIAL_CHARS); 

	//Check for errors
	$error=false;
	if(!filter_var($data['lat'], 		FILTER_VALIDATE_FLOAT)){
		$error=true;
		setError('geo', 'We need to get your location before you can submit a sighting.');
	}
	if(!filter_var($data['lng'], 		FILTER_VALIDATE_FLOAT)){
		$error=true;
		setError('geo', 'We need to get your location before you can submit a sighting.');
	}
	if(!filter_var($data['category_id'], 	FILTER_VALIDATE_INT)){
		if($data['category']>2 &&  $data['category']<25){
			$error=true;
			setError('animal_id', 'You need to select a category that exists - or enter a new one.');
		}else{
			$setCategoryFromString=true;
		}
	}
	if(!filter_var($data['animal_id'], 		FILTER_VALIDATE_INT)){
		if($data['name']>2 &&  $data['name']<25){
			$error=true;
			setError('animal_id', 'You need to select an animal that exists - or enter a new one.');
		}else{
			$setNameFromString=true;
		}
	}

	if($error){
		return $response;
	}else{
		global $DB;
		$user_id = user('user_id');

		try{
			$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$DB->beginTransaction();

			if($setCategoryFromString){
				$stmt = $DB->prepare('INSERT INTO animal_categories (category) VALUES (?)');
				$stmt->bindParam(1, $data['category']);
				$stmt->execute();
				$data['category_id'] = $DB->lastInsertId();
			}
			if($setNameFromString){
				$stmt = $DB->prepare('INSERT INTO animal_list (category_id, name) VALUES (?,?)');
				$stmt->bindParam(1, $data['category_id']);
				$stmt->bindParam(2, $data['name']);
				$stmt->execute();
				$data['animal_id'] = $DB->lastInsertId();
			}


			$stmt = $DB->prepare('INSERT INTO animal_sightings (animal_id, user_id, lat, lng, note) VALUES (?,?,?,?,?)');
			$stmt->bindParam(1, $data['animal_id']);
			$stmt->bindParam(2, $user_id);
			$stmt->bindParam(3, $data['lat']);
			$stmt->bindParam(4, $data['lng']);
			$stmt->bindParam(5, $data['note']);
			$stmt->execute();

			$DB->commit();
			$return['status'] = 'success';
		}catch (Exception $e) {
			$DB->rollBack();
			$return['status'] = 'error';
			$return['error']['message'] = $e->getMessage();
			setError('db', $return['error']['message']);
			$return = $return;
		}
		return $return;
	}
}

function animal_delete($user_id, $token){
//delete data added
	if($_SESSION['deleteToken']==$token){
		global $DB;

		try {
			$DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$DB->beginTransaction();

			$sql = "DELETE from user_list WHERE user_id=?";
			$stmt = $DB->prepare($sql);
			$stmt->bindParam(1, $user_id);
			$stmt->execute();
			$response['status'] = 'success';
			setError('message', 'Animal deleted.');
		} catch (Exception $e) {
			$response['status'] = 'error';
			$response['error']['message'] = $e->getMessage();
			setError('db', $response['error']['message']);
		}
	}else{
		$response['status']='error';
		setError('message', 'Animal could not be deleted at this time.');
	}

	return $response;
}

function animal_list($orderBy=false, $category_id=false){
	global $DB;
	if($category_id)
		$inject=' WHERE a.category_id=? ';
	$sql = 'SELECT a.*, i.about, i.src, c.category, s.lat, s.lng FROM animal_list a LEFT JOIN animal_info i ON a.animal_id=i.animal_id LEFT JOIN animal_categories c ON a.category_id=c.category_id RIGHT JOIN animal_sightings s ON s.animal_id = a.animal_id '.$inject.' GROUP BY a.animal_id';
	if($orderBy)
		$sql.=' ORDER BY '.$orderBy;
	$stmt = $DB->prepare($sql);
	if($category_id)
		$stmt->bindParam(1, $category_id);
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}

function category_list(){
	global $DB;
	$sql = 'SELECT * FROM animal_categories';
	$stmt = $DB->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}
function animal_details($animal_id){
	global $DB;
	$sql = 'SELECT a.*, i.about, i.src, c.category FROM animal_list a LEFT JOIN animal_info i ON a.animal_id=i.animal_id LEFT JOIN animal_categories c ON a.category_id=c.category_id WHERE a.animal_id = ? LIMIT 1';
	$stmt = $DB->prepare($sql);
	$stmt->bindParam(1, $animal_id);
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result[0];
}
function category_details($category_id){
	global $DB;
	$sql = 'SELECT * FROM animal_categories WHERE category_id = ? LIMIT 1';
	$stmt = $DB->prepare($sql);
	$stmt->bindParam(1, $category_id);
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result[0];
}
?>