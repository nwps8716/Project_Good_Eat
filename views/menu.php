<?php
session_start();
date_default_timezone_set('Asia/Taipei');
$date = date("Y.m.d");
?>

<div class="brand">好食 | 日報</div>
<div class="address-bar">分享隱藏好食 | <?php echo $date; ?> | 食得回味無窮</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a><?php echo $_SESSION["username"]?></a>
                    </li>
                    <li>
                        <a href="/Project_Good_Eat/Home/index">首頁</a>
                    </li>
                    <li>
                        <a href="/Project_Good_Eat/Home/blog">好食賞文</a>
                    </li>
                    <li>
                        <?php if (!isset($_SESSION["username"])) { ?>
                        <a href="/Project_Good_Eat/Member/member">註冊會員</a>
                        <?php } else { ?>
                        <a href="/Project_Good_Eat/Article/upload">新增貼文</a>
                        <?php } ?>
                    </li>
                    <li>
                        <?php if (isset($_SESSION["username"])) { ?>
                        <a href="/Project_Good_Eat/Home/selfpost">修改貼文</a>
                        <?php } ?>
                    </li>
                    <li>
                        <?php if (!isset($_SESSION["username"])) { ?>
      	                <a href="/Project_Good_Eat/Member/signin">會員登入<br></a>
      	                <?php } else { ?>
      	                <a href="/Project_Good_Eat/Member/logout?signout=1">登出<br></a>
      	                <?php } ?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
   