<!-- require = 把某個檔案包進來(相當於copypaste) -->

<?php
require __DIR__ . '/parts/connect_db.php';

// LIMIT n 取前n筆，LIMIT k,n 從k筆開始取n筆
// 回傳值類型為PDO statement。這行可視為取資料的路徑
$stmt = $pdo->query("SELECT * FROM npo_act");

// 方法一、fetch()=讀取「1」筆資料
// $row = $stmt->fetch();

// 方法二、取出所有資料 (RecordSet)
// $rows = $stmt->fetchAll();

// 方法三、用fetch()搭配while
// fetch()拿到資料傳給$r，$r取得Array後被視為true，所以會往下執行
// 直到最後取得空值，視為false，迴圈停止
while ($r = $stmt->fetch()){
    echo "{$r['time']} {$r['type']}<br>";
}

// 方法四、foreach as -> 啊這個方法自己試不出來XD 傻眼XD
// foreach ($conn->query($sql) as $row){
//     print $row['name'];
// }

// echo json_encode($rows);

// echo $row; 會顯示notice 只會顯示是array to string，但無法顯示內容
// 在php裡可以定義相同方法名，但參數不一樣，稱為overload 
// 感覺可以記，透過query()取得的資料，一定要json_encode否則無法讀取

