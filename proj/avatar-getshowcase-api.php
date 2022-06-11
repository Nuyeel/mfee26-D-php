<?php
require __DIR__ . './parts/connect_db.php';
header('Content-Type: application/json');

$mid = $_POST['mid'];

$avatars = $pdo->query("SELECT * FROM `showcase` WHERE `member_sid` = $mid ORDER BY `avatar_created_at` DESC")->fetchAll();


echo json_encode($avatars, JSON_UNESCAPED_UNICODE);