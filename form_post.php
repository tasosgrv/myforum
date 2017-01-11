<!DOCTYPE html>

<?php
    session_start();
    require_once('utils.php');
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }

    if(isset($_GET['id']) && is_numeric($_GET['id']) && empty($_GET['id'])===false){
        $connect = db_connect();
        $subject = $_GET['id'];
        $question = "SELECT title FROM subjects WHERE subject_id = $subject";
        $result1 = mysqli_query($connect, $question) or die('Error to query' .mysqli_connect_error());
        $subject_title = mysqli_fetch_array($result1);
    }
    include('post.php');

?>


<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Forum - Νεο Μήνυμα - <?php if(isset($subject_title['title'])){echo $subject_title['title'];} ?></title>

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

    <div id="container">
        <section id="main">
            <div class="panel panel-primary">
                <div class="panel-heading"> Νεο Θέμα &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <div class="panel-body" style="background:gainsboro">
                   <form action="" method="post">
                       <label>Τίτλος: </label><br>
                       <?php if(isset($subject_title['title'])){?>
                            <input type="text" class="form-control" name="title" maxlength="200"  disabled="true" value="<?php echo $subject_title['title']?>" aria-describedby="sizing-addon2"><p></p>
                            <input type="hidden" name="subject_id" value="<?php echo $subject ?>"/>
                       <?php }else{?>
                            <input type="text" class="form-control" name="title" maxlength="200" aria-describedby="sizing-addon2"><p></p>
                       <?php }?>
                       <label>Μήνυμα: </label><br>
                       <textarea name="message" class="form-control" cols=100 rows="10" maxlength="2000"></textarea><p></p>
                       <i>Αν θελετε να προσθέσετε κάποια εικόνα πρέπει την ανεβάσετε σε κάποιo online site</i>
                       <center>
                            <button type="submit" name="submit" class="btn btn-primary">Αποστολή</button>
                            <button type="reset" class="btn btn-default">Καθαρισμός</button><br><br>
                        </center>
                    </form>
                    <?php echo $error ?>
                    <?php echo $epityxia ?>
                </div>
            </div>
        </section>
    </div>


    <!-- FOOTER-->
    <?php
        include('footer.php');
    ?>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
