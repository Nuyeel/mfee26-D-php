<?php require __DIR__ . '/parts/connect_db.php'; ?>
<?php

header('Content-Type: application/json');
$pageName = 'paycheck-api';

// check[] 裡面的第 0 個是 sid
// check[] 裡面的第 1 個是 account

$sid = isset($_POST['check'][0]) ? intval($_POST['check'][0]) : 0; 
$account = $_POST['check'][1] ?? ''; 

$output = [
    'success' => false,
    'code' => 0,
    'errormsg' => '',
    'lastInsertId' => 0,
    'postData' => $_POST
];

// code
// 400 沒登入
// 401 登入狀態下亂傳送資料試誤
//
//
//

// TODO: 後端檢查
// 瀏覽的順序是 
// 結帳
// 音樂選擇 
// 文字輸入 
// 方塊選擇 
// 方塊生成 

// 實際上要驗證很多東西
// 比方說 sid 是不是數字
// account 的長度等等
// 防止有心人士暴力破解
// 這裡先從簡

// 實際上這邊資料從 $_SEESION 來
if (empty($sid) or empty($account)) { 
    $output['code'] = 400;
    $output['errormsg'] = '沒有登入';
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
    exit;
}

// 但是要防止有人在登入狀況下亂送資料
// 所以要驗證
// 我這邊沒有 account 欄位可以拿
// 我先稍微寫就好
$c_sql =
    "SELECT `member_sid`, `account` FROM `member` WHERE `member_sid`=$sid";

$rows = $pdo->query($c_sql)->fetch();

if ($sid <> $rows['member_sid'] or $account <> $rows['account']) {
    $output['code'] = 401;
    $output['errormsg'] = '請不要想要破解';
    echo json_encode($output,JSON_UNESCAPED_UNICODE);
    exit;
}

// 如果都沒問題 就把形象裡面的東西抓出來給前端
// TODO 先寫到這邊
// TODO 先寫到這邊
// TODO 先寫到這邊
// TODO 先寫到這邊
// TODO 先寫到這邊
// TODO 先寫到這邊
// TODO 先寫到這邊
// TODO 先寫到這邊

// $output['postData'];
// echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>