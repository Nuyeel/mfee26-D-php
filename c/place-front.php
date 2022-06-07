<?php
require __DIR__ . "./parts/test_connect_db.php";
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
            <div class="filter-section px-4 py-4">
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
                        <form name="searchDateForm" action="" onsubmit="filtDate(); return false">
                            <div class="input-group pe-2">
                                <label class="input-group-text"><i class="fa-solid fa-calendar-days"></i></label>
                                <input type="month" id="start_month" name="start_month" min="2022-09" max="2122-08" value="2022-09" class="form-control" onchange="endDateCheck()" />
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
            <div class="list-section px-1">
                <div id="placeArea" class="d-flex flex-wrap">
                    <!--
                    <div class="place-card-wrap col-4 p-2">
                            <div class="place-card m-3">
                                <div class="card-icons d-flex justify-content-around">
                                    <i class="fa-solid fa-clock"></i>
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="top mb-1 shadow">
                                    <div class="d-flex mb-3">
                                        <input type="hidden" value="<?= $r['sid'] ?>">
                                        <div class="top-time col d-flex flex-column justify-content-between">
                                            <div class="title mb-3">
                                                <h4>良辰</h4>
                                            </div>
                                            <div class="d-flex flex-column align-items-center justify-content-center py-3">
                                                <p class="year fs-4"><?= $r['year'] ?></p>
                                                <p class="month"><?= $r['month'] ?>月</p>
                                            </div>
                                        </div>
                                        <div class="top-place col d-flex flex-column justify-content-between">
                                            <div class="title mb-3">
                                                <h4>吉地</h4>
                                            </div>
                                            <p class="country "><?= $r['country'] ?></p>
                                            <p class="city"><?= $r['city'] ?><br><?= $r['dist'] ?></p>
                                        </div>
                                    </div>
                                    <div class="place-info d-flex align-items-center">
                                        <p class="quota col">轉生限額：<?= $r['quota'] ?></p>
                                        <p class="remain col">剩餘名額：<?= $r['quota'] - $r['booked'] ?></p>
                                    </div>
                                </div>
                                <div class="bottom py-2">
                                    <div class="placeCardBtn d-flex justify-content-end">
                                        <button class="saveBtn btn btn-warning p-2 me-2"><i class="fa-brands fa-gratipay"></i> 收藏</button>
                                        <button class="chooseBtn btn btn-success p-2 me-2"><i class="fa-solid fa-cart-arrow-down"></i> 加入</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    -->
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
    let data;
    let page = +location.search.slice(6);

    // 頁數頁碼
    const renderPageBtn = (pageNum) => {
        return `
            <li class="page-item">
                <a class="page-link" onclick="pageChange(event); return false;" href="?page=${pageNum}">${pageNum}</a>
            </li>
            `;
    };

    const renderPagination = (page, totalPages = data.totalPages, prevPagesNum = 5) => {
        pNumOutput = paginationNum(page, totalPages, prevPagesNum);

        let beginPage = pNumOutput[0];
        let endPage = pNumOutput[1];

        let str = '';

        for (let i = beginPage; i <= endPage; i++) {
            str += renderPageBtn(i);
        }
        document.querySelector('.pagination').innerHTML = str;
    };

    const paginationNum = (page, totalPages, prevPagesNum) => {
        // 只是預設值
        let beginPage, endPage;
        if (totalPages <= prevPagesNum * 2 + 1) {
            beginPage = 1;
            endPage = totalPages;
        } else if (page - 1 < prevPagesNum) {
            beginPage = 1;
            endPage = prevPagesNum * 2 + 1;
        } else if (totalPages - page < prevPagesNum) {
            beginPage = totalPages - prevPagesNum * 2;
            endPage = totalPages;
        } else {
            beginPage = page - prevPagesNum;
            endPage = page + prevPagesNum;
        }

        let pNumOutput = [];
        pNumOutput.push(beginPage);
        pNumOutput.push(endPage);

        return pNumOutput;
    };


    // 資料
    const renderRow = ({
        sid,
        year,
        month,
        country,
        city,
        dist,
        quota,
        booked,
        balance,
    }) => {
        let b = quota - booked;
        return `
        <div class="place-card-wrap col-4 p-2">
            <div class="place-card m-3">
                <div class="card-icons d-flex justify-content-around">
                    <i class="fa-solid fa-clock"></i>
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="top mb-1 shadow">
                    <div class="d-flex mb-3">
                        <input type="hidden" value="${sid}">
                        <div class="top-time col d-flex flex-column justify-content-between">
                            <div class="title mb-3">
                                <h4>良辰</h4>
                            </div>
                            <div class="d-flex flex-column align-items-center justify-content-center py-3">
                                <p class="year fs-4">${year}</p>
                                <p class="month">${month}月</p>
                            </div>
                        </div>
                        <div class="top-place col d-flex flex-column justify-content-between">
                            <div class="title mb-3">
                                <h4>吉地</h4>
                            </div>
                            <p class="country ">${country}</p>
                            <p class="city">${city}<br>${dist}</p>
                        </div>
                    </div>
                    <div class="place-info d-flex align-items-center">
                        <p class="quota col">轉生限額：${quota}</p>
                        <p class="remain col">剩餘名額：${b}</p>
                    </div>
                </div>
                <div class="bottom py-2">
                    <div class="placeCardBtn d-flex justify-content-end">
                        <button class="chooseBtn btn btn-success p-2 me-2"><i class="fa-solid fa-cart-arrow-down"></i> 加入</button>
                    </div>
                </div>
            </div>
        </div>
        `;
    };

    function renderTable() {
        const placeArea = document.querySelector("#placeArea");
        let html = "";
        if (data.rows && data.rows.length) {
            html = data.rows.map((r) => renderRow(r)).join("");
        }
        placeArea.innerHTML = html;
    }

    // 換頁render
    // console.log(page);
    if (!page) {
        fetch("place-list-api.php?page=1")
            .then((response) => response.json())
            .then((obj) => {
                data = obj;
                renderTable();
                renderPagination(1);
                history.pushState(page, "", "?page=" + 1);
            });
    } else {
        fetch(`place-list-api.php?page=${page}`)
            .then((response) => response.json())
            .then((obj) => {
                data = obj;
                renderTable();
                renderPagination(page);
                history.pushState(page, "", "?page=" + page);
            });
    }

    const pageChange = (e) => {
        // 轉換成數字
        const page = +e.target.innerHTML;

        fetch(`place-list-api.php?page=${page}`)
            .then((r) => r.json())
            .then((obj) => {
                data = obj;
                renderTable();
                renderPagination(page);
                history.pushState(page, '', '?page=' + page);
            });
    }

    // 篩選資料 filter
    async function filtData() {
        const fd = new FormData(document.filterForm);
        const r = await fetch('filter-api.php', {
            method: 'POST',
            body: fd
        });
        const result = await r.json();
        data = result;
        console.log(data.rows);

        renderTable();
    }

    // 時間區間篩選 filter
    async function filtDate() {
        const fd = new FormData(document.searchDateForm);
        const r = await fetch('time-filter-api.php', {
            method: 'POST',
            body: fd
        });
        const result = await r.json();
        data = result;
        console.log(data.rows);

        renderTable();
    }


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

    // 結束月曆在起始日之後
    const startMonth = document.querySelector("#start_month");
    const endMonth = document.querySelector("#end_month");
    const endDateCheck = () => {
        const start = startMonth.value;
        endMonth.value = endMonth.min = start;
    };
</script>


<?php include __DIR__ . "./parts/html-foot.php" ?>