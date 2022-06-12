<?php
require __DIR__ . "./parts/connect_db.php";
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;
$name = $_POST['name'];
$birthdate = empty($_POST['birthdate']) ? NULL : $_POST['birthdate'];
$deathdate = empty($_POST['deathdate']) ? NULL : $_POST['deathdate'];
if (isset($_POST['mobile'])) {
    $mobileReceive = $_POST['mobile'];
    $mobileFormalized = str_replace('-', '', $mobileReceive);
    $mobile = $mobileFormalized;
} else {
    $mobile = '';
}
$email = $_POST['email'] ?? '';

if (!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $output['error'] = '您輸入的電子信箱格式有誤';
    $output['code'] = 405;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "UPDATE `member` SET `name`=?, `birthdate`=?, `deathdate`=?, `mobile`=?, `email`=? WHERE `sid`=$sid ";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    $name,
    $birthdate,
    $deathdate,
    $mobile,
    $email,
]);

$_SESSION['member']['name'] = $name;
$_SESSION['member']['birthdate'] = $birthdate;
$_SESSION['member']['deathdate'] = $deathdate;
$_SESSION['member']['mobile'] = $mobile;
$_SESSION['member']['email'] = $email;

// $stmt->execute([
//     $name,
//     $birthdate,
//     $deathdate,
//     $mobile,
//     $email,
// ]);

if ($stmt->rowCount() == 1) {
    $output['success'] = true;
} else {
    $output['error'] = '您的會員資料未經修改';
}

$output['aaa'] = $_SESSION;
echo json_encode($output, JSON_UNESCAPED_UNICODE);
