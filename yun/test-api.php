<?php
require __DIR__ . '/test-parts/connect_data.php';
header('Content-Type: application/json');

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];


$q1 = $_POST['Q1'];
$q2 = $_POST['Q2'];
$q3 = $_POST['Q3'];
$q4 = $_POST['Q4'];
$q5 = $_POST['Q5'];


// TODO: 其他欄位檢查


$sql = "INSERT INTO `member_sid`, `member_account`, `member_id`,
`member_name`, `member_birth`, `member_death`, 
`test_Q1`, `test_Q2`, `test_Q3`, `test_Q4`, `test_Q5`, `test_score`
    ) VALUES (
        ?, ?, ?,
        ?, ?, NOW()
    )";

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
    // 最近新增資料的 primery key
    $output['lastInsertId'] = $pdo->lastInsertId();
} else {
    $output['error'] = '資料無法新增';
}
// isset() vs empty()


echo json_encode($output, JSON_UNESCAPED_UNICODE);
