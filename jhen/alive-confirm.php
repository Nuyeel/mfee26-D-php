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
    // header('Location: intro.php'); 
?>
<?php if ( $_SESSION['member']['deathdate'] ) { ?>
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
    body {
        background-color: #f00;
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
        z-index: -1000;
        opacity: 0;
        transition: 0.5s;
        background-color: #000a;
        color: #fff;
    }

    .dead-popup-inner {
        width: max-content;
        height: max-content;
        font-size: 48px;
        text-align: center;
        transition: 0.5s;
    }

    .dead-popup-inner p {
        margin-bottom: -40px;
    }

    .is-active {
        opacity: 1;
        z-index: 1000;
    }
    .is-hidden {
        opacity: 0;
        z-index: -1000;
    }

    #navbar {
        position: absolute;
        width: 100%;
        background-color: #666;
        color: #fff;
        text-align: center;
        height: 56px;
        line-height: 56px;
        top: 56px;
        z-index: 10000;
    }

    #music {
        position: absolute;
        right: 20px;
        top: 0;
        color: #66f;
        cursor: pointer;
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

    .music-selection {
        position: fixed;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: calc(100% - 56px);
        top: 56px;
        opacity: 0;
        z-index: -1000;
    }

    .music-selection .music-type-question {
        font-size: 48px;
    }

    .music-selection .music-type-choice button {
        border-radius: 50%;
        width: 100px;
        height: 100px;
        margin: 20px;
    }
</style>
<div class="dead-popup">
    <div class="dead-popup-inner">
        <p>看樣子您走完了一生...</p>
        <br />
        <button type="button" class="btn btn-primary" onclick="reincarnationStart()">開始轉生之旅</button>
    </div>
</div>
<div class="music-selection">
    <div class="music-type-question">
        <p>請問您此刻的心情是？</p>
    </div>
    <div class="music-type-choice">
        <button type="button" class="btn btn-dark">圓滿</button>
        <button type="button" class="btn btn-dark">沉思</button>
        <button type="button" class="btn btn-dark">惆悵</button>
    </div>
</div>
<canvas id="myCanvas"></canvas>
<div id="navbar">
    NAVBAR
    <div id="music">PLAY/PAUSE</div>
</div>
<div id="container"></div>

<script>
    const dpu = document.querySelector('.dead-popup');
    const dpui = document.querySelector('.dead-popup-inner');
    const ms = document.querySelector('.music-selection');


    setTimeout(()=>{dpu.classList.add('is-active');}, 500)
    // setTimeout(()=>{dpu.classList.add('is-active');}, 1000)

    // dpu.classList.add('is-active');

    const reincarnationStart = async () => {
        dpu.classList.remove('is-active');
        // dpui.classList.add('is-hidden');
        dpu.classList.add('is-hidden');
        await setTimeout(() => {
            // dpui.remove();
            dpu.remove();
        }, 500);
        // dpu.remove();
        await setTimeout(() => {
            ms.classList.add()
        }, 500);

        // fetch("reincarnation-music.php")
    }
