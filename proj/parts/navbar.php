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

    .navbar-icon>a+a {
        padding-left: 1px;
    }

    @media screen and (min-width: 992px) {
        .navbar-icon>a+a {
            padding-left: 10px;
        }
    }


    .navbar-lefticons {
        color: #33A5DB;
        font-size: 20px;
        margin-right: 5px;
        transition: .5s;
    }

    .navbar-lefticons:hover {
        color: #226787;
    }

    #adminTitle {
        color: red;
    }

    .logInOut {
        color: #777;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
    }

    .logInOut:hover {
        color: #226787;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid py-2">



        <?php
        // a.navbar-brand 中一般都是放商標圖片
        // 目前使用文字是權宜之計
        ?>



        <a class="navbar-brand" href="/mfee26-D-php/proj/index/mapdrag.html">濟善救世公司</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == 'intro' ? 'active' : '' ?>" href="intro.php">Intro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == 'news' ? 'active' : '' ?>" href="news_index.php">最新消息</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == 'reborn' ? 'active' : '' ?>" href="/mfee26-D-php/proj/avatar.php">轉生形象</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == 'place' ? 'active' : '' ?>" href="place.php">良辰吉地</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == 'activity' ? 'active' : '' ?>" href="/mfee26-D-php/proj/xuan-event-manage/npo-list.php">Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == 'social' ? 'active' : '' ?>" href="social.php">Social</a>
                </li>
                <!-- 設定管理者登入才會出現? -->
                <li class="nav-item dropdown admin-menu">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" id="adminTitle">管理頁面</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="news_list.php">管理最新消息</a></li>
                        <li><a class="dropdown-item" href="news_add.php">新增最新消息</a></li>
                        <li><a class="dropdown-item" href="reborn-admin.php">轉生形象</a></li>
                        <li><a class="dropdown-item" href="place-admin.php">良辰吉地</a></li>
                        <li><a class="dropdown-item" href="/mfee26-D-php/proj/xuan-event-manage/npo-act-add.php">活動-新增</a></li>
                        <li><a class="dropdown-item" href="/mfee26-D-php/proj/xuan-event-manage/event-manage.php">活動-管理</a></li>
                        <li><a class="dropdown-item" href="/mfee26-D-php/proj/xuan-npo-manage/npo-add.php">NPO-新增</a></li>
                        <li><a class="dropdown-item" href="/mfee26-D-php/proj/xuan-npo-manage/npo-manage.php">NPO-管理</a></li>
                        <li><a class="dropdown-item" href="ab-list.php">會員管理</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav navbar-icon mb-2 mb-lg-0">
                <a href="/mfee26-D-php/proj/xuan-event-manage/cart-list.php">
                    <i class="fa-solid fa-cart-shopping navbar-lefticons"></i>
                </a>
                <a href="ab-profile.php" title="會員中心">
                    <!-- 要放登入頁面還是會員中心? -->
                    <!-- 應該釋放會員中心連結, profile頁面加驗證, 如果沒登入就導登入頁? -->
                    <i class="fa-solid fa-circle-user navbar-lefticons"></i>
                </a>
                <a href="ab-logout.php" class="logInOut">
                    登入|註冊
                </a>
                <a href="ab-logout.php" class="logInOut">
                    登出
                </a>
            </ul>
        </div>
    </div>
</nav>