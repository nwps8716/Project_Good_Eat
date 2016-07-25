<?php
class HomeController extends Controller {
    
    function index() {
        $this->view("index");
    }
    
    //Blog文章分頁
    function blog() {                               
        $this->model("CRUD");
        $crud = new CRUD();
        $result = $crud ->getFooddata_DESC();
        
        $data_nums = mysql_num_rows($result);       
        $per = 2;                                   
        $pages = ceil($data_nums/$per);             
        if (!isset($_GET["page"])) {                 
            $page=1;                                
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }
        }else{
            $page = intval($_GET["page"]);          
        }
        $start = ($page-1)*$per;                    
        
        $result = $crud ->getPage($start,$per);
        
        $blogArray = Array();
        
        $blogArray["num"] = mysql_num_rows($result);
        $blogArray["page"] = $page;
        $blogArray["pages"] = $pages;
        while($row = mysql_fetch_assoc($result)) {
            $blogArray["ID"][] = $row["ID"];
            $blogArray["title"][] = $row["title"];
            $blogArray["content"][] = $row["content"];
            $blogArray["date"][] = $row["date"];
            $blogArray["imgfile"][] = $row["imgfile"];
        }
        $this->view("blog",$blogArray);
    }
    
    //會員註冊
    function member() {       
        $this->model("CRUD");
        $crud = new CRUD();
        
        if(isset($_POST['btnok'])) {
            $id = $_POST['userid'];
            $pw = $_POST['password'];
            $pw2 = $_POST['password2'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
         
            $row = $crud->getUserdata_id($firstname,$lastname,$email,$id,$pw,$pw2);
            
            if($id != null && $pw != null && $pw2 != null && $row[4] != $id && $pw == $pw2) {
                $insert = $crud->insertUserdata($firstname,$lastname,$email,$id,$pw,$pw2);
                if($insert>0) {
                    echo "<script>alert('註冊成功');</script>";
                    $this->signin();
                }
            }
            else if($pw != $pw2) { 
                echo "<script type='text/javascript'>alert('密碼確認是否一致');</script>";
                $this->member();
            }
            else if($row[4] == $id) {
                echo "<script type='text/javascript'>alert('此帳號已有人註冊');</script>";
                $this->member();
            }
        }
        $this->view("member");
    }
    
    //會員登入確認
    function signin() {
        $this->model("CRUD");
        $crud = new CRUD();
        
        if(isset($_POST['button'])) {
            $id = $_POST['id'];
            $pw = $_POST['pw'];

            $row = $crud->getUserdata_id_pw($id,$pw);
            
            if($id == null && $pw == null) {
                echo "<script type='text/javascript'>alert('請輸入帳號或密碼');</script>";
                $this->signin();
            }
            else if ($row) {
                $_SESSION['username'] = $id;
                echo "<script>alert('登入成功');</script>";
                $this->index();
            }else{
                echo "<script>alert('帳號或密碼錯誤');</script>";
                $this->signin();
            }
        }
        $this->view("signin");
    }
    
    //會員登出
    function logout() {             
        $this->model("CRUD");
        $crud = new CRUD();
        
        if(isset($_GET["signout"])) {
            $crud->signout();
            header("location:index");
        }
    }
    
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
                echo "<script>alert('貼文新增成功');</script>";
                $this->blog();
        	}else{
                echo "<script>alert('貼文新增失敗');</script>";
                $this->upload();
            }
        }
        $this->view("upload");
    }
    
    //顯示會員新增過的貼文
    function selfpost() {
        $this->model("CRUD");
        $crud = new CRUD();
        $result = $crud->getFooddata();
        $selfArray = Array();
            while($row = mysql_fetch_assoc($result)) {
                $selfArray['ID'][] =  $row["ID"];
                $selfArray['title'][] =  $row["title"];
                $selfArray['content'][] =  $row["content"];
                $selfArray['user'][] =  $row["user"];
                $selfArray['imgfile'][] =  $row["imgfile"];
            }
        $this->view("selfpost",$selfArray);
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
                    echo "<script>alert('文章修改成功');</script>";
                    $this->blog();
            	}else{
                    echo "<script>alert('文章修改失敗');</script>";
                    $this->selfpost();
                }
        	}
        	else if ($title != "" && $content != "" && $picture !="") {
        	    $row = $crud->updatePicture($picture,$title,$content,$id);
        	    if($row>0) {
                    echo "<script>alert('文章修改成功');</script>";
                    $this->blog();
            	}else{
                    echo "<script>alert('文章修改失敗');</script>";
                    $this->selfpost();
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
                echo "<script>alert('刪除成功');</script>";
                $this->selfpost();
            }
        }
    }
    
    //抓取資料庫顯示留言內容
    function showmessage() {
        $this->model("CRUD");
        $crud = new CRUD();
        $showArray = Array();
        
        $id = $_GET['id'];
        
        $result = $crud ->getFooddataID($id);
        
        $rs = mysql_fetch_assoc($result);
        $showArray["id"][0] = $id;
        $showArray["imgfile"][0] = $rs["imgfile"];
        $showArray["title"][0] = $rs["title"];
        $showArray["content"][0] = $rs["content"];

        $message = $crud ->getMessageboardID($id);
        
        $showArray["num"] = mysql_num_rows($message);
        while($row = mysql_fetch_assoc($message)) {
            $showArray["message"][] = $row["content"];
            $showArray["date"][] = $row["date"];
            $showArray["user"][] = $row["user"];
        }
        $this->view("showmessage",$showArray);
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
                echo "<script>alert('留言成功');</script>";
            }else{
                echo "<script>alert('留言失敗');</script>";
            }
            $this->blog();
        }
    }
}

?>