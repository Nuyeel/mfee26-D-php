<?php require __DIR__ . "/../parts/connect_db.php" ?>

<?php
$pageName = 'place';
$title = '濟善救世公司-良辰吉地';
?>

<?php

// 先塞資料驗證

// $_SESSION = [
//     'member' => [
//         'sid' => 605,
//         'name' => '獨行俠',
//         'deathdate' => NULL
//     ], 
// ];

// 葉宥廷
$_SESSION['member']['sid'] = 20;
$_SESSION['member']['deathdate'] = '2022-06-06';

// 陳怡雯
// $_SESSION['member']['sid'] = 12; 
// $_SESSION['member']['deathdate'] = NULL; 


?>

<style>
    body {
        /* background: linear-gradient(to right, rgb(119, 196, 162), rgb(136, 13, 250)); */
        /* background: linear-gradient(to right, #b5e3ca, #f79a93); */
        background: linear-gradient(to right, rgb(226, 128, 222), rgb(52, 83, 164));
    }
</style>


<?php include __DIR__ . "/../parts/html-head.php" ?>
<?php include __DIR__ . "/../parts/navbar.php" ?>

<div class="container">
    <div class="row mt-5">
        <!-- 左側欄 -->
        <div class="place-left col-md-2 px-2 mx-4">
            <div id="timeArea" class="time-area text-center mb-4">
                <div class="time-title fs-5 fw-bold py-1">現在時間</div>
                <div id="nowYM" class="fs-3 fw-bolder border-bottom py-2 mx-2 my-2"></div>
                <div id="nowTime" class="fs-3 p-1 my-1"></div>
            </div>
            <div class="sort-area px-3">
                <h6 style="font-weight: bold;">資料排序：</h6>
                <input id="sortASC" name="sort" type="radio" value="1" onchange="sortByYear(event); return false;">
                <label class="form-check-label" for="sortASC">依年份遞增</label>
                <br>
                <input id="sortDESC" name="sort" type="radio" value="2" onchange="sortByYear(event); return false;">
                <label class="form-check-label" for="sortDESC">依年份遞減</label>
            </div>
            <!-- <div id="newsArea" class="news-area text-center">
                <div class="news-title fs-5 fw-bold py-1">最新消息</div>
            </div> -->
        </div>
        <!-- 主區塊 -->
        <div class="main col-md-9 px-2">
            <!-- 篩選搜尋 -->
            <div class="filter-section px-4 pt-4 pb-2">
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
                    <div class="col-md-12">
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
                </div>
            </div>
            <!-- 列表區 -->
            <div class="list-section px-1 py-2">
                <div id="placeArea">
                </div>
                <h6 id="nodata" style="text-align: center; color: #888;"></h6>
            </div>
            <!-- 頁碼/頁數轉換 -->
            <div class="row">
                <div class="col ">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <!--
                            <li class="page-item active">
                                <a class="page-link" href="?page=1">1</a>
                            </li>
                            -->
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . "/../parts/scripts.php" ?>

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
        <<div class="place-row-wrap col-12 p-2">
            <div class="place-row mt-2 d-flex justify-content-center align-items-center shadow">
                <input type="hidden" value="${sid}">
                <div class="place-info d-flex col-7">
                    <div class="place-time col-6 d-flex align-item-center">
                        <div class="title col-4">
                            <i class="fa-solid fa-clock float-icon"></i>
                            <h4>良辰</h4>
                        </div>
                        <div class="col-8 d-flex align-items-center justify-content-center">
                            <p class="year">${year}年 ${month}月</p>
                        </div>
                    </div>
                    <div class="place-location col-6 d-flex">
                        <div class="title col-4">
                            <i class="fa-solid fa-location-dot float-icon"></i>
                            <h4>吉地</h4>
                        </div>
                        <div class="col-8">
                            <p class="country">${country}</p>
                            <p class="city">${city} ${dist}</p>
                        </div>
                    </div>

                </div>
                <div class="place-quota col-2">
                    <p class="quota col">轉生限額：${quota}</p>
                    <p class="remain col">剩餘名額：${b}</p>
                </div>
                <div class="place-buttoms col-3 d-flex flex-column justify-content-center align-items-center">
                    <p class="place-price">所需陰德值：<span>${place_price}</span></p>
                    <button class="chooseBtn btn btn-success p-2 mt-2" onclick="AddPlaceToCart(${sid}); return false;"><i class="fa-solid fa-cart-arrow-down"></i>加入轉生訂單</button>
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



    // 加入轉生訂單
    async function AddPlaceToCart(sid) {
        const member =
            await fetch(`place-order-api.php?sid=${sid}`)
            .then((r) => r.json())
            .then(result => {
                console.log(result);
                if (result['success'] == true) {
                    alert(`已成功加入訂單，請至會員中心查看`);
                    location.assign('place.php?page=1');
                } else {
                    alert(`已有良辰吉日訂單，無法再次加入`);
                }
            })
    };


    // 篩選資料 filter
    async function filtData() {
        const fd = new FormData(document.filterForm);
        const r = await fetch('filter-api.php', {
            method: 'POST',
            body: fd
        });
        const result = await r.json();
        data = result;
        page = 1;
        console.log(data);

        renderTable();
        renderPagination();

        if (data.success == false) {
            const nodata = document.querySelector("#nodata");
            nodata.innerHTML = "篩選區間沒有可顯示資料";
        } else {
            nodata.innerHTML = "";
        }
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
        page = 1;
        console.log(data.rows);

        renderTable();
        renderPagination();

        if (data.success == false) {
            const nodata = document.querySelector("#nodata");
            nodata.innerHTML = "篩選區間沒有可顯示資料";
        } else {
            nodata.innerHTML = "";
        }
    }

    // 資料排序
    async function sortByYear(e) {
        const sortASC = document.querySelector('#sortASC');
        const sortDESC = document.querySelector('#sortDESC');
        let t = e.target;
        console.log(t);

        let sort = 0; // 預設
        if (t == sortASC) {
            sort = 1;
            fetch('place-list-api.php?sort=1')
                .then((response) => response.json())
                .then((obj) => {
                    data = obj;
                    renderTable();
                    renderPagination(page);
                    history.pushState(page, "", "?page=" + 1);
                });
        } else if (t == sortDESC) {
            sort = 2;
            fetch('place-list-api.php?sort=2')
                .then((response) => response.json())
                .then((obj) => {
                    data = obj;
                    renderTable();
                    renderPagination(page);
                    history.pushState(page, "", "?page=" + 1);
                });
        }

    };


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


<?php include __DIR__ . "/../parts/html-foot.php" ?>