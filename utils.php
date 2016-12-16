<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456');
    define('DB_NAME', 'forum_db');

    function db_connect(){
       $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Connection error' .mysqli_connect_error());;
       return $connect;
    }
?>