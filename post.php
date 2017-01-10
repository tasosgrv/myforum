<?php
require_once('utils.php');

$current_user = $_SESSION['user_id'];
$error='';
$epityxia='';


if(isset($_POST['submit'])){
    if(!empty($_POST['subject_id'])){
        if(empty($_POST['message'])){
            $error="<p class='alert alert-danger' id='error'><b>Παρακαλώ γράψτε ένα μήνυμα</b></p>";
        }else{
            //mysql connect
            $connect = db_connect();
            $searchTerms = array ( 'tasos', '/]' );
            $replacements = array ( 'giorgos', '/>' );
            str_replace($searchTerms, $searchTerms, $_POST['message']);

            //metafora se metavlites
            $message = mysqli_real_escape_string($connect, $_POST['message']);
            $subject_id = $_POST['subject_id'];


            $question = "SELECT title FROM subjects WHERE subject_id = $subject_id";
            $result = mysqli_query($connect, $question) or die('Question 1'.mysql_error());
            if(@mysqli_num_rows($result)==1){ // POST SE THEMA POU YPARXEI
                $insert1 = "INSERT INTO posts (message, subject_id, user_id) VALUES ('$message', '$subject_id', '$current_user')";
                $res = mysqli_query($connect, $insert1) or die('insert 1'.mysql_error());
                mysqli_close($connect);
                header("Location: subject.php?id=$subject_id");
            }else{
                $error="<p class='alert alert-danger' id='error'><b>Δεν Υπάρχει αυτο το θέμα/b></p>";

            }
        }
    }else{
        if(empty($_POST['message']) || empty($_POST['title'])){
            $error="<p class='alert alert-danger' id='error'><b>Πρέπει να συμπληρώσετε και τα δύο πεδία</b></p>";
        }else{
            $connect = db_connect();
            $title = mysqli_real_escape_string($connect, $_POST['title']);
            $message = mysqli_real_escape_string($connect, $_POST['message']);

            $insert2 = "INSERT INTO subjects (title, user_id) VALUES ('$title', '$current_user')";
            $res = mysqli_query($connect, $insert2) or die('insert 2'.mysql_error());

            $question = "SELECT * FROM subjects ORDER BY created DESC LIMIT 1 ";
            $result = mysqli_query($connect, $question) or die('question 2' .mysql_error());
            $array = mysqli_fetch_array($result);
            $subject_id = $array['subject_id'];


            $insert3 = "INSERT INTO posts (message, subject_id, user_id) VALUES ('$message', '$subject_id', '$current_user')";
            $result = mysqli_query($connect, $insert3) or die('insert 3' .mysql_error());
            mysqli_close($connect);
            header("Location: subject.php?id=$subject_id");
        }
    }
}



?>
