<?php
header('Content-Type: application/json');

$folder = __DIR__ . '/list-img/';

// 用來篩選檔案, 用來決定副檔名
$extMap = [
    'image/jpeg' => '.jpg',
    'image/png' => '.png',
    'image/gif' => '.gif',
];

$output = [
    'success' => false,
    'filename' => '',
    'error' => '',
];

if (empty($_FILES['myfile'])) {
    $output['error'] = '沒有上傳檔案';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

if (empty($extMap[$_FILES['myfile']['type']])) {
    $output['error'] = '檔案類型錯誤';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
$ext = $extMap[$_FILES['myfile']['type']]; // 副檔名

$filename = md5($_FILES['myfile']['name'] . rand()) . $ext;
$output['filename'] = $filename;

// 把上傳的檔案搬移到指定的位置
if (move_uploaded_file($_FILES['myfile']['tmp_name'], $folder . $filename)) {
    $output['success'] = true;
} else {
    $output['error'] = '無法搬動檔案';
}

echo json_encode($output);
