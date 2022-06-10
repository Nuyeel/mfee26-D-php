<?php require __DIR__ . '/test-parts/connect_data.php';

$member_sid = isset($_GET['member_sid']) ? intval($_GET['member_sid']) : 0;
if (!empty($member_sid)) {
    $pdo->query("DELETE FROM `good_deed_test_record` WHERE member_sid=$member_sid");
}
$come_from = 'test-record-list.php';
if (!empty($_SERVER['HTTP_REFERER'])) {
    $come_from = $_SERVER['HTTP_REFERER'];
}

header("Location: $come_from");
