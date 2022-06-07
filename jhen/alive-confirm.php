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
        width: max-content;
        height: max-content;
        font-size: 48px;
        text-align: center;
        transition: 0.5s;
    }

    .dead-popup-check p {
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

    
</style>

<div class="curtain">
    用來防止使用者做任何互動
</div>

<div class="dead-popup">
    <div class="dead-popup-check">
        <p>看樣子您走完了一生...</p>
        <br />
        <button type="button" class="btn btn-primary" onclick="reincarnationStart()">開始轉生之旅</button>
    </div>
    <div class="dpup">
        <p>請選擇您最終的轉生形象</p>
    </div>

</div>



<script>
    const dpu = document.querySelector('.dead-popup');
    const dpuc = document.querySelector('.dead-popup-check');
    const dpup = document.querySelector('.dead-popup-pay');


    setTimeout(()=>{
        dpu.classList.add('is-active');
        dpuc.classList.add('is-active');
    }, 500);

    const reincarnationStart = async () => {
        dpuc.classList.remove('is-active');
        // dpuc.classList.add('is-hidden');
        dpuc.classList.add('is-hidden');
        await setTimeout(() => {
            // dpuc.remove();
            dpuc.remove();
        }, 500);
        // dpu.remove();


        // await setTimeout(() => {
        //     ms.classList.add()
        // }, 500);

        // fetch("reincarnation-music.php")
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