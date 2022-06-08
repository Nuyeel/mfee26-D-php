<?php
require __DIR__ . '/test-parts/connect_data.php';
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
    $output['error'] = '沒有姓名資料';
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'] ?? '';
$mobile = $_POST['mobile'] ?? '';
$birthday = empty($_POST['birthday']) ? NULL : $_POST['birthday'];
$address = $_POST['address'] ?? '';



$sql = "UPDATE `good_deed_test_record` SET `member_sid`=?,`member_account`=?,`member_id`=?,`member_name`=?,`member_birth`=?,`member_death`=?,`test_Q1`=?,`test_Q2`=?,`test_Q3`=?,`test_Q4`=?,`test_Q5`=?,`test_score`=? WHERE `sid`=$sid ";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    $name,
    $email,
    $mobile,
    $birthday,
    $address,
]);


if ($stmt->rowCount() == 1) {
    $output['success'] = true;
} else {
    $output['error'] = '資料沒有修改';
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);
