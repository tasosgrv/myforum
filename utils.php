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
    //FOR PROFILE
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
    // FOR MAIN SECTION
    function count_posts_each_subject($subject){
        $connect = db_connect();
        return mysqli_num_rows(mysqli_query($connect, "SELECT * FROM posts WHERE subject_id=$subject"));
    }

    function last_user_posted($subject){
        $connect = db_connect();
        $question="SELECT users.user_id, users.username, users.avatar FROM posts,subjects,users WHERE $subject = posts.subject_id AND posts.user_id = users.user_id  ORDER BY posts.date DESC";
        $check = mysqli_query($connect, $question) or die(mysql_error());
        return mysqli_fetch_array($check);
    }
    // FOR STATS
    function sum_users(){
        $connect = db_connect();
        return mysqli_num_rows(mysqli_query($connect, "SELECT * FROM users"));
    }
    function sum_subjects(){
        $connect = db_connect();
        return mysqli_num_rows(mysqli_query($connect, "SELECT * FROM subjects"));
    }
    function sum_posts(){
        $connect = db_connect();
        return mysqli_num_rows(mysqli_query($connect, "SELECT * FROM posts"));
    }
    function new_memeber(){
        $connect = db_connect();
        return mysqli_fetch_array(mysqli_query($connect, "SELECT username, user_id FROM users ORDER BY registration_date DESC LIMIT 1"));
    }



    function email($to, $subject, $body){
        mail($to, $subject, $body, 'From: tasos_gr93@hotmail.com');
    }
?>
