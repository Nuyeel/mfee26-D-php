<?php require __DIR__ . '/parts/connect_db.php'; ?>
<?php

header('Content-Type: application/json');

// 最後要註解 這裡先指定來測試
$_SESSION['member']['sid'] = 41;

$output = [
    'success' => false,
    'code' => 0,
    'errormsg' => '',
    'lastInsertId' => 0,
    'cubetext' => ''
];

// 先檢查

if (isset($_POST['cubeText'])) {
    $ct = $_POST['cubeText'];
} else {
    $output['code'] = 401;
    $output['errormsg'] = '請不要想要破解';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$member_sid = $_SESSION['member']['sid'];

$c_sql = "SELECT COUNT(*) FROM `cube` WHERE `member_sid` = $member_sid;";
$numCube = $pdo->query($c_sql)->fetch(PDO::FETCH_NUM)[0];

if ($numCube == 0) {

    // TODO: 開始製作方塊

    $c_sql =
        "INSERT INTO `cube`(
            `member_sid`, `cube_text`
        ) VALUES (
            ?, ?
        )";

    $stmt = $pdo->prepare($c_sql);

    $stmt->execute([
        $member_sid,
        $ct
    ]);

    if ($stmt->rowCount() == 1) {
        $output['success'] = true;
        $output['code'] = 200;
    } else {
        $output['error'] = '無法新增方塊';
    }

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
} else if ($numCube == 1) {

    // TODO: 開始修改方塊

    $u_sql =
        "UPDATE `cube`
            SET `cube_text` = ?
        WHERE `member_sid` = '$member_sid'
    ";

    $stmt = $pdo->prepare($u_sql);

    $stmt->execute([
        $ct
    ]);

    if ($stmt->rowCount() == 1) {
        $output['success'] = true;
        $output['code'] = 200;
    } else {
        $output['error'] = '無法修改方塊';
    }
    echo json_encode($_POST, JSON_UNESCAPED_UNICODE);
}

?>