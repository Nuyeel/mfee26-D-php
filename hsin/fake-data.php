<?php include __DIR__. '/parts/connect_db.php';

/* $sql = "INSERT INTO `address_book` 
(`name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES (
  'maxine', 'max77777@gmail.com', '886-911-001-000', '1995-02-07', '台灣某處', NOW()
)";
$statement = $pdo->query($sql); */
// 以上這段為把資料寫死在php的語法中

// 避免SQL injection (SQL隱碼攻擊)
$sql = "INSERT INTO `address_book` 
(`name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES (
  ?, 
  ?, 
  ?, 
  ?, 
  ?, 
  NOW()
)";
//以上這段語法不得出錯

$statement = $pdo->prepare($sql);
//如果資料是從外部來的，一律使用prepare()而非query()避免出錯

$statement->execute([
  'maxine', 
  'max77777@gmail.com', 
  '886-911-001-000', 
  '1995-02-07', 
  '台灣某處',
]);

echo $statement->rowCount();