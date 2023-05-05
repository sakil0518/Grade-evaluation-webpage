<?php
require 'includes/database.php';

$errorMsg = "";
$successMsg = "";
$conn = getDB();
$articles = 0;
$assessment = "A1";

if(isset ($_GET['submit_button'])){
  $assessment = $_GET['choose_assessment'];
}

// to pull from the database all the current scores
// the code below will only filter and show the scores for that selected assessment
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT * FROM class_grades";
    $results = mysqli_query($conn, $sql);

    if ($results === false) {
      $errorMsg = "Invalid query: " + mysqli_error($conn);
    } else {
      $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }

}

mysqli_close($conn);
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
  
    <header class="header">
        <h1>See Totals</h1>
        <hr />

    <table class="table-design">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>A1</th>
                <th>A2</th>
                <th>A3</th>
                <th>Midterm</th>
                <th>Final</th>
                <th>Expected Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $article['ID']; ?></td>
                <td><?= $article['A1']; ?></td>
                <td><?= $article['A2']; ?></td>
                <td><?= $article['A3']; ?></td>
                <td><?= $article['MIDTERM']; ?></td>
                <td><?= $article['FINAL']; ?></td>
                <td><?= assignLetterGrade($article) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
