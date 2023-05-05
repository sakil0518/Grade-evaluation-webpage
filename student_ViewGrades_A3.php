<?php
require 'includes/database.php';

$student_id = $_COOKIE["username"];
$conn = getDB();

# get assessment statistics in the class
$sql = "SELECT A3 FROM class_grades";
$results = mysqli_query($conn, $sql);
if ($results === false) {
    echo mysqli_error($conn);
} else {
   $results_assessment = mysqli_fetch_all($results);
   $count_assessment = num_calculator($results_assessment);
   $avg_assessment = avg_calculator($results_assessment);
   $max_assessment = max_calculator($results_assessment);
   $min_assessment = min_calculator($results_assessment);
}

# get particular student's statistics
$sql2 = "SELECT * FROM class_grades WHERE ID = '" . $student_id . "'";
$results2 = mysqli_query($conn, $sql2);
if ($results2 === false) {
    echo mysqli_error($conn);
} else {
    $articles = mysqli_fetch_all($results2, MYSQLI_ASSOC);
    // since we are only fetching the results of this particular student to show
    $article = $articles[0];
}

$own_score = $article["A3"];

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


        <!-- Statistics -->
        <section class="container-fluid">
            <h4>Class Statistics for A3</h4>
            <table class="table-design">
                <thead>
                    <tr>
                        <th>Your Score</th>  
                        <th>Class Average</th>
                        <th>Lowest Grade</th>
                        <th>Highest Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $own_score;?></td>
                        <td><?php echo number_format($avg_assessment,2);?></td>
                        <td><?php echo min_calculator($min_assessment);?></td>
                        <td><?php echo max_calculator($max_assessment);?></td>
                    </tr>
                </tbody>
            </table>
        </section>



    </body>
</html>
