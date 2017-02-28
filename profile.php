<!DOCTYPE html>

<?php
    session_start();
    require_once('utils.php');
    $error = array();
    $success ='';
    $users = get_user_id($_GET['id']);

    include('change_data.php');

?>


<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/gif" href="favicon.gif"/>
    <title>My Forum - <?php echo $users['username']?> profile</title>
    <meta name="description" content="Συζητήστε ότι θέμα θέλετε online - <?php echo $users['username']?> profile">

    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
     <link type="text/css" rel="stylesheet" href="tamplate.css"/>
    
</head>
    
<body>
    <!-- NAVBAR AND LOGIN  AND REGISTER BOXEES-->
    <?php
        include('navbar.php');

    ?>
    
    
    
    <!-- MAIN PAGE -->
    
        <div id=main>
            <?php if(isset($_SESSION['username'])){  //an yparxei connected user
                if($_SESSION['user_id']==$users['user_id']){ //an to profile tou xristi einai diko tou ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Προφίλ Χρήστη</div>
                            <div class="panel-body">
                                <div class="row"> <!-- SHOW PICTURE -->
                                    <div class="col-xs-6 col-md-2" style="">
                                        <img src="<?php echo $users['avatar']?>" alt="Profile Picture" class="img-thumbnail img-responsive"><p></p>
                                        <label>Rank: <?php check_user_level($_SESSION['security_level'])?></label><br>
                                        <label>Μέλος από:</label><br>
                                        <?php echo $users['registration_date']?><p></p>
                                        <label>Κατάσταση Λογαριασμού:</label><br>
                                        <?php check_active_code($users['active'])?><p></p>
                                        <label>Μηνύματα: <?php echo sum_posts_by_user($users['user_id'])?></label><br>
                                    </div> <!-- SHOW USER DETAILS -->
                                    <div class="col-xs-12 col-sm-8 col-md-10" style="border-left:1px solid gainsboro">
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                        <label>(*)Username:</label><br>
                                        <input type="text" name="username" value="<?php echo $users['username']?>" maxlength="20"><p></p>
                                        <label>(*)Email:</label><br>
                                        <input type="text" name="email" value="<?php echo $users['email']?>" maxlength="100"><p></p>
                                        <label>Αλλαξε άβαταρ:</label>
                                        <input type="file" name="avatar"><br>
                                        <label>(*)Εισάγετε τον κωδικό σας για να αλλάξετε τα στοιχεία σας</label><br>
                                        <input type="password" name="password" maxlength="32"><p></p>
                                        <button type="submit" name="submit" class="btn btn-primary">Ενημέρωση Προφίλ</button>
                                    </form>
                                        <?php echo $success ?>
                                        <?php
                                            foreach ($error as $er){
                                                echo $er;
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                <?php }else{ //an dn einai diko tou ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">Προφίλ Χρήστη</div>
                            <div class="panel-body">
                                <div class="row"> <!-- SHOW PICTURE -->
                                    <div class="col-xs-6 col-md-2" style="">
                                        <img src="<?php echo $users['avatar']?>" alt="Profile Picture" class=" img-thumbnail img-responsive">
                                        <label>Rank: <?php check_user_level($users['security_level'])?></label><br>
                                    </div> <!-- SHOW USER DETAILS -->
                                    <div class="col-xs-12 col-sm-8 col-md-10" style="border-left:1px solid gainsboro">
                                    <form class="form-horizontal">
                                        <label>Όνομα χρήστη:</label><br>
                                        <input type="text" name="username" value="<?php echo $users['username']?>" maxlength="20" disabled="true"><p></p>
                                        <label>Email:</label><br>
                                        <input type="text" name="email" value="<?php echo $users['email']?>" maxlength="100" disabled="true"><p></p>
                                        <label>Μέλος από:</label><br>
                                        <?php echo $users['registration_date']?><p></p>
                                        <label>Κατάσταση Λογαριασμού:</label><br>
                                        <?php check_active_code($users['active'])?><p></p>
                                        <label>Μηνύματα: <?php echo sum_posts_by_user($users['user_id'])?></label><br><p></p>
                                    </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                <?php } ?>

            <?php }else{ //an den yparxei conneted xrisths ?>
                <p class='alert alert-danger' id='error'>Για να μπορέσεις να δεις τα προφίλ των χρηστών πρέπει να είσαι <b>συνδεδεμένος</b><br>Αν δεν έχεις λογαριασμό, κάνε <b>εγγραφή</b></p>
            <?php } ?>
        </div>
    
    <!-- FOOTER-->
    <?php
        include('footer.php');
    ?>

</body>
</html>
