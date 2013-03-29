<?php
	session_start();
	require_once('../../../../php/config.php');
	require_once('../../../../php/init.php');
	require_once('../../../../php/functions.php');

	if(user('auth')==1){
		$data['animal_id'] 	= filter_var($_POST['animal_id'], FILTER_SANITIZE_NUMBER_INT);
		$data['about'] 		= filter_var($_POST['about'], FILTER_SANITIZE_SPECIAL_CHARS); 
		if(is_numeric($data['animal_id'])){
			$sql = "UPDATE animal_info SET about=? WHERE animal_id=?";
			$stmt = $DB->prepare($sql);
			$stmt->execute(array($data['about'], $data['animal_id']));
			if($stmt->rowCount() == 0){
				$insert = 'INSERT INTO animal_info (animal_id, about) VALUES (?,?)';
				$stmt = $DB->prepare($insert);
				$stmt->execute(array($data['animal_id'], $data['about']));
			}

			$result['status']='success';
			$result['message']='Information updated successfully!';
		}else{
			$result['status']='error';
			$result['message']='Sorry, there was an error finding this animal.';
		}
	}else{
		$result['status']='error';
		$result['message']='You do not have permission to update this.';
	}
	echo json_encode($result);
?>