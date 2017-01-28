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
        <div class="row">
          <div class="col-xs-6 col-sm-4">
            <h1>Contact</h1>
            <ul style="list-style: none">
                <li><a href="https://facebook.com/sakafliasg4" id="footer_links" target="_blank"><img src="img/facebook.png"> Facebook</a></li>
                <li><a href="https://twitter.com/tasosgrv" id="footer_links" target="_blank"><img src="img/twitter.png"> Twitter</a></li>
                <li><a href="https://github.com/sakafliasg4" id="footer_links" target="_blank"><img src="img/github.png"> Github</a></li>
            </ul>
            </div>
          <div class="col-xs-6 col-sm-4" style="border-left:1px solid gray">
            <h1>About</h1>
              <p>Συζητήστε ότι θέμα θέλετε online</p>
              <p>Created by tasosg4 - Hosted by <a href="000webhost.com">000webhost</a></p>
            </div>
          <!-- Optional: clear the XS cols if their content doesn't match in height -->
          <div class="clearfix visible-xs-block"></div>
          <div class="col-xs-6 col-sm-4" style="border-left:1px solid gray">
              <h1><a href="#" id="footer_links"><span class="glyphicon glyphicon-arrow-up"></span>Back to Top</a></h1>
            </div>
        </div>
    </div>
</body>
</html>

