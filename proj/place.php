<?php require __DIR__ . "./parts/connect_db.php" ?>

<?php
$pageName = 'place';
$title = '濟善救世公司-良辰吉地';
?>

<?php

// 假會員資料

// 葉宥廷
// $_SESSION['member']['sid'] = 11;
// $_SESSION['member']['deathdate'] = '2022-06-06';
// $_SESSION['member']['account'] = 'HappyCat03';

// 陳怡雯
// $_SESSION['member']['sid'] = 12;
// $_SESSION['member']['deathdate'] = NULL; 

?>


<?php include __DIR__ . "./parts/html-head.php" ?>


<style>
    body {
        background: linear-gradient(to right, #56a2aa, #ddd4a5);
        /* background: linear-gradient(0deg, #69d0ff 0%, #ffa4e9 100%); */
    }

    .time-area,
    .sort-area {
        /* outline: 1px solid #aaa; */
        border: none;
        border-radius: 10px;
        overflow: hidden;
        background-color: rgba(255, 255, 255, .8);
    }

    .time-area .time-title,
    .place-left .sort-title {
        background-color: #37508c;
        /* background-color: #407672; */
        color: rgb(255, 255, 255);
    }


    .filter-section {
        /* background-color: rgb(203, 207, 212); */
        background-color: rgba(255, 255, 255, .6);
        border-radius: 10px;
    }

    #searchBtn {
        background-color: #e9ecef;
        border-color: #c3c6c8;
    }

    .place-row p,
    .place-row h4 {
        margin-bottom: 0;
        text-align: center;
    }

    .place-row {
        /* border: 2px solid #aaa; */
        border-radius: 20px;
        padding: 15px;
        transform: translate(0);
        transition: .5s;
        background-color: rgba(255, 255, 255, .8);
    }

    .place-time,
    .place-location,
    .place-quota {
        padding: 0 10px 0;
        line-height: 28px;
        border-right: 1px solid #ccc;
    }

    .title {
        text-align: center;
    }

    .title h4,
    .title i {
        font-weight: bold;
        font-size: 22px;
        color: rgb(57, 89, 114);
        transition: 1s;
    }

    .place-row:hover .float-icon {
        transform: translateY(-8px);
    }

    .place-row-wrap:hover .place-row {
        transform: translate(-2px, -1px);
        background-color: rgba(255, 255, 255, 1);
    }

    p.year,
    p.month,
    p.country {
        font-weight: bold;
        font-size: 20px;
    }

    p.city {
        font-size: 16px;
        font-weight: bold;
    }

    p.remain {
        color: #f45e35;
        font-weight: bold;
    }

    .place-buttoms .chooseBtn {
        height: 34px;
        background-color: #37508c;
        border: none;
        transition: .2s;
        font-size: 14px;
    }


    .chooseBtn:hover {
        background-color: #0b3863;
    }

    .place-quota {
        border-right: 0;
    }

    .place-price {
        font-size: 14px;
        font-weight: bolder;
        color: #aa0138;
    }

    .place-price>span {
        font-size: 18px;
        font-weight: bolder;
        color: #ce0138;
    }

    .map-area {
        /* background-color: rgba(255, 255, 255, .3); */
        width: 100%;
        position: fixed;
        bottom: 0;
    }

    .mapBtn {
        border-radius: 50px;
        border: none;
        width: 150px;
        height: 50px;
        transition: .5s;
        z-index: 9;
    }

    .mapBtn:hover {
        background-color: #c63333;
    }
</style>


<?php include __DIR__ . "./parts/navbar.php" ?>

<div class="container">
    <div class="row mt-5">
        <!-- 左側欄 -->
        <div class="place-left col-md-2 px-2">
            <div id="timeArea" class="time-area text-center mb-4">
                <div class="time-title fs-6 fw-bold py-1">現在時間</div>
                <div id="nowYM" class="fs-4 fw-bolder border-bottom py-2 mx-2 my-1"></div>
                <div id="nowTime" class="fs-4 p-1 my-1"></div>
            </div>
            <div class="sort-area px-4 py-3">
                <h6>排序：</h6>
                <input id="sortASC" type="radio" name="sort" onchange="sortByYear(event)">
                <label for="sortASC">依年份遞增</label>
                <br>
                <input id="sortDESC" type="radio" name="sort" onchange="sortByYear(event)">
                <label for="sortDESC">依年份遞增</label>
            </div>
            <!-- <div id="newsArea" class="news-area text-center">
                <div class="news-title fs-5 fw-bold py-1">最新消息</div>
            </div> -->
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

<!-- <div class="map-area d-flex justify-content-center align-items-center my-2">
    <button class="btn btn-dark mapBtn" href="place-map.php"><i class="fa-solid fa-map-location-dot"></i> 顯示地圖</button>

</div> -->


<?php include __DIR__ . "./parts/scripts.php" ?>

