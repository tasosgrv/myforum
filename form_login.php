<!DOCTYPE html>
<?php
    include('login.php');
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
                <article id="login_box">
                    <center>
                    <?php    
                    if(isset($_SESSION['login_user'])){
                        echo 'Δεν μπορείτε να χρησιμοποιησετε αυτή τη σελιδα';
                    }else{ ?>    
                    Εισάγετε τα στοιχεία σας για να συνδεθείτε
                    <form class="form-horizontal" action="" method="POST"> 
                        <label>Username:</label>
                        <input type="text" name="username" maxlength="20" class="font"><p>
                        <label>Password: </label>
                        <input type="password" name="password" maxlength="32"><p>
                        <button type="submit" name="submit_login" class="btn btn-primary">Αποστολή</button>
                        <button type="reset" class="btn btn-default">Καθαρισμός</button><br><br>
                        
                    </form>
                    <?php } ?>
                    </center>
				</article>
                <?php echo $error ?>
</body>
</html>
