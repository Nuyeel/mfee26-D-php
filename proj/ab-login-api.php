<?php require __DIR__ . "./parts/connect_db.php";
header('Content-Type: application/json');

$account = $_POST['account'];
$password = $_POST['password'];
// echo $account_1;
// exit;
// $sql = "SELECT * FROM `member` WHERE `member`.`account` = $account";
$a_sql = "SELECT * FROM `member` WHERE `member`.`account` = '$account'";
$row = $pdo->query($a_sql)->fetch();

// if (password_verify($password, $row['password'])) {
//     echo 'Password is valid!';
// } else {
//     echo 'Invalid password.';
// }

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

if (!empty($_POST['account'])) {
    $a_sql = "SELECT COUNT(*) FROM `member` WHERE `member`.`account` = '$account'";
    $row_num = $pdo->query($a_sql)->fetch(PDO::FETCH_NUM)[0];

    if ($row_num == 0) {
        $output['error'] = '您輸入的帳戶尚未註冊';
        $output['code'] = 402;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }
}

if (empty($_POST['password'])) {
    $output['error'] = '您尚未輸入密碼';
    $output['code'] = 403;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// $hash = password_hash($password, PASSWORD_DEFAULT);
if ($row['account'] == $account and password_verify($password, $row['password'])) {
    //解密加密過後的密碼
    $output['success'] = true;
    $output['code'] = 200;
    $_SESSION['member']['account'] = $account;
    $_SESSION['member']['name'] = $row['name'];
    $_SESSION['member']['birthdate'] = $row['birthdate'];
    $_SESSION['member']['deathdate'] = $row['deathdate'];
    $_SESSION['member']['mobile'] = $row['mobile'];
    $_SESSION['member']['email'] = $row['email'];
    $_SESSION['member']['sid'] = $row['sid'];
    // $output['postData'] = $_SESSION['member']['account'];
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
} else {
    $output['error'] = '您輸入的使用者帳戶或密碼有誤';
    $output['code'] = 404;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
