<?php
require __DIR__ . "./parts/test_connect_db.php";
header('Content-Type: application/json');


$output = [
    'success' => false,
    'postData' => $_POST,
    'error' => ''
];

$country = $_POST['country'];
$city = $_POST['city'];
$year = $_POST['year'];
$month = $_POST['month'];

foreach ($_POST as $k => $v) {
    if (!empty($v) and !isset($sql)) {
        $filt = "`$k` = '$v'";
        $sql = "SELECT * FROM `place` WHERE " . $filt;
    } else if (!empty($v)) {
        $filt = "$k = $v";
        $sql . "AND $filt";
    }
};

$sql = $sql . ";";

$rows = [];
$rows = $pdo->query($sql)->fetchAll();

// SELECT * FROM `place` WHERE `year` = 2035 AND `country` = '台灣';

// echo json_encode($output, JSON_UNESCAPED_UNICODE);
print_r($rows);