</script>

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

    //

    // Ref: http://www.html5canvastutorials.com/tutorials/html5-canvas-wrap-text-tutorial/

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
    // let cta = [
    //     "../box/22_a.png",
    //     "../box/22_b.png",
    //     "../box/22_c.png",
    //     "../box/22_t.png"
    // ];
    let cta = [
        "../box/37_a.png",
        "../box/37_b.png",
        "../box/37_c.png",
        "../box/37_d.png",
        "../box/37_t.png"
    ];
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

        console.log(texturesText);

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


        // const texture = new THREE.TextureLoader().load(
        //     "../box/0_a.png"
        // );

        // texture.anisotropy = 4;
        // // texture.minFilter = THREE.NearestFilter;
        // texture.minFilter = THREE.LinearFilter;
        // texture.magFilter = THREE.LinearFilter;

        // const textureMix = new THREE.TextureLoader().load(
        //     "../box/0_b.png"
        // );

        // textureMix.anisotropy = 4;
        // textureMix.minFilter = THREE.LinearFilter;
        // textureMix.magFilter = THREE.LinearFilter;

        // const textureTop = new THREE.TextureLoader().load(
        //     "../box/0_t.png"
        // );

        // textureTop.anisotropy = 4;
        // textureTop.minFilter = THREE.LinearFilter;
        // textureTop.magFilter = THREE.LinearFilter;

        // const textureText = new THREE.CanvasTexture(canvas);

        // // textureText.repeat.set(4, 4);

        // textureText.anisotropy = 4;
        // textureText.minFilter = THREE.LinearFilter;
        // textureText.magFilter = THREE.LinearFilter;

        // const textureTransparent = new THREE.TextureLoader().load(
        //     "../box/n_tr.png"
        // );

        // const material = new THREE.MeshBasicMaterial({
        //     map: texture,
        // });

        // const materialMix = new THREE.MeshBasicMaterial({
        //     map: textureMix,
        //     transparent: true,
        // });

        // const materialText = new THREE.MeshBasicMaterial({
        //     map: textureText,
        //     transparent: true,
        // });

        // const materialTop = new THREE.MeshBasicMaterial({
        //     map: textureTop,
        // });
        // const materialTop = new THREE.MeshPhongMaterial({
        //     map: textureTop,
        // });

        // const materialTransparent = new THREE.MeshBasicMaterial({
        //     map: textureTransparent,
        //     transparent: true,
        // });

        // let materialsBottom = [];
        // materialsBottom.push(material);
        // materialsBottom.push(material);
        // materialsBottom.push(materialTop);
        // materialsBottom.push(materialTop);
        // materialsBottom.push(material);
        // materialsBottom.push(material);

        // let materialsTop = [];
        // materialsTop.push(materialMix);
        // materialsTop.push(materialMix);
        // materialsTop.push(materialTop);
        // materialsTop.push(materialTop);
        // materialsTop.push(materialMix);
        // materialsTop.push(materialMix);

        // let materialsText = [];
        // materialsText.push(materialTransparent);
        // materialsText.push(materialTransparent);
        // materialsText.push(materialText);
        // materialsText.push(materialText);
        // materialsText.push(materialTransparent);
        // materialsText.push(materialTransparent);

        // const mesh = new THREE.Mesh(geometry, materialsBottom);
        // mesh.position.x = -100;
        // mesh.position.y = -100;

        // const meshMix = new THREE.Mesh(geometry, materialsTop);
        // meshMix.position.x = 100;
        // meshMix.position.y = -100;
        
        // const meshText = new THREE.Mesh(geometry, materialsText);
        // meshText.position.x = 0;
        // meshText.position.y = 100;

        // scene.add(mesh);
        // scene.add(meshMix);
        // scene.add(meshText);


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
        // camera.position.y = 100 * Math.sin((mouseY - camera.position.y) * 0.001);
        camera.position.z =
            400 *
            Math.cos((mouseY - camera.position.y) * 0.00035 + 1);
        // camera.position.z = 100 * Math.cos((mouseY - camera.position.y) * 0.001);
        camera.lookAt(0, 0, 0);

        for (let i = 0; i < scene.children.length; i++) {
            const child = scene.children[i];

            child.rotation.y += 0.005;
        }

        composer.render(scene, camera);

        stats.end();
    }

    document.addEventListener("mousemove", onDocumentMouseMove);

    // add a music player

    let musicPlaying = false;

    const music = document.querySelector("#music");

    // console.log("start");

    // create an AudioListener and add it to the camera
    const listener = new THREE.AudioListener();
    camera.add(listener);

    // create a global audio source
    const sound = new THREE.Audio(listener);

    // load a sound and set it as the Audio object's buffer
    const audioLoader = new THREE.AudioLoader();
    // audioLoader.load("./music/synthetic.mp3", function (buffer) {
    audioLoader.load("../music/discovery.mp3", function (buffer) {
        sound.setBuffer(buffer);
        sound.setLoop(true);
        sound.setVolume(0.25);

        // console.log("add a player");
    });

    // console.log("end");

    function musicPlay() {
        if (!musicPlaying) {
            sound.play();
            musicPlaying = !musicPlaying;
            console.log("play");
        } else {
            sound.pause();
            musicPlaying = !musicPlaying;
            console.log("pause");
        }
    }

    music.addEventListener("click", musicPlay);
    music.addEventListener("touch", musicPlay);
</script>

<?php } ?>