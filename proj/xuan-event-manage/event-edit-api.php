<?php 
require __DIR__ .  '/../parts/connect_db.php'; 

header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];


$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;


if (empty($sid)) {
    $output['error'] = '沒有sid';
    $output['code'] = 401;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}



// STEP1(篩選1): 先檢查再進prepare/execute系統
    $name = $_POST['name'];
    $type = $_POST['act_type'] ;
    $address = $_POST['act_address'] ;
    $address2 = $_POST['act_address_2'] ;
    $ammount = $_POST['ammount'] ;
    $start = $_POST['start'] ;
    $end = $_POST['end'] ;
    // $avatar = $_POST['avatar'] ?? ''; //沒有填值的話，預設是空字串

    if ($_POST['avatar'] == "") {
        $row = $pdo->query("SELECT * FROM npo_act WHERE sid=$sid")->fetch();
        $avatar =  $row['img'];   
    } else {
        $avatar = $_POST['avatar'];
    }


    $nponame = $_POST['npo_name'] ; //主辦單位名稱
    $price = $_POST['price']?? '' ; //報名費用
    $value = $_POST['value']?? '' ; //陰德值回饋
    

// STEP2 (篩選2): 如果有填入值，是否有符合標準



// $sql = "INSERT INTO `npo_act`(
//         `act_title`, `type_sid`,`place_city`,`place_other`,`limit_num`,`start`,`end`,`img`, `npo_name`, `price`, `value`
//         ) VALUES (
//             ?,?,?,
//             ?,?,?,
//             ?,?,?,
//             ?,?
//         )";
    

$sql = "UPDATE `npo_act` SET `img`=?, `type_sid`=?, `price`=?, `value`=?, `start`=?,
`end`=?, `npo_name`=?, `act_title`=?, `place_city`=?, `place_other`=?, `limit_num`=? WHERE `sid` = $sid ";


$stmt = $pdo->prepare($sql);
    

$stmt->execute([
        $avatar,
        $price,
        $value,
        $start,
        $end,
        $nponame,
        $name,
        $address,
        $address2,
        $ammount,
        $type,
]);
    

if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    // $output['lastInsertId'] = $pdo->lastInsertId();
} else {
    $output['error'] = '資料無法新增';
};


echo json_encode($output, JSON_UNESCAPED_UNICODE);


