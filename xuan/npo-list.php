<!-- 下面資料的目的：M(處理)V(呈現)C(互動) -->

<?php require __DIR__ .  './parts/connect_db.php';

$perPage = 6;  //每一頁有幾筆

// $_GET['page']裡面變數要打啥都OK，只要跟到時在網址列上打的相同即可
$page = isset($_GET['page']) ? intval($_GET['page']) : 1 ;
$cate = isset($_GET['cate']) ? intval($_GET['cate']) : 0; //預設值為: 查看所有商品

$params = []; 

$where = ' WHERE 1 '; // 1代表 true
if (!empty($cate)) {
    $where .= " AND type_sid=$cate "; //如果有選種類的話，抓該種類的sid值(增加條件)
    $params['cate'] = $cate; //有分頁就會把分頁值塞進來
}





// 此行用來避免page總和小於0的bug，讓頁面能跳轉回自身
if($page<1){
    header('Location:npo-list.php'); // 可以是完整路徑(但會跳回初始頁面)
    // header('Location: ?page=1'); // 也可以是指定頁面
    exit;
}

// 計算總共有幾筆，以建立頁籤 
// $t_sql = "SELECT COUNT(1) FROM npo_act";



$t_sql = "SELECT COUNT(1) FROM npo_act $where " ;


// 分類資料
$c_sql = "SELECT * FROM `npo_act_type` ";
$cates = $pdo->query($c_sql)->fetchAll();



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

$sql = sprintf("SELECT * FROM npo_act $where LIMIT %s, %s", ($page-1)*$perPage ,$perPage );

$rows = $pdo->query($sql)->fetchAll();
?> 

<!-- 從這邊開始是HTML內容(=V =呈現) -->
<?php include __DIR__ . '/parts/html-head.php' ?> 
<?php include __DIR__ . '/parts/nav-bar.php' ?> 


<!-- 這邊是側邊欄位的CSS -->
<style>

    /* 讓左側dropdowmn變hover */
    .dropdown:hover .dropdown-menu {
    display: block;
    /* margin-top: 0;  */
    /*  remove the gap so it doesn't close 但目前測起來沒有好像沒差??  */
    }  

    /* 讓btn的padding加多一點 */
    .padding-top-bottom{
        padding: 8px 5px;
    }

    .padding-top{
        padding-top: 15px;
    }

    .padding-left{
        padding-left: 8px;
    }

    .margin-top-bottom{
        margin: 15px 0;
    }

    .btn-white{
        background-color: #fff;
    }

    .btn-white:hover{
        background-color: #e2e6ea;
    }

</style>



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
                    $params['page']=$i;
                ?>
                <!-- 要特別特別注意這邊是「：」不是；!!! -->
            
                <!-- 用三元運算子處理什麼頁面反白什麼 -->
                <li class="page-item <?= $page==$i ? 'active' : '' ?>">
                    <a class="page-link" href="?<?= http_build_query($params) ?>"><?= $i ?></a>
                        <!-- 如果有分類就是2個page，沒有就維持1個page -->
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



<div class="container w-75 d-flex">

<!-- 篩選核取方塊 -->
<div style="width:20%;">
    <div class="margin-top-bottom w-75">
        <h5>進階搜尋</h5>
    </div>  


        <a class="btn btn-white d-block  padding-top-bottom border-bottom border-top w-75" href="#" role="button">全部活動</a>
        <a class="btn btn-white d-block  padding-top-bottom border-bottom border-top w-75" href="#" role="button">時間(由近至遠)</a>
        <a class="btn btn-white d-block  padding-top-bottom border-bottom w-75" href="#" role="button">時間(由遠至近)</a>




        <!-- 活動類型分類 -->
        <div class="dropdown dropright border-bottom w-75 ">

                <a class="btn padding-top-bottom " href="#" role="button" id="dropdownMenuLink" aria-expanded="false">
                    活動種類 &nbsp (27422)
                </a>

                <!-- 把活動分類用迴圈下去跑 -->
                
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                
                <?php foreach ($cates as $c) : ?>
                    <li><a class="dropdown-item" href="?cate=<?= $c['sid'] ?>">
                    
                    <?= $c['name'] ?>  (<?= $c['quantity'] ?>)</a>
                
                    </li>
                <?php endforeach; ?>
                </ul>

        </div>   




        <!-- 地區分類 -->
        <div class="dropdown    dropright border-bottom w-75 ">
                <a class="btn padding-top-bottom " href="#" role="button" id="dropdownMenuLink" aria-expanded="false">
                    活動地點 &nbsp (27422)
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">北部(3)</a></li>
                    <li><a class="dropdown-item" href="#">中部(6)</a></li>
                    <li><a class="dropdown-item" href="#">南部(13)</a></li>
                    <li><a class="dropdown-item" href="#">東部(40)</a></li>
                    <li><a class="dropdown-item" href="#">離島(40)</a></li>
                </ul>
        </div>   






</div>


<!-- 卡片式 -->
<div class="container d-flex align-content-start flex-wrap " style="width:80%;">


    <?php foreach($rows as $r): ?>
        <div class="card m-2 mt-3 card-f" style="width: 23rem; border-radius:10px">

            <div class="d-flex justify-content-between" style="padding:10px 15px">
            <span class="bg-info text-white" style="padding:3px 10px;border-radius:5px"><?= $r['name'] ?></span>
            <span>組織名稱(尚未連結)</span>
            </div>

            <div style=" width:100%;height:150px;overflow:hidden">
            <img src="<?= $r['img'] ?>" class="card-img-top" alt="..." style="width:100%;hight:100%;">
            </div>

            <div class="card-body">
                <h5 class="card-title mt-2" style="font-weight:bold"><?= $r['act_title'] ?></h5>
                <p class="card-text mt-3 text-primary"><i class="fa-solid fa-location-dot"></i>&nbsp<?= $r['place_city'] ?></p>
                <p class="card-text"><?= "活動時間：{$r['start']}" ?></p>
                <p class="card-text"><?= "人數需求：{$r['limit_num']}人" ?></p>
                <p class="card-text mt-1"><?= "\$：（尚未連結）" ?></p>


                <button class="add-to-cart-btn" data-sid="<?= $r['sid']?>" >加入購物車</button>


                <p class="card-text text-white bg-danger  mb-3 mt-5" style="border-radius:5px;padding:6px;text-align:center;width:50%;margin-left:auto"><?= "陰德值：{$r['value']}" ?></p>
            <!-- <a href="#" class="btn btn-primary" style="width:4rem"><?= $r['type_sid'] ?></a> -->
            </div>
        </div>
    <?php endforeach; ?>
</div>




</div>





<?php include __DIR__ . '/parts/scripts.php' ?> 




<script>

// 這邊是跟購物車有關的JS

$('.add-to-cart-btn').on('click', event => {
    // 用箭頭函式這邊不用要this
    const btn = $(event.currentTarget);
    const sid = btn.attr('data-sid');
    const quantity = '1';

    // 下面這行是老師原本可選數量的版本code
    // 此版本使用者可以選數量
    // const quantity = btn.closest('.card').find('select').val();


    console.log({
        sid,
        quantity
    });

    // Jquery GET寫法
    $.get('cart-api.php', {
        sid,
        quantity
    }, function(data) {
        console.log(data);
        showCount(data);
    }, 'json');


});

</script>



<?php include __DIR__ . '/parts/html-foot.php' ?> 