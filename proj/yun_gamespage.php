<?php require __DIR__ . "/parts/connect_db.php"; ?>

<?php
$pageName = 'games_page';
$title = '積陰德小遊戲';

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
</style>
<div class="container">
  <div class="col">
    <div class="card" style="width: 18rem;">
      <img src="./img/froggy.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">
          扶老奶奶過馬路
        </h5>
        <p class="card-text">
          遊戲描述
        </p>
        <a href="#" class="btn btn-primary">
          GO
        </a>

      </div>
    </div>
  </div>
  <div class="col">
    <div class="card" style="width: 18rem;">
      <img src="./img/froggy.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">
          扶老奶奶過馬路
        </h5>
        <p class="card-text">
          遊戲描述
        </p>
        <a href="#" class="btn btn-primary">
          GO
        </a>

      </div>
    </div>
  </div>
  <div class="col">
    <div class="card" style="width: 18rem;">
      <img src="./img/froggy.jpeg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">
          扶老奶奶過馬路
        </h5>
        <p class="card-text">
          遊戲描述
        </p>
        <a href="#" class="btn btn-primary">
          GO
        </a>

      </div>
    </div>
  </div>

</div>

<?php include __DIR__ . '/parts/scripts.php' ?>

  <?php include __DIR__ . '/parts/html-foot.php' ?>