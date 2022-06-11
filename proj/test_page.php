<?php require __DIR__ . "./parts/connect_db.php"; ?>

<?php
$pageName = 'test_page';
$title = '陰德值測驗';

$rows = [];
$t_sql = "SELECT COUNT(*) FROM `good_deed_test`";
$totalRows = $pdo->query($t_sql)->fetch(PDO::FETCH_NUM)[0];
$sql = sprintf("SELECT * FROM `good_deed_test` ORDER BY sid ASC");
$rows = $pdo->query($sql)->fetchAll();

?>
<?php include __DIR__ . './parts/html-head.php' ?>

<?php
if (!empty($_SESSION['member']['sid'])) {

    $sid = $_SESSION['member']['sid'];
    $t_sql = "SELECT `test_score` FROM `good_deed_test_record` WHERE `sid`= $sid";
    $row = $pdo->query($t_sql)->fetch();
    if (!empty($row['test_score'])) {
        header("location:ab-login.php");
    }
}

?>
<?php include __DIR__ . './parts/navbar.php' ?>

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
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5> </h5>
                    <h5 class="card-title">你好！<?= $_SESSION['member']['name'] ?> 歡迎進行陰德值測驗！</h5>
                    <p>測驗機會一世只有一次，請謹慎作答</p>
                    <form name="formTest" onsubmit="sendData();return false;" novalidate>
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
                                    <input class="form-check-input" type="radio" name="Q<?= $q['sid'] ?>" id="Q<?= $q['sid'] ?>-2" value="<?= $q['op2_score']  ?>">
                                    <label class="form-check-label" for="Q<?= $q['sid'] ?>-2">
                                        <?= $q['op2_content'] ?>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="Q<?= $q['sid'] ?>" id="Q<?= $q['sid'] ?>-3" value="<?= $q['op3_score']  ?>">
                                    <label class="form-check-label" for="Q<?= $q['sid'] ?>-3">
                                        <?= $q['op3_content'] ?>
                                    </label>

                                </div>
                                <div class="form-text form-text-radio"></div>
                                <br>
                            <?php endforeach; ?>

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
<?php include __DIR__ . './parts/scripts.php' ?>
<script>
    const info_bar = document.querySelector('#info-bar');

    // const account_f = document.formLogin.account;
    // const password_f = document.formLogin.account;
    // const name_f = document.formLogin.name;


    // const fields = [account_f, password_f, name_f];
    // const fieldTexts = [];
    // for (let f of fields) {
    //     fieldTexts.push(f.nextElementSibling);
    // }

    const q1_f = document.formTest.Q1;
    const q2_f = document.formTest.Q2;
    // const q2_btn = document.querySelectorAll('input[name="Q2"]');
    const q3_f = document.formTest.Q3;
    const q4_f = document.formTest.Q4;
    const q5_f = document.formTest.Q5;


    const sendData = async () => {
        // 讓欄位的外觀回復原來的狀態

        info_bar.style.display = 'none'; // 隱藏訊息列

        // TODO: 欄位檢查, 前端的檢查
        let isPass = true; // 預設是通過檢查的
        // if (name_f.value.length < 2) {
        //     info_bar.style.display = 'block'; // 顯示訊息列
        //     info_bar.classList.add('alert-danger');
        //     info_bar.innerText = '沒有登入！需登入才能進行測驗！';
        //     isPass = false;
        // }

        if (q1_f.value == '') {
            document.querySelectorAll(".form-text-radio")[0].innerText = '請選擇最符合你想法的選項';
            document.querySelectorAll(".form-text-radio")[0].classList.add('red');
            // document.querySelector("#myimg").src = reader.result;
            isPass = false;
        }
        if (q2_f.value == '') {
            document.querySelectorAll(".form-text-radio")[1].innerText = '請選擇最符合你想法的選項';
            document.querySelectorAll(".form-text-radio")[1].classList.add('red');
            // document.querySelector("#myimg").src = reader.result;
            isPass = false;
        }
        if (q3_f.value == '') {
            document.querySelectorAll(".form-text-radio")[2].innerText = '請選擇最符合你想法的選項';
            document.querySelectorAll(".form-text-radio")[2].classList.add('red');
            // document.querySelector("#myimg").src = reader.result;
            isPass = false;
        }
        if (q4_f.value == '') {
            document.querySelectorAll(".form-text-radio")[3].innerText = '請選擇最符合你想法的選項';
            document.querySelectorAll(".form-text-radio")[3].classList.add('red');
            // document.querySelector("#myimg").src = reader.result;
            isPass = false;
        }
        if (q5_f.value == '') {
            document.querySelectorAll(".form-text-radio")[4].innerText = '請選擇最符合你想法的選項';
            document.querySelectorAll(".form-text-radio")[4].classList.add('red');
            // document.querySelector("#myimg").src = reader.result;
            isPass = false;
        }

        if (!isPass) {
            return; // 結束函式
        }

        const fd = new FormData(document.formTest);
        const r = await fetch('./test_page-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        // console.log(result);

        info_bar.style.display = 'block'; // 顯示訊息列
        if (result.success) {
            info_bar.classList.remove('alert-danger');
            info_bar.classList.add('alert-success');
            info_bar.innerText = '測驗完成！';

            setTimeout(() => {
                location.href = 'yun_mainpage.php'; // 跳轉到列表頁
            }, 2000);
        } else {
            info_bar.classList.remove('alert-success');
            info_bar.classList.add('alert-danger');
            info_bar.innerText = result.error || '資料無法新增';
        }
    }
</script>


<?php include __DIR__ . './parts/html-foot.php' ?>