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

        
    
</head>

<body>
        <div id="container-fluid">
        <section id="main">
            <?php
                if(isset($_SESSION['login_user'])){ ?>
                    <p class="alert alert-info" id="welcome">Καλως ηλθατε στο My Forum, <b><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['login_user'] ?></b> συνδεθήκατε σαν 
                        <?php if ($_SESSION['security_level']==1){ echo ' Διαχειρηστής'; }else{ echo ' Kανονικός Χρήστης';}?></p>
                <?php }else{ ?>
                    <p class="alert alert-info" id="welcome">Καλως ηλθατε στο My Forum, <br>Για να μπορείτε να γραψετε στο forum πρέπει να κάνετε <b>Σύνδεση</b> η <b>Εγγραφή</b> παντωντας τα κουμπιά πανω αριστερά</p>
                <?php } ?>
        
            <div class="panel panel-primary">
                <div class="panel-heading"> Θέματα</div>
                <table class="table table-hover">
                    <tr>
                        <td>#</td><td>Τιτλος</td><td>Τελευαίος Χρηστης</td><td>Τελευταία ανανέωση</td>
                    </tr>
                    <tr>
                        <td>1</td><td>ασδξκφηλακσδξφηλασδκξφηλακσδξφληακσδξφη</td><td>tasosg4</td><td>15/12/2016</td>
                    </tr>
                </table>
            </div>    
        </section>                
    </div>
</body>
</html>
