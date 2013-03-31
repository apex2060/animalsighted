<?php
session_start();
require_once('../../php/config.php');
require_once('../../php/init.php');
require_once('../../php/functions.php');

$sql = 'SELECT s.lat, s.lng, s.note, s.created_on, u.first_name, u.last_name, a.name FROM animal_sightings s INNER JOIN user_info u ON s.user_id=u.user_id INNER JOIN animal_list a ON s.animal_id=a.animal_id';
$stmt = $DB->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

echo json_encode($result);
?>