<?php
session_start();
require_once('../../php/config.php');
require_once('../../php/init.php');
require_once('../../php/functions.php');

$sql = 'SELECT * FROM animal_list WHERE category_id = ?';
$stmt = $DB->prepare($sql);
$stmt->bindParam(1, $_GET['categoryId']);
$stmt->execute();
$result = $stmt->fetchAll();

echo json_encode($result);
?>