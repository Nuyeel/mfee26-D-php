<?php require __DIR__ . "./parts/connect_db.php";

if (!$_SESSION['member']['account'] or $_SESSION['member']['isdead'] == 'false') {
    header('location:/mfee26-D-php/proj/ab-login.php');
    exit;
}

$sid = $_SESSION['member']['sid'];

$where = " WHERE `member_sid` = $sid";
$r_sql = "SELECT COUNT(*) FROM `cube`" . $where;
$rowNum = $pdo->query($r_sql)->fetch(PDO::FETCH_NUM)[0];

if ($rowNum >= 1) {
    // header('location:https://google.com');
    echo '快去投胎拉QQ';
    exit;
} 


?>

<?php if ($_SESSION['member'] and $_SESSION['member']['isdead'] == 'true') { ?>

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;500;700;900&display=swap" rel="stylesheet" /> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700;900&display=swap" rel="stylesheet" /> -->
    <style type="text/css">
        @font-face {
            font-family: 'NOTO sans TC';
            src:
                local('NotoSansTC-Bold'),
                local('NotoSansTC-Black'),
                local('NotoSansTC-Light'),
                local('NotoSansTC-Medium'),
                local('NotoSansTC-Regular'),
                local('NotoSansTC-Thin'),
                url('./font/NotoSansTC-Bold.otf'),
                url('./font/NotoSansTC-Black.otf'),
                url('./font/NotoSansTC-Light.otf'),
                url('./font/NotoSansTC-Medium.otf'),
                url('./font/NotoSansTC-Regular.otf'),
                url('./font/NotoSansTC-Thin.otf')
        }

        body {
            position: fixed;
            width: 100%;
            height: 100%;
        }

        #container {
            position: absolute;
            width: 100%;
            top: 0px;
            height: 100%;
            z-index: 10;
        }

        #myCanvas {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            /* right: 0; */
            /* bottom: 0; */
            margin: auto;
        }

        /* 之後要整合進 navbar.php.裡面 */
        .navbar {
            z-index: 500;
        }

        .curtain {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 800;
            /* background-color: #f00; */
            background-color: transparent;
            font-size: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            -webkit-user-drag: none;
        }

        .dead-popup {
            position: fixed;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: calc(100% - 85px);
            top: 85px;
            z-index: 1000;
            opacity: 0;
            transition: 0.5s;
            background-color: #000a;
            color: #fff;
            user-select: none;
            -webkit-user-drag: none;
        }

        .dead-popup-check {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 48px;
            transition: 0.5s;
            -webkit-user-drag: none;
        }

        .dead-popup-check p {
            margin-bottom: 100px;
        }

        .is-active {
            opacity: 1;
            z-index: 1000;
        }

        .is-hidden {
            opacity: 0;
            z-index: -1000;
        }

        .popup-music-selection {
            position: fixed;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: calc(100% - 85px);
            top: 85px;
            color: #fff;
            opacity: 0;
        }

        .pms-anim-s {
            animation: pmsShown 0.5s ease-in 0.5s forwards;
        }

        .pms-anim-h {
            animation: pmsHidden 0.5s ease-in 0s forwards;
        }

        @keyframes pmsShown {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes pmsHidden {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        /* .popup-music-selection div {
        position: relative;
        top: 8px;
    } */

        .pms_question {
            font-size: 48px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pms_button {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .pms_button button {
            width: 100px;
            height: 100px;
            margin: 20px;
            border-radius: 50%;
            background-color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cpemerge {
            z-index: 1000;
        }

        .cpvanish {
            z-index: -1000;
        }

        .cpshown {
            opacity: 1;
        }

        .cphidden {
            opacity: 0;
        }

        .ginie {
            width: 300px;
            height: 300px;
            position: fixed;
            right: 40px;
            bottom: 40px;
            border-radius: 20px;
            background-color: #e1e4e5;
            font-weight: 500;
            font-family: 'NOTO sans TC';
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 4s;
            user-select: none;
            -webkit-user-drag: none;
        }

        .ginie-dizzy {
            position: absolute;
            width: 50px;
            height: 50px;
            top: 15px;
            left: 20px;
            border-radius: 50%;
            -webkit-user-drag: none;
        }

        .ginie span {
            font-weight: 900;
            color: #ed1848;
        }

        .ginie-talk {
            width: 250px;
            /* background-color: #f00; */
        }

        .ginie-talk p:first-child {
            margin-bottom: 20px;
        }

        .cubetext {
            position: absolute;
            width: 100%;
            max-width: 980px;
            height: 600px;
            /* background-color: #f00; */
            /* border-radius: 20px; */
            top: 200px;
            left: 0;
            right: 0;
            margin-left: auto;
            margin-right: auto;
            font-family: 'NOTO sans TC';
            display: flex;
            flex-direction: column;
            /* z-index: 800; */
            transition: 2s;
            user-select: none;
            -webkit-user-drag: none;
        }

        .cubetext p:first-of-type {
            margin-bottom: 0;
        }

        .cubetext p:last-of-type {
            margin-bottom: 24px;
        }

        /* ::selection 是反選文字的底色 */
        /* 留心其影響範圍為整個頁面 */

        ::selection {
            background-color: #78787880;
            /*color: #fff;*/
        }

        ::-moz-selection {
            background-color: #00000033;
            /*color: #fff;*/
        }

        .cubetext p {
            user-select: none;
            -webkit-user-drag: none;
        }

        /* textarea 好像不能用 pseudo-element */
        .cubetext p:first-of-type::before,
        .cubetext p:first-of-type::after {
            content: '';
            display: block;
            width: 100%;
            height: 1px;
            background-color: #000;
            position: absolute;
            z-index: 1000;
            left: 0;
        }

        .cubetext p:first-of-type::before {
            top: 123px;
        }

        .cubetext p:first-of-type::after {
            top: 227px;
        }

        #cubeMessage {
            position: relative;
            width: 100%;
            height: 240px;
            padding-bottom: 26px;
            font-size: 48px;
            line-height: 104px;
            letter-spacing: 0.05em;
            color: #b7b7b7;
            border: none;
            /*border-bottom:solid 1px #a0a0a0;*/
            outline: none;
            background-color: rgba(255, 255, 255, 0);
            resize: none;
            /* 去除 textarea 外框 */
            /* outline: 0px solid transparent !important; */
            /* -webkit-appearance:none; */
            box-shadow: none;
            -webkit-box-shadow: none;
            /* margin-bottom: 24px; */
        }

        .cubetext-btn-area {
            width: max-content;
            height: max-content;
            position: absolute;
            top: 270px;
            bottom: 0;
            left: 0;
            right: 845px;
            margin: auto;
            transition: 2s;
            user-select: none;
            -webkit-user-drag: none;
        }

        .cubetext-btn-area button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .cube-btn-switch-area {
            position: absolute;
            width: 150px;
            height: 150px;
            top: 530px;
            right: 21vw;
            font-size: 32px;
            transition: 0.5s;
        }

        .cube-btn-switch-area button {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }

        .cubetext-btn-area button+button {
            margin-left: 6px;
            /* margin-right: 12px; */
        }

        .cube-btn-switch-title {
            position: absolute;
            font-size: 32px;
            bottom: 0;
            top: 600px;
            left: 0;
            right: 0;
            margin: auto;
            width: max-content;
            height: max-content;
            text-align: center;
            font-family: 'NOTO sans TC';
            font-weight: 700;
        }

        /* .btn-secondary {
            pointer-events: none;
        } */

        .cp-slidezi {
            z-index: 100;
        }

        .ct-anim-up {
            /* animation: pmsShown 0.5s ease-in 0.5s forwards; */
            animation: ctAnimUp 2s ease-in-out 0s forwards;
        }

        @keyframes ctAnimUp {
            0% {
                top: 200px;
            }

            100% {
                top: -400px;
            }
        }

        .ct-anim-down {
            /* animation: pmsShown 0.5s ease-in 0.5s forwards; */
            animation: ctAnimDown 2s ease-in-out 0s forwards;
        }

        @keyframes ctAnimDown {
            0% {
                top: -400px;
            }

            100% {
                top: 200px;
            }
        }

        .cube-curtain {
            position: absolute;
            top: 85px;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #e8ecf1;
            /* background-color: #f00; */
            transition: 5s;
        }

        .cube-curtain-zi {
            z-index: 100;
        }

        .cube-create-shadow {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            margin: auto;
            /* background-color: #f00; */
            background-color: #e8ecf1;
            /* 寬度寫成 inline */
            /* width: 100%; */
            height: 100%;
            transition: 2s;
            display: flex;
            justify-content: center;
            align-items: center;
            -webkit-mask: radial-gradient(circle at center center, transparent 200px, #e8ecf1 200px);
        }

        .cp-no-mouse-event {
            user-select: none;
            -webkit-user-drag: none;
        }

        #canvasTemp {
            position: absolute;
            top: 0;
            left: 0;
            margin: auto;
            /* outline: 5px solid red; */
            width: 256px;
            height: 256px;
            z-index: -1000;
        }

        .QQCanvas {
            position: absolute;
            top: 0;
            left: 0;
            margin: auto;
            /* outline: 5px solid red; */
            width: 256px;
            height: 256px;
            z-index: -1000;
        }

        .complete-yeah {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 150px;
            margin: auto;
            transition: 1s;
            font-size: 32px;
            font-family: 'NOTO sans TC';
            text-align: center;
        }

        .now-rein {
            background-color: #333;
            color: #fff;
            font-size: 54px;
            display: flex;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            justify-content: center;
            align-items: center;
            transition: 1s;
        }
    </style>

    <canvas id="canvasTemp"></canvas>
    <canvas id="myCanvas"></canvas>
    <canvas class="QQCanvas" id="QQCanvas1"></canvas>
    <canvas class="QQCanvas" id="QQCanvas2"></canvas>
    <canvas class="QQCanvas" id="QQCanvas3"></canvas>
    <canvas class="QQCanvas" id="QQCanvas4"></canvas>
    <canvas class="QQCanvas" id="QQCanvas5"></canvas>
    <canvas class="QQCanvas" id="QQCanvas6"></canvas>
    <canvas class="QQCanvas" id="QQCanvas7"></canvas>
    <canvas class="QQCanvas" id="QQCanvas8"></canvas>

    <div id="container"></div>

    <div class="curtain">
        用來防止使用者做任何互動
    </div>

    <div class="dead-popup">
        <div class="dead-popup-check">
            <p>看樣子您走完了一生...</p>
            <form name="formReincarnation" action="paycheck-api.php" method="post" style="display: none" onsubmit="return false;">
                <?php
                // 只傳 sid 太不安全了
                // 隨便就會被破解的
                // 多傳一個欄位
                // 現在還不知道會員資料長怎樣
                // 先假設送的是帳號
                // 兩個都要配到就沒有那麼容易破解了
                ?>
                <input type="hidden" name="check[]" value="<?= $_SESSION['member']['sid'] ?>" />
                <input type="hidden" name="check[]" value="<?= $_SESSION['member']['account'] ?>" />
                <button type="submit" id="checkBtn" style="display:none" onclick="reincarnationStart()"></button>
            </form>
            <button type="button" class="btn btn-primary" style="background-color: rgb(38, 106, 170)" onclick="transClick()">開始轉生之旅</button>
        </div>

        <div class="popup-music-selection">
            <form name="formMusic" action="rein-music-api.php" method="post" style="display: none" onsubmit="return false;">
                <input type="hidden" name="musicExist" value="" />
                <button type="submit" id="musicBtn" style="display:none"></button>
            </form>
            <form name="formMusicSelect" action="render-music-api.php" method="post" style="display: none" onsubmit="return false;">
                <input id="music" type="hidden" name="cubeMusicType" value="" />
                <button type="submit" id="musicSelectBtn" style="display:none"></button>
            </form>
            <div class="pms_question"></div>
            <div class="pms_button"></div>
        </div>

        <?php
        // <div class="dpup">
        //     <p>請選擇您最終的轉生形象</p>
        // </div>
        ?>

    </div>

    <div class="ginie cpvanish cphidden">
        <img src="./Portrait/Dizzy.png" alt="" class="ginie-dizzy">
        <div class="ginie-talk">
            <p>現在在您眼前的是一顆<span>希望方塊</span>，代表著古往今來人們對於今生的感慨與來生的期許。</p>
            <p>請您也留下心中的話語吧！</p>
        </div>
    </div>

    <div class="cubetext cpvanish cphidden">
        <p>請問您今生的感想是...？</p>
        <form name="formCubeText" action="cube-text-create-api.php" method="post" style="display: none" onsubmit="return false;">
            <input id="cubeText" type="hidden" name="cubeText" value="" />
            <button type="submit" id="cubeTextBtn" style="display:none"></button>

            <!-- <label for="cubeText" class="form-label"></label>
            <textarea class="form-control" name="cubeText" id="cubeText" cols="30" rows="3"></textarea> -->
            <!-- 加上 maxlength -->
        </form>
        <textarea class="form-control" name="cubeMessage" id="cubeMessage" cols="30" rows="2" placeholder="將心情書寫於此" maxlength="30"></textarea>
        <p>最多可以輸入30個字元，最少請輸入一個字元。</p>
        <p>如果真的沒有想說的話，請輸入空白字元。</p>
    </div>

    <div class="cubetext-btn-area cpvanish cphidden">
        <button type="button" class="btn btn-light disabled cube-btn-up">
            <i class="fa-solid fa-angle-up"></i>
        </button>
        <button type="button" class="btn btn-secondary disabled cube-btn-down">
            <i class="fa-solid fa-angle-down"></i>
        </button>
    </div>

    <script async src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"></script>

    <script type="importmap">
        {
            "imports": {
                "three": "./build/three.module.js"
            }
        }
    </script>

    <script type="module">
        import * as THREE from "three";

        // import Stats from "./jsm/libs/stats.module.js";

        import { EffectComposer } from "./jsm/postprocessing/EffectComposer.js";
        import { RenderPass } from "./jsm/postprocessing/RenderPass.js";
        import { SMAAPass } from "./jsm/postprocessing/SMAAPass.js";
        import { ShaderPass } from "./jsm/postprocessing/ShaderPass.js";
        import { FXAAShader } from "./jsm/shaders/FXAAShader.js";

        const width = 512;
        const height = 512;
        // 和下面的 context.scale() 連動
        // 畫更大的圖再縮放回來
        // 怎麼突然好了 傻眼
        const size = 512 * 1;

        // cube font color
        // let cfc1 = '#ffffff';
        // let cfc2 = '#ffffff';
        let cfcf = '#ed1848';

        // cube texture array
        // let cta = [
        //     "./box/1_a.png",
        //     "./box/1_b.png",
        //     "./box/1_t.png"
        // ];
        let cta = [
            "./box/37_a.png",
            "./box/37_b.png",
            "./box/37_c.png",
            "./box/37_t.png"
        ];
        // let cta = [
        //     "./box/37_a.png",
        //     "./box/37_b.png",
        //     "./box/37_c.png",
        //     "./box/37_d.png",
        //     "./box/37_t.png"
        // ];
        // let cta = [
        //     "./box/0_a.png",
        //     "./box/0_t.png"
        // ];


        function wrapText(
            context,
            text,
            x,
            y,
            account,
            x2,
            y2,
            maxWidth,
            lineHeight
        ) {
            const words = text.split("");
            // console.log(words);
            let line = "";

            // context.scale(1, 1);

            for (let n = 0; n < words.length; n++) {
                let testLine = line + words[n];
                let metrics = context.measureText(testLine);
                // console.log(metrics);
                // console.log(metrics.width);
                let testWidth = metrics.width;
                if (testWidth > maxWidth && n > 0) {
                    context.fillText(line, x, y);
                    line = words[n];
                    y += lineHeight;
                } else {
                    line = testLine;
                }
            }
            context.fillText(line, x, y);

            // context.font = "italic 900 24px 'Noto Sans JP', sans-serif";
            context.font = "italic Bold 32px 'Noto Sans TC'";
            context.fillText(account, x2, y2);

            // console.log(canvas);
            return canvas;
        }

        const canvas = document.querySelector('#myCanvas');

        canvas.width = canvas.height = size;

        let context = canvas.getContext("2d");

        // bold 30px Arial
        // context.font = "700 48px 'Noto Sans JP', sans-serif";
        context.font = "900 54px 'Noto Sans TC', sans-serif";

        // context.fillStyle = "green";
        // context.fillRect(0, 0, canvas.width, canvas.height);
        // context.fillStyle = "#ffcccc";
        // context.fillRect(40, 40, canvas.width - 80, canvas.height - 80);
        context.fillStyle = cfcf;
        context.textAlign = "left";
        context.textBaseline = "alphabetic";

        let maxWidth = 432;
        let lineHeight = 60;
        let x = 40;
        let y = 100;
        let x2 = 40;
        let y2 = 462;
        let account = "@" + "ShinderWife";
        let text =
            "下輩子也想當新德醬的老婆～";

        wrapText(
            context,
            text,
            x,
            y,
            account,
            x2,
            y2,
            maxWidth,
            lineHeight
        );








        // const canvasTemp = document.querySelector('#canvasTemp');

        // canvasTemp.width = canvasTemp.height = size;

        // context = canvasTemp.getContext("2d");

        // context.font = "900 54px 'Noto Sans TC', sans-serif";

        // context.fillStyle = '#ffcccc';
        // context.textAlign = "left";
        // context.textBaseline = "alphabetic";

        // account = "@" + "<?= $_SESSION['member']['account'] ?>";
        // text =
        //     "下輩婆子也想婆當新想婆婆醬的婆老婆醬的婆老婆醬的婆老婆醬的婆老婆～";

        // wrapText(
        //     context,
        //     text,
        //     x,
        //     y,
        //     account,
        //     x2,
        //     y2,
        //     maxWidth,
        //     lineHeight
        // );






        //

        let camera, scene, renderer, composer;

        // let stats;

        let mouseY = 0;

        init();
        animate();

        function init() {
            const container = document.querySelector("#container");

            renderer = new THREE.WebGLRenderer({
                antialias: true,
                alpha: true
            });

            renderer.setClearColor(0xe8ecf1, 1); // the default
            renderer.setPixelRatio(window.devicePixelRatio);
            renderer.setSize(window.innerWidth, window.innerHeight);
            container.appendChild(renderer.domElement);

            // stats = new Stats();
            // container.appendChild(stats.dom);

            //

            camera = new THREE.PerspectiveCamera(
                70,
                window.innerWidth / window.innerHeight,
                1,
                2000
            );
            camera.position.set(0, 200, 150);
            camera.rotation.set(0, 0, 0);
            camera.lookAt(0, 0, 0);

            scene = new THREE.Scene();
            // scene.background = new THREE.Color(0xe1e4e5);

            //

            const dirLight = new THREE.DirectionalLight(0xffffff, 1);
            dirLight.position.set(0, 5000, -200);
            scene.add(dirLight);

            //

            // camera.lookAt(scene.position);
            // console.log(scene.position);

            const geometry = new THREE.BoxGeometry(128, 128, 128);

            // loop: cube generation start - pattern

            let texture;
            let material;
            let textures = [];
            let texturesText = [];
            let materials = [];
            let materialsText = [];

            for (let i = 0; i < cta.length; i++) {
                texture = new THREE.TextureLoader().load(cta[i]);
                texture.anisotropy = 4;
                // texture.minFilter = THREE.NearestFilter;
                texture.minFilter = THREE.LinearFilter;
                texture.magFilter = THREE.LinearFilter;
                textures.push(texture);
            }
            console.log(textures);

            for (let i = 0; i < textures.length; i++) {
                material = new THREE.MeshBasicMaterial({
                    map: textures[i],
                    transparent: true
                });
                materials.push(material);
            }
            // console.log(materials);

            const textCube = () => {
                texture = new THREE.CanvasTexture(canvas);
                texture.anisotropy = 4;
                // texture.minFilter = THREE.NearestFilter;
                texture.minFilter = THREE.LinearFilter;
                texture.magFilter = THREE.LinearFilter;
                texturesText.push(texture);
            }

            textCube();

            const textCubeTransparent = () => {
                texture = new THREE.TextureLoader().load("./box/n_tr.png");
                texturesText.push(texture);
            }

            textCubeTransparent();

            // console.log(texturesText);

            for (let i = 0; i < texturesText.length; i++) {
                material = new THREE.MeshBasicMaterial({
                    map: texturesText[i],
                    transparent: true
                });
                materialsText.push(material);

            }
            // console.log(materialsText);

            for (let i = 0; i < materials.length - 1; i++) {
                let materialsBox = []
                materialsBox.push(materials[i]);
                materialsBox.push(materials[i]);
                materialsBox.push(materials[materials.length - 1]);
                materialsBox.push(materials[materials.length - 1]);
                materialsBox.push(materials[i]);
                materialsBox.push(materials[i]);

                let mesh = new THREE.Mesh(geometry, materialsBox);
                scene.add(mesh);
            }

            for (let i = 0; i < materialsText.length - 1; i++) {
                let materialsBox = []
                materialsBox.push(materialsText[materialsText.length - 1]);
                materialsBox.push(materialsText[materialsText.length - 1]);
                materialsBox.push(materialsText[0]);
                materialsBox.push(materialsText[0]);
                materialsBox.push(materialsText[materialsText.length - 1]);
                materialsBox.push(materialsText[materialsText.length - 1]);

                let mesh = new THREE.Mesh(geometry, materialsBox);
                scene.add(mesh);
            }

            // postprocessing

            composer = new EffectComposer(renderer);
            composer.addPass(new RenderPass(scene, camera));

            const pass = new SMAAPass(
                window.innerWidth * renderer.getPixelRatio(),
                window.innerHeight * renderer.getPixelRatio()
            );
            composer.addPass(pass);

            window.addEventListener("resize", onWindowResize);
        }

        function onWindowResize() {
            const width = window.innerWidth;
            const height = window.innerHeight;

            camera.aspect = width / height;
            camera.updateProjectionMatrix();

            renderer.setSize(width, height);
            composer.setSize(width, height);
        }

        function onDocumentMouseMove(event) {
            mouseY = event.clientY;
        }

        function animate() {
            requestAnimationFrame(animate);

            // stats.begin();

            camera.position.y =
                400 *
                Math.sin((mouseY - camera.position.y) * 0.00035 + 0.9);
            camera.position.z =
                400 *
                Math.cos((mouseY - camera.position.y) * 0.00035 + 0.9);
            camera.lookAt(0, 0, 0);

            // 第 0 個 children 是 dirLight
            // 如果需要光 光要跟著轉
            for (let i = 0; i < scene.children.length; i++) {
                const child = scene.children[i];

                child.rotation.y += 0.005;
            }

            // 使其透明
            // for (let i = 1; i < scene.children.length; i++) {
            //     const child = scene.children[i];
            //     // console.log(child.material[1]);
            //     for (let k of child.material) {
            //         k.opacity = 0;
            //     }
            // }


            composer.render(scene, camera);

            // stats.end();
        }

        // 嘗試處理掉方塊
        // const garbageCollection = () => {
        //     const child = scene.children[3];
        //     // console.log(child);

        //     child.geometry.dispose();
        //     for (let i=0; i<6; i++) {
        //         console.log(child.material[i]);
        //         child.material[i].dispose();
        //         console.log(child.material[i]);
        //     }
        //     // child.texture[i].dispose();
        // }

        // garbageCollection();

        document.addEventListener("mousemove", onDocumentMouseMove);

        const musicRender = async (e) => {
            e.preventDefault();
            msbtn.removeEventListener('click', musicRender, false);
            await pms.classList.add('pms-anim-h');

            const fd = new FormData(document.formMusicSelect);
            const fetchURL = 'render-music-api.php';
            const r = await fetch(fetchURL, {
                method: 'post',
                body: fd
            });

            await setTimeout(() => {
                pms.remove();
            }, 500);

            const result = await r.json();
            // console.log(result);
            // console.log(result.musicname['cube_music_name']);

            await setPlayer(result);

            const ginie = document.querySelector('.ginie');

            // 對 setTimeout await 沒有意義
            // 一樣是被傳進去 Task Queue
            // 這裡只是怕出問題這樣寫

            await setTimeout(() => {
                ginie.classList.remove('cpvanish');
                ginie.classList.remove('cphidden');
                ginie.classList.add('cpemerge');
                ginie.classList.add('cpshown');
            }, 2000);

            await setTimeout(() => {
                ginie.classList.remove('cpshown');
                ginie.classList.add('cphidden');
            }, 15000);

            await setTimeout(() => {
                ginie.remove();
                shinderDisappear();
            }, 20000);
        }

        msbtn.addEventListener('click', musicRender, false);

        // add a music player

        const setPlayer = (result) => {

            let musicPlaying = false;

            // 重複 id name 等一下換掉
            // 現在沒有播放暫停按鈕 也註解了 addEventListener
            // const music = document.querySelector("#music");

            // console.log("start");

            // create an AudioListener and add it to the camera
            const listener = new THREE.AudioListener();
            camera.add(listener);

            // create a global audio source
            const sound = new THREE.Audio(listener);
            if (!soundExist) {
                soundExist = !soundExist;
            }

            // load a sound and set it as the Audio object's buffer
            const audioLoader = new THREE.AudioLoader();

            const musicChoice = './music/' + result.musicname['cube_music_name'];

            audioLoader.load(
                musicChoice,
                function(buffer) {
                    sound.setBuffer(buffer);
                    sound.setLoop(true);
                    sound.setVolume(0.25);
                    sound.play();

                    console.log("add a player");
                    const dpu = document.querySelector('.dead-popup');
                    dpu.classList.add('is-hidden');
                });
        }

        // console.log("end");

        // 直接開播就好

        // function musicPlay() {
        //     if (!musicPlaying) {
        //         sound.play();
        //         musicPlaying = !musicPlaying;
        //         console.log("play");
        //     } else {
        //         sound.pause();
        //         musicPlaying = !musicPlaying;
        //         console.log("pause");
        //     }
        // }

        // music.addEventListener("click", musicPlay);
        // music.addEventListener("touch", musicPlay);

        // the block disappear and ready for texting


        const shinderDisappear = async () => {
            await shinderShrink();
            // await shinderTransparent();

            const ctc = document.querySelector('.cubetext');
            ctc.classList.remove('cpvanish');
            ctc.classList.remove('cphidden');
            ctc.classList.add('cpemerge');
            ctc.classList.add('cpshown');

            const cbr = document.querySelector('.cubetext-btn-area');
            cbr.classList.remove('cpvanish');
            cbr.classList.remove('cphidden');
            cbr.classList.add('cpemerge');
            cbr.classList.add('cpshown');

            // await
        }


        const shinderShrink = () => {
            for (let i = 1; i < 5; i++) {
                const child = scene.children[i];
                // console.log(child);
                for (let k = 0; k <= 200; k++) {
                    setTimeout(() => {
                        child.scale.set(1 - 0.005 * k, 1 - 0.005 * k, 1 - 0.005 * k);
                    }, 10 * k);
                }
            }
        }

        // const shinderTransparent = () => {
        //     for (let i = 1; i < scene.children.length; i++) {
        //         const child = scene.children[i];
        //         // console.log(child.material[1]);
        //         for (let k of child.material) {
        //             k.opacity = 0;
        //         }
        //     }
        // }

        const cm = document.querySelector('#cubeMessage');

        const cbr = document.querySelector('.cube-btn-area');
        const cbu = document.querySelector('.cube-btn-up');
        const cbd = document.querySelector('.cube-btn-down');

        const ct = document.querySelector('#cubeText');
        const ctbtn = document.querySelector('#cubeTextBtn');

        // 強迫置入 yee function

        const yeeFunction = () => {
            const checkText = cm.value.replace(/\n+/g, "");
            const yeeText = '下過雨的小魚更有活力，淋過雨的青草更顯翠綠。';

            if (checkText === 'yee') {
                cm.value = yeeText;
            }
        }

        // yee function end

        // 強迫置入 qq function

        const qqFunction = () => {
            const checkText = cm.value.replace(/\n+/g, "");
            const scriptStartText = '\u003c' + 'script' + '\u003e';
            const scriptInnerText = "alert('BANG')";
            const scriptEndText = '\u003c' + '/script' + '\u003e';
            const qqText = scriptStartText + scriptInnerText + scriptEndText;

            if (checkText === 'qq') {
                cm.value = qqText;
            }
        }

        // qq function end

        let colorOne = '';
        let colorTwo = '';

        const cubeWaitingAnim = () => {
            const ccs = document.querySelector('.cube-create-shadow');
            const cwat = document.createElement('div');
            cwat.classList.add('cphidden');
            cwat.classList.add('cp-no-mouse-event');
            cwat.style.color = colorOne;
            cwat.style.transition = '5s';
            cwat.style.position = 'absolute';
            cwat.style.top = '100px';
            cwat.style.fontSize = '32px';
            cwat.style.fontFamily = 'NOTO sans TC';
            cwat.innerHTML = '正在製作您的希望方塊...';

            const cwab = document.createElement('div');
            cwab.classList.add('cphidden');
            cwab.classList.add('cp-no-mouse-event');
            cwab.style.color = colorTwo;
            cwab.style.transition = '5s';
            cwab.style.position = 'absolute';
            cwab.style.bottom = '100px';
            cwab.style.fontSize = '32px';
            cwab.style.fontFamily = 'NOTO sans TC';
            cwab.innerHTML = 'Now creating your cube...';

            ccs.appendChild(cwat);
            ccs.appendChild(cwab);

            cwat.classList.remove('cphidden');
            cwab.classList.remove('cphidden');

        }

        let previousCube = [];

        // const renderPreviousCube = () => {
        //     // 之後改 cube sid 來對應就好
        //     // 因為其實材質已經取到了 
        //     // 這邊先隨機來送樣式

        //     for(let i = 0; i < 1; i++) {
        //         const canvasTemp = document.createElement('canvas');
        //         canvasTemp.classList.add('cpvanish');
        //         canvasTemp.width = 512 * 32;
        //         canvasTemp.height = 512 * 32;
        //         document.querySelector('body').appendChild(canvasTemp);

        //         let ctx = canvasTemp.getContext("2d");

        //         // bold 30px Arial
        //         // context.font = "700 48px 'Noto Sans JP', sans-serif";
        //         ctx.font = "900 54px 'Noto Sans TC', sans-serif";

        //         // context.fillStyle = "green";
        //         // context.fillRect(0, 0, canvas.width, canvas.height);
        //         // context.fillStyle = "#ffcccc";
        //         // context.fillRect(40, 40, canvas.width - 80, canvas.height - 80);
        //         ctx.fillStyle = cubeFontColor[2*i];
        //         ctx.textAlign = "left";
        //         ctx.textBaseline = "alphabetic";

        //         let maxWidth = 432;
        //         let lineHeight = 60;
        //         let x = 40;
        //         let y = 100;
        //         let x2 = 40;
        //         let y2 = 462;
        //         let account = "@" + previousCube[i]['account'];
        //         let text = previousCube[i]['cube_text'];

        //         wrapText(
        //             context,
        //             text,
        //             x,
        //             y,
        //             account,
        //             x2,
        //             y2,
        //             maxWidth,
        //             lineHeight
        //         );

        //         const geometry = new THREE.BoxGeometry(128, 128, 128);

        //         let texture;
        //         let material;
        //         let textures = [];
        //         let texturesText = [];
        //         let materials = [];
        //         let materialsText = [];

        //         for (let k = 0; k < cubePatternArray[2 * i].length; k++) {
        //         const ImgUrl = './box/' + cubePatternArray[2 * i][k] + '.png';

        //         texture = new THREE.TextureLoader().load(ImgUrl);
        //         texture.anisotropy = 4;
        //         texture.minFilter = THREE.LinearFilter;
        //         texture.magFilter = THREE.LinearFilter;
        //         textures.push(texture);
        //         }
        //         // console.log(textures);

        //         for (let k = 0; k < textures.length; k++) {
        //             material = new THREE.MeshBasicMaterial({
        //                 map: textures[k],
        //                 transparent: true
        //             });
        //         materials.push(material);
        //         }

        //         const textCube = () => {
        //             texture = new THREE.CanvasTexture(canvasTemp);
        //             texture.anisotropy = 4;
        //             // texture.minFilter = THREE.NearestFilter;
        //             texture.minFilter = THREE.LinearFilter;
        //             texture.magFilter = THREE.LinearFilter;
        //             texturesText.push(texture);
        //         }

        //         textCube();

        //         const textCubeTransparent = () => {
        //             texture = new THREE.TextureLoader().load("./box/n_tr.png");
        //             texturesText.push(texture);
        //         }

        //         textCubeTransparent();

        //         for (let k = 0; k < texturesText.length; k++) {
        //             material = new THREE.MeshBasicMaterial({
        //                 map: texturesText[k],
        //                 transparent: true
        //             });
        //             materialsText.push(material);
        //         }

        //         for (let k = 0; k < materials.length - 1; k++) {
        //             let materialsBox = []
        //             materialsBox.push(materials[k]);
        //             materialsBox.push(materials[k]);
        //             materialsBox.push(materials[materials.length - 1]);
        //             materialsBox.push(materials[materials.length - 1]);
        //             materialsBox.push(materials[k]);
        //             materialsBox.push(materials[k]);
        //             // console.log(materialsBox);
        //             let mesh = new THREE.Mesh(geometry, materialsBox);
        //             mesh.position.x = 500+ 200 * i;
        //             scene.add(mesh);
        //         }

        //         for (let k = 0; k < materialsText.length - 1; k++) {
        //             let materialsBox = []
        //             materialsBox.push(materialsText[materialsText.length - 1]);
        //             materialsBox.push(materialsText[materialsText.length - 1]);
        //             materialsBox.push(materialsText[0]);
        //             materialsBox.push(materialsText[0]);
        //             materialsBox.push(materialsText[materialsText.length - 1]);
        //             materialsBox.push(materialsText[materialsText.length - 1]);

        //             let mesh = new THREE.Mesh(geometry, materialsBox);
        //             mesh.position.x = 500+ 200 * i;
        //             scene.add(mesh);
        //         }
        //         canvasTemp.remove();
        //     }
        // }

        let cubeTextLastWord = '';

        // const renderCube = () => {
        //         const canvasTemp = document.querySelector('#canvasTemp');
        //         let ctx = canvasTemp.getContext("2d");

        //         ctx.font = "900 54px 'Noto Sans TC', sans-serif";

        //         ctx.fillStyle = cubeFontColor[cubePatternIndex];
        //         ctx.textAlign = "left";
        //         ctx.textBaseline = "alphabetic";

        //         let maxWidth = 432;
        //         let lineHeight = 60;
        //         let x = 40;
        //         let y = 100;
        //         let x2 = 40;
        //         let y2 = 462;
        //         let account = "@" + "<?= $_SESSION['member']['account'] ?>";
        //         let text = cubeTextLastWord;

        //         wrapText(
        //             context,
        //             text,
        //             x,
        //             y,
        //             account,
        //             x2,
        //             y2,
        //             maxWidth,
        //             lineHeight
        //         );

        //         const geometry = new THREE.BoxGeometry(64, 64, 64);

        //         let texture;
        //         let material;
        //         let textures = [];
        //         let texturesText = [];
        //         let materials = [];
        //         let materialsText = [];

        //         const textCube = () => {
        //             texture = new THREE.CanvasTexture(canvasTemp);
        //             texture.anisotropy = 4;
        //             // texture.minFilter = THREE.NearestFilter;
        //             texture.minFilter = THREE.LinearFilter;
        //             texture.magFilter = THREE.LinearFilter;
        //             texturesText.push(texture);
        //         }

        //         textCube();

        //         const textCubeTransparent = () => {
        //             texture = new THREE.TextureLoader().load("./box/n_tr.png");
        //             texturesText.push(texture);
        //         }

        //         textCubeTransparent();

        //         for (let k = 0; k < texturesText.length; k++) {
        //             material = new THREE.MeshBasicMaterial({
        //                 map: texturesText[k],
        //                 transparent: true
        //             });
        //             materialsText.push(material);
        //         }

        //         for (let k = 0; k < materialsText.length - 1; k++) {
        //             let materialsBox = []
        //             materialsBox.push(materialsText[materialsText.length - 1]);
        //             materialsBox.push(materialsText[materialsText.length - 1]);
        //             materialsBox.push(materialsText[0]);
        //             materialsBox.push(materialsText[0]);
        //             materialsBox.push(materialsText[materialsText.length - 1]);
        //             materialsBox.push(materialsText[materialsText.length - 1]);

        //             let mesh = new THREE.Mesh(geometry, materialsBox);
        //             scene.add(mesh);
        //         }
        //         // canvasTemp.remove();
        //     }

        // 最後的材質盒子
        let materialsFinalBox = [];

        const changeText = async () => {
            const canvasTemp = document.querySelector('#canvasTemp');

            canvasTemp.width = canvasTemp.height = size;

            context = canvasTemp.getContext("2d");

            context.font = "900 54px 'Noto Sans TC', sans-serif";

            context.fillStyle = cubeFontColor[cubePatternIndex];
            context.textAlign = "left";
            context.textBaseline = "alphabetic";

            account = "@" + "<?= $_SESSION['member']['account'] ?>";
            text = cubeTextLastWord;

            await wrapText(
                context,
                text,
                x,
                y,
                account,
                x2,
                y2,
                maxWidth,
                lineHeight
            );

            let texture;
            let material;
            let texturesText = [];
            let materialsText = [];

            const textCube = () => {
                texture = new THREE.CanvasTexture(canvasTemp);
                texture.anisotropy = 4;
                // texture.minFilter = THREE.NearestFilter;
                texture.minFilter = THREE.LinearFilter;
                texture.magFilter = THREE.LinearFilter;
                texturesText.push(texture);
            }

            await textCube();

            const textCubeTransparent = () => {
                texture = new THREE.TextureLoader().load("./box/n_tr.png");
                texturesText.push(texture);
            }

            await textCubeTransparent();

            for (let k = 0; k < texturesText.length; k++) {
                material = new THREE.MeshBasicMaterial({
                    map: texturesText[k],
                    transparent: true
                });
                materialsText.push(material);
            }

            for (let k = 0; k < materialsText.length - 1; k++) {

                materialsFinalBox.push(materialsText[materialsText.length - 1]);
                materialsFinalBox.push(materialsText[materialsText.length - 1]);
                materialsFinalBox.push(materialsText[0]);
                materialsFinalBox.push(materialsText[0]);
                materialsFinalBox.push(materialsText[materialsText.length - 1]);
                materialsFinalBox.push(materialsText[materialsText.length - 1]);
            }
        }

        // 暫時用來作弊的 資料從前端來
        // 所以就不用管迴圈了

        let cameraQQ, sceneQQ, rendererQQ, clockQQ, groupQQ, curtain;

        let composerQQ, fxaaPass;

        // initQQ();
        // animateQQ();

        function initQQ() {
            curtain = document.querySelector(".curtain");

            rendererQQ = new THREE.WebGLRenderer({
                antialias: true,
                alpha: true
            });
            rendererQQ.autoClear = false;

            rendererQQ.setClearColor(0xe8ecf1, 1); // the default
            rendererQQ.setPixelRatio(window.devicePixelRatio);
            rendererQQ.setSize(window.innerWidth, window.innerHeight);
            curtain.appendChild(rendererQQ.domElement);

            cameraQQ = new THREE.PerspectiveCamera(
                45,
                curtain.offsetWidth / curtain.offsetHeight,
                1,
                2000
            );

            cameraQQ.position.z = 500;

            sceneQQ = new THREE.Scene();

            clockQQ = new THREE.Clock();

            groupQQ = new THREE.Group();

            const geometryQQ = new THREE.BoxBufferGeometry(32, 32, 32);

            let swapMix;
            let swapTop;

            let swapMixArray = [
                './box/mix/0_Mix.png',
                './box/mix/1_Mix.png',
                './box/mix/6_Mix.png',
                './box/mix/15_Mix.png',
                './box/mix/20_Mix.png',
                './box/mix/21_Mix.png',
                './box/mix/22_Mix.png',
                './box/mix/23_Mix.png',
                './box/mix/24_Mix.png',
                './box/mix/25_Mix.png',
                './box/mix/27_Mix.png',
                './box/mix/30_Mix.png',
                './box/mix/34_Mix.png',
                './box/mix/35_Mix.png'
            ];

            let swapTopArray = [
                './box/mix/0_Top.png',
                './box/mix/1_Top.png',
                './box/mix/6_Top.png',
                './box/mix/15_Top.png',
                './box/mix/20_Top.png',
                './box/mix/21_Top.png',
                './box/mix/22_Top.png',
                './box/mix/23_Top.png',
                './box/mix/24_Top.png',
                './box/mix/25_Top.png',
                './box/mix/27_Top.png',
                './box/mix/30_Top.png',
                './box/mix/34_Top.png',
                './box/mix/35_Top.png'
            ];

            

            for (let i = 0; i < swapMixArray.length ; i++) {
                swapMix = new THREE.TextureLoader().load(swapMixArray[i]);
                swapMix.anisotropy = 4;
                swapMix.minFilter = THREE.LinearFilter;
                swapMix.magFilter = THREE.LinearFilter;

                swapTop = new THREE.TextureLoader().load(swapTopArray[i]);
                swapTop.anisotropy = 4;
                swapTop.minFilter = THREE.LinearFilter;
                swapTop.magFilter = THREE.LinearFilter;

                const material_swapMix = new THREE.MeshBasicMaterial({
                    map: swapMix,
                    transparent: true
                });

                const material_swapTop = new THREE.MeshBasicMaterial({
                    map: swapTop,
                    transparent: true
                });

                const materials = [];
    
                materials.push(material_swapMix);
                materials.push(material_swapMix);
                materials.push(material_swapTop);
                materials.push(material_swapTop);
                materials.push(material_swapMix);
                materials.push(material_swapMix);

                for (let k = 0; k < 15; k++) {
                    const mesh = new THREE.Mesh(geometryQQ, materials);
    
                    mesh.position.x = Math.random() * 900 - 450;
                    mesh.position.y = Math.random() * 900 - 450;
                    mesh.position.z = Math.random() * 900 - 450;
    
                    mesh.scale.setScalar(Math.random() * 1.2 + 1);
    
                    mesh.rotation.x = Math.random() * Math.PI;
                    mesh.rotation.y = Math.random() * Math.PI;
                    mesh.rotation.z = Math.random() * Math.PI;
    
                    groupQQ.add(mesh);
                }

            }

            sceneQQ.add(groupQQ);

            //



            //

            const renderPass = new RenderPass(sceneQQ, cameraQQ);
            renderPass.clearColor = new THREE.Color(0, 0, 0);
            renderPass.clearAlpha = 0;

            //

            fxaaPass = new ShaderPass(FXAAShader);

            //

            const pixelRatio = rendererQQ.getPixelRatio();

            fxaaPass.material.uniforms["resolution"].value.x =
                1 / (curtain.offsetWidth * pixelRatio);
            fxaaPass.material.uniforms["resolution"].value.y =
                1 / (curtain.offsetHeight * pixelRatio);

            composerQQ = new EffectComposer(rendererQQ);
            composerQQ.addPass(renderPass);
            composerQQ.addPass(fxaaPass);

            //

            window.addEventListener("resize", onWindowResizeQQ);
        }

        function onWindowResizeQQ() {
            cameraQQ.aspect = curtain.offsetWidth / curtain.offsetHeight;
            cameraQQ.updateProjectionMatrix();

            rendererQQ.setSize(curtain.offsetWidth, curtain.offsetHeight);

            composerQQ.setSize(
                curtain.offsetWidth,
                curtain.offsetHeight
            );

            const pixelRatio = rendererQQ.getPixelRatio();

            fxaaPass.material.uniforms["resolution"].value.x =
                1 / (curtain.offsetWidth * pixelRatio);
            fxaaPass.material.uniforms["resolution"].value.y =
                1 / (curtain.offsetHeight * pixelRatio);
        }

        function animateQQ() {
            requestAnimationFrame(animateQQ);

            groupQQ.rotation.y += clockQQ.getDelta() * 0.1;

            for (let i = 0 ; i < sceneQQ.children.length ; i++) {
                const child = sceneQQ.children[i];
                child.rotation.x += 0.005;
                child.rotation.y -= 0.005;
                child.rotation.z += 0.005;
            }
            composerQQ.render();
        }

        // const canvasQQ1 = document.querySelector('#QQCanvas1');
        //     const canvasQQ2 = document.querySelector('#QQCanvas2');
        //     const canvasQQ3 = document.querySelector('#QQCanvas3');
        //     const canvasQQ4 = document.querySelector('#QQCanvas4');
        //     const canvasQQ5 = document.querySelector('#QQCanvas5');
        //     const canvasQQ6 = document.querySelector('#QQCanvas6');
        //     const canvasQQ7 = document.querySelector('#QQCanvas7');
        //     const canvasQQ8 = document.querySelector('#QQCanvas8');

        //     canvasQQ1.width = canvasQQ1.height = size;
        //     canvasQQ2.width = canvasQQ2.height = size;
        //     canvasQQ3.width = canvasQQ3.height = size;
        //     canvasQQ4.width = canvasQQ4.height = size;
        //     canvasQQ5.width = canvasQQ5.height = size;
        //     canvasQQ6.width = canvasQQ6.height = size;
        //     canvasQQ7.width = canvasQQ7.height = size;
        //     canvasQQ8.width = canvasQQ8.height = size;

        //     let contextQQ1 = canvasQQ1.getContext("2d");
        //     let contextQQ2 = canvasQQ2.getContext("2d");
        //     let contextQQ3 = canvasQQ3.getContext("2d");
        //     let contextQQ4 = canvasQQ4.getContext("2d");
        //     let contextQQ5 = canvasQQ5.getContext("2d");
        //     let contextQQ6 = canvasQQ6.getContext("2d");
        //     let contextQQ7 = canvasQQ7.getContext("2d");
        //     let contextQQ8 = canvasQQ8.getContext("2d");

        //     contextQQ1.font = "900 54px 'Noto Sans TC', sans-serif";
        //     contextQQ2.font = "900 54px 'Noto Sans TC', sans-serif";
        //     contextQQ3.font = "900 54px 'Noto Sans TC', sans-serif";
        //     contextQQ4.font = "900 54px 'Noto Sans TC', sans-serif";
        //     contextQQ5.font = "900 54px 'Noto Sans TC', sans-serif";
        //     contextQQ6.font = "900 54px 'Noto Sans TC', sans-serif";
        //     contextQQ7.font = "900 54px 'Noto Sans TC', sans-serif";
        //     contextQQ8.font = "900 54px 'Noto Sans TC', sans-serif";

        //     contextQQ1.fillStyle = '#612680';
        //     contextQQ1.textAlign = "left";
        //     contextQQ1.textBaseline = "alphabetic";

        //     contextQQ2.fillStyle = '#ffc6d4';
        //     contextQQ2.textAlign = "left";
        //     contextQQ2.textBaseline = "alphabetic";

        //     contextQQ3.fillStyle = '#e8b387';
        //     contextQQ3.textAlign = "left";
        //     contextQQ3.textBaseline = "alphabetic";

        //     contextQQ4.fillStyle = '#0f1746';
        //     contextQQ4.textAlign = "left";
        //     contextQQ4.textBaseline = "alphabetic";

        //     contextQQ5.fillStyle = '#eeeeee';
        //     contextQQ5.textAlign = "left";
        //     contextQQ5.textBaseline = "alphabetic";

        //     contextQQ6.fillStyle = '#006251';
        //     contextQQ6.textAlign = "left";
        //     contextQQ6.textBaseline = "alphabetic";

        //     contextQQ7.fillStyle = '#fdd31b';
        //     contextQQ7.textAlign = "left";
        //     contextQQ7.textBaseline = "alphabetic";

        //     contextQQ8.fillStyle = '#139dbf';
        //     contextQQ8.textAlign = "left";
        //     contextQQ8.textBaseline = "alphabetic";

        //     let accountQQ1 = '@' + 'HappyCat1';
        //     let accountQQ2 = '@' + 'HappyCat2';
        //     let accountQQ3 = '@' + 'HappyCat3';
        //     let accountQQ4 = '@' + 'HappyCat4';
        //     let accountQQ5 = '@' + 'HappyCat5';
        //     let accountQQ6 = '@' + 'HappyCat6';
        //     let accountQQ7 = '@' + 'HappyCat7';
        //     let accountQQ8 = '@' + 'HappyCat8';

        //     let textQQ1 = '遇見你是我這一生中最美好的事！';
        //     let textQQ2 = '妳可知道妳的名字解釋了我的一生...';
        //     let textQQ3 = '讓我再嘗一口秋天的酒。';
        //     let textQQ4 = '你若對自己誠實，日積月累，就無法對別人不忠了。';
        //     let textQQ5 = '我們總是記得一些逼自己忘記的事...';
        //     let textQQ6 = '有你我很開心！';
        //     let textQQ7 = '下輩子也要當一個柔軟的人，簡稱軟軟人。';
        //     let textQQ8 = '我和你道歉，也和你道別，再和自己道謝。';

        //     wrapText(
        //         contextQQ1,
        //         textQQ1,
        //         x,
        //         y,
        //         accountQQ1,
        //         x2,
        //         y2,
        //         maxWidth,
        //         lineHeight
        //     );

        //     wrapText(
        //         contextQQ2,
        //         textQQ2,
        //         x,
        //         y,
        //         accountQQ2,
        //         x2,
        //         y2,
        //         maxWidth,
        //         lineHeight
        //     );

        //     wrapText(
        //         contextQQ3,
        //         textQQ3,
        //         x,
        //         y,
        //         accountQQ3,
        //         x2,
        //         y2,
        //         maxWidth,
        //         lineHeight
        //     );

        //     wrapText(
        //         contextQQ4,
        //         textQQ4,
        //         x,
        //         y,
        //         accountQQ4,
        //         x2,
        //         y2,
        //         maxWidth,
        //         lineHeight
        //     );

        //     wrapText(
        //         contextQQ5,
        //         textQQ5,
        //         x,
        //         y,
        //         accountQQ5,
        //         x2,
        //         y2,
        //         maxWidth,
        //         lineHeight
        //     );

        //     wrapText(
        //         contextQQ6,
        //         textQQ6,
        //         x,
        //         y,
        //         accountQQ6,
        //         x2,
        //         y2,
        //         maxWidth,
        //         lineHeight
        //     );

        //     wrapText(
        //         contextQQ7,
        //         textQQ7,
        //         x,
        //         y,
        //         accountQQ7,
        //         x2,
        //         y2,
        //         maxWidth,
        //         lineHeight
        //     );

        //     wrapText(
        //         contextQQ8,
        //         textQQ8,
        //         x,
        //         y,
        //         accountQQ8,
        //         x2,
        //         y2,
        //         maxWidth,
        //         lineHeight
        //     );

        //     let ctQQ1 = [
        //         "./box/2_a.png",
        //         "./box/2_b.png",
        //         "./box/2_c.png",
        //         "./box/2_t.png"
        //     ];

        //     let ctQQ2 = [
        //         "./box/3_a.png",
        //         "./box/3_b.png",
        //         "./box/3_c.png",
        //         "./box/3_t.png"
        //     ];

        //     let ctQQ3 = [
        //         "./box/4_a.png",
        //         "./box/4_b.png",
        //         "./box/4_c.png",
        //         "./box/4_t.png"
        //     ];

        //     let ctQQ4 = [
        //         "./box/5_a.png",
        //         "./box/5_b.png",
        //         "./box/5_c.png",
        //         "./box/5_t.png"
        //     ];

        //     let ctQQ5 = [
        //         "./box/7_a.png",
        //         "./box/7_b.png",
        //         "./box/7_c.png",
        //         "./box/7_t.png"
        //     ];

        //     let ctQQ6 = [
        //         "./box/9_a.png",
        //         "./box/9_b.png",
        //         "./box/9_c.png",
        //         "./box/9_t.png"
        //     ];

        //     let ctQQ7 = [
        //         "./box/10_a.png",
        //         "./box/10_b.png",
        //         "./box/10_c.png",
        //         "./box/10_t.png"
        //     ];

        //     let ctQQ8 = [
        //         "./box/11_a.png",
        //         "./box/11_b.png",
        //         "./box/11_c.png",
        //         "./box/11_t.png"
        //     ];

        const fetchPreviousCube = async () => {
            const fetchUrl = 'render-previous-cube-api.php';
            const r = await fetch(fetchUrl);
            const result = await r.json();
            console.log(result['cubeInstance']);
            previousCube = result['cubeInstance'];

            // await renderPreviousCube();

            // await renderCube();

            await changeText();

            const finale = document.createElement('div');


            setTimeout(() => {
                cubeCreateShadow.classList.add('cphidden');
            }, 4000);

            // setTimeout(() => {
            //     for (let i = 1; i < 5; i++) {
            //         const child = scene.children[i];
            //         // console.log(child);
            //         for (let k = 0; k <= 200; k++) {
            //             setTimeout(() => {
            //                 child.scale.set(0.5-0.0025 * k, 0.5-0.0025 * k,0.51-0.0025 * k);
            //             }, 10 * k);
            //         }
            //     }
            // cubeCreateShadow.classList.add('cphidden');
            // cubeCreateShadow.classList.add('cpvanish');
            // }, 6000);

            const completeYeah = document.createElement('div');
            const nowRein = document.createElement('div');

            // 給予材質
            setTimeout(() => {
                scene.children[4].material = materialsFinalBox;
                scene.children[4].material[2].opacity = 1;

                completeYeah.classList.add('complete-yeah');
                completeYeah.classList.add('cpemerge');
                completeYeah.classList.add('cphidden');
                completeYeah.innerHTML = 'NICE HOPE!';
                document.querySelector('body').appendChild(completeYeah);

                // for (let i = 1; i < 5; i++) {
                //     const child = scene.children[i];
                //     // console.log(child);
                //     for (let k = 0; k <= 200; k++) {
                //         setTimeout(() => {
                //             child.scale.set(0.5+0.0025 * k, 0.5+0.0025 * k,0.5+0.0025 * k);
                //         }, 10 * k);
                //     }
                // }
            }, 2000);

            setTimeout(() => {
                completeYeah.classList.remove('cphidden');
                completeYeah.classList.add('cpshown');
            }, 5000);

            setTimeout(() => {
                cubeCreateShadow.remove();
            }, 6000);

            setTimeout(() => {
                completeYeah.classList.remove('cpshown');
                completeYeah.classList.add('cphidden');

                for (let i = 1; i < 5; i++) {
                    const child = scene.children[i];
                    // console.log(child);
                    for (let k = 0; k <= 100; k++) {
                        setTimeout(() => {
                            child.scale.set(1 - 0.01 * k, 1 - 0.01 * k, 1 - 0.01 * k);
                        }, 10 * k);
                    }
                }

                nowRein.classList.add('now-rein');
                nowRein.classList.add('cpvanish');
                nowRein.innerHTML = '<p>你已經留下了你的遺言與企盼。<br />現在是時候投胎了。<br />但在那之前...</p>';
                document.querySelector('body').appendChild(nowRein);

            }, 8000);

            setTimeout(() => {
                completeYeah.remove();
                nowRein.classList.add('cpemerge');
                nowRein.classList.add('cphidden');
            }, 9000);

            setTimeout(() => {
                nowRein.classList.remove('cpvanish');
                nowRein.classList.remove('cphidden');
                nowRein.classList.add('cpshown');
                
            }, 10000);

            setTimeout(() => {
                nowRein.classList.remove('cpshown');
                nowRein.classList.add('cphidden');

            }, 12000);

            setTimeout(() => {
                initQQ();
                animateQQ();
            }, 14000);



            // await setTimeout(() => {
            //     for (let i = 0; i <= 100 ;  i++ ) {
            //         setTimeout(() => {
            //             scene.children[4].material[2].opacity = 0.01*i;
            //         }, 20*i);
            //     }
            // }, 1500);
        }

        const cubeCreate = async () => {
            const fetchUrl = 'cube-color-api.php' + '?cubeImgA=' + cubePatternArray[cubePatternIndex][0];
            const r = await fetch(fetchUrl);
            const result = await r.json();
            console.log(result);
            colorOne = result['cubeColors']['cube_color_1'];
            colorTwo = result['cubeColors']['cube_color_2'];
            // console.log(colorOne);
            // console.log(colorTwo);

            document.querySelector('.cubetext').classList.add('cphidden');
            document.querySelector('.cubetext-btn-area').classList.add('cphidden');
            document.querySelector('.cube-curtain').classList.add('cphidden');
            document.querySelector('.cube-btn-switch-area').classList.add('cphidden');
            document.querySelector('.cube-btn-switch-title').classList.add('cphidden');

            await cubeShrink();

            setTimeout(() => {
                cubeWaitingAnim();
            }, 1000);

            setTimeout(() => {
                cubeCreateShadow.style.width = '25%';
            }, 5000);

            await fetchPreviousCube();

        }

        const cubeCreateShadow = document.createElement('div');
        // const cubeCreateShadowChild = document.createElement('div');
        const body = document.querySelector('body');
        body.appendChild(cubeCreateShadow);
        cubeCreateShadow.style.width = '100%';
        cubeCreateShadow.classList.add('cube-create-shadow');
        cubeCreateShadow.classList.add('cphidden');
        cubeCreateShadow.classList.add('cpvanish');

        const cubeShrink = () => {
            cubeCreateShadow.classList.remove('cphidden');
            cubeCreateShadow.classList.remove('cpvanish');
            cubeCreateShadow.classList.add('cpemerge');
            cubeCreateShadow.classList.add('cpshown');

            // if (cubeStage === 2 ) {
            // for (let i = 1; i < 5; i++) {
            //     const child = scene.children[i];
            //     // console.log(child);
            //     for (let k = 0; k <= 200; k++) {
            //         setTimeout(() => {
            //             child.scale.set(1-0.0025 * k, 1-0.0025 * k, 1-0.0025 * k);
            //         }, 10 * k);
            //     }
            // }
            // }

            setTimeout(() => {
                dpu.remove();
                document.querySelector('.cubetext').remove();
                document.querySelector('.cubetext-btn-area').remove();
                document.querySelector('.navbar').remove();
                document.querySelector('.cube-curtain').remove();
                document.querySelector('.cube-btn-switch-area').remove();
                document.querySelector('.cube-btn-switch-title').remove();
            }, 1000);
        }

        // 用來代表方塊事件進程的變數
        let cubeStage = 0;

        const cubeStagePlusPlus = () => {
            ++cubeStage;
            console.log(cubeStage);
            cubeStageEventCheckDown();
        }
        const cubeStageMinusMinus = () => {
            --cubeStage;
            console.log(cubeStage);
            cubeStageEventCheckUp();
        }

        cbu.addEventListener('click', cubeStageMinusMinus, false);
        cbd.addEventListener('click', cubeStagePlusPlus, false);

        // 紀錄方塊文字是否存在的變數
        let cubeExist = false;

        const cubeStageEventCheckUp = () => {
            if (cubeStage == 0) {
                cbd.removeEventListener('click', cubeCreate, false);
                cbd.addEventListener('click', transClickC, false);
            }
        }

        const cubeStageEventCheckDown = () => {
            if (cubeStage == 1) {
                cbd.addEventListener('click', cubeCreate, false);
            }
        }

        // 用來代表方塊復甦與否的變數
        let cubeRevive = false;

        // 超過 30 字時用來鎖定的字串
        // let fixText;

        const cbdAbilityCheck = (e) => {
            e.preventDefault();

            // 加上 maxlength 屬性會自動幫忙去除 \n
            // 不過就先留著吧
            const checkText = cm.value.replace(/\n+/g, "");

            // 改用 maxlength 解決
            // if (checkText.length === 30) {
            //     fixText = checkText;
            //     console.log(fixText);
            // } else if (checkText.length > 30) {
            //     cm.value = fixText;
            //     console.log('NONONO');
            // }



            // 強迫置入 yee function

            yeeFunction();

            // yee function end

            // 強迫置入 qq function

            qqFunction();

            // qq function end



            if (checkText.length === 0) {
                if (!cm.getAttribute('disabled'))
                    cbd.classList.add('disabled');
            } else if (checkText.length >= 1) {
                cbd.classList.remove('disabled');
            }
        }

        let cubePatternArray = [];
        let cubeFontColor = [];

        let cubePatternIndex = 0;

        const shinderSwap = () => {
            // 讓文字層變透明
            scene.children[4].material[2].opacity = 0;

            let textureChange;
            let materialChange;
            let texturesChange = [];
            let texturesTextChange = [];
            let materialsChange = [];
            let materialsTextChange = [];

            for (let i = 0; i < cubePatternArray[cubePatternIndex].length; i++) {
                const ImgUrl = './box/' + cubePatternArray[cubePatternIndex][i] + '.png';

                textureChange = new THREE.TextureLoader().load(ImgUrl);
                textureChange.anisotropy = 4;
                textureChange.minFilter = THREE.LinearFilter;
                textureChange.magFilter = THREE.LinearFilter;
                texturesChange.push(textureChange);
            }
            // console.log(textures);

            for (let i = 0; i < texturesChange.length; i++) {
                materialChange = new THREE.MeshBasicMaterial({
                    map: texturesChange[i],
                    transparent: true
                });
                materialsChange.push(materialChange);
            }

            for (let i = 0; i < materialsChange.length - 1; i++) {
                let materialsBox = []
                materialsBox.push(materialsChange[i]);
                materialsBox.push(materialsChange[i]);
                materialsBox.push(materialsChange[materialsChange.length - 1]);
                materialsBox.push(materialsChange[materialsChange.length - 1]);
                materialsBox.push(materialsChange[i]);
                materialsBox.push(materialsChange[i]);
                // console.log(materialsBox);

                const child = scene.children[i + 1];
                child.material = materialsBox;
                // console.log(child);
            }
        }

        const cubeCurtain = document.createElement('div');
        const cubeBtnSwitchArea = document.createElement('div');
        const cubeBtnSwitchTitle = document.createElement('div');

        const cubeSwap = () => {
            cubePatternIndex++;
            if (cubePatternIndex > cubePatternArray.length - 1) {
                cubePatternIndex = 0;
            }

            console.log(cubePatternIndex);
            console.log(cubePatternArray[cubePatternIndex]);
            console.log(cubeFontColor[cubePatternIndex]);

            let textureChange;
            let materialChange;
            let texturesChange = [];
            let texturesTextChange = [];
            let materialsChange = [];
            let materialsTextChange = [];

            for (let i = 0; i < cubePatternArray[cubePatternIndex].length; i++) {
                const ImgUrl = './box/' + cubePatternArray[cubePatternIndex][i] + '.png';

                textureChange = new THREE.TextureLoader().load(ImgUrl);
                textureChange.anisotropy = 4;
                textureChange.minFilter = THREE.LinearFilter;
                textureChange.magFilter = THREE.LinearFilter;
                texturesChange.push(textureChange);
            }
            // console.log(textures);

            for (let i = 0; i < texturesChange.length; i++) {
                materialChange = new THREE.MeshBasicMaterial({
                    map: texturesChange[i],
                    transparent: true
                });
                materialsChange.push(materialChange);
            }

            for (let i = 0; i < materialsChange.length - 1; i++) {
                let materialsBox = []
                materialsBox.push(materialsChange[i]);
                materialsBox.push(materialsChange[i]);
                materialsBox.push(materialsChange[materialsChange.length - 1]);
                materialsBox.push(materialsChange[materialsChange.length - 1]);
                materialsBox.push(materialsChange[i]);
                materialsBox.push(materialsChange[i]);
                // console.log(materialsBox);

                const child = scene.children[i + 1];
                child.material = materialsBox;
                // console.log(child);
            }
        }

        const shinderRevive = () => {
            for (let i = 1; i < 5; i++) {
                const child = scene.children[i];
                // console.log(child);
                for (let k = 0; k <= 200; k++) {
                    setTimeout(() => {
                        child.scale.set(0.005 * k, 0.005 * k, 0.005 * k);
                    }, 10 * k);
                }
            }

            setTimeout(() => {
                cubeCurtain.classList.remove('cpshown');
                cubeCurtain.classList.add('cphidden');
                cubeBtnSwitchArea.classList.remove('cphidden');
                cubeBtnSwitchArea.classList.add('cpshown');
                cubeBtnSwitchTitle.classList.remove('cphidden');
                cubeBtnSwitchTitle.classList.add('cpshown');

                const cbs = document.querySelector('.cube-btn-switch');
                cbs.classList.remove('disabled');
                cbs.addEventListener('click', cubeSwap, false);
            }, 2000)
        }

        let shinderIntro = false;

        const cubeSelectIntro = async () => {
            shinderIntro = true;

            const fetchURL = 'cube-pattern.php';
            const r = await fetch(fetchURL);

            const result = await r.json();
            // console.log(result);
            // console.log(result.cubepatternrows.length);

            for (let row of result.cubepatternrows) {
                const rowPattern = [];
                rowPattern.push(row['cube_img_a']);
                rowPattern.push(row['cube_img_b']);
                rowPattern.push(row['cube_img_c']);
                rowPattern.push(row['cube_img_t']);

                cubePatternArray.push(rowPattern);
                cubeFontColor.push(row['cube_color_font']);
            }

            if (!cubeRevive) {
                await shinderSwap();

                const body = document.querySelector('body');
                cubeCurtain.classList.add('cube-curtain');
                cubeCurtain.classList.add('cube-curtain-zi');
                cubeCurtain.classList.add('cpshown');
                body.appendChild(cubeCurtain);

                cubeBtnSwitchArea.innerHTML =
                    `
                    <button 
                        type="button" 
                        class="btn btn-dark disabled cube-btn-switch"
                    >
                        <i class="fa-solid fa-arrows-rotate"></i>
                    </button>
                `;

                cubeBtnSwitchTitle.innerHTML =
                    `
                    <p>
                        請選擇您喜歡的方塊樣式
                    </p>
                `;

                cubeBtnSwitchArea.classList.add('cube-btn-switch-area');
                cubeBtnSwitchArea.classList.add('cphidden');
                cubeBtnSwitchArea.classList.add('cpemerge');
                body.appendChild(cubeBtnSwitchArea);

                cubeBtnSwitchTitle.classList.add('cube-btn-switch-title');
                cubeBtnSwitchTitle.classList.add('cphidden');
                cubeBtnSwitchTitle.classList.add('cpemerge');
                body.appendChild(cubeBtnSwitchTitle);

                await shinderRevive();

                cubeRevive = !cubeRevive;
            }

            // console.log(cubePatternArray);
            // console.log(cubeFontColor);

        }

        const transClickC = () => {
            ct.value = cm.value.replace(/\n+/g, "");
            ctbtn.click();
        }

        const backToCubeText = () => {
            const ctc = document.querySelector('.cubetext');

            ctc.classList.remove('ct-anim-up');
            ctc.classList.add('ct-anim-down');
            cbu.classList.add('disabled');
            cbu.removeEventListener('click', backToCubeText, false);
            setTimeout(() => {
                ctc.classList.remove('cp-slidezi');
                cbd.classList.remove('disabled');
            }, 2000);

        }

        const cubeExistCheck = () => {
            if (cubeTextLastWord !== '') {
                cubeExist = true;
            }
        }

        const sendCubeText = async () => {
            const fd = new FormData(document.formCubeText);
            const fetchURL = 'cube-api.php';
            const r = await fetch(fetchURL, {
                method: 'post',
                body: fd
            });

            const result = await r.json();
            // console.log(result);
            // console.log(result['cubeText']);

            if (result['cubeText'] === '') {
                result['cubeText'] = cubeTextLastWord;
            } else {
                cubeTextLastWord = result['cubeText'];
            }

            cubeExistCheck();

            // console.log(cubeExist);
            console.log(cubeTextLastWord);

            const ctc = document.querySelector('.cubetext');

            ctc.classList.add('cp-slidezi');

            if (ctc.classList.contains('ct-anim-down')) {
                ctc.classList.remove('ct-anim-down');
            }

            ctc.classList.add('ct-anim-up');
            cbd.classList.add('disabled');
            cbu.classList.add('disabled');


            setTimeout(() => {
                cbu.addEventListener('click', backToCubeText, false);

                if (shinderIntro == false) {
                    cubeSelectIntro();
                    setTimeout(() => {
                        cbd.classList.remove('disabled');
                        cbu.classList.remove('disabled');
                    }, 5000)
                } else if (cubeExist && cubeStage == 1) {
                    cbd.classList.remove('disabled');
                    cbu.classList.remove('disabled');
                }

                cbd.removeEventListener('click', transClickC, false);
            }, 2000);

        }

        // onkeyup 按鍵離手時觸發
        cm.addEventListener('keyup', cbdAbilityCheck, false);

        // 要根據 cubeStage 來決定要給這個按鈕什麼 function
        cbd.addEventListener('click', transClickC, false);
        ctbtn.addEventListener('click', sendCubeText, false);
    </script>

    <script>
        // 流程

        // 點擊確認 (clear)
        // 選擇轉生形象 
        // 選擇音樂 (clear)
        // 播放音樂 (clear)
        // 解說方塊意味
        // 輸入方塊文本
        // 選擇方塊外觀
        // 等待動畫
        // 方塊生成
        // 慢走

        // 流程結束

        const dpu = document.querySelector('.dead-popup');
        const dpuc = document.querySelector('.dead-popup-check');
        const chbtn = document.querySelector('#checkBtn');
        const msbi = document.querySelector('#music');
        const msbtn = document.querySelector('#musicSelectBtn');
        const pms = document.querySelector('.popup-music-selection');
        const pmsq = document.querySelector('.pms_question');
        const pmsb = document.querySelector('.pms_button');

        // 音樂是否存在
        let soundExist = false;

        // 印出東西用的變數
        let dataCP;

        setTimeout(() => {
            dpu.classList.add('is-active');
            dpuc.classList.add('is-active');
        }, 500);

        const transClick = () => {
            chbtn.click();
        }

        const reincarnationStart = async () => {
            dpuc.classList.remove('is-active');
            // dpuc.classList.add('is-hidden');
            dpuc.classList.add('is-hidden');
            await setTimeout(() => {
                dpuc.remove();
            }, 500);
            // dpu.remove();

            // await fetch('paycheck-api.php')
            //     .then()

            // fetchMusic

            await fetchMusic();
            await pms.classList.add('pms-anim-s');
        }

        // fetchMusic

        const fetchMusic = async () => {
            document.formMusic.musicExist.value = soundExist;
            const fd = new FormData(document.formMusic);
            const fetchURL = 'rein-music-api.php';
            const r = await fetch(fetchURL, {
                method: 'post',
                body: fd
            });
            const result = await r.json();
            // console.log(result);

            // 這裡網址列不用 pushState()
            await fetchData(result);
            await setTimeout(renderMusicBtn, 500);
        }

        const fetchData = (obj) => {
            dataCP = obj;
            // console.log(dataCP);
        }

        const renderMusicBtn = () => {
            let html = '';
            renderMusicQuestion();
            if (dataCP.musicrows && dataCP.musicrows.length) {
                // console.log(dataCP);
                // console.log(dataCP.musicrows);
                html = dataCP.musicrows.map((r) => renderMusicBtnHTML(r)).join('');
            }
            pmsb.innerHTML = html;
        }

        const renderMusicQuestion = () => {
            let html = '請問您此刻的心情是...？';
            pmsq.innerHTML = html;
        }

        const renderMusicBtnHTML = ({
            music_type_en,
            music_type_ch
        }) => {
            return `
            <button 
                type="button" 
                class="btn btn-dark"
                onclick="transClickM(event)"
                data-mt="${music_type_en}">
                ${music_type_ch}
            </button>
        `;
        }

        const transClickM = (e) => {
            // console.log(e.currentTarget.getAttribute('data-mt'));
            msbi.value = e.currentTarget.getAttribute('data-mt');
            msbtn.click();
        }
    </script>

<?php

    // 有登入卻沒有往生 甚麼事都不用做

    // 以下只是單純的註解 沒有功能也不需要這樣
    // 因為這樣會無限跳轉回首頁
    // 還沒往生就回去來的地方 預設為首頁
    // } else {
    //     $comeFrom = 'intro.php';
    //     if (! empty($_SERVER['HTTP_REFERER'])) {
    //         $comeFrom = $_SERVER['HTTP_REFERER'];
    //     }
    //     header("Location: $comeFrom");

} ?>
<?php include __DIR__ . "/parts/html-head.php" ?>
<?php include __DIR__ . "/parts/navbar.php" ?>
<?php include __DIR__ . "/parts/scripts.php" ?>
<?php include __DIR__ . "/parts/html-foot.php" ?>
<?php exit; ?>