<?php
require __DIR__ . "/../parts/connect_db.php";
header('Content-Type: application/json');


$rows = isset($_POST['deleteData']) ? $_POST['deleteData'] : [];

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

// 如果值不是空的，才執行
if (!empty($rows)) {
    foreach ($rows as $sid) {
        $pdo->query("DELETE FROM `place` WHERE sid=$sid");
    };
};

// 如果值不是空的，或不為0，才執行
if (!empty($sid)) {
    $pdo->query("DELETE FROM `place` WHERE sid=$sid");
};

// 設定要回去的頁面(頁數)
$come_from = 'place-backstage.php';
if (!empty($_SERVER['HTTP_REFERER'])) {
    $come_from = $_SERVER['HTTP_REFERER'];
};

header("Location: $come_from");
