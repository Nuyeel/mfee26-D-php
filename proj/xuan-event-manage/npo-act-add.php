<?php require __DIR__ .  '/../parts/connect_db.php';

$pageName = 'npo-act-add';
$title = '上架活動';

?>
<!-- php以前是樣板語言，用來生HTML內容。現在都改用框架了 -->
<?php include __DIR__ . '/../parts/html-head-xuan.php' ?>
<?php include __DIR__ . "/../parts/navbar-xuan.php" ?>


<style>
    .form-control {
        border: none;
        background-color: #F1F1F1;
    }

    .form-label {
        font-size: 14px;
        font-weight: bold;
    }

    /* .a.b 代表同時符合兩個class才包含 */
    .form-control.red {
        outline: 1px solid red;
    }

    .form-text.red {
        color: red;
    }

    /* 讓placeholder font-size小一點 */
    ::-webkit-input-placeholder {
        font-size: 11px !important;
    }

    :-moz-placeholder {
        /* Firefox 18- */
        font-size: 11px !important;
    }

    ::-moz-placeholder {
        /* Firefox 19+ */
        font-size: 11px !important;
    }

    .pic-load {
        width: 100%;
        height: 300px;
        /* background-color: #f5f5f5; */
        border: 2px dashed #d4d4d4;
        /* opacity:0; */
    }



    .pic-load>input {
        display: none;
    }

    #myimg {
        object-fit: cover;
        object-position: center;
        width: 100%;

    }

    .upload_img {
        overflow: hidden;
        z-index: 20;
    }
</style>

<!-- 進度bar條 -->
<!-- <div class="container w-25 mt-5">
    <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 67%"></div>
    </div>
</div>  -->


