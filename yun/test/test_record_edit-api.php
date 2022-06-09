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
if (empty($sid) or empty($_POST['name'])) {
    $output['error'] = '沒有登入';
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
$account = $_POST['account'];
$password = $_POST['password'];
$name = $_POST['name'];
$birth = $_POST['birth'];
$death = empty($_POST['death']) ? NULL : $_POST['death'];


$q1 = empty($_POST['Q1']) ? NULL : $_POST['Q1'];
$q2 = empty($_POST['Q2']) ? NULL : $_POST['Q2'];
$q3 = empty($_POST['Q3']) ? NULL : $_POST['Q3'];
$q4 = empty($_POST['Q4']) ? NULL : $_POST['Q4'];
$q5 = empty($_POST['Q5']) ? NULL : $_POST['Q5'];


$sql = "UPDATE `good_deed_test_record` SET `member_sid`=?,`member_account`=?,`member_id`=?,`member_name`=?,`member_birth`=?,`member_death`=?,`test_Q1`=?,`test_Q2`=?,`test_Q3`=?,`test_Q4`=?,`test_Q5`=?,`test_score`=? WHERE `sid`=$sid ";
$stmt = $pdo->prepare($sql);

$stmt->execute([
  $account,
  $password,
  $name,
  $birth,
  $death,
  $q1,
  $q2,
  $q3,
  $q4,
  $q5,
]);


if ($stmt->rowCount() == 1) {
    $output['success'] = true;
} else {
    $output['error'] = '資料沒有修改';
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);
