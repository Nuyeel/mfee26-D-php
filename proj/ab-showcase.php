<?php require __DIR__ . "/parts/connect_db.php"; ?>
<?php
$pageName = 'ab-showcase';
$title = '會員衣櫥間';

if (!$_SESSION['member']['account']) {
    header('location:ab-login.php');
    // exit;
}
include __DIR__ . "/alive-confirm.php";

// 先用session抓到會員的ID
$sid = isset($_SESSION['member']['sid']) ? intval($_SESSION['member']['sid']) : 0;
$row = $pdo->query("SELECT * FROM member WHERE `sid`='$sid'")->fetch();


// 這邊放可以抓到想要展示的MySQL資料表語法
$showcase = sprintf("SELECT * FROM `showcase` WHERE  `member_sid` = '$sid' ");
$show = $pdo->query($showcase)->fetchAll();


?>

<?php include __DIR__ . "./parts/html-head.php" ?>
<?php include __DIR__ . "./parts/navbar.php" ?>

<style>
    .form-control.red {
        border: 1px solid red;
    }

    .form-text.red {
        color: red;
    }

    h3 {
        color: #fff;
        padding: 20px;
    }

    canvas {
        border-radius: 10px;
    }

    .avatarCard {
        width: 250px;
        background-color: #2667A0;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 10px 10px 0px #261E47;
        transition: .5s;
        color: #fff;
        margin: 10px 20px;
        /* box-sizing: content-box; */
    }

    .avatarCard:hover {
        box-shadow: 12px 12px 10px #261E47;
    }

    .avatarBox {
        margin: auto;
        text-align: center;
    }

    body {
        background-color: #69d0ff;
        background-image: linear-gradient(0deg, #69d0ff 0%, #ffa4e9 100%);
        background-position: 100%;
        background-repeat: no-repeat;
        height: 100vh;
    }

    .format {
        font-size: 18px;
        font-weight: 600;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    .format2 {
        font-size: 18px;
        font-weight: 600;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        color: #ebd367;
    }

    .pb-4 {
        background-color: rgba(255, 255, 255, 0.6);
        background-position: 100%;
        background-repeat: no-repeat;
    }

    .btn-primary {
        background-color: rgb(38, 106, 170);
    }

    .btn-primary:hover {
        background-color: #fff;
        color: rgb(38, 106, 170);
    }

    .btn-outline-primary {
        border-color: rgb(38, 106, 170);
        ;
        color: rgb(38, 106, 170);
    }

    .btn-outline-primary:hover {
        color: #fff;
        background-color: rgb(38, 106, 170);
    }

    .row {
        margin-left: 15%;
        /* margin-right: 50%; */
    }

    .icon {
        text-decoration: none;
        font-size: 2.6rem;
        transition: .3s;
        color: rgb(38, 106, 170);
        color: rgb(38, 106, 170);
    }

    .icon:hover {
        color: #ebd367;
    }

    .format3 {
        font-size: 20px;
        font-weight: 600;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        color: rgb(38, 106, 170);
    }
</style>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card_2 d-flex">
                <div class="card" style="width: 20rem;font-size: 1.2rem;">
                    <ul class="list-group list-group-flush format">
                        <li class="list-group-item" ><a href="ab-profile.php" style="text-decoration: none; color: #212529">會員中心總覽 </a></li>
                        <li class="list-group-item"><a href="ab-edit-profile.php" style="text-decoration: none; color: #212529">會員資料</a></li>
                        <li class="list-group-item"><a href="ab-place.php"style="text-decoration: none; color: #212529">訂單總覽</a></li>
                        <li class="list-group-item"><a href="ab-event.php" style="text-decoration: none; color: #212529">活動紀錄</a></li>
                        <li class="list-group-item" style="background-color: #f0f0f0;"><a href="ab-showcase.php" style="text-decoration: none; color: rgb(38, 106, 170);">衣櫥間 </a></li>
                        <!--
                        <li class="list-group-item">常見問題</li>
                        <li class="list-group-item">我有問題</li> -->
                    </ul>
                </div>

                <!-- 這一段放各類別要呈現的內容（選項列的右邊那塊） -->
                <div class="card" style="min-width:30rem;max-width:52rem; padding-bottom:20px">
                    <div class="card-body">
                        <h4 class="card-title format3" >衣櫥間</h4>
                        <br>

                        <!-- 這邊導入會員名稱 -->
                        <h5 class="card-title">
                            <?php if (!empty($row['name'])) {
                                echo htmlentities($row['name']);
                            } else {
                                echo htmlentities($row['account']);
                            } ?> &nbsp您好，以下是您的來生形象衣櫥：</h5>
                        <br>
                    </div>



                    <div class="container-fluid d-flex align-content-start flex-wrap " style="padding:0px 5px;margin:0px 5px;">
                        <form action="" id="form1" name="form1" onsubmit="return false;" style="display: none;">
                            <input class="form-check-input" type="text" name="mid" value="<?php echo $_SESSION['member']['sid']; ?>" checked>
                        </form>

                        <!-- 這邊放要展示的資料，用php foreach下去跑， -->
                        <div class="row " id="showcase" style="margin-left:5px;margin-right:5px; ">
                        </div>

                    </div>
                </div>


            </div>
        </div>


    </div>
</div>

</div>



<?php include __DIR__ . "./parts/scripts.php" ?>

<script src="https://pixijs.download/release/pixi.js"></script>
<script>
    const showcase = document.querySelector('#showcase');


    //顏色列表
    const colors = [];
    colors[0] = [0x3481C5, 0xB4BF5A, 0x2DA428, 0xAB6600, 0xB840BB, 0x8fbc8f, 0xffd700, 0xccffcc, 0xccccff, 0xed1848];
    colors[1] = [0x3481C5, 0xB4BF5A, 0x2DA428, 0xAB6600, 0xB840BB, 0x8fbc8f, 0xffd700, 0xccffcc, 0xccccff, 0xed1848];
    colors[2] = [0x3481C5, 0xB4BF5A, 0x2DA428, 0xAB6600, 0xB840BB, 0x8fbc8f, 0xffd700, 0xccffcc, 0xccccff, 0xed1848];
    colors[3] = [0x82BBF0, 0xF391A0, 0xB4BF5A, 0x7CD679, 0xD5AB68, 0xE58AE6];
    colors[4] = [0x3481C5, 0xB4BF5A, 0x2DA428, 0xAB6600, 0xB840BB, 0x8fbc8f, 0xffd700, 0xccffcc, 0xccccff, 0xed1848, 0xaee0d7, 0xcccccc, 0x333333];

    //部位總表
    const parts = ['eyes', 'nose', 'mouth', 'ear', 'hair']

    //眼睛元件
    const eyesimgs = ["./img/avatar_img/eyes/0.png", "./img/avatar_img/eyes/1.png", "./img/avatar_img/eyes/2.png", "./img/avatar_img/eyes/3.png"]; //之後要改為由資料庫引入
    //鼻子元件
    const noseimgs = ["./img/avatar_img/nose/0.png"]; //之後要改為由資料庫引入
    //嘴巴元件
    const mouthimgs = ["./img/avatar_img/mouth/0.png"]; //之後要改為由資料庫引入
    //耳朵元件
    const earimgs = ["./img/avatar_img/ear/0.png", "./img/avatar_img/ear/1.png", "./img/avatar_img/ear/2.png"]; //之後要改為由資料庫引入
    //頭髮元件
    const hairimgs = ["./img/avatar_img/hair/0.png", "./img/avatar_img/hair/1.png", "./img/avatar_img/hair/2.png"]; //之後要改為由資料庫引入

    const avatarBox = (f, g) => {
        return `
    <div class="avatarCard col-12 col-lg-6">
        <div class="avatarBox"></div>
        <div class="avatarInfo">
            <p>形象編號:<br>${g}</p>
            <p>創建時間:<br>${f}</p>
        </div>
        <a href="javascript: edit_it(${g})" class="btn btn-info">
            修改
        </a>
        <a href="javascript: delete_it(${g})" class="btn btn-danger">
            刪除
        </a>
    </div>`;
    };
    const form1 = document.querySelector('#form1');
    async function getData() {
        const fd = new FormData(form1)
        const r = await fetch('./avatar-getshowcase-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json();
        console.log(result);
        let l = result.length;
        if (result.length > 5) {
            l = 5;
        };
        for (i = 0; i < l; i++) {
            showcase.innerHTML += avatarBox(result[i].avatar_created_at, result[i].avatar_id);
        }
        for (i = 0; i < l; i++) {
            const a = JSON.parse(result[i]['combination']);
            console.log(a);
            const avatarBoxes = document.querySelectorAll('.avatarBox');
            const avatar = new PIXI.Application({
                width: 200,
                height: 200
            });
            avatar.renderer.backgroundColor = 0x143879;
            avatarBoxes[i].appendChild(avatar.view);
            //基礎底圖
            let circle = PIXI.Sprite.from('./img/avatar_img/basic/circle-01.png');
            circle.anchor.set(0.5);
            circle.scale.set(0.2);
            circle.x = 100;
            circle.y = 100;
            circle.tint = 0x86AED1;
            avatar.stage.addChild(circle);
            let body = PIXI.Sprite.from('./img/avatar_img/basic/body-shadow(gray)-01.png');
            body.anchor.set(0.5);
            body.scale.set(0.2);
            body.x = 100;
            body.y = 100;
            body.zIndex = 1;
            body.tint = 0x82BBF0;
            avatar.stage.addChild(body);

            //眼睛
            let eye = PIXI.Sprite.from(eyesimgs[a[parts[0]]]);
            eye.anchor.set(0.5); //錨點
            eye.scale.set(0.2); //大小
            //畫布上的位置
            eye.x = 100;
            eye.y = 100;
            eye.zIndex = 2;
            eye.tint = colors[0][a[parts[0] + "Color"]];

            avatar.stage.addChild(eye);

            //鼻子
            let nose = PIXI.Sprite.from(noseimgs[a[parts[1]]]);
            nose.anchor.set(0.5); //錨點
            nose.scale.set(0.2); //大小
            //畫布上的位置
            nose.x = 100;
            nose.y = 100;
            nose.zIndex = 2;
            nose.tint = colors[1][a[parts[1] + "Color"]];

            avatar.stage.addChild(nose);

            //嘴巴
            let mouth = PIXI.Sprite.from(mouthimgs[a[parts[2]]]);
            mouth.anchor.set(0.5); //錨點
            mouth.scale.set(0.2); //大小
            //畫布上的位置
            mouth.x = 100;
            mouth.y = 100;
            mouth.zIndex = 2;
            mouth.tint = colors[2][a[parts[2] + "Color"]];

            avatar.stage.addChild(mouth);

            //耳朵
            let ear = PIXI.Sprite.from(earimgs[a[parts[3]]]);
            ear.anchor.set(0.5); //錨點
            ear.scale.set(0.2); //大小
            //畫布上的位置
            ear.x = 100;
            ear.y = 100;
            ear.zIndex = 0;
            ear.tint = colors[3][a[parts[3] + "Color"]];

            avatar.stage.addChild(ear);

            //頭髮
            let hair = PIXI.Sprite.from(hairimgs[a[parts[4]]]);
            hair.anchor.set(0.5); //錨點
            hair.scale.set(0.2); //大小
            //畫布上的位置
            hair.x = 100;
            hair.y = 100;
            hair.zIndex = 2;
            hair.tint = colors[4][a[parts[4] + "Color"]];

            avatar.stage.addChild(hair);

            //調整圖層的前後順序
            avatar.stage.sortChildren();
        }

    }

    function delete_it(sid) {
        if (confirm(`確定要刪除編號為 ${sid} 的資料嗎?`)) {
            location.href = `./avatar-order-delete-api.php?sid=${sid}`;
        }
    }

    function edit_it(sid) {
        location.href = `./avatar.php?avatarid=${sid}`;
    }
    getData();
</script>

<?php include __DIR__ . "/parts/html-foot.php" ?>