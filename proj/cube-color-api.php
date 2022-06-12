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
// 實際上要檢查多一點東西會比較安全
// 比方說檢查帳號 sid 三者都要匹配
// 以後再說吧 

if (isset($_GET['cubeImgA'])) {
    $cia = $_GET['cubeImgA'];
} else {
    $output['code'] = 401;
    $output['errormsg'] = '請不要想要破解';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$where = " WHERE `cube_img_a` = '$cia'";
$r_sql = "SELECT `cube_style_sid`, `cube_color_1`, `cube_color_2` FROM `cube_category`" . $where;

$stmt = $pdo->query($r_sql);
$cubeColors = $stmt->fetch();

if ($stmt->rowCount() >= 1) {
    $output['success'] = true;
    $output['code'] = 200;
    $output['cubeColors'] = $cubeColors;

    // 把 sid 寫進 cube 表中

    $css = $cubeColors['cube_style_sid'];

    $member_sid = $_SESSION['member']['sid'];
    $where = " WHERE `member_sid` = $member_sid";
    $u_sql = 
        "UPDATE `cube` 
        SET `cube_style_sid`= $css" . $where;

    // 這不會出錯也不用 prepare　因為資料是從伺服器來的
    $stmt = $pdo->query($u_sql)->execute();

} else {
    $output['error'] = '拿不到樣式欸';
    $output['code'] = 403;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>
