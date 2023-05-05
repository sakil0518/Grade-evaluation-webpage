<?php
require 'includes/database.php';

$conn = getDB();

$sql = "SELECT * FROM class_grades ORDER BY ID";

$results = mysqli_query($conn, $sql);

if ($results === false) {
    echo mysqli_error($conn);
} else {
   $students = mysqli_fetch_all($results, MYSQLI_ASSOC);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $sql = "UPDATE class_grades SET GRADE = '" . $_POST['grades'][0] ."' WHERE ID = 40101000;";
  $sql .= "UPDATE class_grades SET GRADE = '" . $_POST['grades'][1] ."' WHERE ID = 40101001;";
  $sql .= "UPDATE class_grades SET GRADE = '" . $_POST['grades'][2] ."' WHERE ID = 40101002;";
  $sql .= "UPDATE class_grades SET GRADE = '" . $_POST['grades'][3] ."' WHERE ID = 40101003;";
  $sql .= "UPDATE class_grades SET GRADE = '" . $_POST['grades'][4] ."' WHERE ID = 40101004;";
  $sql .= "UPDATE class_grades SET GRADE = '" . $_POST['grades'][5] ."' WHERE ID = 40101005;";

  $results = mysqli_multi_query($conn, $sql);

   if ($results === false) {
       echo mysqli_error($conn);
  } else {
       echo "<script>alert('Grades successfully submitted')</script>";
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
  <title>ClassGrade - Teacher's Menu - Assign Grades</title>
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
      <h1>Assign Grade</h1>
      <hr />
  </header>
<form method = "post">
  <table class="table-design">
      <thead>
          <tr>
              <th>Student ID</th>
              <th>Expected Grade</th>
              <th>
                Select Grade
              </th>
          </tr>
      </thead>
      <tbody style = "text-align: center;">
          <?php foreach($students as $student): ?>
          <tr>
            <td><?= $student['ID']; ?></td>
            <td>
              <?php echo assignLetterGrade($student); ?>
            </td>
            <td>
              <select name="grades[]">
                <option>A+</option>
                <option>A</option>
                <option>A-</option>
                <option>B+</option>
                <option>B</option>
                <option>B-</option>
                <option>C+</option>
                <option>C</option>
                <option>C-</option>
                <option>D+</option>
                <option>D</option>
                <option>D-</option>
                <option>F</option>
                <option>DNE</option>
                <option>DISC</option>
              </select>
            </td>
          </tr>
        <?php endforeach ; ?>
      </tbody>
  </table>
  <button>Submit</button>
</form>

</body>

</html>
