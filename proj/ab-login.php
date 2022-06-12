<?php require __DIR__ . "/parts/connect_db.php" ?>

<?php
$pageName = 'ab-login';
$title = '會員登入 - 來生投放所';


if (isset($_SESSION['member']['account'])) {
    header('Location: ab-profile.php');
}

include __DIR__ . "/alive-confirm.php";

?>

<?php include __DIR__ . "/parts/html-head.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>

<style>
    body {
        background-color: #69d0ff;
        background-image: linear-gradient(0deg, #69d0ff 0%, #ffa4e9 100%);
        background-position: 100%;
        background-repeat: no-repeat;
    }
    .pb-4 {
        background-color: rgba(255, 255, 255, 0.6);
        background-position: 100%;
        background-repeat: no-repeat;
    }

    /* background-color: rgb(38, 106, 170); */

    .format {
        font-size: 18px;
        font-weight: 600;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    .format2 {
        font-size: 18px;
        font-weight: 600;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        color: rgb(38, 106, 170);
    }

    .area {
        font-size: 18px;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    .login {
        color: rgb(38, 106, 170);
        border-color: rgb(38, 106, 170);
    }

    .login:hover {
        background-color: rgb(38, 106, 170);
        color: #fff;
    }
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
            <!-- <section class="pb-4"> -->
            <div class="border rounded-5">
                <section class="w-100 p-4 d-flex justify-content-center pb-4 area">
                    <div style="width: 26rem;">
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="ab-login.php" role="tab" aria-controls="pills-login" aria-selected="true" style="background-color: rgb(38, 106, 170);">登入</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link format" id="tab-register" data-mdb-toggle="pill" href="ab-register.php" role="tab" aria-controls="pills-register" aria-selected="false" style="color: rgb(38, 106, 170);">註冊</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show"" id=" pills-login" role="tabpanel" aria-labelledby="tab-login">
                                <form name="form1" onsubmit="sendData();return false;" novalidate>
                                    <div class="form-outline mb-4">
                                        <label class="form-label format2" for="loginName">使用者帳戶</label>
                                        <input type="text" id="loginName" class="form-control" name="account" required />
                                        <div class="form-text red"></div>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label format2" for="loginPassword">密碼</label>
                                        <input type="password" id="loginPassword" class="form-control" name="password" required />
                                        <div class="form-text red"></div>
                                    </div>

                                    <!-- 2 column grid layout -->
                                    <div class="row mb-4">
                                        <div class="col-md-6 d-flex justify-content-center">
                                            <!-- Checkbox -->
                                            <div class="form-check mb-3 mb-md-0">
                                                <input class="form-check-input" type="checkbox" value="" id="loginCheck" style="background-color: rgb(38, 106, 170);" checked />
                                                <label class="form-check-label" for="loginCheck"> 記得我 </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 d-flex justify-content-center">
                                            <!-- Simple link -->
                                            <a href="#!" style="color: rgb(38, 106, 170);">忘記密碼</a>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-outline-primary login format2" type="button">登入</button>
                                    </div>
                                    <br>
                                </form>
                            </div>
                            <div class="text-center mb-3">
                                <p>以其他方式登入：</p>
                                <button type="button" class="btn btn-link btn-floating mx-1" style="color: rgb(38, 106, 170);">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button type="button" class="btn btn-link btn-floating mx-1" style="color: rgb(38, 106, 170);">
                                    <i class="fab fa-google"></i>
                                </button>
                                <button type="button" class="btn btn-link btn-floating mx-1" style="color: rgb(38, 106, 170);">
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
                                <p>還不是會員？<a href="ab-register.php" style="color: rgb(38, 106, 170);">點我註冊</a></p>
                            </div>

                            <br>
                            </form>
                            <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">您已成功登入
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </section> -->
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . "./parts/scripts.php" ?>

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
        // console.log(result.postData);
        // console.log(result.account);

        // 2022/06/12 01:25
        // 涼枕在 output 新增了 account 欄位
        // 所以這裡會拿到
        const userAccount = result.account;
        info_bar.style.display = 'block';
        if (result.success) {
            info_bar.classList.remove('alert-danger');
            info_bar.classList.add('alert-success');
            info_bar.innerText = '您已成功登入';
            // 是管理員的話去 ab-list.php
            setTimeout(() => {
                if (userAccount === 'Admin') {
                    location.href = 'ab-list.php';
                } else {
                    location.href = 'ab-profile.php';
                }
            }, 2000);
        } else {
            info_bar.classList.remove('alert-success');
            info_bar.classList.add('alert-danger');
            info_bar.innerText = result.error || '登入失敗';
        }
    }
</script>

<?php include __DIR__ . "/parts/html-foot.php" ?>