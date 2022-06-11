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
    'musicname' => ''
];

// echo json_encode($_POST['cubeMusicType'], JSON_UNESCAPED_UNICODE);
// echo gettype($_POST);

if (isset($_POST['cubeMusicType'])) {
    $cmt = json_encode($_POST['cubeMusicType'], JSON_UNESCAPED_UNICODE);
} else {
    $output['code'] = 401;
    $output['errormsg'] = '請不要想要破解';
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
    exit;
}

$where = " WHERE `cube_music_type` = $cmt";
$t_sql = "SELECT COUNT(*) FROM `cube_music`" . $where;
$numMusic = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];

if ($numMusic == 0) {
    $output['code'] = 401;
    $output['errormsg'] = '沒有這個類別，請不要想要破解。';
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
    exit;
}

$m_sql = "SELECT `cube_music_name` FROM `cube_music`" . $where . "ORDER BY RAND() LIMIT 1";
$musicName = $pdo->query($m_sql)->fetch();

$output['success'] = true;
$output['code'] = 200;
$output['musicname'] = $musicName;

echo json_encode($output, JSON_UNESCAPED_UNICODE);

// ?>