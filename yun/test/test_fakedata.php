<div>
<?php require __DIR__ . '/test-parts/connect_data.php';
exit; 
// 關閉功能

$faccount = ['nana', 'edward', 'yyy', 'ming', 'cucumber'];
$fpwd = ['admin'];
$lname = ['陳', '林', '李', '吳', '王'];
$fname = ['小明', '小華', '雅玲', '怡君', '大頭'];



// 避免 SQL injection (SQL 隱碼攻擊)
$sql = "INSERT INTO `good_deed_test_record`(
    `member_sid`, `member_account`, `member_password`, 
    `member_name`, `member_birth`, `member_death`, 
    `test_Q1`, `test_Q2`, `test_Q3`, 
    `test_Q4`, `test_Q5`, `test_score`
    ) VALUES (
        ?, ?, ?,
        ?, ?, ?,
        ?, ?, ?,
        ?, ?, ?
    )";

$stmt = $pdo->prepare($sql);

for ($i = 0; $i < 100; $i++) {
  shuffle($lname);
  shuffle($fname);
  shuffle($faccount);
  $bd = rand(strtotime('1940-01-01'), strtotime('1985-12-31'));
  $dd = rand(strtotime('2010-01-01'), strtotime('2022-12-31'));



  $stmt->execute([
    rand(10000, 99999),
    $faccount[0] . "{$i}" .  rand(100, 999),
    $fpwd[0] . rand(100, 999),
    $lname[0] . $fname[0],
    date('Y-m-d', $bd),
    date('Y-m-d', $dd),
    '0', '0', '0',
    '0', '0', '0',
  ]);
  }

?>
</div>