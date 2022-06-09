<?php require __DIR__ . '/parts-2/connect_db-2.php';
header('Content-Type: application/json');

// session_start();
unset($_SESSION['member']['account']);
unset($_SESSION['member']['sid']);
unset($_SESSION['member']['name']);
unset($_SESSION['member']['birthdate']);
unset($_SESSION['member']['deathdate']);
unset($_SESSION['member']['mobile']);
unset($_SESSION['member']['email']);
header('location:ab-login.php');

// if (isset($_POST['logout']) && $_POST['logout'] == "true") {
//     unset($_SESSION['member']['account']);
//     header('location:ab-login.php');
// } 

// $output['postData'] = $_SESSION['member']['account'];
// echo json_encode($output, JSON_UNESCAPED_UNICODE);
// exit;