<?php

function getDB()
{

    $db_host = "localhost";
    $db_name = "soen287";
    $db_user = "root";
    $db_pass = "";


    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }

    return $conn;

}

function num_calculator($array){
  $count = 0;
  for($i = 0; $i < count($array); $i++){
    if(isset($array[$i][0])){
      $count++;
    }
  }
  return $count;
}

function avg_calculator($array){
  $count = num_calculator($array);
  if ($count == 0)
    return;
  $sum = 0;
  for($i = 0; $i < count($array); $i++){
    if(isset($array[$i][0])){
      $sum += $array[$i][0];
    }
  }

  return ($sum / $count);
}

function max_calculator($array) {
    return max($array);

}

function min_calculator($array) {
    return min($array);

}

function calculatePercentile($array, $own_score) {
    $count = 0;
    foreach($array as $score) {
        if ($score["TOTAL"] < $own_score) {
            $count += 1;
        }
    }
    return $count / count($array) * 100;
}

function calculateAvgonStudentSide($array) {
    $sum = 0;
    foreach($array as $score) {
        $sum += $score["TOTAL"];
    }

    return $sum / count($array);
}

function calculateTotalScore($array) {
    $sum = 0;
    $sum += $array['A1'] + $array['A2'] + $array['A3'] + $array['MIDTERM'] + $array['FINAL'];
    return $sum;
}

function assignLetterGrade($array) {
    $sum = calculateTotalScore($array);
    if($sum == 0){
      $Grade = "NA";
      return $Grade;
    }
    if($sum  >= 90){
        $Grade = "A+";
    }elseif($sum >=85){
        $Grade = "A";
    }elseif($sum >=80){
        $Grade = "A-";
    }elseif($sum >=75){
        $Grade = "B+";
    }elseif($sum >=70){
        $Grade = "B";
    }elseif($sum >=65){
        $Grade = "B-";
    }elseif($sum >=60){
        $Grade = "C+";
    }elseif($sum >=55){
        $Grade = "C";
    }elseif($sum >=50){
        $Grade = "C-";
    }elseif($sum >=45){
        $Grade = "D";
    }else{
        $Grade = "F";
    }
    return $Grade;
}
