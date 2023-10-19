<?php
    session_start();
    if(!isset($_SESSION["patient_user"])) {
        header("location: index.php");
    }
?>
<h1>Patient Home</h1>