<?php require __DIR__ . '/parts/connect_db.php'; ?>
<?php

header('Content-Type: application/json');

$output = [
    'success' => false,
    'code' => 0,
    'errormsg' => '',
    'lastInsertId' => 0,
    'cubeColors' => ''
];

// 先檢查

if (isset($_GET['cubeImgA'])) {
    $cia = $_GET['cubeImgA'];
} else {
    $output['code'] = 401;
    $output['errormsg'] = '請不要想要破解';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$where = " WHERE `cube_img_a` = '$cia'";
$r_sql = "SELECT `cube_color_1`, `cube_color_2` FROM `cube_category`" . $where;

$stmt = $pdo->query($r_sql);
$cubeColors = $stmt->fetch();

if ($stmt->rowCount() >= 1) {
    $output['success'] = true;
    $output['code'] = 200;
    $output['cubeColors'] = $cubeColors;
} else {
    $output['error'] = '拿不到樣式欸';
    $output['code'] = 403;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>
