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
    
}

?>