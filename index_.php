<!-- require跟include功能相同 -->
<!-- require錯誤，不會繼續執行，include則可以 -->
<!-- 這一行是跟資料庫連線 -->
<?php require __DIR__ .  '/parts/connect_db.php' ?> 

<!-- php以前是樣板語言，用來生HTML內容。現在都改用框架了 -->
<?php include __DIR__ . '/parts/html-head.php' ?> 
<?php include __DIR__ . '/parts/nav-bar.php' ?> 
<?php include __DIR__ . '/parts/scripts.php' ?> 
<?php include __DIR__ . '/parts/html-foot.php' ?> 