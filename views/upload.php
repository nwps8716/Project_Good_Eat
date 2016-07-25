<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="../views/ckeditor/ckeditor.js"></script>
    <title>Upload - Good Eat</title>

    <!-- Bootstrap Core CSS -->
    <link href="../views/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../views/css/business-casual.css" rel="stylesheet">
    <script type="text/javascript">
        function check()
        {
            var data = CKEDITOR.instances.uploadcontent.getData()
        	if(reg.uploadtitle.value == "") {
        		alert("未輸入標題");
        	}
        	else if(data == "") {
        		alert("未輸入內容");
        	}
        	else if(reg.uploadfileimage.value == "") {
        		alert("請選擇圖檔");
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
                <form action="upload" name="reg" method="post" enctype="multipart/form-data">
            		<span style="font-family:fantasy; font-size:22px;">請填寫以下資料 :<br>文章標題 :</span> <input type="text" name="uploadtitle"><br>
            		<br><textarea name="uploadcontent" rows="10" cols="50"></textarea><br>
            		<script>
                        CKEDITOR.replace('uploadcontent', {
                            //輸入客製化條件
                            height:400,
                            width: 1000, //設定內容編輯器寬度
                        });
                    </script>
            		<span style="font-size:16px;">上傳圖檔 (建議800x400px以上)<input type="file" name="uploadfileimage" > </span>
            		<input type="button" onClick="check()" class="btn btn-primary btn-md" value="送出資料">
            	</form>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <?php include "footer.php"?>
</body>

</html>