<script>
    let place_data;
    let page = +location.search.slice(6);
    let sort = 0; // 預設

    // 頁數頁碼
    const renderPageBtn = (pageNum) => {
        return `
                <li class="page-item">
                    <a class="page-link" onclick="pageChange(event); return false;" href="?page=${pageNum}">${pageNum}</a>
                </li>
                `;
    };

    const renderPagination = (page, totalPages = place_data.totalPages, prevPagesNum = 5) => {
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
        place_price,
        balance,
    }) => {
        let b = quota - booked;
        return `
        <div class="place-row-wrap col-12 p-2">
            <div class="place-row mt-1 d-flex justify-content-center align-items-center">
                <input type="hidden" value="${sid}">
                <div class="place-info d-flex col-7">
                    <div class="place-time col-6 d-flex align-item-center">
                        <div class="title col-4">
                            <i class="fa-solid fa-clock"></i>
                            <h4>良辰</h4>
                        </div>
                        <div class="col-8 d-flex align-items-center justify-content-center">
                            <p class="year">${year}年 ${month}月</p>
                        </div>
                    </div>
                    <div class="place-location col-6 d-flex">
                        <div class="title col-4">
                            <i class="fa-solid fa-location-dot"></i>
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
                    <button class="chooseBtn btn btn-success p-2 mt-2" onclick="AddPlaceToCart(${sid},${b},0); return false;"><i class="fa-solid fa-cart-arrow-down"></i>加入轉生訂單</button>
                </div>
            </div>
        </div>
        `;
    };

    function renderTable() {
        const placeArea = document.querySelector("#placeArea");
        let html = "";
        if (place_data.rows && place_data.rows.length) {
            html = place_data.rows.map((r) => renderRow(r)).join("");
        }
        placeArea.innerHTML = html;
    }

    // 換頁render
    // console.log(page);
    if (!page && !sort) {
        fetch("place-list-api.php?page=1&sort=0")
            .then((response) => response.json())
            .then((obj) => {
                place_data = obj;
                renderTable();
                renderPagination(1);
                history.pushState(page, "", "?page=" + 1);
                window.scrollTo(0, 0);
            });
    } else {
        fetch(`place-list-api.php?page=${page}&sort=${sort}`)
            .then((response) => response.json())
            .then((obj) => {
                place_data = obj;
                renderTable();
                renderPagination(page);
                history.pushState(page, "", "?page=" + page);
                window.scrollTo(0, 0);
            });
    }


    const pageChange = (e) => {
        // 轉換成數字
        const page = +e.target.innerHTML;

        fetch(`place-list-api.php?page=${page}&sort=${sort}`)
            .then((r) => r.json())
            .then((obj) => {
                place_data = obj;
                renderTable();
                renderPagination(page);

                const state = {
                    'page': page,
                    'sort': sort
                };
                history.pushState(state, '', '?page=' + page + '&sort=' + sort);
                window.scrollTo(0, 0);
            });
    }


    // 加入轉生訂單
    async function AddPlaceToCart(sid, b, replace) {
        if (b == 0) {
            alert(`已無轉生名額，請另選良辰吉地`);
        } else {
            await fetch(`place-order-api.php?sid=${sid}&replace=${replace}`)
                .then((r) => r.json())
                .then(result => {
                    console.log(result);
                    if (result['success'] == true) {
                        alert(`已成功加入訂單，請至會員中心查看`);
                        location.assign('place.php?page=1');
                    } else if (result['errorType'] == "repeat") {
                        alert(`已有此筆良辰吉日訂單，無法重複加入`);
                    } else if (result['errorType'] == "dif") {
                        if (confirm(`已有別筆訂單資料，是否修改訂單為此筆良辰吉日？`)) {
                            AddPlaceToCart(sid, b, 1);
                        } else {
                            alert(`訂單沒有更改`);
                        }
                    } else if (result == false) {
                        window.location.href = 'ab-login.php';
                    }
                })
        }
    };


    // 篩選資料 filter
    async function filtData() {
        const fd = new FormData(document.filterForm);
        const r = await fetch('place-filter-api.php', {
            method: 'POST',
            body: fd
        });
        const result = await r.json();
        place_data = result;
        page = 1;
        console.log(place_data);

        renderTable();
        renderPagination();

        if (place_data.success == false) {
            const nodata = document.querySelector("#nodata");
            nodata.innerHTML = "篩選區間沒有可顯示資料";
        } else {
            nodata.innerHTML = "";
        }
    }

    // 時間區間篩選 filter
    async function filtDate() {
        const fd = new FormData(document.searchDateForm);
        const r = await fetch('place-time-filter-api.php', {
            method: 'POST',
            body: fd
        });
        const result = await r.json();
        place_data = result;
        page = 1;
        console.log(place_data.rows);

        renderTable();
        renderPagination();
    }

    // 資料排序
    async function sortByYear(e) {
        const sortASC = document.querySelector('#sortASC');
        const sortDESC = document.querySelector('#sortDESC');
        let t = e.target;
        console.log(t);

        if (t == sortASC) {
            sort = 1;
            fetch('place-list-api.php?sort=1')
                .then((response) => response.json())
                .then((obj) => {
                    place_data = obj;
                    renderTable();
                    renderPagination(page);
                    history.pushState(page, "", "?page=" + 1);
                });
        } else if (t == sortDESC) {
            sort = 2;
            fetch('place-list-api.php?sort=2')
                .then((response) => response.json())
                .then((obj) => {
                    place_data = obj;
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
        fetch("place-render-dist-api.php").then(r => r.json()).then(obj => {
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
        city.innerHTML = `<option selected>選擇城市...</option>`;

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