<?php require __DIR__ . "/../parts/connect_db.php" ?>

<?php
$pageName = 'place';
$title = '新增良辰吉地';
?>

<?php include __DIR__ . "/../parts/html-head.php" ?>
<?php include __DIR__ . "/../parts/navbar.php" ?>


<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title border-bottom py-2 mb-3 fw-bold fs-3">新增良辰吉地</h5>
                    <form name="form1" onsubmit="sendData(); return false;" novalidate>
                        <div class="mb-3 p-2">
                            <label for="date" class="form-label">時間：</label>
                            <input type="month" class="form-control" id="date" name="date" min="2022-09" max="2122-08">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3 p-2">
                            <label class="form-label">地點：</label>
                            <div class="d-flex">
                                <select class="form-select" id="country" name="country" onchange="changeCity(value)">
                                    <option selected disabled>選擇國家...</option>
                                </select>
                                <select class="form-select" id="city" name="city" onchange="changeDist(value)">
                                    <option selected disabled>選擇城市...</option>
                                </select>
                                <select class="form-select" id="dist" name="dist">
                                    <option selected disabled>選擇地區...</option>

                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="mb-3 col p-2">
                                <label for="quota" class="form-label">名額：</label>
                                <input type="number" class="form-control" id="quota" name="quota" min="0" max="20" value="">
                                <div class="form-text red"></div>
                            </div>
                            <div class="mb-3 col p-2">
                                <label for="booked" class="form-label">已被預訂數量：</label>
                                <input type="number" class="form-control" id="booked" name="booked" min="0" max="20" value="">
                                <div class="form-text red"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="place-admin.php" class="btn btn-secondary" role="button">返回上一頁</a>
                            <button type=" submit" class="btn btn-primary"">新增</button>
                        </div>
                    </form>
                </div>

                <div id=" infoBar" class="alert alert-success" role="alert" style="display: none; margin-top:5px;">
                                資料新增成功！
                        </div>
                </div>
            </div>
        </div>
    </div>


    <?php include __DIR__ . "/../parts/scripts.php" ?>

    <script>
        const infoBar = document.querySelector('#infoBar');


        async function sendData() {
            // 欄位檢查

            const fd = new FormData(document.form1);
            const r = await fetch('place-add-api.php', {
                method: 'POST',
                body: fd,
            });
            const result = await r.json();
            console.log(result);

            infoBar.style.display = 'block';
            if (result.success) {
                infoBar.classList.remove('alert-danger');
                infoBar.classList.add('alert-success');
                infoBar.innerHTML = '資料新增成功';

                setTimeout(() => {
                    location.href = 'place-backstage.php';
                }, 1000)
            } else {
                infoBar.classList.remove('alert-success');
                infoBar.classList.add('alert-danger');
                infoBar.innerHTML = result.error || '資料新增失敗';
            }
        }


        // 國家城市三層選單
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

        function changeDist(value) {
            // 先清空選單
            dist.innerHTML = `<option selected disabled>選擇地區...</option>`;
            // 找出城市的地區陣列
            const distList = renderData.distList;
            // console.log(distList);

            for (let k in distList) {
                if (value == k) {
                    distList[k].forEach(e => {
                        dist.innerHTML += `<option value="${e}">${e}</option>`;
                    });
                }
            };
        }
    </script>

    <?php include __DIR__ . "/../parts/html-foot.php" ?>