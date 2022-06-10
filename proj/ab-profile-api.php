<?php require __DIR__ . "./parts/connect_db.php";
// $pageName = 'ab-profile';
// $title = '會員中心 - 靈魂轉生平台';

$result = $pdo->query('SELECT `name` FROM `member` ORDER BY `sid` DESC LIMIT 1;');
$row = $result->fetch();

echo json_encode($output, JSON_UNESCAPED_UNICODE);
