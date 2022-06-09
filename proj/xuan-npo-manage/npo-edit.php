<?php require __DIR__ .  '/../parts/connect_db.php' ;

$pageName = 'npo-edit';
$title = 'NPO修改';


// 修改功能
$sid = isset($_GET['npo_sid']) ? intval($_GET['npo_sid']) : 0;
if (empty($sid)) {
    header('Location: npo-manage.php');
    exit;
}

$row = $pdo->query("SELECT * FROM npo_name WHERE npo_sid=$sid")->fetch();
if (empty($row)) {
    header('Location: npo-manage.php');
    exit;
}



?>
<!-- php以前是樣板語言，用來生HTML內容。現在都改用框架了 -->
<?php include __DIR__ . '/../parts/html-head.php' ?> 
<?php include __DIR__ . '/../parts/navbar.php' ?> 

<style>
    .form-control{
        border:none;
        background-color:#F1F1F1;
    }

    .form-label{
        font-size:14px;
        font-weight:bold;
    }

    /* .a.b 代表同時符合兩個class才包含 */
    .form-control.red{
        outline: 1px solid red;
    }
    .form-text.red{
        color:red;
    }

    /* 讓placeholder font-size小一點 */
    ::-webkit-input-placeholder {
        font-size: 11px!important;
    }

    :-moz-placeholder { /* Firefox 18- */
        font-size: 11px!important;
    }

    ::-moz-placeholder {  /* Firefox 19+ */
        font-size: 11px!important;
    }

    .camera{
        cursor: pointer;
        color: #cacaca;    
        font-size: 2rem;
        transition: color .2s;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        position: absolute;
        bottom:0px;
        right:28%; 
        z-index:15;
    }

    .camera:hover{
        color: gray; 
    }

    .circle{
        width: 50px;
        height: 50px;
        box-shadow: 1px 2px 20px #ccc;
        position: absolute;
        bottom:12px;
        right:30.5%; 
        border-radius:50%;
        background-color: #fff;
        z-index:10;
    }

    .organize{
        object-fit:cover;

    }

    .image_upload{
        position: relative;
    }

    .image-upload>input {
        display: none;
        }

    .upload_img{
        width: 230px;
        height: 230px;
        border-radius:50%;
        outline:10px solid white;
        margin-top:20px;
        overflow:hidden;
        background: url(list-img/organizer.svg) no-repeat;
        background-size: contain;
        background-position:0px 0px;
        
    }

    /*

    #myimg{
        object-fit:cover;
        // object-position:-40px 0px; 
        object-position:center center;
        width: 100%;
        height: 100%;
    }

    */

</style>

<!-- 進度bar條 -->
<!-- <div class="progress w-25 mt-5" style="text-align:center; margin:auto; height:20px">
    <div class="progress-bar" role="progressbar" style="width: 33%; height:20px" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">33%</div>
</div> -->


