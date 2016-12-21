<!DOCTYPE html>

<?php
    require_once('utils.php');
?>
<html lang="">
<head>
</head>

<body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
           <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainbar">
                   <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="index.php">MyForum</a>
            </div>
                    <?php
                        if(isset($_SESSION['username'])){ ?>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="profile.php?id=<?php echo $_SESSION['user_id'] ?>"><img src="<?php echo $_SESSION['avatar']?>" height="24" width="24"> <?php echo $_SESSION['username'] ?></a></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Αποσύνδεση</a></li>&nbsp;
                        </ul>

                    <?php }else{ ?>
                        <div class="nav navbar-nav navbar-right collapse navbar-collapse" id="mainbar">
                            <button class="btn btn-default navbar-btn" id="login_bt"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Σύνδεση</button>
                            <button class="btn btn-default navbar-btn" id="register_bt"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Εγγραφή</button>&nbsp;
                        </div>
                    <?php } ?>
        </div>    
    </nav>
    
    <div id="container-fluid">		
                <?php
                if(!isset($_SESSION['username'])){
                    include("form_login.php");
                    include("form_register.php");
                }
                ?>

        <div id="welcome">
                <?php
                if(isset($_SESSION['username'])){ ?>
                        <p class="alert alert-info" id="welcome">Καλως ηλθατε στο My Forum, <b><u><a class="alert-link" href="profile.php?id=<?php echo $_SESSION['user_id']?>"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username'] ?></a></u></b> συνδεθήκατε σαν
                        <?php check_user_level($_SESSION['security_level'])?></p>
                <?php }else{ ?>
                    <p class="alert alert-info" id="welcome">Καλως ηλθατε στο My Forum, <br>Για να μπορείτε να γραψετε στο forum πρέπει να κάνετε <b>Σύνδεση</b> η <b>Εγγραφή</b> παντωντας τα κουμπιά πανω δεξιά</p>
                <?php } ?>
        </div>

    </div>	    
    
</body>
</html>
