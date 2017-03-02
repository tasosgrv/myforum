<?php
    require_once('utils.php');
    if(isset($_POST['change_pass'])){
        //an einai kapoio input keno
        if(empty($_POST['old_password']) || empty($_POST['new_password']) || empty($_POST['repeat_password'])){
            $MESSAGE="<p class='alert alert-danger' id='error'><b>Παρακαλώ συμπληρώστε όλα τα πεδία</b></p>";
        }else if(strlen($_POST['new_password']) < 6){ // an to neo pass einai <6 xaraktires
            $MESSAGE="<p class='alert alert-danger' id='error'><b>Ο κωδικός σας πρέπει να έχει τουλάχιστον 6 χαρακτήρες</b></p>";
        }else if($_POST['new_password']!=$_POST['repeat_password']){ // an new kai retype inputs sympiptoun
            $MESSAGE="<p class='alert alert-danger' id='error'><b>Το περιεχόμενο των πεδίων \"Νέος Κωδικός\" και \"Επαλήθευση Νέου Κωδικόυ\" πρέπει να έιναι ίδιο</b></p>";
        }else{

            $connect = db_connect();
            $old_pass = htmlentities(md5(mysqli_real_escape_string($connect, $_POST['old_password'])));
            $new_pass = htmlentities(md5(mysqli_real_escape_string($connect, $_POST['new_password'])));

            //check email dublicate
           $question="SELECT * FROM users WHERE user_id LIKE '{$_SESSION['user_id']}' AND password LIKE '{$old_pass}'";
           //ektelesh erwthmatos
           $result = mysqli_query($connect, $question) or die(mysql_error());
            if(@mysqli_num_rows($result)==0){
                $MESSAGE="<p class='alert alert-danger' id='error'><b>Ο Τρέχων κωδικός που πληκρολογήσατε είναι λανθασμένος</b></p>";
                mysqli_close($connect);
            }else{
                //eisagwgh sth vash
                $reg="UPDATE users SET password='$new_pass' WHERE user_id='{$_SESSION['user_id']}'";
                mysqli_query($connect, $reg);
                mysqli_close($connect);
                $MESSAGE="<p class='alert alert-success' id='error'><b>Η αλλαγή του κωδικού πρόσβασης έγινε με επιτυχία<br>Kάντε <a href='logout.php'>αποσύνδεση</a> και ύστερα συνδεθείτε ξανά με το νέο κωδικό</b></p>";
            }

        }
    }
?>
