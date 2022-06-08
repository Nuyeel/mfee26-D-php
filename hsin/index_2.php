<?php require __DIR__ . '/parts-2/connect_db-2.php';
$pageName = 'index';
$title = '靈魂轉生平台';

?>
<?php include __DIR__ . '/parts-2/html-head-2.php' ?>
<?php include __DIR__ . '/parts-2/navbar-2.php' ?>
<br>
<div class="container">
    <h2>靈魂轉生平台</h2>
    <!-- $pdo->quote() 用來跳脫 SQL 裡值的單引號, 避免 SQL injection  -->
    <!-- <p><?= $pdo->quote('Before crossing the rainbow bridge.') ?></p> -->
    <p>為您的靈魂預訂一份來生</p>


</div>
<?php include __DIR__ . '/parts-2/scripts-2.php' ?>
<?php include __DIR__ . '/parts-2/html-foot-2.php' ?>