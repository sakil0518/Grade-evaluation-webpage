<?php

?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/index.css" />
  <link rel="stylesheet" href="css/standard.css" />
  <title>Concordia University - SOEN 287 Assessment</title>
</head>

<body>
    <section>
      <div class="container-fluid navbar-style">
          <nav class="navbar fixed-top navbar-expand-lg navbar-light">

              <a class="navbar-brand" href="teachers.php">
                  ClassGrade
              </a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                  aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link" href="teachers.php">Home</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="inputMark_final_draft.php">Input Marks</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="teacher_SeeTotals.php">See Totals</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="teacher_AssignGrades.php">Assign Grade</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="teacher_ViewRepAndStats.php">View Reports & Statistics</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="mainPage.php">Log Out</a>
                        </li>
                  </ul>
              </div>
          </nav>
      </div>
    </section>
    <div>
      <p>
        <h1>Welcome to ClassGrade for Teachers!</h1>
      </p>
    </div>
    <div>
      <ul style = "list-style-type: none;">
        <li>
            <h3><a href = "inputMark_final_draft.php">Input Marks</a></h3>
        </li>
        <li>
          <h3><a href = "teacher_SeeTotals.php">See Totals</a></h3>
        </li>
        <li>
          <h3><a href = "teacher_AssignGrades.php">Assign Grade</a></h3>
        </li>
        <li>
          <h3><a href = "teacher_ViewRepAndStats.php">View Reports & Statistics</a></h3>
        </li>
      </ul>
    </div>
  </div>
</body>

</html>
