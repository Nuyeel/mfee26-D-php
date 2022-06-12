<?php require __DIR__ . '/parts/connect_db.php'; ?>
<?php

// 照理來說這邊音樂要寫在資料庫裏面
// 要去跟資料庫拿資料
// 但我不確定寫不寫得完

$output = [
    'success' => false,
    'code' => 0,
    'errormsg' => '',
    'lastInsertId' => 0,
    'musicrows' => ''
];


// echo json_encode($_POST, JSON_UNESCAPED_UNICODE);
// echo gettype($_POST);

if (isset($_POST['musicExist'])) {
    if ($_POST['musicExist'] == 'false') {
        $musicExist = false;
    } else {
        $musicExist = true;
    }
} else {
    $output['code'] = 400;
    $output['errormsg'] = '沒有收到請求';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}


// echo $_POST['musicExist'];

if ($musicExist) {
    $output['errormsg'] = '已經有歌聽了';
    $output['code'] = 401;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$where = " WHERE 1";
$m_sql = "SELECT `music_type_en`, `music_type_ch` FROM `music_category`" . $where;
$musicRows = $pdo->query($m_sql)->fetchAll();

$output['success'] = true;
$output['code'] = 200;
$output['musicrows'] = $musicRows;

echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>

