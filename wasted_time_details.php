<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Orders</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <br>
    <h1>Wasted Time Detail</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Category</th>
      <th scope="col">Application name</th>
      <th scope="col">Amount of time wasted (hrs) </th>
    </tr>
  </thead>
  <tbody>
    <?php
    $extracted = [];

    include('include/db.php');
    $sql = "SELECT * FROM `wasted_time_data` WHERE id = ".$_GET['wasted_time_id'];

    // Perform query
    if ($result = mysqli_query($con, $sql)) {
      while ($row = mysqli_fetch_assoc($result)) {
        $extracted = $row;
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['date']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td>".$row['app_name']."</td>";
        echo "<td>".$row['time_amount']."</td>";
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
<hr>

<h4>Id: <?php echo $extracted['id'];?> </h4>
<h4>Date: <?php echo $extracted['date'];?> </h4>
<h4>Category: <?php echo $extracted['category'];?> </h3>
<h4>Application: <?php echo $extracted['app_name'];?> </h3>
<h4>Amount of time wasted: <?php echo $extracted['time_amount']. " hours";?> </h3>

  </div>



<?php include("include/scripts.php"); ?>

  </body>
</html>
