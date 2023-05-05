<?php
require 'includes/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = getDB();

    $sql2 = "SELECT *
        FROM class_grades
        ORDER BY ID";

    // . $_POST['ID'] . "','"

    $sql = "INSERT INTO class_grades (ID, A1, A2, A3, MIDTERM, FINAL, GRADE)
        VALUES ('" . $_POST['ID'] . "','"
        . $_POST['A1'] . "','"
        . $_POST['A2'] . "','"
        . $_POST['A3'] . "','"
        . $_POST['MIDTERM'] . "','"
        . $_POST['FINAL'] . "','"
        . $_POST['GRADE'] . "')";

    //var_dump($sql); exit;

    $results = mysqli_query($conn, $sql);
    $results2 = mysqli_query($conn, $sql2);

    if ($results === false) {
        echo mysqli_error($conn);
    } else {
       //$articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
        //var_dump($articles);
        //$student_id = $articles['student_id'];
        echo "added!!!";
    }

    if ($results2 === false) {
        echo mysqli_error($conn);
    } else {
       $articles = mysqli_fetch_all($results2, MYSQLI_ASSOC);
        //var_dump($articles);
        //$student_id = $articles['student_id'];
        //echo "added!!!";
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/standard.css" />
    <title>ClassGrade - Teacher's Menu - Input Marks</title>
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
              <a class="nav-link" href="teacher_InputMarks.php">Input Marks</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacher_SeeTotals.php">See Totals</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="teacher_AssignGrades.php">Mark the Assessment</a>
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

    <header class="header">
        <h1>Input Marks</h1>
        <hr />
    </header>
    <div id="grid">

        <div>
            <h3>Input marks</h3>

            <!-- <?php if (empty($articles)): ?>
            <p>No articles found.</p>
            <?php else: ?>
            <ul>
                <?php foreach ($articles as $article): ?>
                <li>
                    <article>
                        <h2>
                            <a href="from_teacher_to_student.php?ID=<?= $article['ID']; ?>">
                                <?= $article['ID']; ?>
                            </a>
                        </h2>
                        <p>
                            <?= $article['A1']; ?>
                        </p>
                    </article>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?> -->

            <form method="post">
                <table id="stat_table" class="table table-hover">
                    <tr class="table-light">
                        <th>Student ID</th>
                        <th>A1</th>
                        <th>A2</hd>
                        <th>A3</th>
                        <th>Midterm</th>
                        <th>Final</th>
                        <th>Letter Grade</th>
                    </tr>

                    <tbody>
                        <tr>
                            <td><label for="ID"><input id="ID" name="ID" placeholder="Enter ID"
                                        type="number"></label></td>
                            <td><label for="A1"><input id="A1" name="A1" placeholder="Enter the A1 grade" type="number"
                                        min="0" max="10"></label></td>
                            <td><label for="A2"><input id="A2" name="A2" placeholder="Enter the A2 grade" type="number"
                                        min="0" max="10"></label></td>
                            <td><label for="A3"><input id="A3" name="A3" placeholder="Enter the A3 grade" type="number"
                                        min="0" max="10"></label></td>
                            <td><label for="MIDTERM"><input id="MIDTERM" name="MIDTERM"
                                        placeholder="Enter the Midterm grade" type="number" min="0" max="30"></label>
                            </td>
                            <td><label for="FINAL"><input id="FINAL" name="FINAL" placeholder="Enter the Final grade"
                                        type="number" min="0" max="40"></label></td>
                            <td>
                                <lable for="GRADE"><input id="GRADE" name="GRADE" placeholder="Not yet released">
                                </lable>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button>Submit</button>
            </form>
        </div>
    </div>

</body>

</html>
