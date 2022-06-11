<?php
if (!isset($pageName)) {
    $pageName = '';
}
?>

<style type="text/css">
    .navbar {
        padding-left: calc(20vw - 70px);
        padding-right: calc(20vw - 70px);
    }

    .navbar .navbar-nav .nav-link {
        font-weight: 800;
        padding-left: 20px;
        margin-top: 8px;
    }

    @media screen and (min-width: 992px) {
        .navbar .navbar-nav .nav-link {
            padding-left: 8px;
            margin-top: 0;
        }
    }



    <?php
    // 現在分頁的 navbar 顏色
    // 一般來說可以不用設定 不需要 active 變色
    // 記得下面的 active 也都可以不用設置
    ?>.navbar .navbar-nav .nav-link.active {
        background-color: #33A5DB;
        color: white;
        border-radius: 5px;
    }

    .nav-bg {
        background-color: #266aaa;
    }


    a.main-nav-link {
        color: #fff;
        font-size: 18px;
        margin-left: 10px;
        transition: .2s;
    }

    a.main-nav-link:hover,
    .navbar .navbar-nav .main-nav-link.active {
        color: #ebd367;
        background-color: rgba(0, 0, 0, 0);
    }

    .navbar-icon>a+a {
        padding-left: 1px;
    }

    @media screen and (min-width: 992px) {
        .navbar-icon>a+a {
            padding-left: 10px;
        }
    }


    .navbar-lefticons {
        color: #fff;
        font-size: 20px;
        margin-right: 5px;
        transition: .5s;
    }

    .navbar-lefticons:hover,
    .navbar-lefticons.active {
        color: #ebd367;
    }

    .admin-menu {
        background-color: #fff;
        border-radius: 10px;
        padding: 2px;
        margin: 0 18px;
    }

    .admin-menu:hover {
        background-color: #ccc;
    }

    #adminTitle {
        color: #266aaa;
    }

    .logInOut {
        color: #fff;
        text-decoration: none;
        font-size: 17px;
        font-weight: bold;
    }

    .logInOut:hover,
    .logInOut.active {
        color: #50bcae;
    }
</style>

<nav class="navbar navbar-expand-lg -navbar-light -bg-light nav-bg py-0 px-5" style="height: 85px;">
    <div class="container-fluid">



        <?php
        // a.navbar-brand 中一般都是放商標圖片
        // 目前使用文字是權宜之計
        ?>



        <!-- <a class="navbar-brand" href="/mfee26-D-php/proj/index/mapdrag.html">濟善救世公司</a> -->
        <a class="navbar-brand" href="/mfee26-D-php/proj/index/mapdrag.html">
            <div class="d-flex align-items-center justify-content-center">
                <img src="../index/map.img/LOGO.svg" alt="" style="height: 75px;" />
                <img src="../index/map.img/TITLE2.svg" alt="" style="height: 30px;" />
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse align-items-end" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link main-nav-link pb-0 <?= $pageName == 'news_index' ? 'active' : '' ?>" href="/mfee26-D-php/proj/news_index.php">最新消息</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link main-nav-link pb-0 <?= $pageName == 'avatar' ? 'active' : '' ?>" href="/mfee26-D-php/proj/avatar.php">轉生形象</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link main-nav-link pb-0 <?= $pageName == 'place' ? 'active' : '' ?>" href="/mfee26-D-php/proj/place.php">良辰吉地</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link main-nav-link pb-0 <?= $pageName == 'npo-list' ? 'active' : '' ?>" href="/mfee26-D-php/proj/xuan-event-manage/npo-list.php">Activity</a>
                </li>
                <!-- 設定管理者登入才會出現? -->
                <?php if (isset($_SESSION['member']['account']) and $_SESSION['member']['account'] == 'Admin') { ?>
                    <li class="nav-item dropdown admin-menu">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" id="adminTitle">管理頁面</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/mfee26-D-php/proj/news_add.php">最新消息-新增</a></li>
                            <li><a class="dropdown-item" href="/mfee26-D-php/proj/news_list.php">最新消息-管理</a></li>
                            <li><a class="dropdown-item" href="/mfee26-D-php/proj/reborn-admin.php">轉生形象</a></li>
                            <li><a class="dropdown-item" href="/mfee26-D-php/proj/place-admin.php">良辰吉地-管理</a></li>
                            <li><a class="dropdown-item" href="/mfee26-D-php/proj/xuan-event-manage/npo-act-add.php">活動-新增</a></li>
                            <li><a class="dropdown-item" href="/mfee26-D-php/proj/xuan-event-manage/event-manage.php">活動-管理</a></li>
                            <li><a class="dropdown-item" href="/mfee26-D-php/proj/xuan-npo-manage/npo-add.php">NPO-新增</a></li>
                            <li><a class="dropdown-item" href="/mfee26-D-php/proj/xuan-npo-manage/npo-manage.php">NPO-管理</a></li>
                            <li><a class="dropdown-item" href="/mfee26-D-php/proj/ab-list.php">會員-管理</a></li>
                            <li><a class="dropdown-item" href="/mfee26-D-php/proj/test_record_list.php">陰德值測驗-管理</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav navbar-icon mb-2 mb-lg-0">

                <!-- 購物車數量 -->
                <!-- <div id="cart_amount" style="width:20px;height:20px;border-radius:50%;background-color:white;margin-right:10px;text-align:center;font-weight:bold"></div> -->

                <a href="/mfee26-D-php/proj/xuan-event-manage/cart-list.php" class="zx-cart-parent">
                    <i class="fa-solid fa-cart-shopping navbar-lefticons"></i>
                </a>
                
                <a href="../ab-profile.php" title="會員中心">
                    <!-- 要放登入頁面還是會員中心? -->
                    <!-- 應該釋放會員中心連結, profile頁面加驗證, 如果沒登入就導登入頁? -->
                    <i class="fa-solid fa-circle-user navbar-lefticons <?= $pageName == 'ab-profile' ? 'active' : '' ?>"></i>
                </a>

                <a href="<?= (isset($_SESSION['member']['account'])) ? "../ab-logout.php" : "../ab-login.php" ?>" class="logInOut <?= $pageName == 'ab-login' ? 'active' : '' ?>">
                    <?= (isset($_SESSION['member']['account'])) ? "登出" : "登入|註冊" ?>

                </a>
            </ul>
        </div>
    </div>
</nav>