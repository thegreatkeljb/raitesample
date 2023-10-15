<?php
    // database
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "raitesample";
    // variables
    $state = "";
    $response = "";
    if(isset($_POST["register_patient"])) {
        $conn = mysqli_connect($server, $username, $password, $database);
        if(!$conn) {
            $response = "Connection to server failed.";
        } else {
            // set time zone
            $query_time = "SET time_zone = '+08:00';";
            $statement_time = mysqli_prepare($conn, $query_time);
            mysqli_stmt_execute($statement_time);
            // check users
            $user = $_POST["username"];
            $query_patient = "SELECT patient_number FROM patients WHERE username = ?;";
            $statement_patient = mysqli_prepare($conn, $query_patient);
            mysqli_stmt_bind_param($statement_patient, "s", $user);
            mysqli_stmt_execute($statement_patient);
            $result_patient = mysqli_stmt_get_result($statement_patient);
            $query_doctor = "SELECT doctor_number FROM doctors WHERE username = ?;";
            $statement_doctor = mysqli_prepare($conn, $query_doctor);
            mysqli_stmt_bind_param($statement_doctor, "s", $user);
            mysqli_stmt_execute($statement_doctor);
            $result_doctor = mysqli_stmt_get_result($statement_doctor);
            // query
            if(mysqli_num_rows($result_patient) == 0 && mysqli_num_rows($result_doctor) == 0) {
                $name = $_POST["name"];
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                $query = "INSERT INTO patients(name, username, email, password, date_registered) VALUES (?, ?, ?, ?, NOW());";
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($statement, "ssss", $name, $username, $email, $password_hash);
                mysqli_stmt_execute($statement);
                $state = "patient-registration-success";
                $response = "Patient Registration Successful!";
            } else {
                $response = "Username is already taken";
            }
        }
        $data = array(
            'state' => $state,
            'response' => $response
        );
        $json_data = json_encode($data);
        header('Content-Type: application/json');
        echo $json_data;
    } else if(isset($_POST["register_doctor"])) {
        $conn = mysqli_connect($server, $username, $password, $database);
        if(!$conn) {
            $response = "Connection to server failed.";
        } else {
            // set time zone
            $query_time = "SET time_zone = '+08:00';";
            $statement_time = mysqli_prepare($conn, $query_time);
            mysqli_stmt_execute($statement_time);
            // check users
            $user = $_POST["username"];
            $query_patient = "SELECT patient_number FROM patients WHERE username = ?;";
            $statement_patient = mysqli_prepare($conn, $query_patient);
            mysqli_stmt_bind_param($statement_patient, "s", $user);
            mysqli_stmt_execute($statement_patient);
            $result_patient = mysqli_stmt_get_result($statement_patient);
            $query_doctor = "SELECT doctor_number FROM doctors WHERE username = ?;";
            $statement_doctor = mysqli_prepare($conn, $query_doctor);
            mysqli_stmt_bind_param($statement_doctor, "s", $user);
            mysqli_stmt_execute($statement_doctor);
            $result_doctor = mysqli_stmt_get_result($statement_doctor);
            // query
            if(mysqli_num_rows($result_patient) == 0 && mysqli_num_rows($result_doctor) == 0) {
                $name = $_POST["name"];
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $password_hash = password_hash($password, PASSWORD_BCRYPT);
                $query = "INSERT INTO doctors(name, username, email, password, date_registered) VALUES (?, ?, ?, ?, NOW());";
                $statement = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($statement, "ssss", $name, $username, $email, $password_hash);
                mysqli_stmt_execute($statement);
                $state = "doctor-registration-success";
                $response = "Doctor Registration Successful!";
            } else {
                $response = "Username is already taken";
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