<!-- 活動資訊 -->
<div class="container  mt-5">


    <div class="row d-flex justify-content-center">


        <div class="col-6">
            <div class="card" style=" padding:30px 60px">


                <form name="form1" action="npo-act-add-api.php" method="post" enctype="multipart/form-data" class="image_upload" style="height: 250px; display:none" ;>


                    <input type="file" name="myfile" accept="image/png,image/jpeg" />


                </form>

                <button id="btn" onclick="uploadAvatar()">上傳活動照片</button>
                <br>

                <img id="myimg" src="" alt="" />


                <!-- 表格內容放這邊 表單名:form_npo_act-->
                <div class="card-body mt-4">

                    <form name="form_npo_act" onsubmit="sendData();return false;" novalidate>

                        <div class="mb-4">
                            <label for="npo_name" class="form-label ">主辦單位 <i class="fa-solid fa-asterisk ml-4" style="font-size:11px; color:red"></i></label>
                            <input type="text" class="form-control-lg form-control  npo_name" id="npo_name" name="npo_name" placeholder="請填寫主辦單位" >
                            <!-- 下面是錯誤時跳出的提示通知 -->
                            <div class="form-text npo_n"></div>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="form-label ">活動名稱 <i class="fa-solid fa-asterisk ml-4" style="font-size:11px ; color:red"></i></label>
                            <input type="text" class="form-control-lg form-control  " id="name" name="name" placeholder="請填寫活動名稱">
                            <!-- 下面是錯誤時跳出的提示通知 -->
                            <div class="form-text "></div>
                        </div>

                        <!-- 活動類型 -->
                        <?php
                        $act_type = [
                            '1' => '環境',
                            '2' => '動保',
                            '3' => '長照',
                            '4' => '兒少',
                            '5' => '身心障礙',
                            '6' => '其他',
                        ];
                        ?>

                        <div class="mb-4">
                            <label for="act_type" class="form-label">活動類型 <i class="fa-solid fa-asterisk ml-4" style="font-size:11px ; color:red"> </i></label>
                            <div class="form-text text-secondary"></div>

                            <?php foreach ($act_type as $k => $v) : ?>
                                <div class="form-check form-check-inline">
                                    <!-- 多選1 name要相同(才會是相同group)，但id要不同 -->
                                    <!-- 這樣回傳value時，才會選到什麼傳什麼value -->
                                    <input class="form-check-input" type="radio" name="act_type" id="type-<? $k ?>" value="<?= $k ?>" style="color:red">
                                    <!-- 注意！lable for一樣要對到ID -->
                                    <label class="form-check-label" for="type-<? $k ?>"><?= $v ?></label>
                                </div>
                            <?php endforeach; ?>


                            <div class="form-text form-text-radio"></div>
                        </div>


                        <!-- 活動開始結束時間 -->
                        <div class="mb-4">
                            <label for="mobile" class="form-label">活動時間 <i class="fa-solid fa-asterisk ml-4" style="font-size:11px ; color:red"> </i></label>

                            <div class="form-text text-secondary mt-3 d-flex justify-content-between">
                                <span style="width:45%; margin:0px 0px">開始時間</span>
                                <span style="width:45%">結束時間</span>
                            </div>


                            <div class="form-row d-flex justify-content-between">

                                <div class="form-group col-md-6 mt-2 " style="width:45%">

                                    <input type="datetime-local" id="start" class="form-control mr-2 starttime" placeholder="日期" name="start">
                                    </input>

                                </div>

                                <div class="form-group col-md-6 mt-2 " style="margin-left:5px;width:45%">

                                    <input type="datetime-local" name="end" id="end" class="form-control mr-2 endtime " placeholder="日期">
                                    </input>

                                </div>

                            </div>

                            <div class="form-text text-secondary mt-3 d-flex justify-content-between">
                                <span class="start_time" style="width:45%; margin:0px 0px ; color:red"></span>
                                <span class="end_time" style="width:45%; color:red"></span>
                            </div>




                        </div>

                        <div class="mb-4 d-flex">

                            <div style="margin-right:20px">
                                <label for="ammount" class="form-label ">活動名額 <i class="fa-solid fa-asterisk ml-4" style="font-size:11px ; color:red"> </i></label>
                                <div class="form-text text-secondary"></div>
                                <input type="text" class=" form-control" id="ammount" name="ammount" pattern="09\d{8}" placeholder="請填寫招募人數">
                                <div class="form-text"></div>
                            </div>

                            <div style="margin-right:20px">
                                <label for="price" class="form-label ">報名費用 <i class="fa-solid fa-asterisk ml-4" style="font-size:11px ; color:red"> </i></label>
                                <div class="form-text text-secondary"></div>
                                <input type="text" class=" form-control price" id="price" name="price" placeholder="請填寫報名費用">
                                <div class="form-text price_n"></div>
                            </div>

                            <div>
                                <label for="value" class="form-label ">陰德值回饋 <i class="fa-solid fa-asterisk ml-4" style="font-size:11px ; color:red"> </i></label>
                                <div class="form-text text-secondary"></div>
                                <input type="text" class=" form-control value" id="value" name="value" placeholder="請填寫陰德值回饋">
                                <div class="form-text value_n"></div>
                            </div>



                        </div>

                        <!-- 活動類型 -->
                        <?php
                        $act_address = [
                            '1' => '基隆市',
                            '2' => '台北市',
                            '3' => '新北市',
                            '4' => '桃園市',
                            '5' => '新竹縣',
                            '6' => '新竹市',
                            '7' => '苗栗縣',
                            '8' => '台中市',
                            '9' => '彰化縣',
                            '10' => '南投縣',
                            '11' => '雲林縣',
                            '12' => '嘉義縣',
                            '13' => '嘉義市',
                            '14' => '台南市',
                            '15' => '高雄市',
                            '16' => '屏東縣',
                            '17' => '花蓮縣',
                            '18' => '台東縣',
                            '19' => '宜蘭縣',
                            '20' => '澎湖縣',
                            '21' => '金門縣',
                            '22' => '連江縣'
                        ];
                        ?>


                        <!-- 活動地點 -->
                        <div class="mb-4">
                            <label for="act_address" class="form-label">活動地點 <i class="fa-solid fa-asterisk ml-4" style="font-size:11px ; color:red"> </i></label>


                            <div class="d-flex">
                                <!-- 選擇縣市區域 -->
                                <div class="form-group col-md-3 mt-1 " style="margin-right:20px">
                                    <div class=" form-text text-secondary mt-1  ">縣/市</div>

                                    <select id="act_address" name="act_address" class="form-control form-control-lg address_1">

                                        <option selected disabled style="font-size:11px">請選擇</option>

                                        <?php foreach ($act_address as $k => $v) : ?>
                                            <option id="type-<? $k ?>" value="<?= $k ?>"><?= $v ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="form-text address1 w-100">
                                    </div>

                                </div>


                                <!-- 填寫詳細地址 -->
                                <div class="form-group col-md-8 mt-1 ">
                                    <div class="act_address_2 form-text text-secondary mt-1 ">詳細地址</div>

                                    <input type="text" class="form-control-lg form-control address_2" id="act_address_2" name="act_address_2" placeholder="ex: 中華路一段">

                                    <div class="form-text address2 w-100">
                                    </div>

                                </div>


                            </div>

                        </div>

                        <input type="avatar" class="form-control-lg form-control " id="avatar" name="avatar" placeholder="這是隱藏欄位" value="" style="display:none">

                        <div class="d-flex justify-content-between align-items-center mt-5">
                            <!-- <div class="">
                                <i class="fa-solid fa-arrow-left-long "></i> -->
                            <!-- <a href="npo-add.php" style="color:black;text-decoration:none;padding-left:5px">返回上一頁</a> 
                            </div> -->
                            <button type="submit" class="btn btn-primary w-100 mt-3">送出</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
