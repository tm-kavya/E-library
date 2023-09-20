<?php

    session_start();
    if(!isset($_SESSION['UID'])){
        header("Location: user-login.php");
    }  

?>