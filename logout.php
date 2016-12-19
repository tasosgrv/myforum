
<?php
    session_start();
    unset($_SESSION['login_user']);
    unset($_SESSION['security_level']);
    unset($_SESSION['user_id']);
    session_destroy();
    header("Location: index.php");
?>
