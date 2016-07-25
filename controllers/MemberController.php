<?php
class MemberController extends Controller {
    
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
                    $_SESSION['alert'] = "註冊成功";
                    header("Location:signin");
                    exit;
                }
            }
            else if($pw != $pw2) { 
                echo "<script type='text/javascript'>alert('密碼確認是否一致');</script>";
            }
            else if($row[4] == $id) {
                echo "<script type='text/javascript'>alert('此帳號已有人註冊');</script>";
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
            }
            else if ($row) {
                $_SESSION['username'] = $id;
                $_SESSION['alert'] = "登入成功";
                header("Location:/Project_Good_Eat/Home/index");
                exit;
            }else{
                echo "<script>alert('帳號或密碼錯誤');</script>";
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
            $_SESSION['alert'] = "登出成功";
            header("Location:/Project_Good_Eat/Home/index");
        }
    }
}
?>