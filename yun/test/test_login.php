<?php require __DIR__ . '/test-parts/connect_data.php';
$pageName = 'test_login';
$title = '登入頁面';
session_start();

$rows = [];

$t_sql = "SELECT COUNT(1) FROM good_deed_test_record";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$sql = sprintf("SELECT * FROM good_deed_test_record ORDER BY sid ASC");
$rows = $pdo->query($sql)->fetchAll();

foreach ($rows as $k) {

    $account = $k['member_account'];
    // print_r($account);
    foreach($account as $i){
        $i = array(
        'sid' => $k['sid'],
        'member_sid' => $k['member_sid'],
        'member_password' => $k['member_password'],
        'member_name' => $k['member_name'],
        'member_birth' => $k['member_birth'],
        'member_death' => $k['member_death']        
        );
        print_r($i);

    }
    // $k['member_account'] 
    

    $users = $k['member_account'];
    print_r($users);
};





// $users = [
//     'ming' => [
//         'password' => '1234',
//         'nickname' => '孔明'
//     ],
//     'no_two' => [
//         'password' => '5678',
//         'nickname' => '關二哥'
//     ],
// ];

$output = [
    'postData' => $_POST,
];

if (isset($_POST['account'])) {
    // echo json_encode($_POST);
    // exit; // 立刻停止 php 程式執行
    // die();

    // 兩個欄位都要有值
    if (!empty($_POST['account']) and !empty($_POST['password'])) {

        if (!empty($users[$_POST['account']])) {

            if ($_POST['password'] === $users[$_POST['account']]['member_password']) {
                // 登入成功
                // 把資料設定到 session 裡
                $_SESSION['user'] = [
                    'account' => $_POST['account'],
                    'name' => $users[$_POST['account']]['member_name'],
                    'birth' => $users[$_POST['account']]['member_birth'],
                    'death' => $users[$_POST['account']]['member_death'],
                ];
            }
        }
    }

    if (!isset($_SESSION['user'])) {
        $error_msg = '帳號或密碼錯誤';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($_SESSION['account'])) : ?>
        <h2><?= $_SESSION['account']['name'] ?> 您好</h2>
        setTimeout(() => {
        location.href = 'mainpage.php';
        // 跳轉到列表頁
        }, 2000);
        <!-- <p><a href="./a20220523-05-logout.php">登出</a></p> -->
    <?php else : ?>
        <?php if (isset($error_msg)) : ?>
            <div style="color:red;"><?= $error_msg ?></div>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="account" placeholder="帳號" value="<?= isset($_POST['account']) ? htmlentities($_POST['account']) : '' ?>">
            <br>
            <input type="password" name="password" placeholder="密碼">
            <br>
            <button>登入</button>
        </form>
        </div>
    <?php endif; ?>

</body>

</html>