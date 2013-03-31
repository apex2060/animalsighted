<?php
	session_start();
	require_once('../../../../php/config.php');
	require_once('../../../../php/init.php');
	require_once('../../../../php/functions.php');

	if(user('auth')==1){
		$data['animal_id'] 	= filter_var($_POST['animal_id'], FILTER_SANITIZE_NUMBER_INT);
		$data['about'] 		= filter_var($_POST['about'], FILTER_SANITIZE_SPECIAL_CHARS); 
		if(is_numeric($data['animal_id'])){
			$sql = "DELETE from animal_list WHERE animal_id=?";
			$stmt = $DB->prepare($sql);
			$stmt->bindParam(1, $data['animal_id']);
			$stmt->execute();

			$result['status']='success';
			$result['message']='Animal Deleted!';
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