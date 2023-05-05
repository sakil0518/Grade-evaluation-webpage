<?php
  setcookie("username", "", time()-3600);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<head>
    <link rel="stylesheet" href="css/mainPage.css" />
  </head>


<h3 class="classGrade"> ClassGrade </h3>

<h2 class="head"> Welcome to SOEN 287 Assessment Webpage </h2>



<body>
  <div class="image">
  <img src="image.png">
  </div>

  <a href="StudentLogin.php">
        <button class="buttonStudent">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 14 14">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
            I'm a Student
        </button>
      </a>

      <a href="TeacherLogin.php">
        <button class="buttonTeacher">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 14 14">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
            I'm a Teacher
        </button>
      </a>




</body>
</html>
