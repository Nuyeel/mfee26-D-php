<?php require __DIR__ . '/parts/connect_db.php'; ?>
<?php

header('Content-Type: application/json');

$output = [
    'success' => false,
    'code' => 0,
    'errormsg' => '',
    'lastInsertId' => 0,
    'cubeInstance' => ''
];

// 這隻 api 不需要做任何審查吧
// 遺言不是甚麼秘密吧

$member_sid = $_SESSION['member']['sid'];

// SELECT `cube_text`, `cube_style_sid` FROM `cube` WHERE `member_sid` <> 102 ORDER BY RAND() LIMIT 8;

// SELECT `member`.`account`, `cube`.`cube_text`, `cube`.`cube_style_sid`
// FROM `cube` 
// JOIN `member`
// ON `member`.`sid` = `cube`.`member_sid`
// WHERE `member_sid` <> 102
// LIMIT 8

$where = " WHERE `member_sid` <> $member_sid";
$limit = " LIMIT 8";

$r_sql = "SELECT `member`.`account`, `cube`.`cube_text`, `cube`.`cube_style_sid` FROM `cube` JOIN `member` ON `member`.`sid` = `cube`.`member_sid`" . $where . $limit;

$stmt = $pdo->query($r_sql);
$cubeInstances = $stmt->fetchAll();

if ($stmt->rowCount() >= 1) {
    $output['success'] = true;
    $output['code'] = 200;
    $output['cubeInstance'] = $cubeInstances;
} else {
    $output['error'] = '拿不到歷史方塊欸';
    $output['code'] = 403;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>
