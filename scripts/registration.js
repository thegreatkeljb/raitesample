// REGISTRATION SCRIPT
const emailRegex = /^$|^[ñÑa-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

document.getElementById("regbutton").onclick = function(e) {
    e.preventDefault();
    const privelege = document.getElementById("userpriv").value;
    if(privelege == "PATIENT") {
        registerPatient();
    } else if(privelege == "DOCTOR") {
        registerDoctor();
    } else {
        alert("Please select a privelege");
    }
}
function registerPatient() {
    const name = document.getElementById("name");
    const username = document.getElementById("uname");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    if(name.value && username.value && email.value && password.value) {
        if(emailRegex.test(email.value)) {
            var formData = new FormData();
            formData.append("register_patient", 1);
            formData.append("name", name.value);
            formData.append("username", username.value);
            formData.append("email", email.value);
            formData.append("password", password.value);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "register_user.php", true);
            xhr.onreadystatechange = function() {
                if(xhr.readyState === 4 && xhr.status === 200) {
                    const response = xhr.responseText;
                    const data = JSON.parse(response);
                    if(data.state == "patient-registration-success") {
                        alert(data.response);
                        window.location.href = "index.php";
                    } else {
                        alert(data.response);
                    }
                }
            }
            xhr.send(formData);
        } else {
            alert("Please enter a valid email.")
        }
    } else {
        alert("Please fill out all of the fields.");
    }
}
function registerDoctor() {
    const name = document.getElementById("name");
    const username = document.getElementById("uname");
    const email = document.getElementById("email");
    const password = document.getElementById("password");
    if(name.value && username.value && email.value && password.value) {
        if(emailRegex.test(email.value)) {
            var formData = new FormData();
            formData.append("register_doctor", 1);
            formData.append("name", name.value);
            formData.append("username", username.value);
            formData.append("email", email.value);
            formData.append("password", password.value);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "register_user.php", true);
            xhr.onreadystatechange = function() {
                if(xhr.readyState === 4 && xhr.status === 200) {
                    const response = xhr.responseText;
                    const data = JSON.parse(response);
                    if(data.state == "doctor-registration-success") {
                        alert(data.response);
                        window.location.href = "index.php";
                    } else {
                        alert(data.response);
                    }
                }
            }
            xhr.send(formData);
        } else {
            alert("Please enter a valid email.")
        }
    } else {
        alert("Please fill out all of the fields.");
    }
}