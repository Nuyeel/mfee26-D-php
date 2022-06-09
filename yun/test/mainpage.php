<?php require __DIR__ . '/test-parts/connect_data.php';
$pageName = 'test_page';
$title = 'MainPage';
?>
<?php include __DIR__ . '/test-parts/test-head.php' ?>
<?php include __DIR__ . '/test-parts/test-nav.php' ?>


<style>
  .card {
    margin: auto;
    margin-top: 100px;

  }

  .testDone {
    display: none;
  }
</style>

</head>

<body>

  <?php

  if (!empty($_SESSION['member']['account'])) {

    if (!empty($_SESSION['member']['testscore'])) { ?>
      //這部分要看余欣的欄位怎麼設定
      //有分數的話呈現分數
      <div class="container testDone">
        <div class="col">
          <div class="card" style="width: 18rem;">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
              <h5 class="card-title">
                Hi <?= $_SESSION['member']['name'] ?> ！
                你的陰德值為:<?= $_SESSION['member']['testscore'] ?>
              </h5>
              <p class="card-text">
                覺得陰德值太少嗎?
                你可以透過下列方式增加你的陰德值!
              </p>
              <a href="#" class="btn btn-primary">
                慈善捐款
              </a>
              <a href="#" class="btn btn-primary">
                參與慈善活動
              </a>
              <a href="#" class="btn btn-primary">
                遊玩慈善遊戲
              </a>
            </div>
          </div>
        </div>

      </div>
    <?php } else { ?>
      //沒有分數的話就做測驗
      <div class="container">
        <div class="col">
          <div class="card" style="width: 18rem;">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
              <h5 class="card-title">
               Hi <?= $_SESSION['member']['name'] ?> ！
              </h5>
              <p class="card-text">
                想知道你有多少陰德值嗎?
                來測測看吧!
              </p>
              <a href="#" class="btn btn-primary">
                陰德值測驗Go!
              </a>
            </div>
          </div>
        </div>
      </div>
  <?php
    }
  } else {
    // 跳轉到登入頁面
    $error_msg = '你尚未登入！';
  }

  ?>







  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

<?php include __DIR__ . '/test-parts/test-foot.php' ?>