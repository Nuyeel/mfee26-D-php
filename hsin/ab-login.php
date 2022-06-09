<?php require __DIR__ . '/parts-2/connect_db-2.php';
$pageName = 'ab-login';
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
                                    <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="ab-login.php" role="tab" aria-controls="pills-login" aria-selected="true">登入</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="ab-register.php" role="tab" aria-controls="pills-register" aria-selected="false">註冊</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show"" id=" pills-login" role="tabpanel" aria-labelledby="tab-login">
                                    <form name="form1" onsubmit="sendData();return false;" novalidate>
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="loginName">使用者帳戶</label>
                                            <input type="text" id="loginName" class="form-control" name="account" required />
                                            <div class="form-text red"></div>
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="loginPassword">密碼</label>
                                            <input type="password" id="loginPassword" class="form-control" name="password" required />
                                            <div class="form-text red"></div>
                                        </div>

                                        <!-- 2 column grid layout -->
                                        <div class="row mb-4">
                                            <div class="col-md-6 d-flex justify-content-center">
                                                <!-- Checkbox -->
                                                <div class="form-check mb-3 mb-md-0">
                                                    <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                                                    <label class="form-check-label" for="loginCheck"> 記得我 </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6 d-flex justify-content-center">
                                                <!-- Simple link -->
                                                <a href="#!">忘記密碼</a>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-outline-primary" type="button">登入</button>
                                        </div>
                                        <br>
                                    </form>
                                </div>
                                <div class="text-center mb-3">
                                    <p>以其他方式登入：</p>
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
                                <br>
                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>還不是會員？<a href="ab-register.php">點我註冊</a></p>
                                </div>

                                <br>
                                </form>
                                <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">您已成功登入
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
    const info_bar = document.querySelector('#info-bar');

    // const account_re = /^[a-zA-Z0-9_]\w*$/;
    // const password_re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    // const account_f = document.form1.account;
    // const password_f = document.form1.password;
    // // const mobile_f = document.form1.mobile;

    // const fields = [account_f, password_f];
    // const fieldTexts = [];
    // for (let f of fields) {
    //     fieldTexts.push(f.nextElementSibling);
    // }

    async function sendData() {
        // for (let i in fields) {
        //     fields[i].classList.remove('red');
        //     fieldTexts[i].innerText = '';
        // }
        // info_bar.style.display = 'none';
        // let isPass = true;
        // if (account_f.value && !account_re.test(account_f.value)) {
        //     fields[0].classList.add('red');
        //     fieldTexts[0].innerText = '您輸入的帳戶不可含有空白格或特殊字元';
        //     isPass = false;
        // }
        // if (password_f.value && !password_re.test(password_f.value)) {
        //     fields[1].classList.add('red');
        //     fieldTexts[1].innerText = '請輸入至少八個數字及英文大小寫';
        //     isPass = false;
        // }

        // if (!isPass) {
        //     return;
        // }
        const fd = new FormData(document.form1);
        const r = await fetch('ab-login-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        // console.log(result);
        console.log(result.postData);
        info_bar.style.display = 'block';
        if (result.success) {
            info_bar.classList.remove('alert-danger');
            info_bar.classList.add('alert-success');
            info_bar.innerText = '您已成功登入';
            setTimeout(() => {
                location.href = 'ab-profile.php';
            }, 2000);
        } else {
            info_bar.classList.remove('alert-success');
            info_bar.classList.add('alert-danger');
            info_bar.innerText = result.error || '登入失敗';
        }
    }
</script>
<?php include __DIR__ . '/parts-2/html-foot-2.php' ?>