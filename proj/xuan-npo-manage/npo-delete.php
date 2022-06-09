<?php require __DIR__ . '/../parts/connect_db.php';

$sid = isset($_GET['npo_sid']) ? intval($_GET['npo_sid']) : 0;
if (!empty($sid)) {
    $pdo->query("DELETE FROM `npo_name` WHERE npo_sid=$sid");
}
$come_from = 'npo-manage.php';
if (!empty($_SERVER['HTTP_REFERER'])) {
    $come_from = $_SERVER['HTTP_REFERER'];
}

header("Location: $come_from");
