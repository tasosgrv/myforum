<!DOCTYPE html>


<html lang="">
<head>

</head>

<body>
        <div class="container-fluid">
        <div class="panel panel-info">
            <div class="panel-heading">Στατιστικά</div>
            <p id="main">
                <?php
                    echo 'Εγγεγραμένοι χρήστες: '.sum_users().'<br>';
                    echo 'Συνολο Θεμάτων: '.sum_subjects().'<br>';
                    echo 'Συνολο Μηνυμάτων: '.sum_posts().'<br>';
                    $member = new_memeber();
                    echo "Νεότερο Μέλος μας: <a href='profile.php?id=".$member['user_id']."'>".$member['username']."</a><br>";
                ?>
            </p>
        </div>
    </div>
    
    
    <div id="container">
        <footer id="footer">
            <div class="panel panel-default">
                <div class="panel-heading">Footer</div>
                    <p id="abot">This is a demo site<br></p>

            </div>
        </footer>
    </div>
</body>
</html>
