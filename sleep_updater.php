<?php
// Update Sleep!

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$sleep_id = $_POST['sleep_id'];
//$sleep_id = $_SESSION['sleep_id'];
$hasErrors = false;
$errorMsg = "";

if ( isset($_POST['date']) && ($_POST['date'] != "") ) {
  $date = $_POST['date'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Date is required</p>";
}

if ( isset($_POST['slept_from']) && ($_POST['slept_from'] != "") ) {
  $slept_from = $_POST['slept_from'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Time slept from is required</p>";
}

if ( isset($_POST['slept_to']) && ($_POST['slept_to'] != "") ) {
  $slept_to = $_POST['slept_to'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Time slept to is required</p>";
}

//check errors
if($hasErrors) {
  //die("You have errors.");
$sleep_id = $_POST['sleep_id'];
  header('location: update_sleep.php?error=there+was+an+error');
} else {
  $sleep_id = $_POST['sleep_id'];
  $date1 = date_create($slept_from);
  $date2 = date_create($slept_to);
  $diff = date_diff($date1, $date2);
  $slept_from1 = date_format($date1,"Y-m-d H:i:s");
  $slept_to2 = date_format($date2,"Y-m-d H:i:s");
  $sleep_amount = $diff->s / 3600 + $diff->i / 60 + $diff->h;

  include('include/db.php');
  $sql = " UPDATE `sleep_data` SET `date` = '$date', `sleep_amount` = '$sleep_amount', `slept_from` = '$slept_from', `slept_to` = '$slept_to' WHERE `sleep_data`.`id` = '$sleep_id' ";

  //WHERE id = ".$_GET['sleep_id'];
  // Perform the query
  mysqli_query($con, $sql);
//  echo("Error description: " . mysqli_error($con));
  mysqli_close($con);

  //language="javascript"
  // header('location: update_sleep.php?message=Sleep+Data+Updated+GO+BACK+TO+SLEEP+TABLE');
  header('location: sleep_table.php?message=Sleep+Data+Updated');
}

?>
