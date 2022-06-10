<?php require __DIR__ . "./parts/connect_db.php";
$pageName = 'ab-event';
$title = '會員活動清單';

if (!$_SESSION['member']['account']) {
    header('location:ab-login.php');
    // exit;
}

// 先用session抓到會員的ID
$sid = isset($_SESSION['member']['sid']) ? intval($_SESSION['member']['sid']) : 0;
$eow = $pdo->query("SELECT * FROM member WHERE `sid`='$sid'")->fetch();


// 選擇會員ID對應到所選的活動內容

$IDevent = sprintf(
    "SELECT * FROM(( 
        (
            (`npo_act` INNER JOIN `npo_act_type` ON `npo_act`.`type_sid` = `npo_act_type`.`typesid`  
        ) 
            INNER JOIN `npo_name` ON `npo_act`.`npo_name` = `npo_name`.`npo_name`
            ) 
                INNER JOIN `city_type` ON `npo_act`.`place_city`= `city_type`.`city_sid`
                ) 
                    INNER JOIN `act_order_details` ON `act_order_details`.`order_act_sid` = `npo_act`.`sid`
                        )
                        JOIN `act_order` ON `act_order`.`act_order_sid` = `act_order_details`.`order_sid`
                    
                    WHERE  `member_sid` = '$sid' ");


$event = $pdo->query($IDevent)->fetchAll();


// 再用會員ID去撈資料
// $event = $pdo->query("  ");



?>

<?php include __DIR__ . "./parts/html-head.php" ?>
<?php include __DIR__ . "./parts/navbar.php" ?>

<style>
    .form-control.red {
        border: 1px solid red;
    }

    .form-text.red {
        color: red;
    }
</style>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card_2 d-flex">
                <div class="card" style="width: 20rem;font-size: 1.2rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="ab-profile.php" style="text-decoration: none; color: #212529">會員中心總覽 </a></li>
                        <li class="list-group-item"><a href="ab-edit-profile.php" style="text-decoration: none; color: #212529" >會員資料</a></a></li>
                        <li class="list-group-item">訂單總覽</li>
                        <li class="list-group-item" style="background-color: #f0f0f0;"><a href="ab-event.php" style="text-decoration: none; color: #0d6efd">活動紀錄</a></li>
                        <li class="list-group-item">衣櫥間</li>
                        <li class="list-group-item">常見問題</li>
                        <li class="list-group-item">我有問題</li>
                    </ul>
                </div>


                <!-- 放各類別要呈現的內容（選項列的右邊那塊） -->
                <div class="card" style="width: 60rem;">
                    <div class="card-body" >
                        <h4 class="card-title" style="font-size:18px; font-weight:bold">活動報名紀錄</h4>
                        <br>

                        <!-- 這邊導入會員名稱 -->
                        <h5 class="card-title">
                                    <?php if (!empty($eow['name'])) {
                                        echo htmlentities($eow['name']);
                                    } else {
                                        echo htmlentities($eow['account']);
                        } ?> &nbsp您好，以下是您的活動報名紀錄：</h5>
                        <br>


                <!-- 卡片式 -->

                <div class="container d-flex align-content-start flex-wrap " style="width:80%;">

                <?php foreach ($event as $e) : ?>

                    <div class="card m-2 mt-3 card-f" style="width: 18rem; border-radius:10px; cursor:pointer">

                        <a href="event-detail.php"></a>
                        <div class="d-flex justify-content-between" style="padding:10px 15px">
                            <span class="bg-info text-white" style="padding:3px 10px;border-radius:5px"><?= $e['name'] ?></span>
                        </div>

                        <!-- <div style=" width:100%;height:150px;overflow:hidden"> -->

                            <!-- <img src="./list-img/<?= $e['img'] ?>" class="card-img-top" alt="..." style="width:100%;hight:100%;"> -->

                        <!-- </div> -->


                        <div class="card-body">
                            <h5 class="card-title mt-2" style="font-weight:bold"><?= $e['act_title'] ?></h5>
                            <span><?= $e['npo_name'] ?></span>
                            <p class="card-text mt-3 text-primary"><i class="fa-solid fa-location-dot"></i>&nbsp<?= $e['city'] ?></p>
                            <p class="card-text"><?= "活動時間：{$e['start']}" ?></p>
                            <p class="card-text mt-1"><?= "報名費：{$e['price']}元" ?></p>
                            <p class="card-text mt-1"><?= "陰德值回饋：{$e['value']}" ?></p>

                        </div>
                    </div>
                <?php endforeach; ?>

                </div>


                        
                </div>









                </div>
            </div>
        </div>
    </div>

</div>


<?php include __DIR__ . "./parts/scripts.php" ?>


<script>
    const row = <?= json_encode($eow, JSON_UNESCAPED_UNICODE) ?>;


</script>

<?php include __DIR__ . "./parts/html-foot.php" ?>