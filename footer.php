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
    
    <div class="container-fluid" id="end">
        <h1>Contact</h1>

    </div>


</body>
</html>
