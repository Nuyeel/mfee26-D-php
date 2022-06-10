<?php
require __DIR__ . '/test-parts/connect_data.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

$member_sid = isset($_POST['membersid']) ? intval($_POST['membersid']) : 0;
if (empty($member_sid) or empty($_POST['account'])) {
    $output['error'] = '沒有該帳號';
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
$account = $_POST['account'];
$name = $_POST['name'];
$birth = $_POST['birth'];

$death = empty($_POST['death']) ? NULL : $_POST['death'];


$q1 = empty($_POST['q1']) ? NULL : $_POST['q1'];
$q2 = empty($_POST['q2']) ? NULL : $_POST['q2'];
$q3 = empty($_POST['q3']) ? NULL : $_POST['q3'];
$q4 = empty($_POST['q4']) ? NULL : $_POST['q4'];
$q5 = empty($_POST['q5']) ? NULL : $_POST['q5'];

$score = empty($_POST['score']) ? NULL : $_POST['score'];

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
  $score
]);


if ($stmt->rowCount() == 1) {
    $output['success'] = true;
} else {
    $output['error'] = '資料沒有修改';
}


echo json_encode($output, JSON_UNESCAPED_UNICODE);


