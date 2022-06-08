<?php require __DIR__ . '/parts-2/connect_db-2.php';
$pageName = 'ab-register';
$title = '註冊會員 - 靈魂轉生平台';

?>
<?php include __DIR__ . '/parts-2/html-head-2.php' ?>
<?php include __DIR__ . '/parts-2/navbar-2.php' ?>
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
        <div class="col">
            <section class="pb-4">
                <div class="bg-white border rounded-5">
                    <section class="w-100 p-4 d-flex justify-content-center pb-4">
                        <div style="width: 26rem;">
                            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="false">登入</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="true">註冊</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                                </div>
                                <div class="tab-pane fade active show" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                                    <form name="form1" onsubmit="sendData();return false;" novalidate>
                                        <div class="mb-3">
                                            <label for="account" class="form-label">使用者帳戶</label>
                                            <input type="text" class="form-control" id="account" name="account" required>
                                            <div class="form-text red"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">電子信箱</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                            <div class="form-text red"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">密碼</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                            <div class="form-text red"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="repeatpw" class="form-label">重新輸入密碼</label>
                                            <input type="password" class="form-control" id="repeatpw" name="repeatpw" required>
                                            <div class=" form-text red">
                                            </div>
                                        </div>
                                        <div class="text-center mb-3">
                                            <p>以其他方式註冊：</p>
                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="fab fa-facebook-f"></i>
                                            </button>
                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="fab fa-google"></i>
                                            </button>
                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="fab fa-twitter"></i>
                                            </button>
                                        </div>
                                        <!-- Checkbox -->
                                        <!-- <div class="form-check d-flex justify-content-center mb-4">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" name="registerCheck" checked="" aria-describedby="registerCheckHelpText">
                                            <label class="form-check-label" for="registerCheck">
                                                我已閱讀並同意上述條款
                                            </label>
                                        </div> -->
                                        <!-- Submit button -->
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-outline-primary" type="button">確認送出</button>
                                        </div>
                                        <br>
                                    </form>
                                    <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">您已成功完成註冊

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/parts-2/scripts-2.php' ?>
<script>
    const account_re = /^[a-zA-Z0-9_]\w*$/;
    const email_re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
    const password_re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    const info_bar = document.querySelector('#info-bar');

    const account_f = document.form1.account;
    const email_f = document.form1.email;
    const password_f = document.form1.password;
    const repeatpw_f = document.form1.repeatpw;
    const registerCheck_f = document.form1.registerCheck;
    // const mobile_f = document.form1.mobile;
    const fields = [account_f, email_f, password_f, repeatpw_f];
    const fieldTexts = [];
    for (let f of fields) {
        fieldTexts.push(f.nextElementSibling);
    }

    async function sendData() {
        for (let i in fields) {
            fields[i].classList.remove('red');
            fieldTexts[i].innerText = '';
        }
        info_bar.style.display = 'none';
        let isPass = true;
        if (account_f.value && !account_re.test(account_f.value)) {
            fields[0].classList.add('red');
            fieldTexts[0].innerText = '您輸入的帳戶不可含有空白格或特殊字元';
            isPass = false;
        }
        if (email_f.value && !email_re.test(email_f.value)) {
            // alert('email 格式錯誤');
            fields[1].classList.add('red');
            fieldTexts[1].innerText = '您輸入的電子信箱格式有誤';
            isPass = false;
        }
        if (password_f.value && !password_re.test(password_f.value)) {
            fields[2].classList.add('red');
            fieldTexts[2].innerText = '請輸入至少八個數字及英文大小寫';
            isPass = false;
        }
        if (repeatpw_f.value !== password_f.value) {
            fields[3].classList.add('red');
            fieldTexts[3].innerText = '需與您先前輸入的密碼一致';
            isPass = false;
        }

        if (!isPass) {
            return;
        }
        const fd = new FormData(document.form1);
        const r = await fetch('ab-register-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);
        info_bar.style.display = 'block';
        if (result.success) {
            info_bar.classList.remove('alert-danger');
            info_bar.classList.add('alert-success');
            info_bar.innerText = '您的資料已成功新增';
            setTimeout(() => {
                location.href = 'ab-profile.php';
            }, 2000);
        } else {
            info_bar.classList.remove('alert-success');
            info_bar.classList.add('alert-danger');
            info_bar.innerText = result.error || '您的資料無法完成新增';
        }
    }
</script>
<?php include __DIR__ . '/parts-2/html-foot-2.php' ?>