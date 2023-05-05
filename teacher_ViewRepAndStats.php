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

$sql_A1 = "SELECT A1 FROM class_grades";
$results = mysqli_query($conn, $sql_A1);
if ($results === false) {
    echo mysqli_error($conn);
} else {
   $results_A1 = mysqli_fetch_all($results);
   $count_A1 = num_calculator($results_A1);
   $avg_A1 = avg_calculator($results_A1);
}

$sql_A2 = "SELECT A2 FROM class_grades";
$results = mysqli_query($conn, $sql_A2);
if ($results === false) {
    echo mysqli_error($conn);
} else {
   $results_A2 = mysqli_fetch_all($results);
   $count_A2 = num_calculator($results_A2);
   $avg_A2 = avg_calculator($results_A2);
}

$sql_A3 = "SELECT A3 FROM class_grades";
$results = mysqli_query($conn, $sql_A3);
if ($results === false) {
    echo mysqli_error($conn);
} else {
   $results_A3 = mysqli_fetch_all($results);
   $count_A3 = num_calculator($results_A3);
   $avg_A3 = avg_calculator($results_A3);
}

$sql_midterm = "SELECT MIDTERM FROM class_grades";
$results = mysqli_query($conn, $sql_midterm);
if ($results === false) {
    echo mysqli_error($conn);
} else {
   $results_midterm= mysqli_fetch_all($results);
   $count_midterm = num_calculator($results_midterm);
   $avg_midterm = avg_calculator($results_midterm);
}

$sql_final = "SELECT FINAL FROM class_grades";
$results = mysqli_query($conn, $sql_final);
if ($results === false) {
    echo mysqli_error($conn);
} else {
   $results_final = mysqli_fetch_all($results);
   $count_final = num_calculator($results_final);
   $avg_final = avg_calculator($results_final);
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
  <title>ClassGrade - Teacher's Menu - View Reports & Statistics</title>
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
        <h1>Statistics</h1>
        <hr />
<div>
  <div>
      <table class = "table-design" >
        <thead>
          <tr>
          <th>Student ID</th>
          <th>A1</th>
          <th>A2</th>
          <th>A3</th>
          <th>Midterm</th>
          <th>Final</th>
        </tr>
        </thead>
        <tbody>
          <?php foreach ($students as $student): ?>
            <tr>
              <td><?= $student['ID']; ?></td>
              <td><?= $student['A1']; ?></td>
              <td><?= $student['A2']; ?></td>
              <td><?= $student['A3']; ?></td>
              <td><?= $student['MIDTERM']; ?></td>
              <td><?= $student['FINAL']; ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
              <td style = "font-weight: bold;">Num of Students</td>
              <td><?php echo $count_A1;?></td>
              <td><?php echo $count_A2;?></td>
              <td><?php echo $count_A3;?></td>
              <td><?php echo $count_midterm;?></td>
              <td><?php echo $count_final;?></td>
            </tr>
            <tr>
              <td style = "font-weight: bold;">Average</td>
              <td><?php echo number_format($avg_A1,2);?></td>
              <td><?php echo number_format($avg_A2,2);?></td>
              <td><?php echo number_format($avg_A3,2);?></td>
              <td><?php echo number_format($avg_midterm,2);?></td>
              <td><?php echo number_format($avg_final,2);?></td>
            </tr>
        </tbody>
      </table>
  </div>

</div>


        <!-- <table class="table-design">
            <thead>
                <tr>
                  <th>Student ID</th>
                  <th>A1</th>
                  <th>A2</hd>
                  <th>A3</th>
                  <th>Midterm</th>
                  <th>Final</th>
                  <th>Letter Grade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <td>scheme</td>
                  <td>10</td>
                  <td>10</td>
                  <td>10</td>
                  <td>30</td>
                  <td>40</td>
                  <td></td>
                </tr>
                <tr>
                  <td>40101000</td>
                  <td>10</td>
                  <td>10</td>
                  <td>10</td>
                  <td>25</td>
                  <td>38</td>
                  <td>A+</td>
                </tr>
                <tr>
                  <td>40101001</td>
                  <td>10</td>
                  <td>10</td>
                  <td>10</td>
                  <td>30</td>
                  <td>40</td>
                  <td>A+</td>
                </tr>
                <tr>
                  <td>Average</td>
                  <td>10</td>
                  <td>10</td>
                  <td>10</td>
                  <td>30</td>
                  <td>40</td>
                  <td></td>
                </tr>
            </tbody>
        </table> -->

</body>

</html>
