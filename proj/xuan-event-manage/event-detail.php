<!-- 下面資料的目的：M(處理)V(呈現)C(互動) -->

<?php require __DIR__ .  '/../parts/connect_db.php';
include __DIR__ . "/../alive-confirm.php";

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
    "SELECT * FROM( (`npo_act` JOIN `npo_act_type` ON `npo_act`.`type_sid` = `npo_act_type`.`typesid`) INNER JOIN `npo_name` ON `npo_act`.`npo_name` = `npo_name`.`npo_name`) INNER JOIN `city_type` ON `npo_act`.`place_city`= `city_type`.`city_sid` $where " );

$rows = $pdo->query($sql)->fetchAll();

?> 




<!-- 從這邊開始是HTML內容(=V =呈現) -->
<?php include __DIR__ . '/../parts/html-head.php' ?>

<?php include __DIR__ . '/../parts/navbar-xuan.php' ?> 



<!-- 頂圖 -->

<?php foreach($rows as $r): ?>



<!-- 活動細節 -->
<div class="container  mt-5 w-75 d-flex justify-content-center mb-5" >

    <div class="w-75 mt-5" style="padding:0px 50px;">

    <div class="container w-100" style="width:100%; height:300px; overflow:none" >
        <img src="./list-img/<?= $r['img'] ?>" alt="" 
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
    <div class="card w-25 mt-5" style="width: 18rem; height:500px; padding:30px">
        <div class="card-body">
        <span>贊助費用</span>    
        <h2 class="card-title mb-5 mt-2">NT$ <?= $r['price'] ?></h2>
        <span>陰德值獎勵</span>   
        <h2 class="card-title mb-5 mt-2"><?= $r['value'] ?></h2>
        <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->

        <!-- 不會進結帳頁面，跳已加入的通知 -->
        <button class="btn btn-danger add-to-cart-btn" id="zxAddToCartBtn" data-sid="<?= $r['sid']?>"  style="margin-right:10px; font-size:16px; width: 140px" href="#" role="button">
        <i class="fa-solid fa-cart-shopping"></i>&nbsp 加入購物車 
        </button>  

        <!-- 直接跳進結帳頁面 -->
        <a class="btn btn-warning add-to-cart-btn mt-3" data-sid="<?= $r['sid']?>"  style="margin-right:10px; font-size:16px; width: 140px" href="cart-list.php" role="button">
        <i class="fa-solid fa-money-bill-1"> </i>&nbsp &nbsp直接結帳
        </a>
        
        <!-- 繼續選購 -->
        <a class="btn btn-primary mt-3" href="npo-list.php" role="button" style=" margin-bottom:10px; width: 140px "><i class="fa-solid fa-cart-plus"></i>&nbsp &nbsp繼續選購</a>

        
        <!-- 直接跳進結帳頁面 -->
        <!-- <a class="btn btn-warning mt-4" href="cart-list.php" role="button" style="margin-right:10px; font-size:16px"><i class="fa-solid fa-money-bill-1"></i> &nbsp 直接結帳</a> -->
    </div>
</div>




</div>

<?php include __DIR__ . '/../parts/scripts.php' ?> 


<script>


// 這邊是跟購物車有關的JS

// 把內容加到 cart-list 裡的Jquery
$('.add-to-cart-btn').on('click', event => {
    // 用箭頭函式這邊不用要this
    const btn = $(event.currentTarget);
    const sid = btn.attr('data-sid');
    const quantity = '1';

    // 下面這行是老師原本可選數量的版本code
    // 此版本使用者可以選數量
    // const quantity = btn.closest('.card').find('select').val();


    // console.log({
    //     sid,
    //     quantity
    // });



    // const cartAmount = document.querySelector('#cart_amount');
    // Jquery GET寫法
        $.get('cart-api.php', {
            sid,
            quantity
        }, function(data) {
            // console.log(data['cart']);
            // console.log(Object.keys(data['cart']).length);
            // showCount(data);
            // document.querySelector('#cart_amount').innerText=Object.keys(data['cart']).length;
        }, 'json');

});

// function cartAmount(){
//     const a = document.querySelector('.add-to-cart-btn');
//     const sid = a.dataset;
//     const quantity = '1';
// // const cartAmount = document.querySelector('#cart_amount');
// // Jquery GET寫法
//     $.get('cart-api.php', {
//         sid,
//         quantity
//     }, function(data) {
//         console.log(data['cart']);
//         console.log(Object.keys(data['cart']).length);
//         //showCount(data);
//         document.querySelector('#cart_amount').innerText=Object.keys(data['cart']).length;
//     }, 'json');

// }
// cartAmount();


const zxAddToCartBtn = document.querySelector('#zxAddToCartBtn');
zxAddToCartBtn.addEventListener('click', renderActCart, false);



</script> 




<?php include __DIR__ . '/../parts/html-foot.php' ?> 