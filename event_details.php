<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Event Detail</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <br>
    <h1>Event Detail</h1>
    <br>
    <table class="table table-striped">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Event</th>
        <th scope="col">Repeat Frequency</th>
        <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col">Location</th>
        <!-- <th scope="col"></th> -->
      </tr>
      </thead>
    <tbody>
    <?php
    $comments = "";
    $extracted = [];

    include('include/db.php');
    $sql = "SELECT * FROM `events_data` WHERE id = ".$_GET['event_id'];
    //$result = mysql_query($con,$sql);
    // Perform query
    if ($result = mysqli_query($con, $sql)) {
      // $total_events = mysqli_num_rows($result);
      while ($row = mysqli_fetch_assoc($result)) {
        $extracted = $row;
        $description = $row['description'];
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['event_title']."</td>";
        echo "<td>".$row['repeat_freq']."</td>";
        echo "<td>".$row['event_from']."</td>";
        echo "<td>".$row['event_to']."</td>";
        echo "<td>".$row['location']."</td>";
        // echo "<td>".$row['order_total']."</td>";
        echo "</tr>";
      }
      // Free result set
      mysqli_free_result($result);
    } else {
      echo "No results";
    }

    mysqli_close($con);

    ?>
  </tbody>
</table>
<h3>Descriptions: <?php echo $description;?> </h3>
<hr>
<!-- Print out the order detail -->
<h4>Event id: <?php echo $extracted['id'];?> </h4>
<h4>Event: <?php echo $extracted['event_title'];?> </h4>
<h4>Repeat Frequency: <?php echo $extracted['repeat_freq'];?> </h4>
<h4>From: <?php echo $extracted['event_from'];?> </h4>
<h4>To: <?php echo $extracted['event_to'];?> </h4>
<h4>Location:
  <?php echo $extracted['location'];?> <br>
</h4>

<h4>Description of Event: <?php echo $extracted['description'];?> </h4>
  </div>



<?php include("include/scripts.php"); ?>

  </body>
</html>
