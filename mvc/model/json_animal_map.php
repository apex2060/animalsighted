<?php
session_start();
require_once('../../php/config.php');
require_once('../../php/init.php');
require_once('../../php/functions.php');

$sql = 'SELECT a.lat, a.lng, a.note, a.created_on, u.first_name, u.last_name FROM animal_sightings a INNER JOIN user_info u ON a.user_id=u.user_id WHERE a.animal_id = ?';
$stmt = $DB->prepare($sql);
$stmt->bindParam(1, $_GET['animal_id']);
$stmt->execute();
$result = $stmt->fetchAll();

echo json_encode($result);
?>