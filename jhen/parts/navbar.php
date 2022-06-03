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
        padding-left: 10px;
    }

    .navbar-icon>a>i {
        color: #33A5DB;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">



        <?php
        // a.navbar-brand 中一般都是放商標圖片
        // 目前使用文字是權宜之計
        ?>



        <a class="navbar-brand" href="#">濟善救世公司</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == 'intro' ? 'active' : '' ?>" href="intro.php">Intro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == 'about' ? 'active' : '' ?>" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == 'news' ? 'active' : '' ?>" href="news.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == 'reborn' ? 'active' : '' ?>" href="reborn.php">Reborn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == 'activity' ? 'active' : '' ?>" href="activity.php">Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $pageName == 'social' ? 'active' : '' ?>" href="social.php">Social</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-icon mb-2 mb-lg-0">
                <a href="cart.php">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
                <a href="member.php">
                    <i class="fa-solid fa-house"></i>
                </a>
            </ul>
        </div>
    </div>
</nav>