<?php require __DIR__ . "./parts/connect_db.php";
header('Content-Type: application/json');


$place_sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

// 還要判斷是否登入
$member = $_SESSION['member']['sid'];

$output = [
    'success' => false,
    'place_sid' => $_GET['sid'],
    'error' => '',
    'member' => $member,
];

// echo json_encode($output, JSON_UNESCAPED_UNICODE);
// exit;


// 確定此會員是否已經有訂單
$sql_m = "SELECT * FROM `place_order` WHERE `member_sid` = $member";
$stmt_m = $pdo->query($sql_m);

// echo $stmt_m->rowCount();
// exit;

if ($stmt_m->rowCount() == 0) {
    $output['success'] = true;
} else {
    $output['error'] = "已有良辰吉地訂單";
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql_add = "INSERT INTO `place_order` (
    `member_sid`, `place_sid`, `date_price`, `place_price`
    ) VALUES (
        ?, ?, '50', '150');";

$sql_update = "UPDATE `place` SET `booked` = `booked`+1 WHERE `place`.`sid` = ?;";


$stmt_add = $pdo->prepare($sql_add);
$stmt_update = $pdo->prepare($sql_update);

$stmt_add->execute([
    $member,
    $place_sid,
]);
$stmt_update->execute([
    $place_sid,
]);


// 值是1的話 => true
if ($stmt_add->rowCount() == 1) {
    $output['success'] = true;
    // 最近新增資料的 primery key
    $output['lastInsertId'] = $pdo->lastInsertId();    // 拿到物件的是PDO, 不是$stmt, 所以針對PDO做
    // *先建立訂單拿到訂單的sid, 可以放到詳細訂單資料裡當外鍵
} else {
    $output['error'] = "訂單無法成立";
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
