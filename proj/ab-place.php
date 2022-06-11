<?php require __DIR__ . "./parts/connect_db.php";
$pageName = 'ab-event';
$title = '會員良辰吉時清單';

if (!$_SESSION['member']['account']) {
    header('location:ab-login.php');
    // exit;
}

// 先用session抓到會員的ID，$row可以讀到會員的資料
$sid = isset($_SESSION['member']['sid']) ? intval($_SESSION['member']['sid']) : 0;
$row = $pdo->query("SELECT * FROM member WHERE `sid`='$sid'")->fetch();



// 這邊放可以抓到想要展示的MySQL資料表語法
$rebornplace = sprintf(
    "SELECT * FROM `place_order` INNER JOIN `place` ON `place_order`.`place_sid` = `place`.`sid`
        WHERE  `member_sid` = '$sid' ");

$place = $pdo->query($rebornplace)->fetchAll();




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

    span{
        /* font-weight:bold; */
        font-size:18px;
    }

    body {
        background-color: #69d0ff;
        background-image: linear-gradient(0deg, #69d0ff 0%, #ffa4e9 100%);
        background-position: 100%;
        background-repeat: no-repeat;
        height: 100vh;
    }

    .format {
        font-size: 18px;
        font-weight: 600;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    .format2 {
        font-size: 18px;
        font-weight: 600;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        color: #ebd367;
    }

    .pb-4 {
        background-color: rgba(255, 255, 255, 0.6);
        background-position: 100%;
        background-repeat: no-repeat;
    }

    .btn-primary {
        background-color: rgb(38, 106, 170);
    }

    .btn-primary:hover {
        background-color: #fff;
        color: rgb(38, 106, 170);
    }

    .btn-outline-primary {
        border-color: rgb(38, 106, 170);
        ;
        color: rgb(38, 106, 170);
    }

    .btn-outline-primary:hover {
        color: #fff;
        background-color: rgb(38, 106, 170);
    }

    .row {
        margin-left: 15%;
        /* margin-right: 50%; */
    }

    .icon {
        text-decoration: none;
        font-size: 2.6rem;
        transition: .3s;
        color: rgb(38, 106, 170);
        color: rgb(38, 106, 170);
    }

    .icon:hover {
        color: #ebd367;
    }

    .format3 {
        font-size: 20px;
        font-weight: 600;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        color: rgb(38, 106, 170);
    }
</style>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card_2 d-flex">
                <div class="card" style="width: 20rem;font-size: 1.2rem;">

                <!-- 這邊是選項列，記得設各檔案路徑 -->
                    <ul class="list-group list-group-flush format">
                        <li class="list-group-item"><a href="ab-profile.php" style="text-decoration: none; color: #212529">會員中心總覽 </a></li>
                        <li class="list-group-item"><a href="ab-edit-profile.php" style="text-decoration: none; color: #212529">會員資料</a></li>
                        <li class="list-group-item" style="background-color: #f0f0f0;"><a href="ab-place.php" style="text-decoration: none; color: rgb(38, 106, 170);">訂單總覽 </a></li>
                        <li class="list-group-item"><a href="ab-event.php" style="text-decoration: none; color: #212529">活動紀錄</a></li>
                        <li class="list-group-item"><a href="ab-showcase.php" style="text-decoration: none; color: #212529">衣櫥間</a></li>
                        <!--
                        <li class="list-group-item">常見問題</li>
                        <li class="list-group-item">我有問題</li> -->
                    </ul>
                </div>


                <!-- 這一段放各類別要呈現的內容（選項列的右邊那塊） -->
                <div class="card" style="min-width:35rem; padding-bottom:20px">
                    <div class="card-body" >
                        <h4 class="card-title format3" >訂單總覽</h4>
                        <br>

                        <!-- 這邊導入會員名稱 -->
                        <h5 class="card-title">
                                    <?php if (!empty($row['name'])) {
                                        echo htmlentities($row['name']);
                                    } else {
                                        echo htmlentities($row['account']);
                        } ?> &nbsp您好，以下是您的訂單總覽：</h5>
                        <br>
                    </div>


                    <!-- 卡片式 -->
                    <div class="container d-flex align-content-start flex-wrap w-75" style="padding:0px 10px;margin:0px 10px; max-width:350px" >
    
                            <?php foreach ($place as $p) : ?>
                                <div class="card m-2 mt-3 card-f" style="width: 50rem; border-radius:10px; cursor:pointer">
    
                                    <div class="card-body">
                                        <span class="card-title mt-2" style="font-weight:bold;font-size:24px">良辰：</span>
                                        <span class="card-title mt-2" ><?= $p['year'] ?>年</span>
                                        <span> / <?= $p['month'] ?>月</span>
                                        <br>
                                        <span class="card-title mt-2　" style="font-weight:bold;font-size:24px; ">吉地：</span>
                                        <span class="card-title mt-2" ><?= $p['city'] ?></span>
                                        <span class="card-title " > / <?= $p['country'] ?></span>
                                        <span> / <?= $p['dist'] ?></span>
    
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
    const row = <?= json_encode(row, JSON_UNESCAPED_UNICODE) ?>;


</script>

<?php include __DIR__ . "./parts/html-foot.php" ?>