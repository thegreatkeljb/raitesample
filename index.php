
<!-- LOGIN PAGE FILE -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Raite Sample</title>
</head>
<body>
<section id="login">
        <div class="container">
            <div class="row justify-content-center custom-no-gutters">
                <div class="col-5">
                    <div class="reg_box">
                        <h3>Login</h3>
                        <form class="home_form">
                            <div class="form-floating">
                                <input type="text" class="form-control" placeholder="Name">
                                <label name="uname" class="form-label">USERNAME</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" placeholder="Password">
                                <label name="password" class="form-label">PASSWORD</label>
                            </div>
                            <button class="btn btn-primary">LOGIN</button> <!-- TO LOGIN -->
                            <a class="btn btn-light" href="registration.php">REGISTER</a>
                        </form>
                    </div>  
                </div>
                <div class="col-5"> <!-- FOR DESIGN ONLY -->
                    <div class="des_box">
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
