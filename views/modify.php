<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="../views/ckeditor/ckeditor.js"></script>
    <title>Modify - Good Eat</title>

    <!-- Bootstrap Core CSS -->
    <link href="../views/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../views/css/business-casual.css" rel="stylesheet">
    <script  type="text/javascript"> 
        function check()
        {
            var data = CKEDITOR.instances.content.getData()
        	if(reg.title.value == "") {
        		alert("未輸入標題");
        	}
        	else if(data == "") {
        		alert("未輸入內容");
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
                <?php $modifyArray = $data; ?>
                <form action="modify" name="reg" method="post" enctype="multipart/form-data" >
            		<span style="font-family:fantasy; font-size:22px;">修改文章 :<br>文章標題 :</span> <input type="text" name="title" value="<?php echo $modifyArray["tit"][0]; ?>"  ><br>
            		<br><textarea name="content" rows="10" cols="50" ><?php echo $modifyArray["cont"][0]; ?></textarea><br>
            		<script>
                        CKEDITOR.replace('content',{
                            height:400,
                            width:1000, 
                        });
                    </script>
            		<input type="hidden" name="id" value="<?php echo $modifyArray["id"][0]; ?>">
            		<span style="font-size:16px;">上傳圖檔 (建議800x400px以上)<input type="file" name="fileimage" > </span>
            		<input type="button" onClick="check()" class="btn btn-primary btn-md" value="送出資料">
            	</form>
            </div>
        </div>
    </div>
    <?php include "footer.php"?>
    
</body>

</html>