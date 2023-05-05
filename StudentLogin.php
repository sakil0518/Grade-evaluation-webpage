<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Login</title>
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/index.css" />
  <link rel="stylesheet" href="css/standard.css" />
  <link rel="stylesheet" href="css/StudentLogin.css" />
  <link rel="stylesheet" href="css/login.css" />
</head>

<body>
  <section>
    <div class="container-fluid navbar-style">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light">

            <a class="navbar-brand" href="StudentLogin.php">
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
    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-mortarboard-fill"
      viewBox="0 0 16 16">
      <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
      <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
    </svg>
  </div>

  <div class="loginForm">
    <h1> Student Login </h1>

    <form action="StudentAuthenticate.php" method="post">

      <div class="field">
        <input type="text" name="username" required>
        <span></span>
        <label> Username </label>
      </div>

      <div class="field">
        <input type="password" name="password" id="password" required>
        <span></span>
        <label> Password </label>
      </div>

      <div class="show">
        <input type="checkbox" onclick="myFunction()"> Show Password
      </div>



      <!-- <div class="pass">Forgot Password?</div> -->

      <input type="submit" value="Login">

      <div class="oppLogin"> Not a Student?
        <a href="TeacherLogin.php"> Teacher Login </a>
      </div>

      <!-- <div class="remember">
        <input type="checkbox" unchecked="unchecked" name="remember"> Remember me
      </div> -->

    </form>
  </div>

</body>
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
</html> 
