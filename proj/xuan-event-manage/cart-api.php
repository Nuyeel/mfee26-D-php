<?php
// 加入項目: sid, quantity (add) 
// 移除項目: sid (remove)
// 修改項目: sid quantity (update)

//用$_SESSION寫購物車，不用去連資料庫，缺點是不能去紀錄購物車狀態
//用資料庫方式記錄購物內容，用戶需要去登入才會知道加入什麼商品
//好處: 用不同電腦都可以查到購物車內容 

session_start();
// require '/../parts/connect-db.php';

$output = [];   //要做資料CRUD

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$quantity = isset($_GET['quantity']) ? intval($_GET['quantity']) : 0;

$output = [];

if ($sid > 0) {

    if ($quantity > 0) {
        // 加入項目: sid, quantity (cmd: add)
        // 修改項目: sid, quantity (cmd: update)
        // TODO: 檢查有沒有這項商品 

        $_SESSION['cart'][$sid] = $quantity;
    } else {
        // 移除項目: sid (cmd: remove)
        unset($_SESSION['cart'][$sid]);
    }
}

// 讀取所有項目: (cmd: read)
$output['cart'] = $_SESSION['cart'];
echo json_encode($output);


// -------------------------------------------------------

// $sql = "INSERT INTO `npo_name`(
//     `name`, `email`, `mobile`, 
//     `intro`, `create_at`
//     ) VALUES (
//         ?, ?, ?,
//         ?, NOW()
//     )";


// $stmt = $pdo->prepare($sql);

// $stmt->execute([
//         $name,
//         $email,
//         $mobile,
//         $intro,
// ]);


// if ($stmt->rowCount() == 1) {
//     $output['success'] = true;
//     $output['lastInsertId'] = $pdo->lastInsertId();
// } else {
//     $output['error'] = '資料無法新增';
// };


// echo json_encode($output, JSON_UNESCAPED_UNICODE);



