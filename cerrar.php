<?php session_start();

    session_destroy();
    $_SESSION = array();
    
    header('location: index2.php');

?>