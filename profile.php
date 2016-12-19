<!DOCTYPE html>

<?php
    session_start();
    require_once('utils.php');
    $error='';
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $connect = db_connect();

        $profile_id=$_GET['id'];
        
        $question="SELECT * FROM users WHERE user_id = '$profile_id'";
        $result = mysqli_query($connect, $question) or die('Error to query' .mysqli_connect_error());
        $users = mysqli_fetch_array($result);
        if(@mysqli_num_rows($result)==0){
            $error="<p class='alert alert-danger' id='error'>Αυτος ο χρήστης δεν υπάρχει</p>";
        }
        
    }else{
        $profile_id= 'SFALMA';
    }
?>


<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Forum</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
     <link type="text/css" rel="stylesheet" href="tamplate.css"/>

        
    
</head>
    
<body>
    <!-- NAVBAR AND LOGIN  AND REGISTER BOXEES-->
    <?php
        include('navbar.php');

    ?>
    
    
    
    <!-- MAIN PAGE -->
    
        <div id=main>
            <?php if(isset($_SESSION['login_user'])){  //an yparxei connected user KAI einai katoxos tou profile?>
            <div class="panel panel-primary">
                    <div class="panel-heading">Προφίλ Χρήστη</div>
                      <div class="panel-body">
                              <div class="row"> <!-- SHOW PICTURE -->
                                  <div class="col-xs-4 col-md-2" style="">
                                            <img src="img/no_image.jpeg" alt="Profile Picture" class="img-thumbnail">
                                  </div> <!-- SHOW USER DETAILS -->
                                  <div class="col-xs-14 col-sm-8 col-md-10" style="border-left:1px solid gainsboro">
                                  <form class="form-horizontal" action="" method="post">
                                      <label>Username:</label><br>
                                      <input type="text" name="username" value="<?php echo $users['username']?>" maxlength="20" disabled="true"><br>
                                      <label>Email:</label><br>
                                      <input type="text" name="email" value="<?php echo $users['email']?>" maxlength="100" disabled="true">
                                  </form>
                                 </div>
                              </div>
                              <?php echo $error?>
                      </div>
            </div>
            <?php }else{ ?>

            <p class='alert alert-danger' id='error'>Για να μπορέσεις να δεις τα προφίλ των χρηστών πρέπει να είσαι <b><a href="navbar.php">συνδεδεμένος</a></b><br>Αν δεν έχεις λογαριασμό, κάνε <b><a href="navbar.php">εγγραφή</a></b></p>
            <?php } ?>
        </div>
    
    <!-- FOOTER-->
    <?php
        include('footer.php');
    ?>
</body>
</html>
