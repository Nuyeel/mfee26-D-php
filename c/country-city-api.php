<?php
require __DIR__ . "./parts/test_connect_db.php";
header('Content-Type: application/json');


$rows = [];

$sql = "SELECT c.`country`, pc.city FROM `place_country` c JOIN `place_city` pc ON pc.`country_id` = c.country 
ORDER BY c.country";
$rows = $pdo->query($sql)->fetchAll();

// "SELECT c.`country`, pc.city, COUNT(1) FROM `place_country` c JOIN `place_city` pc ON pc.`country_id` = c.country GROUP BY c.country"

// SELECT c.`country`, pc.city FROM `place_country` c JOIN `place_city` pc ON pc.`country_id` = c.country 
// ORDER BY c.country

// print_r($rows);

$countrys = [];

foreach ($rows as $v) {
    // print_r($v);

    $c = $v['country'];
    $city = $v['city'];

    if (!in_array($c, $countrys)) {
        $countrys[$c] = [$city];
    };
};
foreach ($rows as $vv) {
    $country = $vv['country'];
    $city = $vv['city'];
    array_push($countrys[$country], $city);
};

// print_r($countrys);
$countryList = array_keys($countrys);
// print_r($countryList);
// exit;


$output = [
    'countryList' => $countryList,
    'countryCity' => $countrys,
];

echo json_encode($output, JSON_UNESCAPED_UNICODE);
