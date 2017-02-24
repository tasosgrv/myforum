<!DOCTYPE html>
<?php
    include('register.php');
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
<!-- Modal -->
<div class="modal fade" id="register_box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Εγγραφή</h4>
      </div>
      <div class="modal-body" style="background-color: gainsboro">
        <center>
        <?php
        if(isset($_SESSION['username'])){
            echo 'Δεν μπορείτε να χρησιμοποιησετε αυτή τη σελιδα';
        }else{ ?>
        Εισάγετε τα στοιχεία σας για να κανετε εγγραφη <b>(με * τα απαραιτητα πεδία)</b><p>
        <form class="form-horizontal" action="" method="post">
            <label>*Username: </label>
            <input type="text" name="username" maxlength="20"><p><p>
            <label>*E-mail: </label>
            <input type="email" name="email" maxlength="100"><p>
            <label>*Password: </label>
            <input type="password" name="password" maxlength="32"><p>
            <label>*Repeat Password: </label>
            <input type="password" name="repass" maxlength="32"><p>
            <button type="submit" name="submit_register" class="btn btn-primary">Αποστολή</button>
            <button type="reset" class="btn btn-default">Καθαρισμός</button><br><br>
        </form>
        <?php } ?>
        </center>
      </div> <!-- modal-body !-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Άκυρο</button>
      </div>
    </div><!-- modal-content !-->
  </div><!-- modal-dialog!-->
</div><!-- modal !-->
                <?php echo $error ?>
                <?php echo $epityxia; ?>
</body>
</html>
