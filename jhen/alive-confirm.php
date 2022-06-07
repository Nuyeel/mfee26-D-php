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

<?php if ( $_SESSION['member'] and $_SESSION['member']['deathdate'] ) { ?>

<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@700;900&display=swap"
    rel="stylesheet"
/>
<link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700;900&display=swap"
    rel="stylesheet"
/>
<style type="text/css">
    #container {
        position: absolute;
        width: 100%;
        top: 0px;
        height: 100%;
        z-index: -10;
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
    }

    .dead-popup-check {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-size: 48px;
        transition: 0.5s;
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

    .popup-music-selection div {
        position: relative;
        top: 8px;
    }

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
</style>

<canvas id="myCanvas"></canvas>
<div id="container"></div>

<div class="curtain">
    用來防止使用者做任何互動
</div>

<div class="dead-popup">
    <div class="dead-popup-check">
        <p>看樣子您走完了一生...</p>
        <br />
        <form 
            name="formReincarnation" 
            action="paycheck-api.php"
            method="post"
            style="display: none"
            onsubmit="return false;"    
        >
            <?php
                // 只傳 sid 太不安全了
                // 隨便就會被破解的
                // 多傳一個欄位
                // 現在還不知道會員資料長怎樣
                // 先假設送的是帳號
                // 兩個都要配到就沒有那麼容易破解了
            ?>
            <input type="hidden" name="check[]" value="<?= $_SESSION['member']['sid'] ?>"/>
            <input type="hidden" name="check[]" value="<?= $_SESSION['member']['account'] ?>"/>
            <button type="submit" id="checkBtn" style="display:none" onclick="reincarnationStart()"></button>
        </form>
        <button type="button" class="btn btn-primary" onclick="transClick()">開始轉生之旅</button>
    </div>

    <div class="popup-music-selection">
        <form
            name="formMusic"
            action="rein-music-api.php"
            method="post"
            style="display: none"
            onsubmit="return false;"
        >
            <input type="hidden" name="musicExist" value="" />
            <button type="submit" id="musicBtn" style="display:none"></button>
        </form>
        <form
            name="formMusicSelect"
            action="render-music-api.php"
            method="post"
            style="display: none"
            onsubmit="return false;"
        >
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

<script
    async
    src="https://unpkg.com/es-module-shims@1.3.6/dist/es-module-shims.js"
></script>

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

    import { EffectComposer } from "../jsm/postprocessing/EffectComposer.js";
    import { RenderPass } from "../jsm/postprocessing/RenderPass.js";
    import { SMAAPass } from "../jsm/postprocessing/SMAAPass.js";

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

        renderer.setClearColor( 0xe8ecf1, 1 ); // the default

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
        scene.add( dirLight );

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

        for (let i = 0; i< cta.length; i++) {
            texture = new THREE.TextureLoader().load(cta[i]);
            texture.anisotropy = 4;
            // texture.minFilter = THREE.NearestFilter;
            texture.minFilter = THREE.LinearFilter;
            texture.magFilter = THREE.LinearFilter;
            textures.push(texture);
        }
        // console.log(textures);

        for (let i = 0; i< textures.length; i++) {
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

        for (let i = 0; i< texturesText.length; i++) {
            material = new THREE.MeshBasicMaterial({
                map: texturesText[i],
                transparent: true
            });
            materialsText.push(material);
            
        }
        // console.log(materialsText);
                
        for (let i = 0; i< materials.length-1; i++) {
            let materialsBox = []
            materialsBox.push(materials[i]);
            materialsBox.push(materials[i]);
            materialsBox.push(materials[materials.length-1]);
            materialsBox.push(materials[materials.length-1]);
            materialsBox.push(materials[i]);
            materialsBox.push(materials[i]);

            let mesh = new THREE.Mesh(geometry, materialsBox);
            scene.add(mesh);
        }

        for (let i = 0; i< materialsText.length-1; i++) {
            let materialsBox = []
            materialsBox.push(materialsText[materialsText.length-1]);
            materialsBox.push(materialsText[materialsText.length-1]);
            materialsBox.push(materialsText[0]);
            materialsBox.push(materialsText[0]);
            materialsBox.push(materialsText[materialsText.length-1]);
            materialsBox.push(materialsText[materialsText.length-1]);

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
        const r = await fetch(fetchURL,
        { 
            method: 'post',
            body: fd
        }
        );

        await setTimeout(() => 
            { pms.remove(); }
        , 500);
        
        const result = await r.json();
        // console.log(result);
        // console.log(result.musicname['cube_music_name']);
        
        await setPlayer(result);
    }

    msbtn.addEventListener('click', musicRender, false);

    // add a music player

    const setPlayer = (result) => {

    let musicPlaying = false;

    // 重複 等一下換掉
    // const music = document.querySelector("#music");

    // console.log("start");

    // create an AudioListener and add it to the camera
    const listener = new THREE.AudioListener();
    camera.add(listener);

    // create a global audio source
    const sound = new THREE.Audio(listener);
    if (! soundExist) {
        soundExist = !soundExist;
    }

    // load a sound and set it as the Audio object's buffer
    const audioLoader = new THREE.AudioLoader();

    const musicChoice = '../music/' + result.musicname['cube_music_name'];

    audioLoader.load(musicChoice, function (buffer) {
        sound.setBuffer(buffer);
        sound.setLoop(true);
        sound.setVolume(0.25);
        sound.play();

        console.log("add a player");
        const dpu = document.querySelector('.dead-popup');
        dpu.classList.add('is-hidden');
    });

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
    }

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

    setTimeout(()=>{
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
        const r = await fetch(fetchURL,
            { 
                method: 'post',
                body: fd
            }
        );
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
    }
    ) => {
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