<?php


?>

<!DOCTYPE html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Page</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/standard.css">

</head>

<body>

    <section>
        <div class="container-fluid navbar-style">
            <nav class="navbar fixed-top navbar-expand-lg navbar-light">

                <a class="navbar-brand" href="students.php">
                    ClassGrade
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="students.php">Course Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="student_ViewGrades.php">View Grades</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link" href="mainPage.php">Log Out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>

        <!-- Add small icon -->
    <h1>SOEN 287</h1>
    <hr />

    <h2>General Curriculum</h2>

        <table class="table-design">
            <thead>
                <tr>
                    <th>Assessment</th>
                    <th>Weightage</th>
                    <th>Description</th>
                    <th>Due-date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Assignment 1</td>
                    <td>10%</td>
                    <td>Semester-long team project report</td>
                    <td>Week 7</td>
                </tr>
                <tr>
                    <td>Assignment 2</td>
                    <td>10%</td>
                    <td>Semester-long team project report</td>
                    <td>Week 10</td>
                </tr>
                <tr>
                    <td>Assignment 3</td>
                    <td>10%</td>
                    <td>Semester-long team project report</td>
                    <td>Week 13</td>
                </tr>
                <tr>
                    <td>Midterm</td>
                    <td>30%</td>
                    <td>In-person & closed book term test</td>
                    <td>Week 7</td>
                </tr>
                <tr>
                    <td>Final</td>
                    <td>40%</td>
                    <td>In-person & closed book final test</td>
                    <td>To be determined</td>
                </tr>
            </tbody>
        </table>

</body>
