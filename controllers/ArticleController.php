<?php
class ArticleController extends Controller {
    
    //上傳文章
    function upload() {
        $this->model("CRUD");
        $crud = new CRUD();
        
        if(isset($_POST['uploadcontent'])) {
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y.m.d");
            
            $title = $_POST["uploadtitle"];
        	$content = $_POST["uploadcontent"];
        	$user = $_SESSION['username'];
        	
        	$picture = $_FILES["uploadfileimage"]["name"];
        	move_uploaded_file($_FILES["uploadfileimage"]["tmp_name"],"views/img/".$_FILES["uploadfileimage"]["name"]);
        	
        	$row = $crud->uploadArticle($title,$content,$user,$picture,$date);
        	if($row>0) {
        	    $_SESSION['alert'] = "貼文新增成功";
                header("Location:/Project_Good_Eat/Home/blog");
                exit;
        	}else{
        	    $_SESSION['alert'] = "貼文新增失敗";
            }
        }
        $this->view("upload");
    }
    
    //修改文章
    function modify() {
        $this->model("CRUD");
        $crud = new CRUD();
        $modifyArray = Array();
        
        $modifyArray["id"][0] = $_GET['id'];
        $modifyArray["img"][0] = $_GET['img'];
        $modifyArray["tit"][0] = $_GET['tit'];
        $modifyArray["cont"][0] = $_GET['cont'];

        if(isset($_POST['title'])) {
            $picture = $_FILES["fileimage"]["name"];
        	move_uploaded_file($_FILES["fileimage"]["tmp_name"],"views/img/".$_FILES["fileimage"]["name"]);
        	
            $id = $_POST["id"];
        	$title = $_POST["title"];
        	$content = $_POST["content"];

        	if($title != "" && $content != "" && $picture == "") {
        	    $row = $crud->updateArticle($title,$content,$id);
        	    if($row>0) {
        	        $_SESSION['alert'] = "文章修改成功";
        	        header("Location:/Project_Good_Eat/Home/blog");
                    exit;
            	}else{
            	    $_SESSION['alert'] = "文章修改失敗";
            	    header("Location:/Project_Good_Eat/Home/slefpost");
                    exit;
                }
        	}
        	else if ($title != "" && $content != "" && $picture !="") {
        	    $row = $crud->updatePicture($picture,$title,$content,$id);
        	    if($row>0) {
        	        $_SESSION['alert'] = "文章修改成功";
        	        header("Location:/Project_Good_Eat/Home/blog");
                    exit;
            	}else{
            	    $_SESSION['alert'] = "文章修改失敗";
            	    header("Location:/Project_Good_Eat/Home/slefpost");
                    exit;
                }
        	}
        }
        $this->view("modify",$modifyArray);
    }
    
    //刪除文章、圖片、留言
    function del() {
        $this->model("CRUD");
        $crud = new CRUD();
        
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $img = $_GET['img'];
            if (file_exists("views/img/".$img)) {
                unlink("views/img/".$img);
            }
            
            $row = $crud ->deleteArticle($id,$img);
            $message = $crud ->deleteMessageboard($id);
            
            if(isset($row) && isset($message)) {
                $_SESSION['alert'] = "刪除成功";
                header("Location:/Project_Good_Eat/Home/selfpost");
                exit;
            }
        }
    }
    
    //上傳留言
    function uploadmessage() { 
        $this->model("CRUD");
        $crud = new CRUD();
        
        if(isset($_POST['message'])) {
            date_default_timezone_set('Asia/Taipei');
            $date = date("Y.m.d H:i:s");
            
            $ID = $_POST["blogID"];
            $userID = $_SESSION["username"];
        	$content = $_POST["message"];
        	
        	$row = $crud ->uploadMessageboard($ID,$userID,$content,$date);
        	if($row>0) {
        	    $_SESSION['alert'] = "留言成功";
        	    header("Location:/Project_Good_Eat/Home/blog");
                exit; 
            }else{
                echo "<script>alert('留言失敗');</script>";
            }
            $this->blog();
        }
    }
    
}
?>