<!-- 表格一 基本資料 -->
<div class="container  mt-5">   
    <div class="row d-flex justify-content-center" >
        <div class="col-6"> 
            <div class="card" style=" padding:30px 60px">
                    <!-- <h5 class="card-title text-center" >Hi！現在就開始辦活動吧！</h5> -->
                    <h5 class="card-title text-center" >修改主辦單位資料</h5>   
                    
                    
                    <!-- 上傳大頭測試區 -->
                    <form
                        name="form1"
                        action="npo-edit-api.php"

                        method="post"
                        enctype="multipart/form-data"
                        class="image_upload"
                        style="height: 250px; display:none";
                    >

                    <!-- onsubmit="return false;" -->

                    <!-- <input id="file-input" type="file" name="myfile" accept="image/png,image/jpeg"  /> -->
                    <input  type="file" name="myfile" accept="image/png,image/jpeg" value="<?= $row['npo_img'] ?>" />
                        

                    <!-- 這邊放點按後可上傳的圖片 -->
                    <!-- <div class="image-upload d-flex justify-content-center align-items-center">
                        
                        <label for="file-input">
                        
                        <i class="fa fa-camera camera "></i> 

                        <div class="circle"></div>
                        </label>

                        <input id="file-input" type="file" name="myfile" accept="image/png,image/jpeg" onchange="changeImg(event)" />
                        
                        <div class="upload_img" >
                            <img src="" alt="" id="myimg" />
                        </div>


                    </div> -->
                    </form>

                    <button id="btn" onclick="uploadAvatar()">上傳大頭貼</button>
                    <br>

                    <img id="myimg" src="./uploaded/<?= $row['npo_img'] ?>" alt="" />


                    <!-- 表格內容放這邊 -->
                <div class="card-body mt-4">
                    <form name="form_npo_name" onsubmit="sendData();return false;" novalidate>
                        
                        <input type="hidden" id="npo_sid" name="npo_sid" value="<?= $row['npo_sid'] ?>">

                        <div class="mb-4">
                            <label for="name" class="form-label">主辦單位名稱 <i class="fa-solid fa-asterisk ml-4" style="font-size:11px ; color:red"></i></label>
                            <input type="text" class="form-control-lg form-control  "  id="name" name="name" placeholder="請填寫主辦單位名稱" value="<?= htmlentities($row['npo_name']) ?>" required >
                            <!-- 這邊是錯誤時跳出的提示通知 -->
                            <div class="form-text "></div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="email" class="form-label">主辦單位Email <i class="fa-solid fa-asterisk ml-4" style="font-size:11px ; color:red"> </i></label>
                            <div class="form-text text-secondary mb-2">我們會將消費者的意見及疑問發送到此信箱</div>
                            <input type="email" class="form-control-lg form-control " id=" email" name="email" placeholder="請填寫Email" value="<?= $row['email'] ?>" required>
                            <div class="form-text"></div>
                        </div>

                        
                        <!-- 手機+市話 目前先不設為必填--> 
                        <div class=" mb-4 row">
                            <label for="mobile" class="form-label">主辦單位電話號碼</label>
                            <div class="form-text text-secondary  mb-2">活動參加人可於票券上查看此聯繫電話。</div>

                            <div class="col">
                                <input type="text" class="form-control form-control-lg" id="phone" name="phone" placeholder="ex: 00-1234-5678"  value="<?= $row['phone'] ?>">
                                <div class="form-text"></div>
                            </div>
                            
                            <div class="col">
                                <input type="text" class="form-control form-control-lg" id="mobile" name="mobile"  pattern="09\d{8}" placeholder="ex: 0912-345678" value="<?= $row['mobile'] ?>" >
                                <div class="form-text" ></div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="intro" class="form-label">主辦單位簡介</label>
                            <textarea class="form-control" name="intro" id="intro" rows="7" placeholder="請填寫主辦單位簡介" value="<?= htmlentities($row['npo_intro']) ?>" ></textarea>
                            <div class="form-text"></div>
                        </div>  

                        <input type="avatar" class="form-control-lg form-control " id="avatar" name="avatar" placeholder="這是隱藏欄位" value="" style="display:none">

                        <button type="submit" class="btn btn-primary w-100 mt-3">送出修改</button>
                        
                    </form>    
                    
                    <div id="info-bar" class="alert alert-success" role="alert" style="display:none;">
                        資料編輯成功
                    </div>

                </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php include __DIR__ . '/../parts/scripts.php' ?> 

<script>

// 修改功能的JS
const row = <?= json_encode($row, JSON_UNESCAPED_UNICODE); ?>;


// 這邊是前端的欄位檢查

// 先設email正規表達式的變數
const email_re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
// 先設手機檢查正規表達式的變數
const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
const phone_re = /(\d{2,3}-?|\(\d{2,3}\))\d{3,4}-?\d{4}/ ;


// 先取得各個值得參照(不要直接拿)
const info_bar = document.querySelector('#info-bar');
const name_f = document.form_npo_name.name;
const email_f = document.form_npo_name.email;
const phone_f = document.form_npo_name.phone;
const mobile_f = document.form_npo_name.mobile;
const intro_f = document.form_npo_name.intro;

// 將三項列成陣列，改用索引取值
const fields = [name_f, email_f, mobile_f, phone_f, intro_f ];
// 依序取得上述三項的下一個
const fieldTexts = [];
    for (let f of fields) {
        fieldTexts.push(f.nextElementSibling);
    }


