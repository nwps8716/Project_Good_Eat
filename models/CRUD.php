<?php
session_start();
include_once 'dbconfig.php';
echo "<meta charset='utf-8'>";
class CRUD {
    
    public function __construct() {
        $db = new DB_con();
    }
    
    public function getUserdata_id($firstname,$lastname,$email,$id,$pw,$pw2) {
        $sql = "select * from userdata where userid = '$id'";
        $result = mysql_query($sql);
        return mysql_fetch_row($result);
    }
    
    public function insertUserdata($firstname,$lastname,$email,$id,$pw,$pw2) {
        $sql = "insert into userdata(firstname, lastname, email, userid, password) values ('$firstname', '$lastname', '$email', '$id', '$pw')";
    	return mysql_query($sql);
    }
    
    public function getUserdata_id_pw($id,$pw) {
        $sql = "select * from userdata where userid='$id' AND password='$pw';";
        $result = mysql_query($sql);
        return mysql_fetch_row($result);
    }
    
    public function signout() {
        unset($_SESSION['username']);
    }
    
    public function uploadArticle($title,$content,$user,$picture,$date) {
        $sql = "insert into fooddata (imgfile, title, content, date, user) value ('$picture', '$title', '$content', '$date', '$user')";
    	return mysql_query($sql);
    }
    
    public function deleteArticle($id,$img) {
        $sql ="delete from fooddata where ID='$id'"; 
        return mysql_query($sql);
    }
    
    public function deleteMessageboard($id) {
        $sql ="delete from messageboard where ID ='$id'";
        return mysql_query($sql);
    }
    
    public function updateArticle($title,$content,$id) {
	    $sql = "update fooddata set title='$title',content='$content' where ID='$id' ";
	    return mysql_query($sql);
    }
    
    public function updatePicture($picture,$title,$content,$id) {
    	$sql = "update fooddata set imgfile='$picture',title='$title',content='$content' where ID='$id' ";
        return mysql_query($sql); 
    }

    public function getFooddata_DESC() {
        return mysql_query("select * from fooddata ORDER BY ID DESC");
    }
    
    public function getPage($start,$per) {
        return mysql_query("select * from fooddata ORDER BY ID DESC LIMIT $start,$per");
    }
    
    public function getFooddataID($id) {
        return mysql_query("select * from fooddata where ID = $id");
    }
    
    public function getMessageboardID($id) {
        return mysql_query("select * from messageboard where ID = $id");
    }
    
    public function uploadMessageboard($ID,$userID,$content,$date) {
	    $sql = "insert into messageboard (ID, content, date, user) value ('$ID', '$content', '$date', '$userID')";
	    return mysql_query($sql); 
    }
    
    public function getFooddata() {
        return mysql_query("select * from fooddata");
    }
    
}
?>