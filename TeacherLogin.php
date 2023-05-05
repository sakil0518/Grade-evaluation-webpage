<?php


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/standard.css" />
    <link rel="stylesheet" href="css/login.css" />

</head>

<body>
    <section>
        <div class="container-fluid navbar-style">
            <nav class="navbar fixed-top navbar-expand-lg navbar-light">

                <a class="navbar-brand" href="TeacherLogin.php">
                    ClassGrade
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        </div>
    </section>

    <div class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="110" height="110" fill="currentColor" class="bi bi-person-circle"
            viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </svg>
    </div>

    <div class="loginForm">
        <h1>Teacher Login</h1>

        <form action = "TeacherAuthenticate.php" method="post">

            <div class="field">
                <input type="text" name="username" required>
                <span></span>
                <label> Username </label>
            </div>

            <!-- <input type="submit" value="Login"> -->

            <div class="field">
                <input type="password" name="password" id="password" required>
                <span></span>
                <label> Password </label>
            </div>

            <!-- <div class="pass">Forgot Password?</div> -->
            <!-- <input type="checkbox" unchecked="unchecked" name="remember"> Remember me -->

     <div class="show">
        <input type="checkbox" onclick="myFunction()"> Show Password
      </div> 

            <script>
              function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                  x.type = "text";
                } else {
                  x.type = "password";
                }
              }
            </script>

            <input type="submit" value="Login">

            <div class="oppLogin"> Not a Teacher?
              <a href="StudentLogin.php">Student Login</a>
            </div>
        </form>
    </div>

</body>

</html>
