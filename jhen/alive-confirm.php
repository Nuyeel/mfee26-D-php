<?php

// 先塞資料驗證

// $_SESSION = [
//     'member' => [
//         'sid' => 605,
//         'name' => '獨行俠',
//         'deathdate' => NULL
//     ], 
// ];

// 葉宥廷
$_SESSION['member']['sid'] = 11;
$_SESSION['member']['deathdate'] = '2022-06-06';
// $_SESSION['member']['account'] = 'HappyCat03';

// 陳怡雯
// $_SESSION['member']['sid'] = 12; 
// $_SESSION['member']['deathdate'] = NULL; 

?>

<?php



?>

<?php
// header('Location: intro.php'); 
// 沒有 ['member'] 就不會有 ['deathdate']
// 登入後才檢查 沒登入不檢查 兩個都要 check
?>

<?php if ($_SESSION['member'] and $_SESSION['member']['deathdate']) { ?>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;500;700;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700;900&display=swap" rel="stylesheet" />
    <style type="text/css">
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
            z-index: 500;
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
            height: calc(100% - 56px);
            top: 56px;
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
            height: calc(100% - 56px);
            top: 56px;
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
            /* z-index: 10000 !important; */
            /* opacity: 1 !important; */
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
            top: 220px;
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
        
        .cubetext-btn-area button + button {
            margin-left: 6px;
            /* margin-right: 12px; */
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

        .ct-anim-down{
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
    </style>

    <canvas id="myCanvas"></canvas>
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
            <button type="button" class="btn btn-primary" onclick="transClick()">開始轉生之旅</button>
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
        <img src="../Portrait/Dizzy.png" alt="" class="ginie-dizzy">
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
            "three": "../build/three.module.js"
        }
    }
</script>

    <script type="module">
        import * as THREE from "three";

        import Stats from "../jsm/libs/stats.module.js";

        import {
            EffectComposer
        } from "../jsm/postprocessing/EffectComposer.js";
        import {
            RenderPass
        } from "../jsm/postprocessing/RenderPass.js";
        import {
            SMAAPass
        } from "../jsm/postprocessing/SMAAPass.js";

        const width = 512;
        const height = 512;
        // 和下面的 context.scale() 連動
        // 畫更大的圖再縮放回來
        const size = 512 * 32;

        // cube font color
        // let cfc1 = '#ffffff';
        // let cfc2 = '#ffffff';
        let cfcf = '#ed1848';

        // cube texture array
        // let cta = [
        //     "../box/1_a.png",
        //     "../box/1_b.png",
        //     "../box/1_t.png"
        // ];
        let cta = [
            "../box/37_a.png",
            "../box/37_b.png",
            "../box/37_c.png",
            "../box/37_t.png"
        ];
        // let cta = [
        //     "../box/37_a.png",
        //     "../box/37_b.png",
        //     "../box/37_c.png",
        //     "../box/37_d.png",
        //     "../box/37_t.png"
        // ];
        // let cta = [
        //     "../box/0_a.png",
        //     "../box/0_t.png"
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

            context.scale(32, 32);

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
            context.font = "italic 900 32px 'Noto Sans TC', sans-serif";
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

        //

        let camera, scene, renderer, composer, stats;

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

            stats = new Stats();
            container.appendChild(stats.dom);

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
            // console.log(textures);

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
                texture = new THREE.TextureLoader().load("../box/n_tr.png");
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

            stats.begin();

            camera.position.y =
                400 *
                Math.sin((mouseY - camera.position.y) * 0.00035 + 1);
            camera.position.z =
                400 *
                Math.cos((mouseY - camera.position.y) * 0.00035 + 1);
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

            stats.end();
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

            const musicChoice = '../music/' + result.musicname['cube_music_name'];

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
            for (let i = 1; i < scene.children.length; i++) {
                const child = scene.children[i];
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
        

        // 用來代表方塊事件進程的變數
        let cubeStage = 0;
        
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

            if (checkText.length === 0) {
                if (! cm.getAttribute('disabled'))
                cbd.classList.add('disabled');
            } else if (checkText.length >= 1) {
                cbd.classList.remove('disabled');
            }
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
            }
            ,2000);
            
        }
        
        const sendCubeText = async () => {
            const fd = new FormData(document.formCubeText);
            const fetchURL = 'cube-api.php';
            const r = await fetch(fetchURL, {
                method: 'post',
                body: fd
            });

            const result = await r.json();
            console.log(result);
            // console.log(result.musicname['cube_music_name']);

            const ctc = document.querySelector('.cubetext');


            ctc.classList.add('cp-slidezi');
            if (ctc.classList.contains('ct-anim-down')) {
                ctc.classList.remove('ct-anim-down');
            }
            ctc.classList.add('ct-anim-up');   
            cbd.classList.add('disabled');
            cubeStage++;
            setTimeout(() => {
                cbu.classList.remove('disabled');
                cbu.addEventListener('click', backToCubeText, false);
            }
            ,2000);
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
        let data;

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
            data = obj;
            // console.log(data);
        }

        const renderMusicBtn = () => {
            let html = '';
            renderMusicQuestion();
            if (data.musicrows && data.musicrows.length) {
                // console.log(data);
                // console.log(data.musicrows);
                html = data.musicrows.map((r) => renderMusicBtnHTML(r)).join('');
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