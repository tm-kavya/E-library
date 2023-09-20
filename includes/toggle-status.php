<?php 

    include 'database.php';

    if($_GET['status'] == 0){ 

        $update = "UPDATE request SET rstatus=1 WHERE rid={$_GET['requestid']}";
    }
    else{
        $update = "UPDATE request SET rstatus=0 WHERE rid={$_GET['requestid']}";
    }
    mysqli_query($dbc,$update);
    header('Location: ../view-request-details.php');
?>