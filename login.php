<?php
    require_once('utils.php');
    $error='';


    if(isset($_POST['submit_login'])){
        if(empty($_POST['username']) || empty($_POST['password'])){
             $error="<p class='alert alert-danger' id='error'><b>Πρέπει να συμπληρώσεις και τα δυο πεδία</b></p>";
        }else{
        
            //συνδεση με τη mysql
            $connect = db_connect();
            
            // οι τιμες απ τη φορμα μπαινουν σε μεταβλητες
            $username = mysqli_real_escape_string($connect, $_POST['username']);
            $password = md5(mysqli_real_escape_string($connect, $_POST['password']));
            
            //δημιουργεια ερωτήματος
            $question="SELECT * FROM users WHERE username LIKE '$username' AND password LIKE '$password'";
            
            //εκτελεση ερωτήματος
            $result = mysqli_query($connect, $question) or die('Error to query' .mysqli_connect_error());
            $users = mysqli_fetch_array($result);
                
            if(@mysqli_num_rows($result)==1){ //Αν ο αριθμος των στηλών που βρέθηκάν ειναι ένας
                if($users['active']==0){
                    $error="<p class='alert alert-danger' id='error'><b>O λογαριασμός σας είναι ανενεργός</b></p>";
                }else{
                    foreach($users as $key=>$value){
                        $_SESSION[$key]=$value;
                    }
                    header("Location: /forum/index.php"); //Ανακατευθυνση στην αρχικη
                }
            }else{
                $error="<p class='alert alert-danger' id='error'><b>To username η το password είναι λάθος</b></p>"; //αλλίως εμφανισε λαθος
            }
            mysqli_close($connect); //τερματισμος mysql syndeshs 
        }
            
    }




?>
