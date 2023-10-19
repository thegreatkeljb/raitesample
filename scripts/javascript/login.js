// LOGIN SCRIPT

document.getElementById("loginbutton").addEventListener("click", function(e) {
    e.preventDefault();
    loginUser();
});
function loginUser() {
    const username = document.getElementById("uname");
    const password = document.getElementById("password");
    var formData = new FormData();
    formData.append("login", 1);
    formData.append("username", username.value);
    formData.append("password", password.value);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "scripts/php/login.php", true);
    xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
            const response = xhr.responseText;
            const data = JSON.parse(response);
            if(data.state == "patient-login-success") {
                window.location.href = "patient_home.php";
            } else if(data.state == "doctor-login-success") {
                window.location.href = "doctor_home.php";
            } else {
                alert(data.response);
            }
        }
    }
    xhr.send(formData);
}