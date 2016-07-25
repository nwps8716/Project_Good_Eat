<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog - Good Eat</title>
    <!-- Bootstrap Core CSS -->
    <link href="../views/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../views/css/business-casual.css" rel="stylesheet">
</head>

<body>
    <?php include "menu.php"; ?>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>好食 | 分享</strong>
                    </h2>
                    <hr>
                </div>
                
                <?php 
                $blogArray = $data;
                for($i = 0 ; $i < $blogArray["num"] ; $i++) {  
                ?>  
                <div class="col-lg-12 text-center">
                    <img src="../views/img/<?php echo $blogArray["imgfile"][$i] ?>" width="1000" height="550" alt="">
                    <h2>
                        <?php echo $blogArray["title"][$i]; ?> <br>
                        <small> <?php echo $blogArray["date"][$i]; ?> </small>
                    </h2>
                    <p> <?php echo $blogArray["content"][$i]; ?> </p>
                    <?php 
                    if (isset($_SESSION["username"])) {
                        echo '<a href="showmessage?&id='.$blogArray["ID"][$i].'";>留言板</a>'; 
                    }
                    ?>
                    <hr>
                </div>
                <?php } ?>
                <!--ending php for circle-->
                
                <?php
                    //上一頁，下一頁
                    $next=$blogArray["page"];
                    $previous=$blogArray["page"];
                    if($previous>1) {
                        $previous = $blogArray["page"] - 1;
                    }
                    if($next < $blogArray["pages"]) {
                        $next = $blogArray["page"] + 1; 
                    }
                 ?>
                <div class="col-lg-12 text-center">
                    <ul class="pager">
                        <li class="previous"><a href=?page= <?php echo $previous ?>> &larr; 上一頁</a>
                        </li>
                        <li>
                            <?php
                            for( $i=1 ; $i<=($blogArray["pages"]) ; $i++ ) {
                                echo "<a href=?page=".$i.">".$i."</a> ";
                            } 
                            ?>
                        </li>
                        <li class="next"><a href=?page= <?php echo $next ?>> 下一頁 &rarr;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <?php include "footer.php"?>

</body>

</html>
