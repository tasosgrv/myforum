<!DOCTYPE html>
<!-- ARXIKH-->
<?php
    session_start();
    
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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>	<!-- import jquery lib -->
		<script type="text/javascript" src="script.js"></script>
        

</head>
    
<body>
    <!-- NAVBAR AND LOGIN  AND REGISTER BOXEES-->
    <?php
        include('navbar.php');
    ?>
    
    <!-- MAIN PAGE -->
    
    <?php
        include('main_section.php');
    ?>
    
    <!-- FOOTER-->
    <?php
        include('footer.php');
    ?>

    
    
</body>
</html>
