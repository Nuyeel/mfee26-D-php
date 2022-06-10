<?php
require __DIR__ . "./parts/connect_db.php";
header('Content-Type: application/json');


$output = [
    'success' => false,
    'postData' => $_POST,
    'error' => '',
];

// echo json_encode($output, JSON_UNESCAPED_UNICODE);
// exit;


$date = $_POST['date'];
$country = $_POST['country'];
$city = $_POST['city'];
$dist = $_POST['dist'];
$quota = $_POST['quota'];
$booked = $_POST['booked'] ? $_POST['booked'] : 0;

// TODO: 都沒填的時候

// echo substr($_POST['date'], 0, 4);
// exit;

$sql = "INSERT INTO `place` (
    `year`, `month`, `country`, `city`, `dist`, `quota`, `booked`
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?
    );";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    substr($_POST['date'], 0, 4),
    substr($_POST['date'], 5),
    $country,
    $city,
    $dist,
    $quota,
    $booked,
]);


// 值是1的話 => true
if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    // 最近新增資料的 primery key
    $output['lastInsertId'] = $pdo->lastInsertId();    // 拿到物件的是PDO, 不是$stmt, 所以針對PDO做
    // *先建立訂單拿到訂單的sid, 可以放到詳細訂單資料裡當外鍵
} else {
    $output['error'] = "資料無法新增";
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
