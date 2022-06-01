<!-- 下面資料的目的：M(處理)V(呈現)C(互動) -->

<?php require __DIR__ .  '/parts/connect_db.php';

$perPage = 6;  //每一頁有幾筆

// $_GET['page']裡面變數要打啥都OK，只要跟到時在網址列上打的相同即可
$page = isset($_GET['page']) ? intval($_GET['page']) : 1 ;

// 此行用來避免page總和小於0的bug，讓頁面能跳轉回自身
if($page<1){
    header('Location:npo-list.php'); // 可以是完整路徑(但會跳回初始頁面)
    // header('Location: ?page=1'); // 也可以是指定頁面
    exit;
}

// 計算總共有幾筆，以建立頁籤 
$t_sql = "SELECT COUNT(1) FROM npo_act";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0]; 
//結果為索引式陣列，因為只有一個，所以取第一個[0]

//計算總共有幾頁，ceil()為無條件進位
$totalPages = ceil($totalRows/$perPage); 

// 預設row是空陣列,有可能沒資料R(才不會出事) 有資料再填入
$rows = [];

// 這段是用來避免查看頁數大於總頁數的問題
if($totalRows > 0){
    if ($page > $totalPages){
        header("Location: ?page=$totalPages");
        exit;
    }
}


// echo $totalRows; exit;  //這行是用來測試$totalRows是否有成功取值

$sql = sprintf("SELECT * FROM npo_act LIMIT %s, %s", ($page-1)*$perPage ,$perPage );

$rows = $pdo->query($sql)->fetchAll();
?> 

<!-- 從這邊開始是HTML內容(=V =呈現) -->
<?php include __DIR__ . '/parts/html-head.php' ?> 
<?php include __DIR__ . '/parts/nav-bar.php' ?> 


<!-- 麵包屑 -->
<div class="container w-75 mt-5" >
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">報名活動</li>
        </ol>
    </nav>
</div>

<!-- 輪播牆 -->
<div class="container w-75 mt-3" style="width:100%; height:300px;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style=" width:100%; height:300px;">  
        <div class="carousel-item active">
            <img src="./list-img/c01.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./list-img/dog.jpg" style="object-fit:center "class="d-block w-100" alt="..." >
            <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="./list-img/c01.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<!-- 頁籤 -->
<div class="container w-75 d-flex  justify-content-center mt-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination" >
                <li class="page-item <?= $page ==1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=1" >
                    <i class="fa-solid fa-angles-left"></i>
                    </a>
                </li>
                <li class="page-item <?= $page ==1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page-1 ?>" >
                    <i class="fa-solid fa-chevron-left"></i>
                    </a>
                </li>
            
            <!-- 頁籤顯示前5後5個 -->
            <?php for($i= $page-3; $i<=$page+3; $i++): 
                if($i>=1 and $i<= $totalPages):
                ?>
                <!-- 要特別特別注意這邊是「：」不是；!!! -->
            
                <!-- 用三元運算子處理什麼頁面反白什麼 -->
                <li class="page-item <?= $page==$i ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>

            <?php endif; 
        
                endfor; ?>
                <li class="page-item <?= $page ==$totalPages ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $page+1 ?>">
                <i class="fa-solid fa-chevron-right"></i>
                </a>
                </li>

                <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $totalPages ?>">
                    <i class="fa-solid fa-angles-right"></i>
                    </a>
                </li>
        </ul>
    </nav>
</div>



<!-- 卡片式 -->
<div class="container w-75 d-flex align-content-start flex-wrap " style="padding-left:250px">

    <?php foreach($rows as $r): ?>
        <div class="card m-2 mt-3 card-f" style="width: 23rem; border-radius:10px">

            <div class="d-flex justify-content-between" style="padding:10px 15px">
            <span class="bg-info text-white" style="padding:3px 10px;border-radius:5px"><?= $r['type_sid'] ?></span>
            <span>組織名稱(尚未連結)</span>
            </div>

            <div style=" width:100%;height:150px;overflow:hidden">
            <img src="<?= $r['img'] ?>" class="card-img-top" alt="..." style="width:100%;hight:100%;">
            </div>

            <div class="card-body">
                <h5 class="card-title mt-2" style="font-weight:bold"><?= $r['act_title'] ?></h5>
                <p class="card-text mt-3 text-primary"><i class="fa-solid fa-location-dot"></i>&nbsp<?= $r['place_city'] ?></p>
                <p class="card-text"><?= "活動時間：{$r['start_date']}" ?></p>
                <p class="card-text"><?= "人數需求：{$r['limit_num']}人" ?></p>
                <p class="card-text mt-1"><?= "\$：（尚未連結）" ?></p>
                <p class="card-text text-white bg-danger  mb-3 mt-5" style="border-radius:5px;padding:6px;text-align:center;width:50%;margin-left:auto"><?= "陰德值：(尚未連結)" ?></p>
            <!-- <a href="#" class="btn btn-primary" style="width:4rem"><?= $r['type_sid'] ?></a> -->
            </div>
        </div>
    <?php endforeach; ?>
</div>


<?php include __DIR__ . '/parts/scripts.php' ?> 
<?php include __DIR__ . '/parts/html-foot.php' ?> 