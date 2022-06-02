<?php
require __DIR__ . "./parts/test_connect_db.php";



$perPage = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

if ($page < 1) {
    header('Location: ?page=1');
    exit;
};

$t_sql = "SELECT COUNT(1) FROM `place`";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$totalPages = ceil($totalRows / $perPage);

$rows = [];

if ($totalRows > 0) {
    if ($page > $totalPages) {
        header("Location: ?page=$totalPages");
        exit;
    };

    $sql = sprintf("SELECT * FROM `place` ORDER BY `sid` LIMIT %s, %s", ($page - 1) * $perPage, $perPage);

    $rows = $pdo->query($sql)->fetchAll();
};

?>

<!-- 處理資料在 html 出現之前 -->
<?php include __DIR__ . "./parts/html-head.php" ?>

<div class="container">
    <div class="row mt-5">
        <!-- 左側欄 -->
        <div class="place-left col-md-2 px-2">
            <div id="timeArea" class="time-area text-center mb-4">
                <div class="time-title fs-5 fw-bold py-1">現在時間</div>
                <div id="nowYM" class="fs-3 fw-bolder border-bottom py-2 mx-2 my-2"></div>
                <div id="nowTime" class="fs-3 p-1 my-1"></div>
            </div>
            <div id="newsArea" class="news-area text-center">
                <div class="news-title fs-5 fw-bold py-1">最新消息</div>
            </div>
        </div>
        <!-- 主區塊 -->
        <div class="main col-md-9 px-2">
            <!-- 篩選搜尋 -->
            <div class="filter-section px-4 py-4 mb-4">
                <form name="filterForm" action="" onsubmit="filterData(); return false">
                    <div class="d-flex mb-3">
                        <div class="col-md-6">
                            <div class="input-group pe-2">
                                <label class="input-group-text"><i class="fa-solid fa-filter"></i></label>
                                <select class="form-select" id="country" name="country" onchange="changeCity(value)">
                                    <option selected>
                                        選擇國家...
                                    </option>
                                </select>
                                <select class="form-select" id="city" name="city">
                                    <option selected>
                                        選擇城市...
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group pe-2">
                                <label class="input-group-text"><i class="fa-solid fa-filter"></i></label>
                                <select class="form-select" id="year" name="year">
                                    <option selected>
                                        選擇年份...
                                    </option>
                                    <!-- <option value="1">One</option> -->
                                </select>
                                <select class="form-select" id="month" name="month">
                                    <option selected>
                                        選擇月份...
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-secondary" id="filterBtn">
                                篩選
                            </button>
                        </div>
                    </div>
                </form>
                <div class="d-flex">
                    <div class="col-md-10">
                        <!-- 
                                    <input
                                    type="text"
                                    name="datefilter"
                                    value="08/24/2022 - 09/24-2022"
                                />
                                -->
                        <form name="searchDateForm" action="">
                            <div class="input-group pe-2">
                                <label class="input-group-text"><i class="fa-solid fa-calendar-days"></i></label>
                                <input type="month" id="start_month" name="start_month" min="2022-09" max="2122-08" value="2022-09" class="form-control" onchange="endateCheck()" />
                                <label class="input-group-text">至</label>
                                <input type="month" id="end_month" name="end_month" min="2022-09" max="2122-08" value="2022-09" class="form-control" />
                                <button type="submit" class="btn btn-secondary" id="searchDateBtn">
                                    搜尋區間
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group d-flex">
                            <input type="search" name="search" id="search" placeholder="搜尋" aria-label="search" class="form-control" aria-describedby="button-addon2" />
                            <button class="btn btn-outline-secondary" type="button" id="searchBtn">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 列表區 -->
            <div class="list-section border border-secondary px-2">
                <div class="d-flex flex-wrap">
                    <?php foreach ($rows as $r) : ?>
                        <div class="place-card-wrap col-4 p-2">
                            <div class="place-card p-3 m-1 border border-secondary">
                                <div class="top d-flex">
                                    <div class="top-time col">
                                        <h4>良辰</h4>
                                        <p class="year"><?= $r['year'] ?></p>
                                        <p class="month"><?= $r['month'] ?></p>
                                    </div>
                                    <div class="top-place col">
                                        <h4>吉地</h4>
                                        <p class="country"><?= $r['country'] ?></p>
                                        <p><?= $r['city'] ?> <?= $r['dist'] ?></p>
                                    </div>
                                </div>
                                <div class="place-info d-flex">
                                    <p class="quota col">轉生限額：<?= $r['quota'] ?></p>
                                    <p class="remain col">剩餘名額：<?= $r['quota'] - $r['booked'] ?></p>
                                </div>
                                <div class="bottom">
                                    <div class="placeCardBtn d-flex justify-content-between">
                                        <button class="saveBtn btn btn-warning p-2"><i class="fa-brands fa-gratipay"></i> 收藏良辰吉地</button>
                                        <button class="chooseBtn btn btn-success p-2"><i class="fa-solid fa-cart-arrow-down"></i> 加入轉生訂單</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- 頁碼/頁數轉換 -->
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <!-- 頁數轉換 -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?= $page == 1 ? 'disabled' : "" ?>">
                                <a class="page-link" href="?page=1"><i class="fa-solid fa-angles-left"></i></a>
                            </li>
                            <li class="page-item <?= $page == 1 ? 'disabled' : "" ?>">
                                <a class="page-link" href="?page=<?= $page - 1 ?>"><i class="fa-solid fa-angle-left"></i></a>
                            </li>


                            <!-- 前後最多顯示5個頁碼 -->
                            <?php for ($i = $page - 5; $i < $page + 5; $i++) :
                                if ($i >= 1 and $i < $totalPages) :
                            ?>
                                    <li class="page-item <?= $page == $i ? 'active' : "" ?>">
                                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                            <?php endif;
                            endfor; ?>

                            <li class="page-item <?= $page == $totalPages ? 'disabled' : "" ?>">
                                <a class="page-link" href="?page=<?= $page + 1 ?>"><i class="fa-solid fa-angle-right"></i></a>
                            </li>
                            <li class="page-item <?= $page == $totalPages ? 'disabled' : "" ?>">
                                <a class="page-link" href="?page=<?= $totalPages ?>"><i class="fa-solid fa-angles-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "./parts/scripts.php" ?>
