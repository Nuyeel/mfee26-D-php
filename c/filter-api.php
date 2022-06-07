<?php
require __DIR__ . "./parts/test_connect_db.php";
header('Content-Type: application/json');


$country = isset($_POST['country']) ? $_POST['country'] : "";
$city = isset($_POST['city']) ? $_POST['city'] : "";
$year = $_POST['year'];
$month = $_POST['month'];

foreach ($_POST as $k => $v) {
    if (!empty($v) and !isset($sql)) {
        $filt = "`$k` = '$v'";
        $sql = "SELECT * FROM `place` WHERE " . $filt;
    } else if (!empty($v) and isset($sql)) {
        $filt = "`$k` = '$v'";
        $sql = $sql . " AND $filt";
    }
};

$sql = $sql . ";";
// echo $sql;

$rows = [];
$rows = $pdo->query($sql)->fetchAll();


$output = [
    'success' => false,
    'postData' => $_POST,
    'rows' => $rows,
];

if (!empty($rows)) {
    $output['success'] = true;
} else {
    $output['success'] = false;
}

// SELECT * FROM `place` WHERE `year` = 2035 AND `country` = '台灣';

echo json_encode($output, JSON_UNESCAPED_UNICODE);
// echo json_encode($rows, JSON_UNESCAPED_UNICODE);
// print_r($rows);
