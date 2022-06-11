<?php require __DIR__ . "./parts/connect_db.php"; ?>

<?php

$member_sid = isset($_GET['member_sid']) ? intval($_GET['member_sid']) : 0;
if (!empty($member_sid)) {
    $pdo->query("DELETE FROM `good_deed_test_record` WHERE `member_sid`=$member_sid");
}
$come_from = 'test_record_list.php';
if (!empty($_SERVER['HTTP_REFERER'])) {
    $come_from = $_SERVER['HTTP_REFERER'];
}

header("Location: $come_from");

?>