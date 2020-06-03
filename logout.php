<?php
    session_start();

    unset($_SESSION['user']);
    unset($_SESSION['isUserLoggined']);
    
    header("Location: login.php");
    exit();
?>