<?php
require __DIR__ . '/parts/connect_db.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;
// TODO: 欄位檢查, 後端的檢查
if (empty($sid) or empty($_POST['name'])) {
    $output['error'] = '您尚未輸入姓名資料';
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$name = $_POST['name'];
$birthdate = empty($_POST['birthdate']) ? NULL : $_POST['birthdate'];
$deathdate = empty($_POST['deathdate']) ? NULL : $_POST['deathdate'];
$mobile = $_POST['mobile'] ?? '';
$email = $_POST['email'] ?? '';

if (!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $output['error'] = '您輸入的電子信箱格式有誤';
    $output['code'] = 405;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
// TODO: 其他欄位檢查

$sql = "UPDATE `member` SET `name`=?, `birthdate`=?, `deathdate`=?, `mobile`=?, `email`=? WHERE `sid`=$sid ";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $name,
    $birthdate,
    $deathdate,    
    $mobile,
    $email,
]);


if ($stmt->rowCount() == 1) {
    $output['success'] = true;
} else {
    $output['error'] = '您的資料未完成修改';
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);
