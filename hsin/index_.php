<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'index';
$title = '靈魂管理中心';

?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<br>
<div class="container">
    <h2>靈魂管理中心</h2>
    <!-- $pdo->quote() 用來跳脫 SQL 裡值的單引號, 避免 SQL injection  -->
    <!-- <p><?= $pdo->quote('Before crossing the rainbow bridge.') ?></p> -->
    <p>在此安放的靈魂</p>


</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<?php include __DIR__ . '/parts/html-foot.php' ?>