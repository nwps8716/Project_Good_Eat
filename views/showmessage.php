<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Message aboard - Good Eat</title>

    <!-- Bootstrap Core CSS -->
    <link href="../views/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../views/css/business-casual.css" rel="stylesheet">
    <!--Pulling Awesome Font -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript">
        function check()
        {
            if(reg.message.value == "") {
        		alert("請輸入留言內容");
        	}
        	else reg.submit();
        }
    </script>
</head>

<body>
    <?php include "menu.php"; ?>
    
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <?php $showArray = $data; ?>
                    <img src="../views/img/<?php echo $showArray["imgfile"][0]; ?>" width="700" height="450" alt="">
                    <h2><?php echo $showArray["title"][0]; ?>
                        <br>
                    </h2>
                    <p><?php echo $showArray["content"][0];?></p>
                    <hr>
                    
                    <table class="table table-bordered">
                        <tr class="info">
                            <td>留言內容</td>
                            <td>留言時間</td>
                            <td>留言者</td>
                        </tr>
                        <?php for($i = 0 ; $i < $showArray["num"] ; $i++) { ?>
                        <tr>
                            <td><?php echo $showArray["message"][$i]; ?></td> 
                            <td><?php echo $showArray["date"][$i]; ?></td> 
                            <td><?php echo $showArray["user"][$i]; ?></td>
                        </tr>
                        <?php }?>
                    </table>
                </div>
                <div style="text-align:center;">
                    <form action="/Project_Good_Eat/Article/uploadmessage" name="reg" method="post" enctype="multipart/form-data">
                    	請輸入留言內容:
                    	<br><textarea name="message" rows="5" cols="50"></textarea><br>
                    	<input type="hidden" name="blogID" value="<?php echo $showArray["id"][0]; ?>">
                    	<input type="button" onClick="check()" class="btn btn-primary btn-md" value="送出留言">
                    	<input type="reset" class="btn btn-primary btn-md" value="清除資料">
                    </form>
                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>
        

    </div>
    
    <!-- /.container -->

    <?php include "footer.php"?>

</body>

</html>
