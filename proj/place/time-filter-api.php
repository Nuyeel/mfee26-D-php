<?php
require __DIR__ . "/../parts/connect_db.php";
header('Content-Type: application/json');


$start = isset($_POST['start_month']) ? $_POST['start_month'] : "";
$end = isset($_POST['end_month']) ? $_POST['end_month'] : "";

// $start_time = $start . "-01";
// $end_time = $end . "-31";

$start_year = substr($start, 0, 4);
$start_month = substr($start, 5);
$end_year = substr($end, 0, 4);
$end_month = substr($end, 5);


// 第一年後面月份
$sql1 = "SELECT * FROM `place` WHERE `year` = '$start_year' AND  `month` >= '$start_month';";
$row1 = $pdo->query($sql1)->fetchAll();

// 中間整年
$ys = $start_year + 1;
$ye = $end_year - 1;
$sql2 = "SELECT * FROM `place` WHERE `year` BETWEEN '$ys' AND '$ye';";
$row2 = $pdo->query($sql2)->fetchAll();

// 最後一年前面月份
$sql3 = "SELECT * FROM `place` WHERE `year` = '$end_year' AND  `month` <= '$end_month';";
$row3 = $pdo->query($sql3)->fetchAll();


$rows = [];

if (!empty($row1)) {
    foreach ($row1 as $v) {
        $rows[] = $v;
    }
};
if (!empty($row2)) {
    foreach ($row2 as $v) {
        $rows[] = $v;
    }
};
if (!empty($row3)) {
    foreach ($row3 as $v) {
        $rows[] = $v;
    }
};

// print_r($rows);
// $rows = $pdo->query($sql)->fetchAll();


$perPage = 10;
$totalRows = count($rows);
$totalPages = ceil($totalRows / $perPage);



$output = [
    'success' => false,
    'postData' => $_POST,
    'rows' => $rows,
    'totalPages' => $totalPages,
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
