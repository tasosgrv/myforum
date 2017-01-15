    <?php

    require_once('utils.php');
    $error='';
    $epityxia='';

    if(isset($_POST['submit_register'])){
       if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['repass'])){
           $error="<p class='alert alert-danger' id='error'>Παρακαλώ συμπληρώστε όλα τα υποχρεωτικά πεδία</p>";
       }else{

           if(preg_match("/\\s/", $_POST['username']) == true){
               $error="<p class='alert alert-danger' id='error'>Το username σας δεν πρέπει να περιέχει κενά </p>";
           }else if($_POST['password'] != $_POST['repass']){
               $error="<p class='alert alert-danger' id='error'>Το περιεχόμενο των Password και Repeat Password πρέπει να είναι ίδια</p>";
           }else{
               if(strlen($_POST['password']) < 6){
                   $error="<p class='alert alert-danger' id='error'>Ο κωδικός σας πρέπει να έχει τουλάχιστον 6 χαρακτήρες</p>";
               }else{
                   //mysql connect
                   $connect = db_connect();

                   //metafora se metavlites

                   $usr = mysqli_real_escape_string($connect, $_POST['username']);
                   $email = mysqli_real_escape_string($connect, $_POST['email']);
                   $pass = md5(mysqli_real_escape_string($connect, $_POST['password']));


                   //-------------------------------------------------------------------

                   //check email dublicate
                   $question="SELECT * FROM users WHERE email LIKE '{$email}' OR username LIKE '{$usr}'";
                   //ektelesh erwthmatos
                   $result = mysqli_query($connect, $question) or die(mysql_error());
                   $users = mysqli_fetch_array($result);
                   if(@mysqli_num_rows($result)==0){
                        //eisagwgh sth vash
                        $reg="INSERT INTO users (user_id, username, password, email) VALUES (NULL, '$usr', '$pass', '$email')";
                        mysqli_query($connect, $reg);
                        mysqli_close($connect);

                        $epityxia="<p class='alert alert-success' id='error'>Ευχαριστούμε ".$usr. " για την εγγραφή σας</p>";

                   }else{
                       if($users['username'] == $usr && $users['email'] == $email){
                           $error = "<p class='alert alert-danger' id='error'>Το email και το username που επιλέξατε χρησιμοποιείται ήδη</p>";
                       }else if($users['username'] == $usr){
                            $error = "<p class='alert alert-danger' id='error'>Το username που επιλέξατε χρησιμοποιείται ήδη</p>";
                        }else{
                            $error = "<p class='alert alert-danger' id='error'>Το email που επιλέξατε χρησιμοποιείται ήδη</p>";
                        }
                   }
               } //strlen end
           }//pass repeat check


            //mysqli_close($connect); //τερματισμος mysql syndeshs

       }//empty
    }//submit
    
?>
