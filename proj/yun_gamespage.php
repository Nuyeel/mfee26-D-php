<?php require __DIR__ . "/parts/connect_db.php"; ?>

<?php
$pageName = 'games_page';
$title = '積陰德小遊戲';

include __DIR__ . "/alive-confirm.php";

$rows = [];
$t_sql = "SELECT COUNT(*) FROM good_deed_games";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$sql = sprintf("SELECT * FROM good_deed_games ORDER BY sid ASC");
$rows = $pdo->query($sql)->fetchAll();

?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>

<style>
  .container {

    display: flex;
  }

  .card {
    margin-top: 50px;
  }

  .btn {
    /* color: rgb(38, 106, 170); */
    background-color: rgb(38, 106, 170);
    border-color: rgb(38, 106, 170);
  }
  
  .btn:hover {
    background-color: rgb(38, 106, 170);
  }

</style>
<div class="container">
  <div class="col">
    <div class="card" style="width: 18rem;">
      <img src="./img/game_img/gomi_water.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">
          超級淨灘任務
        </h5>
        <p class="card-text">
          當海岸不斷堆積垃圾時 淨灘不失為一種行善的好方法！
        </p>
        <!-- 俄羅斯方塊 -->
        <a href="#" class="btn btn-primary">
          建置中 暫不開放
        </a>

      </div>
    </div>
  </div>
  <div class="col">
    <div class="card" style="width: 18rem;">
      <img src="./img/game_img/onbu_furyou_obaasan.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">
          扶奶奶過馬路
        </h5>
        <p class="card-text">
          有許多不知道斑馬線為何物的地方奶奶 急需你的幫助！
        </p>
        <!-- 青蛙過河 -->
        <a href="#" class="btn btn-primary">
          建置中 暫不開放
        </a>


      </div>
    </div>
  </div>
  <div class="col">
    <div class="card" style="width: 18rem;">
      <img src="./img/game_img/hakujou_walk_kaijo_woman.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">
          行善不欲人知
        </h5>
        <p class="card-text">
          當你在做善事的時候 不可以讓人發現！！
        </p>
        <!-- packman -->
        <a href="#" class="btn btn-primary">
          建置中 暫不開放
        </a>

      </div>
    </div>
  </div>

</div>

<?php include __DIR__ . '/parts/scripts.php' ?>

<?php include __DIR__ . '/parts/html-foot.php' ?>