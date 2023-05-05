<?php
require 'includes/database.php';

$student_id = $_COOKIE["username"];

$errorMsg = "";
$successMsg = "";
$conn = getDB();
$articles = 0;

# get individual student's results
$sql = "SELECT * FROM class_grades WHERE ID = '" . $student_id . "'";
$results = mysqli_query($conn, $sql);

if ($results === false) {
    $errorMsg = "Invalid query: " + mysqli_error($conn);
} else {
    $articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
    // since we are only fetching the results of this particular student to show
    $article = $articles[0];
}

# get the total score of each student
$sql2 = "SELECT TOTAL FROM class_grades";
$results2 = mysqli_query($conn, $sql2);

if ($results2 === false) {
    $errorMsg = "Invalid query: " + mysqli_error($conn);
} else {
    $total_scores_array = mysqli_fetch_all($results2, MYSQLI_ASSOC);
}

$percentile = calculatePercentile($total_scores_array, $article["TOTAL"]);
$class_avg = calculateAvgonStudentSide($total_scores_array);


mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSS stylesheet -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/standard.css">

        <!--Logo-->
        <link rel="icon" href="tobeadded.png">

        <!-- Navbar google fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <script src="" crossorigin="anonymous"></script>

        <title>View Grades</title>
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


        <!-- Grades Table -->
        <section class="container-fluid">
            <h1>SOEN 287</h1>
            <hr />
            <h2>Your Grades</h2>
            <table class="table-design">
                <thead>
                    <tr>
                        <th>Assessment</th>
                        <th>Marks</th>
                        <th>Class Statistics</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A1</td>
                        <td><?= $article['A1']; ?></td>
                        <td><a href="student_ViewGrades_A1.php">Show</a></td>
                    </tr>
                    <tr>
                        <td>A2</td> 
                        <td><?= $article['A2']; ?></td>
                        <td><a href="student_ViewGrades_A2.php">Show</a></td>
                    </tr>
                    <tr>
                        <td>A3</td>
                        <td><?= $article['A3']; ?></td>
                        <td><a href="student_ViewGrades_A3.php">Show</a></td>
                    </tr>
                    <tr>
                        <td>Midterm</td>
                        <td><?= $article['MIDTERM']; ?></td>
                        <td><a href="student_ViewGrades_Midterm.php">Show</a></td>
                    </tr>
                    <tr>
                        <td>Final</td>
                        <td><?= $article['FINAL']; ?></td>
                        <td><a href="student_ViewGrades_Final.php">Show</a></td>
                    </tr>
                </tbody>
            </table>
        </section>


        <!-- Class statistics -->
        <section class = "container-fluid text-left">
            <h4>Overall Class Statistics</h4>
            <p><b>Final Grade:</b> <?= $article['GRADE']; ?></p>
            <p><b>Percentile:</b> <?php echo number_format($percentile,2);?></p>
            <p><b>Class average:</b> <?php echo number_format($class_avg,2);?></p>
        </section>

        <!-- If any JS files-->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <!-- Index JS -->
        <script src="javascript/index.js" charset="utf-8"></script>

    </body>
</html>
