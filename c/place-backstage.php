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
    // print_r($rows);
};
?>

<!-- 處理資料在 html 出現之前 -->
<?php include __DIR__ . "./parts/html-head.php" ?>

<div class="container mt-5">
    <div class="top-area d-flex">
        <!-- 篩選搜尋 -->
        <div class="filter-section px-4 py-4 mb-4 col-10">
            <form name="filterForm" action="" onsubmit="filtData(); return false">
                <div class="d-flex mb-3">
                    <div class="col-md-6">
                        <div class="input-group pe-2">
                            <label class="input-group-text"><i class="fa-solid fa-filter"></i></label>
                            <select class="form-select" id="country" name="country" onchange="changeCity(value)">
                                <option selected value="">
                                    選擇國家...
                                </option>
                            </select>
                            <select class="form-select" id="city" name="city">
                                <option selected value="">
                                    選擇城市...
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group pe-2">
                            <label class="input-group-text"><i class="fa-solid fa-filter"></i></label>
                            <select class="form-select" id="year" name="year">
                                <option selected value="">
                                    選擇年份...
                                </option>
                                <!-- <option value="1">One</option> -->
                            </select>
                            <select class="form-select" id="month" name="month">
                                <option selected value="">
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
        <!-- 新增資料 -->
        <div class="col-2 p-4">
            <div class="addBtn">
                <a class="btn btn-secondary" href="place-add.php">新增資料</a>
            </div>
        </div>
    </div>

    <!-- 列表區 -->
    <div class="list-section mt-1">
        <form action="" name="form2" onsubmit="delData()" method="POST">
            <button type="submit" class="btn btn-primary mb-3">刪除勾選的資料</button>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">
                            <i class="fa-solid fa-trash-can"></i>
                            <input class="form-check-input" type="checkbox" value="" name="deleteAll" id="deleteAll" onchange="checkAllToggle()">
                        </th>
                        <th scope="col">#</th>
                        <th scope="col">
                            年度
                            <i class="fa-solid fa-sort"></i>
                        </th>
                        <th scope="col">
                            月份
                            <i class="fa-solid fa-sort"></i>
                        </th>
                        <th scope="col">國家</th>
                        <th scope="col">城市</th>
                        <th scope="col">行政區</th>
                        <th scope="col">名額</th>
                        <th scope="col">已被預訂數量</th>
                        <th scope="col">轉生餘額</th>
                        <th scope="col">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $r) : ?>
                        <tr>
                            <td scope="col">
                                <a href="javascript: delete_it(<?= $r['sid'] ?>)"><i class="fa-solid fa-trash-can"></i></a>
                                <input class="form-check-input" type="checkbox" value="<?= $r['sid'] ?>" name="deleteData[]" id="deleteData">
                            </td>
                            <td scope="col"><?= $r['sid'] ?></td>
                            <td scope="col"><?= $r['year'] ?></td>
                            <td scope="col"><?= $r['month'] ?></td>
                            <td scope="col"><?= $r['country'] ?></td>
                            <td scope="col"><?= $r['city'] ?></td>
                            <td scope="col"><?= $r['dist'] ?></td>
                            <td scope="col"><?= $r['quota'] ?></td>
                            <td scope="col"><?= $r['booked'] ?></td>
                            <td scope="col"><?= $r['quota'] - $r['booked'] ?></td>
                            <td scope="col">
                                <a href="place-edit.php?sid=<?= $r['sid'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <!-- <tbody></tbody> -->
            </table>

        </form>

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
                        if ($i >= 1 and $i <= $totalPages) :
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


<?php include __DIR__ . "./parts/scripts.php" ?>
<script>
    // 篩選資料
    async function filtData() {
        const fd = new FormData(document.filterForm);
        const r = await fetch('filter-api.php', {
            method: 'POST',
            body: fd
        });
        const result = r.json();
        console.log(result);

        setTimeout(() => {
            console.log(1);
            // location.href = 'place-backstage.php';
        }, 1000)

    }
    // 篩選器
    // 國家城市兩層選單
    let renderData;
    const country = document.querySelector("#country");
    const city = document.querySelector('#city');
    const dist = document.querySelector('#dist');

    function renderCountry() {
        fetch("render-dist-api.php").then(r => r.json()).then(obj => {
            renderData = obj;
            // console.log(renderData);

            const countrys = renderData.countrys;
            for (let k in countrys) {
                country.innerHTML += `<option value="${k}">${k}</option>`;
            };
        });
    };
    renderCountry();

    function changeCity(value) {
        // 先清空city選單
        city.innerHTML = `<option selected disabled>選擇城市...</option>`;

        const countrys = renderData.countrys;
        const distList = renderData.distList;

        for (let k in countrys) {
            if (value == k) {
                countrys[k].forEach(e => {
                    city.innerHTML += `<option value="${e}">${e}</option>`;
                });
            }
        };
    };

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


    const deleteAll = document.form2.deleteAll;
    const deleteData = document.form2.deleteData; // RadioNodeList

    function checkAllToggle() {
        if (deleteAll.checked == true) {
            // console.log(deleteAll.checked);
            for (let d of deleteData) {
                d.checked = true;
                deleteAll.checked = true
            }
        } else {
            // console.log(deleteAll.checked);
            for (let d of deleteData) {
                // console.log(d)
                d.checked = false;
                deleteAll.checked = false
            }
        }
    };

    async function delData() {
        // const rows = document.querySelectorAll('input[name=deleteData\\[\\]]');
        if (confirm(`確定要刪除資料嗎?`)) {
            const fd = new FormData(document.form2);

            const response = await fetch('place-delete.php', {
                method: 'POST',
                body: fd,
            });
            const result = response.json();
            // console.log(result);
            // location.href = "place-backstage.php";
        }
    };

    function delete_it(sid) {
        if (confirm(`確定要刪除編號為 ${sid} 此筆資料嗎?`)) {
            location.href = `place-delete.php?sid=${sid}`;
        }
    };
</script>


<?php include __DIR__ . "./parts/html-foot.php" ?>