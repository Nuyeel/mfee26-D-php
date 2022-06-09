<?php require __DIR__ . '/test-parts/connect_data.php';
$pageName = 'test_page';
$title = '陰德值測驗';

$rows = [];
$t_sql = "SELECT COUNT(1) FROM good_deed_test";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$sql = sprintf("SELECT * FROM good_deed_test ORDER BY sid ASC");
$rows = $pdo->query($sql)->fetchAll();



?>
<?php include __DIR__ . '/test-parts/test-head.php' ?>
<?php include __DIR__ . '/test-parts/test-nav.php' ?>

<style>
    .form-control.red {
        border: 1px solid red;
    }

    .form-text.red {
        color: red;
    }

    .form-login {
        display: none;
    }
</style>
<div class="container">
    <!-- <div class="row ">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body form-login">
                    <form name="form-login" onsubmit="sendData();return false;" novalidate>

                        <div class="mb-3">
                            <label for="account" class="form-label">account</label>
                            <input type="text" class="form-control" id="account" name="account">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="text" class="form-control" id="password" name="password" pattern="09\d{8}">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">name </label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="birth" class="form-label">birth</label>
                            <input type="date" class="form-control" id="birth" name="birth">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="death" class="form-label">death</label>
                            <input type="date" class="form-control" id="death" name="death">
                            <div class="form-text"></div>
                        </div>
                    </form>

                </div>
                <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">
                    登入成功！
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">陰德值測驗</h5>
                    <form name="form-test" onsubmit="sendData();return false;" novalidate>
                        <div class="mb-3">
                            <?php foreach ($rows as $q) : ?>
                                <br>
                                <label for="Q<?= $q['sid'] ?>" class="form-label">
                                    Q<?= $q['sid'] . ' .' . $q['test_content'] ?>
                                </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Q<?= $q['sid'] ?>" id="Q<?= $q['sid'] ?>-1" value="<?= $q['op1_score']  ?>">
                                    <label class="form-check-label" for="Q<?= $q['sid'] ?>-1">
                                        <?= $q['op1_content'] ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Q<?= $q['sid'] ?>" id="Q<?= $q['sid'] ?>-2" value="<?= $q['op1_score']  ?>">
                                    <label class="form-check-label" for="Q<?= $q['sid'] ?>-2">
                                        <?= $q['op2_content'] ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Q<?= $q['sid'] ?>" id="Q<?= $q['sid'] ?>-3" value="<?= $q['op1_score']  ?>">
                                    <label class="form-check-label" for="Q<?= $q['sid'] ?>-3">
                                        <?= $q['op3_content'] ?>
                                    </label>

                                </div>
                                <div class="form-text form-text-radio"></div>

                            <?php endforeach; ?>
                            <br>
                            <button type="submit" class="btn btn-primary">送出結果</button>
                    </form>
                    <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">
                        收到結果
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/test-parts/test-scripts.php' ?>
<script>
    const info_bar = document.querySelector('#info-bar');

    const account_f = document.form - login.account;
    const password_f = document.form - login.account;
    const name_f = document.form - login.name;


    const fields = [account_f, password_f, name_f];
    const fieldTexts = [];
    for (let f of fields) {
        fieldTexts.push(f.nextElementSibling);
    }

    const q1_f = document.form - test.Q1;
    const q2_f = document.form - test.Q2;
    // const q2_btn = document.querySelectorAll('input[name="Q2"]');
    const q3_f = document.form - test.Q3;
    const q4_f = document.form - test.Q4;
    const q5_f = document.form - test.Q5;




    async function sendData() {
        // 讓欄位的外觀回復原來的狀態

        info_bar.style.display = 'none'; // 隱藏訊息列

        // TODO: 欄位檢查, 前端的檢查
        let isPass = true; // 預設是通過檢查的
        if (name_f.value.length < 2) {
            info_bar.style.display = 'block'; // 顯示訊息列
            info_bar.classList.add('alert-danger');
            info_bar.innerText = '沒有登入！需登入才能進行測驗！';
            isPass = false;
        }
        if (q1_f.value == '') {
            document.querySelector(".form-text-radio").innerText = '請選擇最符合你想法的選項';
            document.querySelector(".form-text-radio").classList.add('red');
            // document.querySelector("#myimg").src = reader.result;
            isPass = false;
        }
        if (q2_f.value == '') {
            document.querySelector(".form-text-radio").innerText = '請選擇最符合你想法的選項';
            document.querySelector(".form-text-radio").classList.add('red');
            // document.querySelector("#myimg").src = reader.result;
            isPass = false;
        }
        if (q3_f.value == '') {
            document.querySelector(".form-text-radio").innerText = '請選擇最符合你想法的選項';
            document.querySelector(".form-text-radio").classList.add('red');
            // document.querySelector("#myimg").src = reader.result;
            isPass = false;
        }
        if (q4_f.value == '') {
            document.querySelector(".form-text-radio").innerText = '請選擇最符合你想法的選項';
            document.querySelector(".form-text-radio").classList.add('red');
            // document.querySelector("#myimg").src = reader.result;
            isPass = false;
        }
        if (q5_f.value == '') {
            document.querySelector(".form-text-radio").innerText = '請選擇最符合你想法的選項';
            document.querySelector(".form-text-radio").classList.add('red');
            // document.querySelector("#myimg").src = reader.result;
            isPass = false;
        }

        if (!isPass) {
            return; // 結束函式
        }

        const fd = new FormData(document.form - test);
        const r = await fetch('test-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);
        info_bar.style.display = 'block'; // 顯示訊息列
        if (result.success) {
            info_bar.classList.remove('alert-danger');
            info_bar.classList.add('alert-success');
            info_bar.innerText = '測驗完成！';

            setTimeout(() => {
                location.href = 'mainpage.php'; // 跳轉到列表頁
            }, 2000);
        } else {
            info_bar.classList.remove('alert-success');
            info_bar.classList.add('alert-danger');
            info_bar.innerText = result.error || '資料無法新增';
        }

    }
</script>
<?php include __DIR__ . '/test-parts/test-foot.php' ?>