<?php
require __DIR__ . "./parts/test_connect_db.php";
header('Content-Type: application/json');


$rows = [];

$sql = "SELECT * FROM `place_dist` ORDER BY `country_id`;";
$rows = $pdo->query($sql)->fetchAll();

// print_r($rows);
// exit;

$countrys = [];
foreach ($rows as $v) {
    // print_r($v);
    $c = $v['country_id'];
    $city = $v['city_id'];


    if (!in_array($c, $countrys)) {
        $countrys[$c] = [$city];
    };
};

foreach ($rows as $vv) {
    $country = $vv['country_id'];
    $city = $vv['city_id'];
    if (!in_array($city, $countrys[$country])) {
        array_push($countrys[$country], $city);
    };
};

$distList = [];
foreach ($rows as $e) {
    $city = $e['city_id'];
    $d = $e['dist'];

    if (!in_array($city, $distList)) {
        $distList[$city] = [$d];
    } else if (in_array($city, $distList)) {
        array_push($distList[$city], $d);
    };
};
foreach ($rows as $e) {
    $city = $e['city_id'];
    $d = $e['dist'];
    if (!in_array($d, $distList[$city])) {
        array_push($distList[$city], $d);
    };
};

// print_r($countrys);
// print_r($distList);
// exit;



$output = [
    'countrys' => $countrys,
    'distList' => $distList,
];

echo json_encode($output, JSON_UNESCAPED_UNICODE);
