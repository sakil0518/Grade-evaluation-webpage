<?php
    include('TeacherConnect.php');
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    setcookie("username", $user_name, time() + (86400 * 30), "/"); // 86400 = 1 day

        $sql = "select * from teacherlogin where user_name = '$user_name' and password = '$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1){
            header("Location: teachers.php");
        }
        else{
          echo '<script>alert("Invalid username or password. Try again.")</script>';
          header( "Refresh:0.001; url=StudentLogin.php", true, 303);
        }
?>
