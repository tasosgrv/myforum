<?php
require_once('utils.php');

$error='';
$epityxia='';

if(isset($_POST['submit'])){
    if(empty($_POST['title']) || empty($_POST['message'])){
        $error="<p class='alert alert-danger' id='error'><b>Παρακαλώ συμπληρώστε όλα τα πεδία</b></p>";
    }else{
        //mysql connect
        $connect = db_connect();

        //metafora se metavlites
        $title = mysqli_real_escape_string($connect, $_POST['title']);
        $message = mysqli_real_escape_string($connect, $_POST['message']);

        $question = "SELECT * FROM subjects WHERE title LIKE $title";
        $result = mysqli_query($connect, $question) or die(mysql_error());
        if(@mysqli_num_rows($result)==1){ // POST SE THEMA POU YPARXEI
            $subject_id = $_POST['subject_id'];
            $insert = "INSERT INTO posts(message, subject_id, user_id) VALUES($message, $subject_id, {$_SESSION['username']})";
            $result = mysqli_query($connect, $insert) or die(mysql_error());

            header("Location: subject.php?id=$subject_id");

        }else{ //DHMIOURGIA THEMATOS
            $error="<p class='alert alert-danger' id='error'><b>δΗΜΙΟΥΡΓΕΙΑ ΘΕΜΑΤΟΣ</b></p>";
        }


    }
}

?>
