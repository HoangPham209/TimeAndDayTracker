<?php

// Update Sleep!

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$wasted_time_id = $_POST['wasted_time_id'];
$hasErrors = false;
$errorMsg = "";

if ( isset($_POST['date']) && ($_POST['date'] != "") ) {
  $date = $_POST['date'];
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

if ( isset($_POST['time_amount']) && ($_POST['time_amount'] != "")) {
  $time_amount = $_POST['time_amount'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Amount of time wasted is required</p>";
}

//check errors
if($hasErrors) {
  //die("You have errors.");
  $wasted_time_id = $_POST['wasted_time_id'];
  header('update_wasted_time.php?error=there+was+an+error');
} else {
  $wasted_time_id = $_POST['wasted_time_id'];
  echo   $wasted_time_id;
  include('include/db.php');

  $sql = " UPDATE `wasted_time_data` SET `date` = '$date', `category` = '$category', `app_name` = '$app_name', `time_amount` = '$time_amount' WHERE `wasted_time_data`.`id` = '$wasted_time_id' ";
  //WHERE id = ".$_GET['sleep_id'];
  // Perform the query
  mysqli_query($con, $sql);
  echo("Error description: " . mysqli_error($con));
  mysqli_close($con);

  //language="javascript"

  header('location: wasted_time.php?message=_Wasted_time+Data+Update');
}

?>
