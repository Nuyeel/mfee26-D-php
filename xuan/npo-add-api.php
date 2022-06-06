<?php 
require __DIR__ .  '/parts/connect_db.php'; 

// 從php回傳值的指令，且指定內容是json格式
header('Content-Type: application/json');

// output 代表要輸出的內容
// 習慣上會把要傳給前端的資料用「陣列」包起來
$output = [
    // sucess代表有沒有新增成功，先預設false
    'success' => false,
    'postData' => $_POST,
    'code' => 0,
    'error' => ''
];


// TODO: 欄位檢查, 後端的檢查(原則上後端的檢查是比較重要的)
// 前端檢查主要是UX的部分(給使用者回饋) 在還沒按送出前就先提示

//  STEP1: (篩選1) 欄位檢查第一個動作，先檢查必填欄位，這邊功能是防止爛資料進來

// 名字欄位檢查(沒填)
if (empty($_POST['name'])) {
        $output['error'] = '沒有姓名資料';
        $output['code'] = 400;
        echo json_encode($output, JSON_UNESCAPED_UNICODE);
        exit;
    }

// 信箱欄位檢查(沒填)
if (empty($_POST['email'])) {
    $output['error'] = '沒有email資料';
    $output['code'] = 400;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

// 電話欄位檢查(沒填)
// if (empty($_POST['mobile'])) {
//     $output['error'] = '沒有電話資料';
//     $output['code'] = 400;
//     echo json_encode($output, JSON_UNESCAPED_UNICODE);
//     exit;
// }



    // 先檢查再進prepare/execute系統
    $name = $_POST['name'];
    $email = $_POST['email'] ;
    $mobile = $_POST['mobile'] ;
    // $birthday = empty($_POST['birthday']) ? NULL : $_POST['birthday'];
    $intro = $_POST['intro'] ?? ''; //沒有填值的話，預設是空字串
    

// STEP2 (篩選2): 如果有填入值，是否有符合標準

// email檢查
if (!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $output['error'] = 'email 格式錯誤';
    $output['code'] = 401;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}



// 輸入資料的時候Primary key不用變，所以可刪掉
// 用NOW()取得當下時間
$sql = "INSERT INTO `npo_name`(
        `name`, `email`, `mobile`, 
        `intro`, `create_at`
        ) VALUES (
            ?, ?, ?,
            ?, NOW()
        )";
    
    // $stmt意義是: 建立一個代理物件去檢查SQL語法
    $stmt = $pdo->prepare($sql);
    
    // 原本是$_POST[''] 從表單POST進來的資訊
    // 這一段才會真正更動到SQL
    $stmt->execute([
            $name,
            $email,
            $mobile,
            $intro,
    ]);
    
    // 資料是否處理成功，顯示特定結果在console
    // lastInsertId是PDO的物件
    if ($stmt->rowCount() == 1) {
        $output['success'] = true;
        // 最近新增資料的 primery key
        // 拿到primary key的值才能寫入另一個表單(資料表ex:訂單明細)
        $output['lastInsertId'] = $pdo->lastInsertId();
    } else {
        $output['error'] = '資料無法新增';
    };

    //isset() 是看有沒有設定值給它 有等號設定都算，想確認有沒有填資料不能用isset()
    //empty() 沒有設定.空陣列.字串.0 都會拿到true 


echo json_encode($output, JSON_UNESCAPED_UNICODE);


