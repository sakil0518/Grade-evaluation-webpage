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

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $sql2 = "";
  for($i=0 ; $i < 6; $i++){

      if(!empty($_POST['A1'][$i])){
        switch($i){
          case 0: $sql2 .= "UPDATE class_grades SET A1 = '" . $_POST['A1'][$i] . "' WHERE ID = 40101000;"; break;
          case 1: $sql2 .= "UPDATE class_grades SET A1 = '" . $_POST['A1'][$i] . "' WHERE ID = 40101001;"; break;
          case 2: $sql2 .= "UPDATE class_grades SET A1 = '" . $_POST['A1'][$i] . "' WHERE ID = 40101002;"; break;
          case 3: $sql2 .= "UPDATE class_grades SET A1 = '" . $_POST['A1'][$i] . "' WHERE ID = 40101003;"; break;
          case 4: $sql2 .= "UPDATE class_grades SET A1 = '" . $_POST['A1'][$i] . "' WHERE ID = 40101004;"; break;
          case 5: $sql2 .= "UPDATE class_grades SET A1 = '" . $_POST['A1'][$i] . "' WHERE ID = 40101005;"; break;
        }
      }
      if(!empty($_POST['A2'][$i])){
        switch($i){
          case 0: $sql2 .= "UPDATE class_grades SET A2 = '" . $_POST['A2'][$i] . "' WHERE ID = 40101000;"; break;
          case 1: $sql2 .= "UPDATE class_grades SET A2 = '" . $_POST['A2'][$i] . "' WHERE ID = 40101001;"; break;
          case 2: $sql2 .= "UPDATE class_grades SET A2 = '" . $_POST['A2'][$i] . "' WHERE ID = 40101002;"; break;
          case 3: $sql2 .= "UPDATE class_grades SET A2 = '" . $_POST['A2'][$i] . "' WHERE ID = 40101003;"; break;
          case 4: $sql2 .= "UPDATE class_grades SET A2 = '" . $_POST['A2'][$i] . "' WHERE ID = 40101004;"; break;
          case 5: $sql2 .= "UPDATE class_grades SET A2 = '" . $_POST['A2'][$i] . "' WHERE ID = 40101005;"; break;
        }
      }
      if(!empty($_POST['A3'][$i])){
        switch($i){
          case 0: $sql2 .= "UPDATE class_grades SET A3 = '" . $_POST['A3'][$i] . "' WHERE ID = 40101000;"; break;
          case 1: $sql2 .= "UPDATE class_grades SET A3 = '" . $_POST['A3'][$i] . "' WHERE ID = 40101001;"; break;
          case 2: $sql2 .= "UPDATE class_grades SET A3 = '" . $_POST['A3'][$i] . "' WHERE ID = 40101002;"; break;
          case 3: $sql2 .= "UPDATE class_grades SET A3 = '" . $_POST['A3'][$i] . "' WHERE ID = 40101003;"; break;
          case 4: $sql2 .= "UPDATE class_grades SET A3 = '" . $_POST['A3'][$i] . "' WHERE ID = 40101004;"; break;
          case 5: $sql2 .= "UPDATE class_grades SET A3 = '" . $_POST['A3'][$i] . "' WHERE ID = 40101005;"; break;
        }
      }
      if(!empty($_POST['MIDTERM'][$i])){
        switch($i){
          case 0: $sql2 .= "UPDATE class_grades SET MIDTERM = '" . $_POST['MIDTERM'][$i] . "' WHERE ID = 40101000;"; break;
          case 1: $sql2 .= "UPDATE class_grades SET MIDTERM = '" . $_POST['MIDTERM'][$i] . "' WHERE ID = 40101001;"; break;
          case 2: $sql2 .= "UPDATE class_grades SET MIDTERM = '" . $_POST['MIDTERM'][$i] . "' WHERE ID = 40101002;"; break;
          case 3: $sql2 .= "UPDATE class_grades SET MIDTERM = '" . $_POST['MIDTERM'][$i] . "' WHERE ID = 40101003;"; break;
          case 4: $sql2 .= "UPDATE class_grades SET MIDTERM = '" . $_POST['MIDTERM'][$i] . "' WHERE ID = 40101004;"; break;
          case 5: $sql2 .= "UPDATE class_grades SET MIDTERM = '" . $_POST['MIDTERM'][$i] . "' WHERE ID = 40101005;"; break;
        }
      }
      if(!empty($_POST['FINAL'][$i])){
        switch($i){
          case 0: $sql2 .= "UPDATE class_grades SET FINAL = '" . $_POST['FINAL'][$i] . "' WHERE ID = 40101000;"; break;
          case 1: $sql2 .= "UPDATE class_grades SET FINAL = '" . $_POST['FINAL'][$i] . "' WHERE ID = 40101001;"; break;
          case 2: $sql2 .= "UPDATE class_grades SET FINAL = '" . $_POST['FINAL'][$i] . "' WHERE ID = 40101002;"; break;
          case 3: $sql2 .= "UPDATE class_grades SET FINAL = '" . $_POST['FINAL'][$i] . "' WHERE ID = 40101003;"; break;
          case 4: $sql2 .= "UPDATE class_grades SET FINAL = '" . $_POST['FINAL'][$i] . "' WHERE ID = 40101004;"; break;
          case 5: $sql2 .= "UPDATE class_grades SET FINAL = '" . $_POST['FINAL'][$i] . "' WHERE ID = 40101005;"; break;
        }
      }
    }//end of for

  if(strlen($sql2)==0){
    echo "<script>alert('Please try again')</script>";
  }
  else{
    $results2 = mysqli_multi_query($conn, $sql2);
      if ($results2 === false) {
          echo mysqli_error($conn);

        }
     else {
          mysqli_close($conn);
          $conn = getDB();

          //  Auto calculate total and grade and add them to db
          $sql3 = "SELECT * FROM class_grades ORDER BY ID";
          $results3 = mysqli_query($conn, $sql3);

          if ($results3 === false) {
              echo mysqli_error($conn);
          } else {
              $students3 = mysqli_fetch_all($results3, MYSQLI_ASSOC);
          }
          $sql4 = "";
          foreach ($students3 as $student) {
            $total = calculateTotalScore($student);
            $grade = assignLetterGrade($student);
            $sql4 .= "UPDATE class_grades SET TOTAL = '" . $total . "' WHERE ID = '" . $student['ID'] . "';";
            $sql4 .= "UPDATE class_grades SET GRADE = '" . $grade . "' WHERE ID = '" . $student['ID'] . "';";
          }
          $results4 = mysqli_multi_query($conn, $sql4);
          if ($results4 === false) {
            echo mysqli_error($conn);
          }

          echo "<script>alert('Marks successfully submitted')</script>";
      }
   }