<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script>
    // 篩選 filter
    // async function filterData() {
    //     const fd = new FormData(document.filterForm);

    //     const r = await fetch('filter-api.php', {
    //         method: 'POST',
    //         body: fd
    //     });
    //     const result = r.json();
    //     console.log(result);
    // }

    // 現在時間
    const nowDate = () => {
        const nowYM = document.querySelector("#nowYM");
        const nowTime = document.querySelector("#nowTime");
        const now = new Date().toString().split(" ");
        // console.log(now);
        nowYM.innerHTML = `${now[3]}, ${now[1]} ${now[2]}`;
        nowTime.innerHTML = `${now[4]}`;
        setTimeout(nowDate, 1000);
    };
    nowDate();

    // 篩選器
    const renderCity = () => {
        const country = document.querySelector("#country");
        let countryHtml = "";
        let cityHtml = "";

        const countryAr = ["臺灣", "美國"];
        countryAr.forEach((e, i) => {
            countryHtml += `<option value="${i}">${e}</option>`;
        });
        country.innerHTML += countryHtml;
    };
    renderCity();

    const renderDate = () => {
        const year = document.querySelector("#year");
        const month = document.querySelector("#month");
        let yearHtml = "";
        let monthHtml = "";

        for (i = 2022; i <= 2122; i++) {
            yearHtml += `<option value="${i}">${i}</option>`;
        }

        for (k = 1; k <= 12; k++) {
            monthHtml += `<option value="${k}">${k}月</option>`;
        }
        year.innerHTML += yearHtml;
        month.innerHTML += monthHtml;
    };
    renderDate();

    // 結束月曆在起始日之後
    const startMonth = document.querySelector("#start_month");
    const endMonth = document.querySelector("#end_month");
    const endateCheck = () => {
        const start = startMonth.value;
        endMonth.value = endMonth.min = start;
    };
</script>


<?php include __DIR__ . "./parts/html-foot.php" ?>