</div>



<?php include __DIR__ . '/../parts/scripts.php' ?>

<script>
    // 這邊是前端的欄位檢查

    // 先設正規表達式條件




    // 先取得各個值得參照(不要直接拿)
    const name_f = document.form_npo_act.name;
    const type_f = document.form_npo_act.act_type;
    const ammount_f = document.form_npo_act.ammount;
    const address_f = document.form_npo_act.act_address;
    const address2_f = document.form_npo_act.act_address_2;
    const starttime_f = document.form_npo_act.start;
    const endtime_f = document.form_npo_act.end;
    const price_f = document.form_npo_act.price;
    const value_f = document.form_npo_act.value;
    const npo_f = document.form_npo_act.npo_name;


    // 將三項列成陣列，改用索引取值
    const fields = [name_f, ammount];

    // 依序取得上述三項的下一個
    const fieldTexts = [];
    for (let f of fields) {
        fieldTexts.push(f.nextElementSibling);
    }


    // 這邊是使用者按下送出鍵後會產生的回饋
    async function sendData() {


        //TODO:  讓欄位的外觀回復原來的狀態
        //每次按submit都先跳回原本狀態再檢查一次

        for (let i in fields) {
            fields[i].classList.remove('red');
            fieldTexts[i].classList.remove('red'); //也可以直接讓字不見即可
            fieldTexts[i].innerText = '';
        }

        //info_bar.style.display = 'none'; // 隱藏訊息列


        let isPass = true; //預設是通過檢查的

        // 檢查活動名稱是否有填
        if (name_f.value.length < 1) {
            fields[0].classList.add('red');
            fieldTexts[0].classList.add('red');
            fieldTexts[0].innerText = '必填';
            isPass = false;
        }

        // 檢查活動類型是否有選
        if (type_f.value == '') {
            // type_f.classList.add('red');
            // document.querySelector(".form-check-radio").innerText='必填';
            // fieldTexts[1].classList.add('red');
            // fieldTexts[1].innerText = '必填';
            document.querySelector(".form-text-radio").innerText = '請選擇一項活動類型';
            document.querySelector(".form-text-radio").classList.add('red');
            // document.querySelector("#myimg").src = reader.result;
            isPass = false;
        } else{
            document.querySelector(".form-text-radio").innerText = '';
            document.querySelector(".form-text-radio").classList.remove('red');

        }

        // 檢查詳細地址是否有填
        if (address2_f.value == '') {
            document.querySelector(".address2").innerText = '必填';
            // document.querySelector(".address").classList.add('red') ;
            document.querySelector(".address_2").classList.add('red');
            document.querySelector(".address2").classList.add('red');
            isPass = false;
        }else{
            document.querySelector(".address2").innerText = '';
            // document.querySelector(".address").classList.add('red') ;
            document.querySelector(".address_2").classList.remove('red');
            document.querySelector(".address2").classList.remove('red');
        }

        // 檢查地址縣市是否有填
        if (address_f.value == '請選擇') {
            document.querySelector(".address1").innerText = '必填';
            // document.querySelector(".address").classList.add('red') ;
            document.querySelector(".address_1").classList.add('red');
            document.querySelector(".address1").classList.add('red');
            isPass = false;
        } else{
            document.querySelector(".address1").innerText = '';
            // document.querySelector(".address").classList.add('red') ;
            document.querySelector(".address_1").classList.remove('red');
            document.querySelector(".address1").classList.remove('red');
        }

        // 檢查活動開始時間是否有填
        if (starttime_f.value == '') {
            document.querySelector(".start_time").innerText = '必填';
            // document.querySelector(".address").classList.add('red') ;
            document.querySelector(".starttime").classList.add('red');
            isPass = false;
        }else{
            document.querySelector(".start_time").innerText = '';
            // document.querySelector(".address").classList.add('red') ;
            document.querySelector(".starttime").classList.remove('red');
        }

        // 檢查活動結束時間是否有填
        if (endtime_f.value == '') {
            document.querySelector(".end_time").innerText = '必填';
            // document.querySelector(".address").classList.add('red') ;
            document.querySelector(".endtime").classList.add('red');
            isPass = false;
        }else{
            document.querySelector(".end_time").innerText = '';
            // document.querySelector(".address").classList.add('red') ;
            document.querySelector(".endtime").classList.remove('red');
        }


        // 檢查活動人數是否有填
        if (ammount_f.value == '') {
            fields[1].classList.add('red');
            fieldTexts[1].classList.add('red');
            fieldTexts[1].innerText = '必填';
            isPass = false;
        }

        // 檢查報名費用是否有填
        if (price_f.value == '') {
            document.querySelector(".price_n").innerText = '必填';
            document.querySelector(".price_n").classList.add('red');
            document.querySelector(".price").classList.add('red');
            isPass = false;
        }else{
            document.querySelector(".price_n").innerText = '';
            document.querySelector(".price_n").classList.remove('red');
            document.querySelector(".price").classList.remove('red');
        }
        
        // 檢查陰德值回饋是否有填
        if (value_f.value == '') {
            document.querySelector(".value_n").innerText = '必填';
            document.querySelector(".value_n").classList.add('red');
            document.querySelector(".value").classList.add('red');
            isPass = false;
        }else{
            document.querySelector(".value_n").innerText = '';
            document.querySelector(".value_n").classList.remove('red');
            document.querySelector(".value").classList.remove('red');
        }

        // 檢查主辦單位是否有填
        if (npo_f.value.length < 1) {
            document.querySelector(".npo_n").innerText = '必填';
            document.querySelector(".npo_n").classList.add('red');
            document.querySelector(".npo_name").classList.add('red');
            isPass = false;
        } else{
            document.querySelector(".npo_n").innerText = '';
            document.querySelector(".npo_n").classList.remove('red');
            document.querySelector(".npo_name").classList.remove('red');
        }



        // 只要isPass在上面篩選中是false即結束資料傳送
        if (!isPass) {
            return; //結束涵式，不要傳資料出去
        }

        const fd = new FormData(document.form_npo_act);
        const r = await fetch('npo-act-add-api.php', {
            method: 'POST',
            body: fd,
            // body: JSON.parse(fd),
        });


        const result = await r.json();
        // const result = await r;
        // const result = await r.test;
        console.log(result);

        if (result.success) {
            setTimeout(() => {
                    location.href = 'event-manage.php'; // 跳轉到活動一覽頁
                }, 1000);
            };

    }


    // 上傳活動背景區
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


    // 日期(不能選今天以前，不能選小於開始時間)
    const start = document.getElementById('start');
    start.min = new Date().toISOString().split("T")[0];
    start.min = new Date().toISOString().split("T")[0];
    start.min = new Date().toISOString().split("T")[0];
    start.min = new Date().toISOString().split("T")[0];
    start.min = new Date().toISOString().split("T")[0];
    start.min = new Date().toISOString().split("T")[0];

    // datePicker.min = new Date().toISOString().split("T")[0];

    // 日期(結束時間要大於開始時間)

    // 前面已定義過，這邊就不再定義
    // const start = document.getElementById('start');
    const end = document.querySelector('#end');
    // console.log(start);

    start.addEventListener('change', function() {
        if (start.value)
            end.min = start.value;
    }, false);

    end.addEventListener('change', function() {
        if (end.value)
            start.max = end.value;
    }, false);


    // 更新版上傳活動照片
    const btn = document.querySelector("#btn");
    const myimg = document.querySelector("#myimg");
    const myfile = document.form1.myfile;


    const avatar = document.querySelector("#avatar");

    myfile.addEventListener("change", async function() {
        // 上傳表單
        const fd = new FormData(document.form1);
        const r = await fetch("act-upload-avatar-api.php", {
            method: "POST",
            body: fd,
        });
        const obj = await r.json();
        console.log(obj);
        myimg.src = "./list-img/" + obj.filename;
        avatar.value = obj.filename;
    });

    function uploadAvatar() {
        myfile.click(); // 模擬點擊

    }
</script>


<?php include __DIR__ . '/../parts/html-foot.php' ?>