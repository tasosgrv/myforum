<!DOCTYPE html>

<?php
    session_start();
    require_once('utils.php');
    if(isset($_GET['id']) && is_numeric($_GET['id']) && empty($_GET['id'])===false){
        $connect = db_connect();
        $subject = $_GET['id'];
        $question = "SELECT users.*, posts.* FROM users, posts WHERE posts.subject_id = $subject AND posts.user_id = users.user_id";
        $result = mysqli_query($connect, $question) or die('Error to query' .mysqli_connect_error());
        if(@mysqli_num_rows($result)==0){
            header("Location: index.php");
            exit();
        }else{
            $question = "SELECT title FROM subjects WHERE subject_id = $subject";
            $result1 = mysqli_query($connect, $question) or die('Error to query' .mysqli_connect_error());
            $subject_title = mysqli_fetch_array($result1);

        }
    }else{
        header("Location: index.php");
        exit();
    }
?>

<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Forum - Θέματα - <?php echo $subject_title['title'] ?></title>
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
    <div id=main>
        <div class="panel panel-primary">
            <div class="panel-heading">Θέμα: <?php echo $subject_title['title'] ?></div>
            <?php while($posts_data = mysqli_fetch_array($result)){?>
            <div class="panel panel-default">
                <div class="panel-heading">Mήνυμα: #<?php echo $posts_data['post_id']?></div>
                    <div class="panel-body">
                     <div class="row"> <!-- SHOW USER INFO -->
                        <div class="col-xs-6 col-md-2" style="">
                            <p class="text-center">
                                <a href="profile.php?id=<?php echo $posts_data['user_id'] ?>"><b><span class=" glyphicon glyphicon-user"></span><?php echo $posts_data['username'] ?></b></a>
                                <img src="<?php echo $posts_data['avatar']?>" alt="Profile Picture" class="img-thumbnail img-responsive" width="200" height="200">
                                <label>Rank: <?php check_user_level($posts_data['security_level'])?></label><br>
                            </p>
                        </div> <!-- SHOW MESSAGE -->
                        <div class="col-xs-12 col-sm-8 col-md-10" style="border-left:1px solid gainsboro">
                            <p><?php echo $posts_data['message']?></p><hr>
                            <p class="bg-info">Posted: <?php echo $posts_data['date']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
                mysqli_close($connect);
            ?>
        </div>
    </div>
    <!-- FOOTER-->
    <?php
        include('footer.php');
    ?>

</body>
</html>
