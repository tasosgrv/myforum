<!DOCTYPE html>
<!-- MEMBERS-->
<?php
    session_start();
    require_once('utils.php');
    $connect = db_connect();

    $question="SELECT * FROM users";
    //ektelesh erwthmatos
    $result = mysqli_query($connect, $question) or die(mysql_error());

    if($_SESSION['security_level']==1){
        if(isset($_POST['change_status'])){ //kai an exei patithei to change status
            $id = $_POST['user_id'];
            $active = $_POST['active'];
            if($active==0){
                mysqli_query($connect,"UPDATE users SET active='1' WHERE user_id LIKE '$id'") or die('change status error' .  mysqli_connect_error());
                header("Location: members.php");
            }else{
                mysqli_query($connect,"UPDATE users SET active='0' WHERE user_id LIKE '$id'") or die('change status error' .  mysqli_connect_error());
                header("Location: members.php");
            }
        }
        if(isset($_POST['change_rank'])){ //kai an exei patithei to change rank
            $id = $_POST['user_id'];
            $rank = $_POST['security_level'];
            if($rank==0){
                mysqli_query($connect,"UPDATE users SET security_level='1' WHERE user_id LIKE '$id'") or die('change rank error' .  mysqli_connect_error());
                header("Location: members.php");
            }else{
                mysqli_query($connect,"UPDATE users SET security_level='0' WHERE user_id LIKE '$id'") or die('change rank error' .  mysqli_connect_error());
                header("Location: members.php");
            }
        }
        if(isset($_POST['delete'])){ //kai an exei patithei to delete
            $id = $_POST['user_id'];  //vale sto id thn metavliti apo to kryfo pedio
            mysqli_query($connect,"DELETE FROM users WHERE user_id LIKE '$id'") or die('delete error' .  mysqli_connect_error());
            header("Location: members.php");
        }
    }


?>


<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/gif" href="favicon.gif"/>
    <title>My Forum - Members List</title>
    <meta name="description" content="Συζητήστε ότι θέμα θέλετε online - Members List">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
     <link type="text/css" rel="stylesheet" href="tamplate.css"/>

</head>

<body>
    <?php
        include('navbar.php');
    ?>
    <div id="container-fluid">
        <section id="main">
            <div class="panel panel-primary">
                <div class="panel-heading"> Λίστα Μελών &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                <?php if(@mysqli_num_rows($result)==0){
                    header("Location: logout.php");
                }else{ ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <td>ID</td><td>Username</td><td>Email</td><td>Μηνύματα</td><td>Κατάσταση Λογαριασμού</td><td>Rank</td><td>Ημερομηνία εγγραφής</td><?php if($_SESSION['security_level']==1){ echo '<td>Επεξεργασία</td>';}?>
                            </tr>
                            <?php while($users = mysqli_fetch_array($result)){?>
                            <tr>
                                <td> <!--ID-->
                                    <?php echo $users['user_id'] ?>
                                </td>
                                <td> <!--USERNAME-->
                                    <a href="profile.php?id=<?php echo $users['user_id'] ?>"><img src="<?php echo $users['avatar']?>" height="24" width="24"> <?php echo $users['username'] ?></a>
                                </td>
                                <td>
                                    <?php echo $users['email'] ?>
                                </td>
                                <td> <!--MHNYMATA-->
                                    <?php echo sum_posts_by_user($users['user_id']) ?>
                                </td>
                                <td> <!--KATASTASH LOGARIASMOU-->
                                    <?php check_active_code($users['active'])?>
                                </td>
                                <td> <!--RANK-->
                                    <?php check_user_level($users['security_level'])?>
                                </td>
                                <td>
                                    <?php echo $users['registration_date']?>
                                </td>
                                <td>
                                    <?php if($_SESSION['security_level']==1){ ?>
                                        <?php if($users['user_id']!=$_SESSION['user_id']){ ?>
                                           <form id="change_rank" method="post" action="">
                                                <input type="hidden" name="user_id" value="<?php echo $users['user_id']; ?>"/>
                                                <input type="hidden" name="security_level" value="<?php echo $users['security_level']; ?>"/>
                                                <button class="btn btn-default" name="change_rank"><span class="glyphicon glyphicon-star"></span> Αλλαγή Rank</button><p></p>
                                            </form><p></p>
                                            <form id="change_status" method="post" action="">
                                                <input type="hidden" name="user_id" value="<?php echo $users['user_id']; ?>"/>
                                                <input type="hidden" name="active" value="<?php echo $users['active']; ?>"/>
                                                <button class="btn btn-default" name="change_status"><span class=" glyphicon glyphicon-lock"></span> Αλλαγή Κατ. Λογαριασμού</button>
                                            </form><p></p>
                                            <form id="delete" method="post" action="">
                                                <input type="hidden" name="user_id" value="<?php echo $users['user_id']; ?>"/>
                                                <button class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Διαγραφή</button><p></p>
                                            </form><p></p>
                                        <?php } ?>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                <?php
                    }
                    mysqli_close($connect);
                ?>
            </div>
        </section>
    </div>

    <?php
        include('footer.php');
    ?>

</body>
</html>
