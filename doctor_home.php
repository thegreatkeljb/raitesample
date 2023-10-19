<?php
    session_start();
    if(!isset($_SESSION["doctor_user"])) {
        header("location: index.php");
    }
?>
<h1>Doctor Home</h1>