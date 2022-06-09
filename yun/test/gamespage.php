<?php require __DIR__ . '/test-parts/connect_data.php';
$pageName = 'games_page';
$title = '積陰德小遊戲';

?>
<?php include __DIR__ . '/test-parts/test-head.php' ?>
<?php include __DIR__ . '/test-parts/test-nav.php' ?>


<style>
    .container{
    
      display: flex;
    }
    .card{
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

    <?php include __DIR__ . '/test-parts/test-scripts.php' ?>
<script>
<?php include __DIR__ . '/test-parts/test-foot.php' ?>