// 這邊是使用者按下送出鍵後會產生的回饋
async function sendData(){

    //TODO:  讓欄位的外觀回復原來的狀態
    //每次按submit都先跳回原本狀態再檢查一次
    for (let i in fields) {
            fields[i].classList.remove('red');
            fieldTexts[i].classList.remove('red');  //也可以直接讓字不見即可
            fieldTexts[i].innerText = '';
        }
    //info_bar.style.display = 'none'; // 隱藏訊息列


    let isPass = true; //預設是通過檢查的

    //檢查姓名是否有填
    if(name_f.value.length<1){
        fields[0].classList.add('red');
        fieldTexts[0].classList.add('red');
        fieldTexts[0].innerText = '必填';
        isPass = false;

    //檢查姓名是否小於兩個字
    }else if(name_f.value.length<2){
        fields[0].classList.add('red');
        fieldTexts[0].classList.add('red');  
        fieldTexts[0].innerText = '姓名至少兩個字';
        isPass = false;
    }



    //檢查email是否有填
    if(email_f.value.length<1){
        fields[1].classList.add('red');
        fieldTexts[1].classList.add('red');
        fieldTexts[1].innerText = '必填';
        isPass = false;
    
    //email有填內容 但不合格式  
    }else if(email_f.value && !email_re.test(email_f.value)){
        fields[1].classList.add('red');
        fieldTexts[1].classList.add('red');
        fieldTexts[1].innerText = '請輸入正確的電子郵件格式';
        isPass = false;
    }



    //檢查mobile是否有填
    //if(mobile_f.value.length<1){
        // fields[2].classList.add('red');
        // fieldTexts[2].classList.add('red');
        // fieldTexts[2].innerText = '必填';
        // isPass = false;
    //}
    //mobile有填內容 但不合格式 
    if(mobile_f.value && !mobile_re.test(mobile_f.value)){
        fields[2].classList.add('red');
        fieldTexts[2].classList.add('red');
        fieldTexts[2].innerText = '請輸入正確的手機格式';
        isPass = false; 
    }
    
    //檢查組織簡介是否超過字數
    if(intro_f.value.length>500){
        fields[4].classList.add('red');
        fieldTexts[4].classList.add('red');
        fieldTexts[4].innerText = '內容字數超出上限';
        isPass = false; 
    }

    

    // 只要isPass在上面篩選中是false即結束資料傳送
    if(! isPass){
        return; //結束涵式，不要傳資料出去
    }

    const fd = new FormData(document.form_npo_name);
    const r = await fetch('npo-edit-api.php', {
        method: 'POST',
        body: fd,
    });
    const result = await r.json();
    console.log(result);

    info_bar.style.display = 'block'; // 顯示訊息列
        if (result.success) {
            info_bar.classList.remove('alert-danger');
            info_bar.classList.add('alert-success');
            info_bar.innerText = '修改成功';

            setTimeout(() => {
                // location.href = 'ab-list.php'; // 跳轉到列表頁
            }, 2000);
        } else {
            info_bar.classList.remove('alert-success');
            info_bar.classList.add('alert-danger');
            info_bar.innerText = result.error || '資料沒有修改';
        }



    // if (result.success) {
    //     setTimeout(() => {
    //             location.href = 'npo-manage.php'; // 跳轉到建立活動頁
    //         }, 1000);
    //     };

    }


    // 上傳大頭測試區
    // function changeImg() {
    //             const file = event.currentTarget.files[0];
    //             console.log(file);
    //             const reader = new FileReader();

    //             // 資料載入後 (讀取完成後)
    //             reader.onload = function () {
    //                 console.log(reader.result);
    //                 document.querySelector("#myimg").src = reader.result;
    //             };
    //             reader.readAsDataURL(file);
    //         }



    // 更新版上傳大頭貼
    const btn = document.querySelector("#btn");
    const myimg = document.querySelector("#myimg");
    const myfile = document.form1.myfile;
    
    
    const avatar = document.querySelector("#avatar");

            myfile.addEventListener("change", async function () {
                // 上傳表單
                const fd = new FormData(document.form1);
                const r = await fetch("upload-avatar-api.php", {
                    method: "POST",
                    body: fd,
                });
                const obj = await r.json();
                console.log(obj);
                myimg.src = "./uploaded/" + obj.filename;
                avatar.value = obj.filename;  
            });

            function uploadAvatar() {
                myfile.click(); // 模擬點擊

            }


</script>


<?php include __DIR__ . '/../parts/html-foot.php' ?> 