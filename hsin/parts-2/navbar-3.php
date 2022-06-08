<?php
if (!isset($pageName)) {
    $pageName = '';
}
?>
<style>
    .navbar .navbar-nav .nav-link.active {
        background-color: #0d6efd;
        color: white;
        font-weight: 800;
        border-radius: 5px;
    }
</style>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">靈魂轉生平台</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $pageName == 'index' ? 'active' : '' ?>" href="index_2.php">首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $pageName == 'ab-profile' ? 'active' : '' ?>" href="ab-profile.php">會員中心</a>
                    </li>
                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item">會員登出
                        <!-- <a class="nav-link <?= $pageName == 'ab-register' ? 'active' : '' ?>" href="ab-register.php">會員登出</a> -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>