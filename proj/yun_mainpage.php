<?php require __DIR__ . "/parts/connect_db.php"; ?>

<?php
$pageName = 'test_page';
$title = 'Yun_MainPage';
?>

<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>


<style>
  .card {
    margin: 100px auto auto; }


</style>

<?php
//先做一筆假資料測試用
// $_SESSION['member']['sid'] = 100;
// $_SESSION['member']['account'] = 'meowmeow';
// $_SESSION['member']['name'] = '卯咪';

//若要重整假資料時可以先做清除
// if (isset($_SESSION['member']['account'])){
//   unset($_SESSION['member']['sid']);
//   unset($_SESSION['member']['account']);
//   unset($_SESSION['member']['name']);

// }



?>
<?php
if (!empty($_SESSION['member']['account'])) {
  
  $sid = $_SESSION['member']['sid'];
  $t_sql = "SELECT `test_score` FROM `good_deed_test_record` WHERE `sid`= $sid";
  $row = $pdo->query($t_sql)->fetch();
  $score =  $row['test_score'];
  
  $account =  $_SESSION['member']['account'];
  $name = $_SESSION['member']['name'];
  
  // //for test
  // $score = 100;

?>

  <?php
  if (!empty($score)) { ?>
    <!-- 這部分要看余欣的欄位怎麼設定
      有分數的話呈現分數 -->
    <div class="container testDone">
      <div class="col">
        <!-- <div class="card" style="width: 18rem;"> -->
        <div class="card">

          <!-- <img src="..." class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h5 class="card-title">
              Hi <?= $_SESSION['member']['name'] ?> ！
              你的陰德值為:<?= $score ?? 0 ?>
            </h5>
            <p class="card-text">
              覺得陰德值太少嗎?
              你可以透過下列方式增加你的陰德值!
            </p>
            <a href="#" class="btn btn-primary">
              慈善捐款
            </a>
            <a href="#" class="btn btn-primary">
              <!-- 這邊可以放容瑄的連結 -->
            
              參與慈善活動
            </a>
            <a href="./yun_gamespage.php" class="btn btn-primary">
              遊玩慈善遊戲
            </a>
          </div>
        </div>
      </div>

    </div>
  <?php } else { ?>
    <!-- 沒有分數的話就做測驗 -->
    <div class="container">
      <div class="col">
        <!-- <div class="card" style="width: 18rem;"> -->
        <div class="card" >
          <!-- <img src="..." class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h5 class="card-title">
              Hi <?= $_SESSION['member']['name']? $_SESSION['member']['name'] : "" ?> ！
            </h5>
            <p class="card-text">
              想知道你有多少陰德值嗎?
              來測測看吧!
            </p>
            <a href="./test_page.php" class="btn btn-primary">
              陰德值測驗Go!
            </a>
          </div>
        </div>
      </div>
    </div>
<?php
  }
} else {
  // 跳轉到余欣的登入頁面
  header("location:ab-login.php");
}
?>




<?php include __DIR__ . '/parts/scripts.php' ?>


<?php include __DIR__ . '/parts/html-foot.php' ?>