<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '123456');
    define('DB_NAME', 'forum_db');

    function db_connect(){
       $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Connection error' .mysqli_connect_error());;
       return $connect;
    }

    function check_user_level($user_level){
        if ($user_level==1){ echo  "<font color='red'>Διαχειρηστής</font>"; }else{ echo ' Kανονικός Χρήστης';}
    }

    function check_active_code($active_code){
        if($active_code==0){echo "<font color='red'>Ανενεργός</font>"; }else{echo "<font color='green'>Ενεργοποιημένος</font>"; }
    }

    function get_user_id($user_id){
        if(isset($user_id) && is_numeric($user_id) && empty($user_id)===false){
            $connect = db_connect();

            $profile_id=$user_id;

            $question="SELECT * FROM users WHERE user_id = '$profile_id'";
            $result = mysqli_query($connect, $question) or die('Error to query' .mysqli_connect_error());
            if(@mysqli_num_rows($result)==0){
                header("Location: index.php");
                exit();
            }else{
                return $users = mysqli_fetch_array($result);
            }


        }else{
            header("Location: index.php");
            exit();
        }
    }

    function email($to, $subject, $body){
        mail($to, $subject, $body, 'From: tasos_gr93@hotmail.com');
    }
?>
