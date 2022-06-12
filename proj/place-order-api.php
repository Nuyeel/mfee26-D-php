<?php require __DIR__ . "./parts/connect_db.php";
header('Content-Type: application/json');

// if (!$_SESSION['member']['account']) {
//     header('Location: ab-login.php');
//     // exit;
// }

// 判斷是否登入
if (!$_SESSION['member']['account']) {
    echo 'false';
    // header('location:ab-login.php');
    exit;
};


$place_sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$replace = isset($_GET['replace']) ? intval($_GET['replace']) : 0;


// 
$member = $_SESSION['member']['sid'];


// 是要替換訂單時
if ($replace == 1) {

    $output = [
        'success' => false,
        'place_sid' => $_GET['sid'],
        'error' => '',
        'member' => $member,
        'replace' => 1,
    ];

    // 原本的訂單 booking數 -1
    $sql_m_place = "SELECT * FROM `place_order` WHERE `member_sid` = $member";
    $stmt_m_place = $pdo->query($sql_m_place)->fetch();
    $m_place = $stmt_m_place['place_sid'];
    // var_dump($stmt_m_place);
    // exit;
    $sql_update1 = "UPDATE `place` SET `booked` = `booked`-1 WHERE `place`.`sid` = ?;";

    // 刪掉原本訂單
    $sql_del = "DELETE FROM `place_order` WHERE `member_sid` = $member";
    $stmt_del = $pdo->query($sql_del);

    // 新增新訂單
    $sql_add = "INSERT INTO `place_order` (
        `member_sid`, `place_sid`, `date_price`, `place_price`
        ) VALUES (
            ?, ?, '50', '150');";

    // 新訂單 booking 數 +1
    $sql_update2 = "UPDATE `place` SET `booked` = `booked`+1 WHERE `place`.`sid` = ?;";


    $stmt_update1 = $pdo->prepare($sql_update1);
    $stmt_add = $pdo->prepare($sql_add);
    $stmt_update2 = $pdo->prepare($sql_update2);


    $stmt_update1->execute([
        $m_place,
    ]);

    $stmt_add->execute([
        $member,
        $place_sid,
    ]);
    $stmt_update2->execute([
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
    exit;
};


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

$sql_m_place = "SELECT `place_sid` FROM `place_order` WHERE `member_sid` = $member";
$stmt_m_place = $pdo->query($sql_m_place)->fetch();
// var_dump($stmt_m_place);
// exit;
$m_place = !empty($stmt_m_place['place_sid']) ? $stmt_m_place['place_sid'] : 0;

// print_r($stmt_m->rowCount());
// exit;

// if ($stmt_m->rowCount() == 0) {
//     $output['success'] = true;
// } else {
//     $output['error'] = "已有良辰吉地訂單";
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }

// 判斷這筆訂單是否跟會員原本的一樣
if ($stmt_m->rowCount() == 0) {
    $output['success'] = true;
} else if ($place_sid == $m_place) {
    $output['error'] = "訂單資料重複";
    $output['errorType'] = 'repeat';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
} else if ($place_sid != $m_place) {
    $output['error'] = "是否更換訂單";
    $output['errorType'] = 'dif';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
};

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
