<?php require __DIR__ . "./parts/connect_db.php"; ?>

<?php

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (!empty($sid)) {
    $pdo->query("DELETE FROM `good_deed_test_record` WHERE `sid`=$sid");
}
$come_from = 'test_record_list.php';
if (!empty($_SERVER['HTTP_REFERER'])) {
    $come_from = $_SERVER['HTTP_REFERER'];
}

header("Location: $come_from");

?>