<!-- 下面資料的目的：M(處理)V(呈現)C(互動) -->

<?php require __DIR__ .  '/parts/connect_db.php';

$pageName = 'event-detail';
$title = '活動細節頁';


// echo $totalRows; exit;  //這行是用來測試$totalRows是否有成功取值

$sql = sprintf("SELECT * FROM  `npo_act` ORDER BY sid DESC " );

$rows = $pdo->query($sql)->fetchAll();
?> 

<!-- 從這邊開始是HTML內容(=V =呈現) -->
<?php include __DIR__ . '/parts/html-head.php' ?> 
<?php include __DIR__ . '/parts/nav-bar.php' ?> 



<!-- 頂圖 -->
<div class="container w-75 mt-5" style="height:400px; " >
            <img src="list-img/cat-01.jpg" alt="" style="width:100%;height:100%;object-fit:cover;object-position:center;" >
</div>


<!-- 活動細節 -->
<div class="container  mt-5 w-75 d-flex justify-content-center mb-5" >

    <div class="w-75 mt-5" style="padding:0px 50px;">
        
    <h1 style="margin-bottom:30px">浪浪愛心認養</h1>
    <h4 style="margin-bottom:15px">開始時間:2022-06-08 21:52:00</h4>
    <h4 style="margin-bottom:15px">結束時間:2022-07-01 22:54:00</h4>
    <h4 style="margin-bottom:15px">招募人數:30人</h4>
    <h4 style="margin-bottom:15px">剩餘人數:10人</h4>



    </div>


    <!-- 一鍵報名 + 價錢頁面 -->
    <div class="card w-25 mt-5" style="width: 18rem;padding:30px">
        <div class="card-body">
        <h2 class="card-title mb-5">$ 900</h2>
        <h4 class="card-title mb-5">陰德值獎勵 50</h4>
        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

        <!-- 不會進結帳頁面，跳已加入的通知 -->
        <a class="btn btn-danger " style="margin-right:10px; font-size:16px" href="#" role="button">加入購物車</a>  
        <!-- 直接跳進結帳頁面 -->
        <a class="btn btn-warning mt-3" href="#" role="button" style="margin-right:10px; font-size:16px">直接結帳</a>

    </div>
</div>




</div>

<?php include __DIR__ . '/parts/scripts.php' ?> 

<script>



</script> 




<?php include __DIR__ . '/parts/html-foot.php' ?> 