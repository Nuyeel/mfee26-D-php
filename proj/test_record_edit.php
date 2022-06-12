<?php require __DIR__ . "./parts/connect_db.php";

$pageName = 'record-edit';
$title = '編輯會員資料';


// 修改功能
$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
if (empty($sid)) {
    // header('Location: test_record_list.php');
    // exit;
}

$row = $pdo->query("SELECT * FROM `good_deed_test_record` WHERE sid = $sid")->fetch();
// $row = $pdo->query("SELECT * FROM `place` WHERE sid=$sid")->fetch();



?>
<?php include __DIR__ . './parts/html-head.php' ?>
<script src="https://kit.fontawesome.com/f528f6df02.js" crossorigin="anonymous"></script>
<?php include __DIR__ . './parts/navbar.php' ?>
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
                    <h5 class="card-title">編輯會員陰德值（如有必要才在此修正）</h5>
                    <form name="formEdit" onsubmit=" sendData(); return false; " novalidate="novalidate">
                        <input type="hidden" name="sid" value="<?= $row['sid'] ?>">
                        <div class="mb-3">
                            <label for="account" class="form-label">帳號</label>
                            <input type="text" class="form-control" id="account" name="account" required value="<?= htmlentities($row['member_account']) ?>" disabled>

                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $row['member_name'] ?>" disabled>
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="birth" class="form-label">生日</label>
                            <input type="date" class="form-control" id="birth" name="birth" value="<?= $row['member_birth'] ?>" disabled>
                            <div class="form-text red"></div>
                        </div>
                        <div class="mb-3">
                            <label for="death" class="form-label">忌日</label>
                            <input type="date" class="form-control" id="death" name="death" value="<?= $row['member_death'] ?>" disabled>
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="q1" class="form-label">Q1</label>
                            <input type="text" class="form-control" id="q1" name="q1" pattern="d{1}" value="<?= $row['test_Q1'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="q2" class="form-label">Q2</label>
                            <input type="text" class="form-control" id="q2" name="q2" pattern="d{1}" value="<?= $row['test_Q2'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="q3" class="form-label">Q3</label>
                            <input type="text" class="form-control" id="q3" name="q3" pattern="d{1}" value="<?= $row['test_Q3'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="q4" class="form-label">Q4</label>
                            <input type="text" class="form-control" id="q4" name="q4" pattern="d{1}" value="<?= $row['test_Q4'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="q5" class="form-label">Q5</label>
                            <input type="text" class="form-control" id="q5" name="q5" pattern="d{1}" value="<?= $row['test_Q5'] ?>">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="score" class="form-label"> score </label>
                            <input type="text" class="form-control" id="score" name="score" value="<?=$row['test_score'] ?>"disabled>
                            <div class="form-text"></div>
                        </div>

                        <button type="submit" class="btn btn-primary">修改</button>
                    </form>
                    <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">
                        資料編輯成功
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include __DIR__ . './parts/scripts.php' ?>
<script>
    // const row = json_encode($row, JSON_UNESCAPED_UNICODE); ;


    const q1_re = /^\d$/;
    const q2_re = /^\d$/;
    const q3_re = /^\d$/;
    const q4_re = /^\d$/;
    const q5_re = /^\d$/;

    const info_bar = document.querySelector('#info-bar');

    const q1_f = document.formEdit.q1;
    const q2_f = document.formEdit.q2;
    const q3_f = document.formEdit.q3;
    const q4_f = document.formEdit.q4;
    const q5_f = document.formEdit.q5;
    const score_f = document.formEdit.score;



    const fields = [q1_f, q2_f, q3_f, q4_f, q5_f];
    const fieldTexts = [];
    for (let f of fields) {
        fieldTexts.push(f.nextElementSibling);
    }
    // console.log(document.formEdit);
    // const fd = new FormData(document.formEdit);
    // console.log(fd);
    // const r = fetch('test_record_edit-api.php', {
    //     method: 'POST',
    //     body: fd,
    // });
    // console.log(r);
    // console.log(result);
    // console.log('hi');


    async function sendData() {
        // 讓欄位的外觀回復原來的狀態
        for (let i in fields) {
            fields[i].classList.remove('red');
            fieldTexts[i].innerText = '';
        }
        info_bar.style.display = 'none'; // 隱藏訊息列

        // TODO: 欄位檢查, 前端的檢查
        let isPass = true; // 預設是通過檢查的


        if (q1_f.value && !q1_re.test(q1_f.value)) {
            // alert('email 格式錯誤');
            fields[0].classList.add('red');
            fieldTexts[0].innerText = '分數限制為個位數';
            isPass = false;
        }
        if (q2_f.value && !q2_re.test(q2_f.value)) {
            // alert('email 格式錯誤');
            fields[1].classList.add('red');
            fieldTexts[1].innerText = '分數限制為個位數';
            isPass = false;
        }
        if (q3_f.value && !q3_re.test(q3_f.value)) {
            // alert('email 格式錯誤');
            fields[2].classList.add('red');
            fieldTexts[2].innerText = '分數限制為個位數';
            isPass = false;

        }
        if (q4_f.value && !q4_re.test(q4_f.value)) {
            // alert('email 格式錯誤');
            fields[3].classList.add('red');
            fieldTexts[3].innerText = '分數限制為個位數';
            isPass = false;

        }
        if (q5_f.value && !q1_re.test(q5_f.value)) {
            // alert('email 格式錯誤');
            fields[4].classList.add('red');
            fieldTexts[4].innerText = '分數限制為個位數';
            isPass = false;
        }
        if (!isPass) {
            return; // 結束函式
        }

        const fd = new FormData(document.formEdit);
        const r = await fetch('test_record_edit-api.php', {
            method: 'POST',
            body: fd,
        });
        // console.log(r);

        const result = await r.json();
        // console.log(result);
        info_bar.style.display = 'block';
        // 顯示訊息列
        if (result.success) {
            info_bar.classList.remove('alert-danger');
            info_bar.classList.add('alert-success');
            info_bar.innerText = '修改成功';

            setTimeout(() => {
                location.href = 'test_record_list.php'; // 跳轉到列表頁
            }, 2000);
        } else {
            // console.log(r);
            // console.log(result);
            console.log('hello');

            info_bar.classList.remove('alert-success');
            info_bar.classList.add('alert-danger');
            info_bar.innerText = result.error || '資料沒有修改!!!';
        }

    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<?php include __DIR__ . './parts/html-foot.php' ?>