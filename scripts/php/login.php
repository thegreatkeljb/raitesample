<?php
    require("database.php");
    // variables
    $state = "";
    $response = "";
    if(isset($_POST["login"])) {
        $conn = mysqli_connect($server, $username, $password, $database);
        if(!$conn) {
            $response = "Connection to server failed.";
        } else {
            // set time zone
            $query_time = "SET time_zone = '+08:00';";
            $statement_time = mysqli_prepare($conn, $query_time);
            mysqli_stmt_execute($statement_time);
            // check users
            $username = $_POST["username"];
            $password = $_POST["password"];
            $query_patient = "SELECT patient_number, username, password FROM patients WHERE username = ?;";
            $statement_patient = mysqli_prepare($conn, $query_patient);
            mysqli_stmt_bind_param($statement_patient, "s", $username);
            mysqli_stmt_execute($statement_patient);
            $result_patient = mysqli_stmt_get_result($statement_patient);
            $query_doctor = "SELECT doctor_number, username, password FROM doctors WHERE username = ?;";
            $statement_doctor = mysqli_prepare($conn, $query_doctor);
            mysqli_stmt_bind_param($statement_doctor, "s", $username);
            mysqli_stmt_execute($statement_doctor);
            $result_doctor = mysqli_stmt_get_result($statement_doctor);
            // query
            if(mysqli_num_rows($result_patient) == 1) {
                $patient = mysqli_fetch_assoc($result_patient);
                if(password_verify($password, $patient["password"])) {
                    session_start();
                    $_SESSION["patient_user"] = $patient["patient_number"];
                    $state = "patient-login-success";
                } else {
                    $response = "Incorrect patient password entered.";
                }
            } else if(mysqli_num_rows($result_doctor) == 1) {
                $doctor = mysqli_fetch_assoc($result_doctor);
                if(password_verify($password, $doctor["password"])) {
                    session_start();
                    $_SESSION["doctor_user"] = $doctor["doctor_number"];
                    $state = "doctor-login-success";
                } else {
                    $response = "Incorrect doctor password entered.";
                }
            } else {
                $response = "Username not recognized.";
            }
        }
        $data = array(
            'state' => $state,
            'response' => $response
        );
        $json_data = json_encode($data);
        header('Content-Type: application/json');
        echo $json_data;
    }
?>