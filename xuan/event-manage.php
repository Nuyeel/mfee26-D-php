<!-- 下面資料的目的：M(處理)V(呈現)C(互動) -->

<?php require __DIR__ .  '/parts/connect_db.php';

$pageName = 'npo-manage';
$title = '活動申請列表';


$perPage = 8;  //每一頁有幾筆

// $_GET['page']裡面變數要打啥都OK，只要跟到時在網址列上打的相同即可
$page = isset($_GET['page']) ? intval($_GET['page']) : 1 ;

// 此行用來避免page總和小於0的bug，讓頁面能跳轉回自身
if($page<1){
    header('Location: ?page=1'); 
    exit;
}

// 計算總共有幾筆，以建立頁籤 
$t_sql = "SELECT COUNT(*) FROM( (`npo_act` JOIN `npo_act_type` ON `npo_act`.`type_sid` = `npo_act_type`.`typesid`) INNER JOIN `npo_name` ON `npo_act`.`npo_name_sid` = `npo_name`.`npo_sid`) INNER JOIN `city_type` ON `npo_act`.`place_city`= `city_type`.`city_sid` ";
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

$sql = sprintf("SELECT * FROM( (`npo_act` JOIN `npo_act_type` ON `npo_act`.`type_sid` = `npo_act_type`.`typesid`) INNER JOIN `npo_name` ON `npo_act`.`npo_name_sid` = `npo_name`.`npo_sid`) INNER JOIN `city_type` ON `npo_act`.`place_city`= `city_type`.`city_sid` LIMIT %s, %s", ($page-1)*$perPage ,$perPage );

$rows = $pdo->query($sql)->fetchAll();
?> 

<!-- 從這邊開始是HTML內容(=V =呈現) -->
<?php include __DIR__ . '/parts/html-head.php' ?> 
<?php include __DIR__ . '/parts/nav-bar.php' ?> 

<!-- 頁籤 -->
<div class="container w-75 d-flex  justify-content-center mt-3">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
                <li class="page-item <?= $page ==1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page-1 ?>"><i class="fa-solid fa-angles-left"></i></a></li>

                <li class="page-item <?= $page == 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="?page=<?= $page - 1 ?>">
                        <i class="fa-solid fa-angle-left"></i>
                    </a>
                </li>
            
                <?php for ($i = $page - 3; $i <= $page + 3; $i++) :
                        if ($i >= 1 and $i <= $totalPages) :
                    ?>
                            <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                    <?php endif;
                    endfor; ?>

                    <li class="page-item <?= $page == $totalPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $page + 1 ?>">
                            <i class="fa-solid fa-angle-right"></i>
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

<!-- NPO資料表格 -->

<div class="container  mt-3" >
    <table class="table table-borderless" style="text-align:center" >
        <thead class="bg-danger text-white"  >
        <tr>
            <th scope="col">活動圖片</th>
            <th scope="col">類別代號</th>
            <th scope="col">活動名稱</th>
            <th scope="col">主辦單位</th>
            <th scope="col">活動縣市</th>
            <!-- <th scope="col">活動地點</th> -->
            <th scope="col">開始時間</th>
            <th scope="col">結束時間</th>
            <th scope="col">人數需求</th>
            <!-- <th scope="col">表單填送時間</th> -->
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        
        <tbody>
            <?php foreach ($rows as $r) : ?>
                <tr>
                        <td> <img src="<?= $r['img'] ?>" alt="" style="width:60px"> </td>
                        <td><?= $r['name'] ?></td>
                        <td><?= htmlentities($r['act_title']) ?></td>
                        <td><?= htmlentities($r['npo_name']) ?></td>
                        <td><?= htmlentities($r['city']) ?></td>
                        <!-- <td><?= htmlentities($r['place_other']) ?></td> -->
                        <td><?= $r['start'] ?></td>
                        <td><?= $r['end'] ?></td>
                        <td><?= $r['limit_num'] ?></td>
                        <!-- <td><?= $r['create_at'] ?></td> -->
                        
                        <td>
                            <a href="member-edit.php?sid=<?= $r['sid'] ?>">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>

                        <td>
                        <!-- <a href="javascript: delete_it(<?= $r['sid'] ?>)"> -->
                        <!-- 下面是寫法一 把event傳給trashCan那個func 只是還沒定義-->
                        <a href="javascript: " onclick="trashCanClicked(event); return false">
                            <i class="fa-solid fa-trash-can"></i>
                        </a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    
    </table>
</div>

<?php include __DIR__ . '/parts/scripts.php' ?> 

<script>
    // function delete_it(sid) {
    //     if (confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)) {
    //         location.href = `npo-delete.php?sid=${sid}`;
    //     }
    // }

    function trashCanClicked(event){
        //console.log(event.currentTarget);  這邊只是先確認target關係圖
        //console.log(event.target);
        const a_tag = event.currentTarget;
        const tr = a_tag.closest('tr');  //往上找有tr元素的人
        tr.remove(); // 讓tr從畫面上消失(不影響資料庫); 前端的刪除
    }


</script> 




<?php include __DIR__ . '/parts/html-foot.php' ?> 