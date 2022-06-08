<?php require __DIR__ . '/parts/connect_db.php';

$output = [
    'success' => false,
    'postData' => $_POST,
    'filename' => '',
    'error' => ''
];



$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;

$row = $pdo->query("SELECT*FROM `news` 
WHERE news.sid = $sid")->fetch();

if (empty($_POST['sid']) or empty($_POST['topic'])) {
    $output['error'] = '沒有標題名稱';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$extMap = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/gif' => '.gif',
];
$ext = $extMap[$_FILES['img']['type']];

$oldName=$row['img'];

if($_FILES['img']['error']==0 and !empty($extMap[$_FILES['img']['type']])){

$filename = $_FILES['img']['name'];
$filename = md5($_FILES['img']['name'] . rand()) . $ext;
$folder = __DIR__ . '/uploaded/';
move_uploaded_file($_FILES['img']['tmp_name'], $folder . $filename);

}else{
    $filename=$oldName;
}


$sql = "UPDATE `news` 
SET`topic`=?,`event_time`=?,`type_sid`=?,`img`=?,`location_sid`=?,`content`=?,`publish_date`=?
WHERE sid = $sid";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['topic']??'',
    $_POST['event_time'],
    $_POST['type_sid'],
    $filename,
    $_POST['location_sid'],
    $_POST['content'],
    $_POST['publish_date'],
]);

if ($stmt->rowCount() == 1) {
    $output['success'] = true;
} else {
    $output['error'] = '資料沒有修改';
}

// $newsId = $pdo->lastInsertId();

// $t_sql = "INSERT INTO `news_tag`(`news_sid`, `tag_sid`) 
//     VALUES (?,?)";

// $update = "UPDATE `news_tag`SET`tag_sid`=? WHERE `news_tag`.news_sid = $sid";



// if (!empty($_POST['tag_add'])) {
//     $sql = "INSERT INTO `tag`(
//     `tag_name`) VALUES(?)";

//     $stmt = $pdo->prepare($sql)
//         ->execute([
//             $_POST['tag_add'],
//         ]);

//     $tagId = $pdo->lastInsertId();


//     $stmt = $pdo->prepare($t_sql)
//         ->execute([
//             $sid,
//             $tagId
//         ]);
// }

// $output['tg_sid'] = $_POST['tg_sid'];

// $checkbox = $_POST['tg_sid'];
// foreach ($checkbox as $c) {
//     $stmt = $pdo->prepare($update)
//         ->execute([
//             $sid,
//             $c
//         ]);
// }


$json = json_encode($output, JSON_UNESCAPED_UNICODE);

echo $json;
