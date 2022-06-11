<?php require __DIR__ . '/parts/connect_db.php'; ?>
<?php

$output = [
    'success' => false,
    'code' => 0,
    'errormsg' => '',
    'lastInsertId' => 0,
    'cubepatternrows' => ''
];

// 這隻 PHP 不需要任何驗證

// echo $_POST['musicExist'];

$where = " WHERE 1";
$r_sql = "SELECT `cube_img_a`, `cube_img_b`, `cube_img_c`, `cube_img_t`, `cube_color_font` FROM `cube_category`" . $where;

$stmt = $pdo->query($r_sql);
$cubePatternRows = $stmt->fetchAll();

if ($stmt->rowCount() >= 1) {
    $output['success'] = true;
    $output['code'] = 200;
    $output['cubepatternrows'] = $cubePatternRows;
} else {
    $output['error'] = '拿不到樣式欸';
    $output['code'] = 403;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>

