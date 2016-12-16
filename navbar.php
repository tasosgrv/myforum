<!DOCTYPE html>



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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	<!-- import jquery lib -->
		<script type="text/javascript" src="script.js"></script>
        
    
</head>

<body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
           <div class="navbar-header">
               <a class="navbar-brand" href="index.php">
                MyForum
                </a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <?php
                    if(isset($_SESSION['login_user'])){ ?>
                <li><a href="profile.php?id=<?php echo $_SESSION['user_id'] ?>"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['login_user'] ?></a></li>
                        <li><a href="logout.php">Αποσύνδεση</a></li>&nbsp;
                <?php }else{ ?>
                        <button class="btn btn-default navbar-btn" id="login_bt">Σύνδεση</button>
                        <button class="btn btn-default navbar-btn" id="register_bt">Εγγραφή</button>&nbsp;
                <?php } ?>
            </div>
        </div>    
    </nav>
    
    <div id="container-fluid">		
                <?php
                if(isset($_SESSION['login_user'])){
                    echo 'Δεν μπορείτε να χρησιμοποιησετε αυτή τη σελιδα';
                }else{
                    include("form_login.php");
                    include("form_register.php");
                }
                    
                ?>

    </div>	    
    
</body>
</html>
