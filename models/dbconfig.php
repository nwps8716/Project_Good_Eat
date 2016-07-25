<?php
class DB_con {
    function __construct() {
        $link = mysql_connect("localhost", "root", "") or die(mysql_error());
        $result = mysql_query("set names utf8", $link);
        mysql_select_db("project", $link);
        mysql_query("set names utf8");
    }
}
?>