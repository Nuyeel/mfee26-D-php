<div>
<?php include __DIR__. '/parts/connect_db.php';
echo microtime(true) . "<br>";

$lastname = ['Snider', 'Foreman', 'Mills', 'Emerson', 'Huffman', 'Burkner', 'Joseph', 'Reynolds', 'Rosario','Ellison'];
$middlename = ['C.', 'D.', 'H.', 'G.', 'K.', 'N.', 'R.', 'S.', 'W.', ' '];
$firstname = ['Ariella', 'Benson', 'Clarissa', 'Kinley', 'Messiah', 'Makenzie', 'Delaney', 'Gabby','Jonathan','Hudson'];

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

for ($i = 0; $i < 100; $i++) {
  shuffle($lastname);
  shuffle($middlename);
  shuffle($firstname);
  $ts = rand(strtotime('1980-01-01'), strtotime('2002-12-31'));
  $statement->execute([
    $firstname[0] . ' ' . $middlename[0] . ' ' . $lastname[0],
    "{$i}{$i}{$i}{$i}@gmail.com", 
    '09'. rand(11111111, 99999999), 
    date('Y-m-d', $ts),
    '世界某處',
  ]);
}

echo microtime(true) . "<br>";
?>
</div>
