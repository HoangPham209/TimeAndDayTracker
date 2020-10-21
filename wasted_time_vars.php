<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$hasErrors = false;
$errorMsg = "";

if ( isset($_POST['date']) && ($_POST['date'] != "") ) {
  $date = $_POST['date'];
  $date1 = date_create($date);
  $date2 = date_format($date1,"Y-m-d");
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Date is required</p>";
}

if ( isset($_POST['category']) && ($_POST['category'] != "") ) {
  $category = $_POST['category'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Category is required</p>";
}

if ( isset($_POST['app_name']) && ($_POST['app_name'] != "") ) {
  $app_name = $_POST['app_name'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Application name is required</p>";
}

$time_amount = 0.0;
$time_amount_mins = 0;
$time_amount_hrs = 0;

if ( isset($_POST['time_amount_minutes']) && ($_POST['time_amount_minutes'] != "")) {
  $time_amount_mins = $_POST['time_amount_minutes'];
//  $time_amount = $_POST['time_amount'];
  //float
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Amount of minutes wasted is required</p>";
}

if(isset($_POST['time_amount_hours']) && ($_POST['time_amount_hours'] != "") ){
  $time_amount_hrs = $_POST['time_amount_hours'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Amount of hours wasted is required</p>";
}

// $time_amount = floatval( intval($time_amount_hrs) + intval($time_amount_mins)/60); //get the float value of the time

//check errors
if($hasErrors) {
  //die("You have errors.");
  include('add_wasted_time.php');
} else {
  $time_amount = floatval( intval($time_amount_hrs) + intval($time_amount_mins)/60);
  include('include/db.php');
  $sql = "INSERT INTO `wasted_time_data` (`id`, `date`, `category`, `app_name`,  `time_amount`) VALUES (NULL, '$date2','$category', '$app_name', '$time_amount')";
  // echo "You submitted the data!";
  // echo $sql;
  // Perform the query
  mysqli_query($con, $sql);
  //echo("Error description: " . mysqli_error($con));
  mysqli_close($con);
  include('wasted_time.php');
}

?>
