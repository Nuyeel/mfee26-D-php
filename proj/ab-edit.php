<?php require __DIR__ . "./parts/connect_db.php";
$pageName = 'ab-edit';
$title = '編輯會員 - 靈魂管理中心';

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (empty($sid)) {
    header('Location: ab-list.php');
    exit;
}

$row = $pdo->query("SELECT * FROM member WHERE sid=$sid")->fetch();
if (empty($row)) {
    header('Location: ab-list.php');
    exit;
}

?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<style>
    .form-control.red {
        border: 1px solid red;
    }

    .form-text.red {
        color: red;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">編輯會員資料</h5>
                    <br>
                    <form name="form1" onsubmit="sendData();return false;" novalidate>
                        <input type="hidden" name="sid" value="<?= $row['sid'] ?>">
                        <div class="mb-3">
                            <label for="account" class="form-label">使用者帳戶</label>
                            <input type="text" class="form-control" id="account" name="account" value="<?= htmlentities($row['account']) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">會員名稱</label>
                            <input type="text" class="form-control" id="name" name="name" required value="<?= htmlentities($row['name']) ?>">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="birthdate" class="form-label">出生日</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?= $row['birthdate'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="deathdate" class="form-label">死亡日</label>
                            <input type="date" class="form-control" id="deathdate" name="deathdate" value="<?= $row['deathdate'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">手機號碼</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{8}" value="<?= $row['mobile'] ?>">
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">電子信箱</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>">
                            <div class="form-text red"></div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary">確定修改</button>
                    </form>
                    <br>
                    <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">
                        您的資料已完成編輯
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    const row = <?= json_encode($row, JSON_UNESCAPED_UNICODE); ?>;
    const name_re = /^[a-zA-Z0-9_\u4e00-\u9fa5\s]*$/;
    const email_re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;

    const info_bar = document.querySelector('#info-bar');
    const name_f = document.form1.name;
    const email_f = document.form1.email;
    const mobile_f = document.form1.mobile;

    const fields = [name_f, email_f, mobile_f];
    const fieldTexts = [];
    for (let f of fields) {
        fieldTexts.push(f.nextElementSibling);
    }
    async function sendData() {
        // 讓欄位的外觀回復原來的狀態
        for (let i in fields) {
            fields[i].classList.remove('red');
            fieldTexts[i].innerText = '';
        }
        info_bar.style.display = 'none'; // 隱藏訊息列

        // TODO: 欄位檢查, 前端的檢查
        let isPass = true; // 預設是通過檢查的

        if (name_f.value && !name_re.test(name_f.value)) {
            fields[0].classList.add('red');
            fieldTexts[0].innerText = '您輸入的會員名稱不可含有特殊字元';
            isPass = false;
        }
        if (email_f.value && !email_re.test(email_f.value)) {
            // alert('email 格式錯誤');
            fields[1].classList.add('red');
            fieldTexts[1].innerText = '您輸入的電子信箱格式有誤';
            isPass = false;
        }
        if (mobile_f.value && !mobile_re.test(mobile_f.value)) {
            // alert('手機號碼格式錯誤');
            fields[2].classList.add('red');
            fieldTexts[2].innerText = '您輸入的手機號碼格式有誤';
            isPass = false;
        }

        if (!isPass) {
            return; // 結束函式
        }

        const fd = new FormData(document.form1);
        const r = await fetch('ab-edit-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);
        info_bar.style.display = 'block'; // 顯示訊息列
        if (result.success) {
            info_bar.classList.remove('alert-danger');
            info_bar.classList.add('alert-success');
            info_bar.innerText = '您的資料已完成修改';

            setTimeout(() => {
                location.href = 'ab-list.php'; // 跳轉到列表頁
            }, 1000);
        } else {
            info_bar.classList.remove('alert-success');
            info_bar.classList.add('alert-danger');
            info_bar.innerText = result.error || '您的資料未完成修改';
        }

    }
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>