<?php
	session_start();
	require_once('../../../../php/config.php');
	require_once('../../../../php/init.php');
	require_once('../../../../php/functions.php');

	if(user('auth')==1){
		$data['animal_id'] 	= filter_var($_POST['animal_id'], FILTER_SANITIZE_NUMBER_INT);
		$data['name'] 		= filter_var($_POST['name'], FILTER_SANITIZE_STRING); 
		if(is_numeric($data['animal_id'])){
			$sql = "UPDATE animal_list SET name=? WHERE animal_id=?";
			$stmt = $DB->prepare($sql);
			$stmt->execute(array($data['name'], $data['animal_id']));

			$result['status']='success';
			$result['message']='Name updated successfully!';
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