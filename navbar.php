<!DOCTYPE html>



<html lang="">
<head>
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

        <div id="main">
                <?php
                if(isset($_SESSION['login_user'])){ ?>
                        <p class="alert alert-info" id="welcome">Καλως ηλθατε στο My Forum, <b><u><a class="alert-link" href="profile.php?id=<?php echo $_SESSION['user_id']?>"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['login_user'] ?></a></u></b> συνδεθήκατε σαν
                        <?php if ($_SESSION['security_level']==1){ echo ' Διαχειρηστής'; }else{ echo ' Kανονικός Χρήστης';}?></p>
                <?php }else{ ?>
                    <p class="alert alert-info" id="welcome">Καλως ηλθατε στο My Forum, <br>Για να μπορείτε να γραψετε στο forum πρέπει να κάνετε <b>Σύνδεση</b> η <b>Εγγραφή</b> παντωντας τα κουμπιά πανω δεξιά</p>
                <?php } ?>
        </div>

    </div>	    
    
</body>
</html>
