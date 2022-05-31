<?php
require __DIR__ . "./parts/test_connect_db.php";
header('Content-Type: application/json');



$perPage = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;

if ($page < 1) {
    header('Location: ?page=1');
    exit;
};


$t_sql = "SELECT COUNT(1) FROM `place2`";
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

    $sql = sprintf("SELECT * FROM `place2` ORDER BY `sid` LIMIT %s, %s", ($page - 1) * $perPage, $perPage);

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
