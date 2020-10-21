<html>
  <head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <?php include("include/head.php"); ?>
  </head>

  <body>
    <?php include("include/navigation.php"); ?>

    <div class="container">
      <br>
      <h1>Dashboard</h1>
      <br>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12"><hr></div>
        <div class="col-md-6">
          <h2>What events are coming up?</h2>
<div class="col-md-12"><hr></div>

<?php
include('include/db.php');
$sqlevent = "SELECT * FROM `events_data` ORDER BY `events_data`.`event_from` ASC LIMIT 2";
if ($result = mysqli_query($con, $sqlevent)) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>".$row['event_title']."</td>";
      echo "<br>";
      echo "<td>"."Time: ".$row['event_from']." to ".$row['event_to']."</td>";
      echo "<br>";
      echo "<td>"." Repeat - ".$row['repeat_freq']."</td>";
      echo "<td>"." Location - ".$row['location']."</td>";
      echo "<br>";
      echo "</tr>";
      echo "<hr>";
    }
  }?>

<br>
    <h2>Last 5 Activities that Wasted Time</h2>
<div class="col-md-12"><hr></div>
<?php
$total_hours_wasted = 0.000;
include('include/db.php');
$sqlwasted = "SELECT * FROM `wasted_time_data` ORDER BY `wasted_time_data`.`date` ASC LIMIT 5";
if ($result = mysqli_query($con, $sqlwasted)) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      // echo "<td>".$row['id']."</td>";
      echo "<td>".$row['date']." "."</td>";
      echo "<td>".$row['category']." - ".$row['app_name']." - "."</td>";
      echo "<td>".$row['time_amount']." hours"."</td>";
      echo "</tr>";
      echo "<br>";
        // echo $row['date']." ";
      $total_hours_wasted += floatval($row['time_amount']);
    }
  }?>
<h4 style="color: #00b8e6;">Total Wasted Time: <?php echo $total_hours_wasted." hours";?> </h4>
<br>
          <h2>Time slept last week</h2>
          <div class="col-md-6"><hr></div>
          <?php
          $total_hours_slept = 0.000;
          $sleep_index = 0;
          include('include/db.php');
          // $sqlsleep = "SELECT * FROM `sleep_data` LIMIT 7";
          $sqlsleep = "SELECT * FROM `sleep_data` ORDER BY `sleep_data`.`date` DESC LIMIT 7";

          // Perform query
          if ($result = mysqli_query($con, $sqlsleep)) {
              while ($row = mysqli_fetch_assoc($result)) {
                $sleep_index++;
                if(intval($sleep_index) == 1 or intval($sleep_index) == 7){
                  echo $row['date']." ";
                }
                $total_hours_slept += floatval($row['sleep_amount']);
              }
            }?>
        <h4 style="color: #00b8e6;">Total Hours: <?php echo $total_hours_slept;?> </h4>
        <h4>Average Hours in the Last Week: <?php echo (floatval($total_hours_slept)/7)." hours";?></h4>
        </div>
      </div>
    </div>
    <?php include("include/scripts.php"); ?>

  </body>
</html>
