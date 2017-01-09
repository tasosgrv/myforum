<!DOCTYPE html>

<?php
    require_once('utils.php');
    $connect = db_connect();

    $question="SELECT subjects.*, users.username, users.avatar FROM subjects,users WHERE subjects.user_id = users.user_id ORDER BY pinned DESC, last_update DESC";
    //ektelesh erwthmatos
    $result = mysqli_query($connect, $question) or die(mysql_error());

    if($_SESSION['security_level']==1){
        if(isset($_POST['pin'])){ //kai an exei patithei to pin
            $id = $_POST['subject_id'];
            $pinned = $_POST['pinned'];
            if($pinned==0){
                mysqli_query($connect,"UPDATE subjects SET pinned='1' WHERE subject_id LIKE '$id'") or die('change pinned error' .  mysqli_connect_error());
                header("Location: index.php");
            }else{
                mysqli_query($connect,"UPDATE subjects SET pinned='0' WHERE subject_id LIKE '$id'") or die('change locked error' .  mysqli_connect_error());
                header("Location: index.php");
            }
        }

        if(isset($_POST['lock'])){ //kai an exei patithei to lock
            $id = $_POST['subject_id'];
            $locked = $_POST['locked'];
            if($locked==0){
                mysqli_query($connect,"UPDATE subjects SET locked='1' WHERE subject_id LIKE '$id'") or die('change locked error' .  mysqli_connect_error());
                header("Location: index.php");
            }else{
                mysqli_query($connect,"UPDATE subjects SET locked='0' WHERE subject_id LIKE '$id'") or die('change locked error' .  mysqli_connect_error());
                header("Location: index.php");
            }
        }
    }

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
                                <?php if($_SESSION['security_level']==1){ echo '<td>Επεξεργασία</td>';}?>
                            </tr>
                            <?php while($subjects = mysqli_fetch_array($result)){?>
                                <tr>
                                    <td>
                                        <?php echo $subjects['subject_id'] ?>
                                    </td>
                                    <td> <!-- TITLOS -->
                                        <?php if($subjects['pinned']==1){
                                            echo "<span class='glyphicon glyphicon-pushpin'></span>";
                                        } ?>
                                        <?php if($subjects['locked']==1){
                                            echo "<span class='glyphicon glyphicon-lock'></span>";
                                        } ?>
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
                                    <td> <!-- ADMIN UTILS-->
                                        <?php
                                            if($_SESSION['security_level']==1){ ?>
                                            <form id="pin" method="post" action="">
                                                <input type="hidden" name="subject_id" value="<?php echo $subjects['subject_id']; ?>"/>
                                                <input type="hidden" name="pinned" value="<?php echo $subjects['pinned']; ?>"/>
                                                <button class="btn btn-default" name="pin"><span class='glyphicon glyphicon-pushpin'></span> <?php if($subjects['pinned']){echo 'Unpin';}else{echo 'Pin';} ?></button><p></p>
                                            </form><p></p>
                                            <form id="lock" method="post" action="">
                                                <input type="hidden" name="subject_id" value="<?php echo $subjects['subject_id']; ?>"/>
                                                <input type="hidden" name="locked" value="<?php echo $subjects['locked']; ?>"/>
                                                <button class="btn btn-default" name="lock"><span class="glyphicon glyphicon-lock"></span> <?php if($subjects['locked']){echo 'Unlock';}else{echo 'Lock';} ?></button><p></p>
                                            </form><p></p>
                                          <?php  }  ?>
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
