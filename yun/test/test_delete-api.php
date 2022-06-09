<?php require __DIR__ . '/test-parts/connect_data.php';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (!empty($sid)) {
    $pdo->query("DELETE FROM `good_deed_test_record` WHERE sid=$sid");
}
$come_from = 'test_backstage.php';
if (!empty($_SERVER['HTTP_REFERER'])) {
    $come_from = $_SERVER['HTTP_REFERER'];
}

header("Location: $come_from");
