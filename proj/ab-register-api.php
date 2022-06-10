<?php
require __DIR__ . "./parts/connect_db.php";
header('Content-Type: application/json');

$acc = $pdo->query('SELECT `account` FROM `member`');
$row = $acc->fetch();

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

if (empty($_POST['account'])) {
    $output['error'] = '您尚未輸入登入帳戶';
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (empty($_POST['email'])) {
    $output['error'] = '您尚未輸入電子信箱';
    $output['code'] = 402;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (empty($_POST['password'])) {
    $output['error'] = '您尚未輸入密碼';
    $output['code'] = 403;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (empty($_POST['repeatpw'])) {
    $output['error'] = '請再輸入一次密碼';
    $output['code'] = 404;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$account = $_POST['account'];
$email = $_POST['email'] ?? '';
$password = $_POST['password'];
$repeatpw = $_POST['repeatpw'];

foreach ($acc as $v) {
    if (!empty($account) and $account === $v['account']) {
        $output['error'] = '您輸入的帳戶已經被註冊';
        $output['code'] = 401;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }
}

if (!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $output['error'] = '您輸入的電子信箱格式有誤';
    $output['code'] = 405;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if ($password <> $repeatpw) {
    $output['error'] = '需與您先前輸入的密碼一致';
    $output['code'] = 406;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO `member`(
    `account`, `email`, `password`
    ) VALUES (
        ?, ?, ?
    )";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $account,
    $email,
    $hash
]);

if ($stmt->rowCount() == 1) {
    $output['success'] = true;
    // 最近新增資料的 primery key
    $output['lastInsertId'] = $pdo->lastInsertId();
} else {
    $output['error'] = '您的資料無法完成新增';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
