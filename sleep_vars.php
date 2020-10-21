<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$hasErrors = false;
$errorMsg = "";

if ( isset($_POST['date']) && ($_POST['date'] != "") ) {
  $date = $_POST['date'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Date is required</p>";
}

if ( isset($_POST['slept_from'])){// && ($_POST['slept_from'] != "") ) {
  $slept_from = $_POST['slept_from'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Time slept from is required</p>";
}

if ( isset($_POST['slept_to'])) {// && ($_POST['slept_to'] != "") ) {
  $slept_to = $_POST['slept_to'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Time slept to is required</p>";
}

//check errors
if($hasErrors) {
  //die("You have errors.");
  include('add_sleep.php');
} else {
  //get sleep amount from values below
  //set Date variable for slept to and from
  $date1 = date_create($slept_from);
  $date2 = date_create($slept_to);
  $diff = date_diff($date1, $date2);
  $slept_from1 = date_format($date1,"Y-m-d H:i:s");
  $slept_to2 = date_format($date2,"Y-m-d H:i:s");
  // echo $slept_from1." ".$slept_to2;
  $sleep_amount = $diff->s / 3600 + $diff->i / 60 + $diff->h; //get hours, secs and minutes added together
  // + $diff->days * 24, 2);
  // echo $hours;;
  // echo $sleep_amount; echo " hours";

  include('include/db.php');
  $sql = "INSERT INTO `sleep_data` (`id`, `date`, `sleep_amount`, `slept_from`,  `slept_to`) VALUES (NULL, '$date','$sleep_amount', '$slept_from1', '$slept_to2')";
  //echo "You submitted the data!";
  // Perform the query
  mysqli_query($con, $sql);
  //echo("Error description: " . mysqli_error($con));
  mysqli_close($con);
  //language="javascript"
  echo '<script>';
  echo 'alert("Data successfully submitted")';
  echo '</script>';
  include('sleep_table.php');
}

?>
