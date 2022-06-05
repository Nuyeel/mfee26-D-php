<!-- 下面資料的目的：M(處理)V(呈現)C(互動) -->

<?php require __DIR__ .  '/parts/connect_db.php';

$pageName = 'event-detail';
$title = '活動細節頁';


// 

$event_detail = isset($_GET['event']) ? intval($_GET['event']) : 0; 

$params = []; 

$where = ' WHERE 1 '; 

if (!empty($event_detail)) {
    $where .= " AND sid=$event_detail ";
    $params['event'] = $event_detail;
}else {
    $where = ' WHERE 1 ';
}


$rows = [];

$sql = sprintf(
    "SELECT * FROM( (`npo_act` JOIN `npo_act_type` ON `npo_act`.`type_sid` = `npo_act_type`.`typesid`) INNER JOIN `npo_name` ON `npo_act`.`npo_name_sid` = `npo_name`.`npo_sid`) INNER JOIN `city_type` ON `npo_act`.`place_city`= `city_type`.`city_sid` $where " );

$rows = $pdo->query($sql)->fetchAll();

?> 




<!-- 從這邊開始是HTML內容(=V =呈現) -->
<?php include __DIR__ . '/parts/html-head.php' ?> 
<?php include __DIR__ . '/parts/nav-bar.php' ?> 



<!-- 頂圖 -->

<?php foreach($rows as $r): ?>



<!-- 活動細節 -->
<div class="container  mt-5 w-75 d-flex justify-content-center mb-5" >

    <div class="w-75 mt-5" style="padding:0px 50px;">

    <div class="container w-100" style="width:100%; height:300px; overflow:none" >
        <img src="<?= $r['img'] ?>" alt="" 
        style="width:100%;height:100%;object-fit:cover; object-position:center;box-shadow: 0 0 7px rgb(0,0,0,0.3) " >
    </div>
        
    <div class="mt-5" style="padding-left:15px">

    <h1 style="margin-bottom:15px; font-weight:bold"><?= $r['act_title'] ?></h1>
    <span class="text-danger" style="font-size:18px"><i class="fa-solid fa-tag"></i>&nbsp<?= $r['name'] ?></span>
    <span class="card-text mt-3 text-primary" style="font-size:18px; margin-left:15px"><i class="fa-solid fa-location-dot"></i>&nbsp<?= $r['city'] ?></span>
    <span class="card-text mt-3 text-primary" style="font-size:18px">&nbsp<?= $r['place_other'] ?></span>

    <span class="mt-3" style="margin-bottom:15px; display:block; font-size:16px ">活動時間： &nbsp<?= $r['start'] ?> - <?= $r['end'] ?></span>
    <span class="mt-3" style="margin-bottom:15px; display:block; font-size:16px ">招募人數： &nbsp<?= $r['limit_num'] ?>  &nbsp 人</span>

    <span class="mt-3" style="margin-bottom:15px; font-size:16px ; font-weight:bold">主辦單位：</span> 
    <span style="font-size:14px"> &nbsp<?= $r['npo_name'] ?></span>
    
    <span class="mt-5" style="margin-bottom:15px; display:block; font-size:16px; font-weight:bold">注意事項：</span>
    <span class=" w-75" style="margin-bottom:15px; display:block; font-size:16px; line-height:2.5rem "><?= $r['intro'] ?></span>

    <span class="mt-5" style="margin-bottom:15px; display:block; font-size:16px; font-weight:bold ">主辦單位介紹：</span>
    <span class=" w-75" style="margin-bottom:15px; display:block; font-size:16px; line-height:2.5rem "><?= $r['npo_intro'] ?></span>

    </div>

<?php endforeach; ?>

    </div>


    <!-- 一鍵報名 + 價錢頁面 -->
    <div class="card w-25 mt-5" style="width: 18rem; height:350px; padding:30px">
        <div class="card-body">
        <span>贊助費用</span>    
        <h2 class="card-title mb-5 mt-2">NT$ <?= $r['price'] ?></h2>
        <span>陰德值獎勵</span>   
        <h2 class="card-title mb-5 mt-2"><?= $r['value'] ?></h2>
        <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->

        <!-- 不會進結帳頁面，跳已加入的通知 -->
        <a class="btn btn-danger " style="margin-right:10px; font-size:16px" href="#" role="button">加入購物車</a>  
        <!-- 直接跳進結帳頁面 -->
        <a class="btn btn-warning mt-4" href="#" role="button" style="margin-right:10px; font-size:16px">直接結帳</a>


    </div>
</div>




</div>

<?php include __DIR__ . '/parts/scripts.php' ?> 

<script>



</script> 




<?php include __DIR__ . '/parts/html-foot.php' ?> 