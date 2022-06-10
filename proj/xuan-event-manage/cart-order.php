<?php require __DIR__ . '/../parts/connect_db.php'; ?>

<?php

header('Content-Type: application/json');

// 必須是登入狀態 所以沒登入要跳轉
// if (!$_SESSION['member']['account']) {
//     header('location: ../login.php');
// }

$output = [
    'success' => false,
    'code' => 0,
    'errormsg' => '',
    'lastInsertId' => 0
];

$member_sid = $_SESSION['member']['sid'];

// 購物車必須不是空的
if (!empty($_SESSION['cart'])) {

// 開始新增活動訂單

    $c_sql = 
        "INSERT INTO `act_order` (
            `member_sid`, `last_modified_at`
        ) VALUES (
            ?, NOW()
        )"
    ;

    $stmt = $pdo->prepare($c_sql);

    $stmt->execute([
        $member_sid
    ]);

    if ($stmt->rowCount() == 1) {
        $output['success'] = true;
        $output['code'] = 200;

    } else {
        $output['errormsg'] = '無法新增活動訂單';
    }

    // 在這裡抓出訂單 sid

    $order_sid = $pdo->lastInsertId(); 

    // 開始新增活動訂單明細

    $act_sids = array_keys($_SESSION['cart']);


    // echo json_encode($act_sids, JSON_UNESCAPED_UNICODE);





    $c_sql = 
        "INSERT INTO `act_order_details` (
            `order_sid`, `order_act_sid`
        ) VALUES (
            ?, ?
        )"
    ;

    $stmt = $pdo->prepare($c_sql);
    // $rowsNum = 0;
    // $str = [];

    foreach ($act_sids as $v) {
        $stmt->execute([
            $order_sid,
            $v
        ]);

        // $rowsNum += 1;
        // array_push($str, $rowsNum);
        // echo $rowsNum
    }

    // if ($stmt->rowCount() == 1) {
    //     $output['success'] = true;
    //     $output['code'] = 200;
    // } else {
    //     $output['errormsg'] = '無法新增活動訂單';
    // }
        
    // echo json_encode($str, JSON_UNESCAPED_UNICODE);
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    // 清除 SESSION 中的購物車資料
    unset($_SESSION['cart']); 

}

?>