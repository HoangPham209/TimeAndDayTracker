<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$hasErrors = false;
$errorMsg = "";

if ( isset($_POST['event_title']) && ($_POST['event_title'] != "") ) {
  $event_title = $_POST['event_title'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Event Title is required</p>";
}

if ( isset($_POST['event_from']) && ($_POST['event_from'] != "") ) {
  $event_from = $_POST['event_from'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Time from is required</p>";
}

if ( isset($_POST['event_to']) && ($_POST['event_to'] != "") ) {
  $event_to = $_POST['event_to'];
} else {
  $hasErrors = true;
  $errorMsg .= "<p>Time to is required</p>";
}


//check errors
if($hasErrors) {
  //die("You have errors.");
  include('add_event.php');
} else {
  $repeat_freq = $_POST['repeat_freq'];
  $location = $_POST['location'];
  $description = $_POST['description'];
  $date1 = date_create($event_from);
  $date2 = date_create($event_to);
  $event_from1 = date_format($date1,"Y-m-d H:i:s");
  $event_to2 = date_format($date2,"Y-m-d H:i:s");

  include('include/db.php');
  $sql = "INSERT INTO `events_data` (`id`, `event_title`, `repeat_freq`, `event_from`,  `event_to`, `location`,  `description`) VALUES (NULL, '$event_title','$repeat_freq', '$event_from1', '$event_to2', '$location', '$description')";
  // echo "You submitted the data!";
  // echo $sql;
  // Perform the query
  mysqli_query($con, $sql);
  echo("Error description: " . mysqli_error($con));
  mysqli_close($con);

  include('planner.php');
}

?>
