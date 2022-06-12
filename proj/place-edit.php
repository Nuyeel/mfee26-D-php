<?php require __DIR__ . "/parts/connect_db.php";

$pageName = 'place-edit';
$title = '良辰吉地-修改';



$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;

if (empty($sid)) {
    header('Location: place-admin.php');
    exit;
};

$row = $pdo->query("SELECT * FROM `place` WHERE sid=$sid")->fetch();
// print_r($row);

if (empty($row)) {
    header('Location: place-admin.php');
    exit;
};

?>


<?php include __DIR__ . "/parts/html-head.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>


<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title border-bottom py-2 mb-3 fw-bold fs-3">修改資料</h5>
                    <form name="form1" onsubmit="sendData(); return false;" novalidate>
                        <input type="hidden" name="sid" value="<?= $row['sid'] ?>">

                        <div class="mb-3 p-2">
                            <label for="date" class="form-label">時間：</label>
                            <input type="month" class="form-control" id="date" name="date" min="2022-09" max="2122-08" value="<?= $row['year'] ?>-<?= ($row['month'] < 10) ? ("0" . ($row['month'])) : ($row['month']); ?>" onchange="console.log(this.value)">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3 p-2">
                            <label class="form-label">地點：</label>
                            <div class="d-flex">
                                <select class="form-select" id="country" name="country" onfocus="renderCountry(value);" onchange="changeCity(value)">
                                    <option disabled>選擇國家...</option>
                                    <option selected><?= $row['country'] ?></option>
                                </select>
                                <select class="form-select" id="city" name="city" onchange="changeDist(value)" onfocus="changeCity(document.form1.country.value)">
                                    <option disabled>選擇城市...</option>
                                    <option selected><?= $row['city'] ?></option>
                                </select>
                                <select class="form-select" id="dist" name="dist" onfocus="changeDist(document.form1.city.value)">
                                    <option disabled>選擇地區...</option>
                                    <option selected><?= $row['dist'] ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="mb-3 col p-2">
                                <label for="quota" class="form-label">名額：</label>
                                <input type="number" class="form-control" id="quota" name="quota" min="0" max="20" value="<?= $row['quota'] ?>">
                                <div class="form-text red"></div>
                            </div>
                            <div class="mb-3 col p-2">
                                <label for="booked" class="form-label">已被預訂數量：</label>
                                <input type="number" class="form-control" id="booked" name="booked" min="0" max="20" value="<?= $row['booked'] ?>">
                                <div class="form-text red"></div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">修改</button>
                    </form>
                </div>

                <div id="infoBar" class="alert alert-success" role="alert" style="display: none; margin-top:5px;">
                    資料修改成功！
                </div>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . "/parts/scripts.php" ?>
<script>
    const infoBar = document.querySelector('#infoBar');


    async function sendData() {
        // 欄位檢查

        const fd = new FormData(document.form1);
        const r = await fetch('place-edit-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);

        infoBar.style.display = 'block';
        if (result.success) {
            infoBar.classList.remove('alert-danger');
            infoBar.classList.add('alert-success');
            infoBar.innerHTML = '資料修改成功';

            setTimeout(() => {
                location.href = 'place-admin.php';
            }, 1000)
        } else {
            infoBar.classList.remove('alert-success');
            infoBar.classList.add('alert-danger');
            infoBar.innerHTML = result.error || '資料修改失敗';
        }
    }

    // 國家城市三層選單
    let renderData;
    const country = document.querySelector("#country");
    const city = document.querySelector('#city');
    const dist = document.querySelector('#dist');


    fetch("place-render-dist-api.php").then(r => r.json()).then(obj => {
        renderData = obj;
        // console.log(renderData);
    });

    function renderCountry(value) {
        country.innerHTML = `<option selected disabled>選擇城市...</option>`;

        const countrys = renderData.countrys;
        for (let k in countrys) {
            country.innerHTML += `<option value="${k}">${k}</option>`;
        };
    };
    // renderCountry();

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

<?php include __DIR__ . "/parts/html-foot.php" ?>