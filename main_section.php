<!DOCTYPE html>

<?php
    require_once('utils.php');
    $connect = db_connect();

    $question="SELECT * FROM subjects";
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
                                <td>#</td><td>Τιτλος</td><td>Μηνύματα</td><td>Τελευαίος Χρηστης</td><td>Τελευταία ανανέωση</td>
                            </tr>
                            <?php while($subjects = mysqli_fetch_array($result)){?>
                                <tr>
                                    <td>
                                        <?php echo $subjects['subject_id'] ?>
                                    </td>
                                    <td>
                                        <a href="subject.php?id=<?php echo $subjects['subject_id']?>"><b><?php echo $subjects['title']?></b></a>
                                    </td>
                                    <td>
                                        <?php
                                            $question = "SELECT COUNT(*) FROM posts WHERE subject_id='{$subjects['subject_id']}'";
                                            $num_posts = mysqli_query($connect, $question) or die(mysql_error());
                                            echo $num_posts;
                                        ?>
                                    </td>
                                    <td>tasosg4</td>
                                    <td><?php echo $subjects['last_update']?></td>
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
