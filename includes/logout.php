<?php

session_start();
unset($_SESSION['ID']);
unset($_SESSION['UID']);
session_destroy();
header("location: ../index.php");

?>


