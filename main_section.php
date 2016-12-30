<!DOCTYPE html>

<?php
    require_once('utils.php');
    $connect = db_connect();

    $question="SELECT subjects.*, users.username, users.avatar FROM subjects,users WHERE subjects.user_id = users.user_id ORDER BY last_update DESC";
    //ektelesh erwthmatos
    $result = mysqli_query($connect, $question) or die(mysql_error());

?>

<html lang="">
<head>

</head>

<body>
    <div id="container-fluid">
        <section id="main">
            <div class="panel panel-primary">
                <div class="panel-heading"> Θέματα &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="form_post.php"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Νέο Θέμα</button></a></div>
                <?php if(@mysqli_num_rows($result)==0){
                    echo "<p class='alert alert-danger' id='error'><b>Δεν υπάρχουν θέματα</b></p>";
                }else{?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <td>#</td><td>Τιτλος</td><td>Μηνύματα</td><td>Δημιουργήθηκε από</td><td>Τελευαίο Μήνυμα από</td><td>Τελευταία ανανέωση</td>
                            </tr>
                            <?php while($subjects = mysqli_fetch_array($result)){?>
                                <tr>
                                    <td>
                                        <?php echo $subjects['subject_id'] ?>
                                    </td>
                                    <td> <!-- TITLOS -->
                                        <a href="subject.php?id=<?php echo $subjects['subject_id']?>"><b><?php echo $subjects['title']?></b></a>
                                    </td>
                                    <td>
                                        <?php //count posts for each subject
                                            echo count_posts_each_subject($subjects['subject_id']);
                                        ?>
                                    </td>
                                    <td>    <!-- CREATED -->
                                        <a href="profile.php?id=<?php echo $subjects['user_id'] ?>"><img src="<?php echo $subjects['avatar']?>" height="24" width="24"> <?php echo $subjects['username'] ?></a>
                                    </td>
                                    <td> <!-- LAST USER POSTED -->
                                        <?php
                                            $last_user = last_user_posted($subjects['subject_id']);
                                        ?>
                                        <a href="profile.php?id=<?php echo $last_user['user_id'] ?>"><img src="<?php echo $last_user['avatar']?>" height="24" width="24"> <?php echo $last_user['username'] ?></a>

                                    </td>
                                    <td> <!-- LAST update -->
                                        <?php echo $subjects['last_update']?>
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
</body>
</html>
