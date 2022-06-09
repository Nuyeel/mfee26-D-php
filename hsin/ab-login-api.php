<?php require __DIR__ . '/parts-2/connect_db-2.php';
header('Content-Type: application/json');

$account = $_POST['account'];
$password = $_POST['password'];

// echo $account_1;
// exit;
// $sql = "SELECT * FROM `member` WHERE `member`.`account` = $account";
$sql = "SELECT * FROM `member` WHERE `member`.`account` = '$account'";
// $sql = sprintf("SELECT * FROM `member` WHERE `account` = $account_1;");
// $stmt = $pdo->query($sql);
$row = $pdo->query($sql)->fetch();

$output = [
    'success' => false,
    'postData' => '',
    'code' => 0,
    'error' => ''
];

if (empty($_POST['account'])) {
    $output['error'] = '您尚未輸入登入帳戶';
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (empty($_POST['password'])) {
    $output['error'] = '您尚未輸入密碼';
    $output['code'] = 403;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if ($row['account'] == $account and $row['password'] == $password) {
    // $_SESSION['account'] = $account;
    $output['success'] = true;
    $output['code'] = 200;
    $_SESSION['member']['account'] = $account;
<<<<<<< HEAD
    $_SESSION['member']['name'] = $row['name'];
    $_SESSION['member']['birthdate'] = $row['birthdate'];
    $_SESSION['member']['deathdate'] = $row['deathdate'];
    $_SESSION['member']['mobile'] = $row['mobile'];
    $_SESSION['member']['email'] = $row['email'];
=======
>>>>>>> 970e3217017620593ad040be40e5f8f30c85198a
    $_SESSION['member']['sid'] = $row['sid'];
    // $output['postData'] = $_SESSION['member']['account'];
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
} else {
    $output['error'] = '登入失敗！！！';
    $output['code'] = 404;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