mysqli_close($conn);
}
?>

<!DOCTYPE html>

<html>
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
        <h1>Input Marks</h1>
        <hr />
    </header>
<div>
  <div>
    <form method="post">
    <table class="table-design" >
      <thead>
        <tr>
            <th>ID</th>
            <th>A1</th>
            <th>A2</th>
            <th>A3</th>
            <th>MIDTERM</th>
            <th>FINAL</th>
        </tr>
      </thead>
    <tbody>
      <?php foreach ($students as $student): ?>
        <tr>
          <td><?= $student['ID'];?></td>
          <td><label for="A1"><input name="A1[]" placeholder="Enter the A1 grade" type="number"
                      min="0" max="10"></label></td>
          <td><label for="A2"><input name="A2[]" placeholder="Enter the A2 grade" type="number"
                      min="0" max="10"></label></td>
          <td><label for="A3"><input name="A3[]" placeholder="Enter the A3 grade" type="number"
                      min="0" max="10"></label></td>
          <td><label for="MIDTERM"><input name="MIDTERM[]"
                      placeholder="Enter the Midterm grade" type="number" min="0" max="30"></td>
          <td><label for="FINAL"><input name="FINAL[]" placeholder="Enter the Final grade"
                      type="number" min="0" max="40"></label></td>
        </tr>
      <?php endforeach ?>
    </tbody>
    </table>
      <button>Submit</button>
    </form>
  </div>
</div>

</body>
</html>
