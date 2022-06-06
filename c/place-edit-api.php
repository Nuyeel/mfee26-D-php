<?php
require __DIR__ . "./parts/test_connect_db.php";
header('Content-Type: application/json');


$output = [
    'success' => false,
    'postData' => $_POST,
    'error' => '',
];

// echo json_encode($output, JSON_UNESCAPED_UNICODE);
// exit;

$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;

$date = $_POST['date'];
$country = $_POST['country'];
$city = $_POST['city'];
$dist = $_POST['dist'];
$quota = $_POST['quota'];
$booked = $_POST['booked'] ? $_POST['booked'] : 0;

// TODO: 都沒填的時候

// echo substr($_POST['date'], 0, 4);
// exit;

$sql = "UPDATE `place` SET `year`=?, `month`=?, `country`=?, `city`=?, `dist`=?, `quota`=?, `booked`=? WHERE sid=$sid;";

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
} else {
    $output['error'] = "資料無法修改";
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
