<?php require __DIR__ . '/parts-2/connect_db-2.php';
$pageName = 'ab-profile';
$title = '會員中心 - 靈魂轉生平台';

$result = $pdo->query('SELECT * FROM `member` ORDER BY `sid` DESC LIMIT 1;');
$row = $result->fetch();
// print_r($row);

?>
<?php include __DIR__ . '/parts-2/html-head-2.php' ?>
<?php include __DIR__ . '/parts-2/navbar-3.php' ?>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-2 d-flex">
                <div class="card" style="width: 20rem;font-size: 1.2rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="background-color: #f0f0f0;"><a href="ab-profile.php" style="text-decoration: none; color: #0d6efd">會員中心總覽 </a></li>
                        <li class="list-group-item"><a href="ab-edit-profile.php" style="text-decoration: none; color: #212529">會員資料</a></li>
                        <li class="list-group-item">訂單總覽</li>
                        <li class="list-group-item">電子錢包</li>
                        <li class="list-group-item">陰德值</li>
                        <li class="list-group-item">常見問題</li>
                        <li class="list-group-item">我有問題</li>
                    </ul>
                </div>
                <div class="cards">
                    <div class="card" style="width: 36rem;">
                        <div class="card-body d-flex align-items-center">
                            <div class="col-md-9 mb-md-0 p-md-4">
                                <h5 class="card-title">歡迎回來，<?php if (!empty(($row['name']))) {
                                                                echo htmlentities($row['name']);
                                                            } else {
                                                                echo htmlentities($row['account']);
                                                            } ?></h5>
                                <p class="card-text" style="font-size: 1rem; color: #707070;">請點擊下方按鈕瀏覽您的資料</p>

                            </div>
                            <div class="col-md-9 mb-md-0 p-md-4 d-flex flex-row">
                                <i class="fa-solid fa-user-check card-img-top" style="font-size: 2.8rem; color: #0d6efd;"></i>
                            </div>
                        </div>
                        <a href="ab-edit-profile.php" class="btn btn-outline-primary stretched-link">修改會員資料</a>
                    </div>
                    <br>
                    <div class="cards-2 d-flex justify-content-evenly align-items-center">
                        <div class="card d-flex justify-content-evenly align-items-center" style="width: 18rem;">
                            <div class="col-md-9 mb-md-0 p-md-4 d-flex flex-row justify-content-center">
                                <i class="fa-solid fa-earth-asia" style="font-size: 2.5rem; color: #0d6efd;"></i>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title" style="text-align: center;">立即預訂下一份來生</h5>
                                <p class="card-text" style="font-size: 1rem; color: #707070;">點擊查看當前熱門轉生地點 ...</p>
                                <a href="#" class="btn btn-primary">開始預約</a>
                            </div>
                        </div>
                        <div class="card d-flex justify-content-evenly align-items-center" style="width: 18rem;">
                            <div class="col-md-9 mb-md-0 p-md-4 d-flex flex-row justify-content-center">
                                <i class="fa-solid fa-wand-magic-sparkles" style="font-size: 2.5rem; color: #0d6efd;"></i>
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title" style="text-align: center;">打造您的下一份來生</h5>
                                </h5>
                                <p class="card-text" style="font-size: 1rem; color: #707070;">即刻為您的來生打造全新樣貌 ...</p>
                                <a href="#" class="btn btn-primary">開始創建</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include __DIR__ . '/parts-2/scripts-2.php' ?>

<script>
</script>
<?php include __DIR__ . '/parts-2/html-foot-2.php' ?>