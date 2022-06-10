<?php 
require __DIR__ .  '/parts/connect_db.php'; 

header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];


// STEP1(篩選1): 先檢查再進prepare/execute系統
    // $name = $_POST['name'];
    // $type = $_POST['act_type'] ;
    // $address = $_POST['act_address'] ;
    // $address2 = $_POST['act_address_2'] ;
    // $ammount = $_POST['ammount'] ;
    // $start = $_POST['start'] ;
    // $end = $_POST['end'] ;
    

// STEP2 (篩選2): 如果有填入值，是否有符合標準



$sql = "INSERT INTO `npo_act`(
        `act_title`, `type_sid`,`place_city`,`place_other`,`limit_num`,`start`,`end`
        ) VALUES (
            ?,?,?,?,?,?,?
        )";
    
$stmt = $pdo->prepare($sql);
    

$stmt->execute([
        $name,
        $type,
        $address,
        $address2,
        $ammount,
        $start,
        $end
]);
    

if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    $output['lastInsertId'] = $pdo->lastInsertId();
} else {
    $output['error'] = '資料無法新增';
};


echo json_encode($output, JSON_UNESCAPED_UNICODE);


