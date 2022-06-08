<?php
require __DIR__ . "./parts/connect_db.php";
header('Content-Type: application/json');



$perPage = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$sort = isset($_GET['sort']) ? intval($_GET['sort']) : 0; //預設用sid ASC


$order = "`place`.`sid` ASC";

if (!empty($sort) and $sort == 1) {
    $order = "`place`.`year` ASC";
} else if (!empty($sort) and $sort == 2) {
    $order = "`place`.`year` DESC";
};


if ($page < 1) {
    header('Location: ?page=1');
    exit;
};


$t_sql = "SELECT COUNT(1) FROM `place`";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
// echo $totalRows;
// exit;
$totalPages = ceil($totalRows / $perPage);

$rows = [];

if ($totalRows > 0) {
    if ($page > $totalPages) {
        header("Location: ?page=$totalPages");
        exit;
    };

    $sql = sprintf("SELECT * FROM `place` ORDER BY $order LIMIT %s, %s", ($page - 1) * $perPage, $perPage);

    $rows = $pdo->query($sql)->fetchAll();
};

$output = [
    'perPage' => $perPage,
    'page' => $page,
    'totalRows' => $totalRows,
    'totalPages' => $totalPages,
    'rows' => $rows,
];

echo json_encode($output, JSON_UNESCAPED_UNICODE);
