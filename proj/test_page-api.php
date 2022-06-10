<?php require __DIR__ . "./parts/connect_db.php"; ?>

<?php
header('Content-Type: application/json');
// 雖然說陰德值測驗是新增資料 但是因為需要先登入才能做測驗
// 所以會先帶入帳號密碼等資料

$output = [
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];

//使用 sid 做比對 在對應位置填入資料
if (isset($_SESSION['member']['sid'])) {
    $sid = intval($_SESSION['member']['sid']) ;  
} else {
    $sid = 0;
}

$q1 = intval($_POST['Q1']);
$q2 = intval($_POST['Q2']);
$q3 = intval($_POST['Q3']);
$q4 = intval($_POST['Q4']);
$q5 = intval($_POST['Q5']);


// TODO: 其他欄位檢查

$score = $q1 * rand(50, 99) + $q2 * rand(50, 99) + $q3 * rand(50, 99) + $q4 * rand(50, 99) + $q5 * rand(50, 99);

$test_sql =
    "SELECT COUNT(*) 
    FROM `good_deed_test_record`
    WHERE `sid`=$sid";

$rowNumber = $pdo->query($test_sql)->fetch(PDO::FETCH_NUM)[0];

if ($rowNumber == 0) {
    $sql =
        "INSERT INTO `good_deed_test_record`(
        `member_sid`,
        `test_Q1`, `test_Q2`, `test_Q3`, 
        `test_Q4`, `test_Q5`, `test_score`
    ) VALUES (
        ?, 
        ?, ?, ?,
        ?, ?, ?
    )";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $sid,
        $q1,
        $q2,
        $q3,
        $q4,
        $q5,
        $score
    ]);

    if ($stmt->rowCount() == 1) {
        $output['success'] = true;
        // 最近新增資料的 primery key
    } else {
        $output['error'] = '陰德值計算失敗';
    }

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
} else if ($rowNumber == 1) {
    $sql =
        "UPDATE `good_deed_test_record` 
        SET `member_sid`=?, `test_Q1`=?,`test_Q2`=?,`test_Q3`=?,`test_Q4`=?,`test_Q5`=?,`test_score`=? 
        WHERE `sid`=$sid";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $sid,
        $q1,
        $q2,
        $q3,
        $q4,
        $q5,
        $score
    ]);

    if ($stmt->rowCount() == 1) {
        $output['success'] = true;
        // 最近新增資料的 primery key

    } else {
        $output['error'] = '陰德值計算失敗';
    }
    // isset() vs empty()

    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

?>