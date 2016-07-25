<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Good Eat - Home </title>

    <link href="../views/css/bootstrap.min.css" rel="stylesheet">
    <link href="../views/css/business-casual.css" rel="stylesheet">
</head>

<body>
    <?php include "menu.php"; ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="../views/img/slide-1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="../views/img/slide-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="../views/img/slide-3.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">好 食 圖 誌</h1>
                    <hr class="tagline-divider">
                   
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>關於 - 好食日報</strong>
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left" src="../views/img/intro-pic.jpg" alt="">
                    <hr class="visible-xs">
                    <p>本網站，好食日報的主旨，是希望每個人都可以上來分享自己所蒐藏的美食名單，並無私的分享給大家。</p>
                    <p>飲食不單單只是為了滿足基本需求，美味的料理更能帶給人身心靈的享受，特過分享的動作也可以帶給更多人幸福感，而好食日報未來的目標，是建立一個店家與消費者的互動平台，透過互動讓雙方更加瞭解彼此。</p>
                    <p>「人對、食物對、心情對，就可以看到人最自然的一面，那是很快樂的。」---美食評論家胡天蘭</p>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <?php include "footer.php"?>

    <!-- jQuery -->
    <script src="../views/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../views/js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>
