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
    <h1>Sleep Detail</h1>
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Date</th>
        <th scope="col">Amount of Sleep (hrs)</th>
        <th scope="col">Slept From</th>
        <th scope="col">Slept To</th>
      </tr>
    </thead>
  <tbody>
    <?php
    $extracted = [];
    include('include/db.php');
    $sql = "SELECT * FROM `sleep_data` WHERE id = ".$_GET['sleep_id'];
    //$result = mysql_query($con,$sql);
    // Perform query
    if ($result = mysqli_query($con, $sql)) {
      while ($row = mysqli_fetch_assoc($result)) {
        $extracted = $row;
      //  $comments = $row['comments'];
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['date']."</td>";
        echo "<td>".$row['sleep_amount']."</td>";
        echo "<td>".$row['slept_from']."</td>";
        echo "<td>".$row['slept_to']."</td>";
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
<!-- Print out the order detail -->
<h4>Id: <?php echo $extracted['id'];?> </h4>
<h4>Date: <?php echo $extracted['date'];?> </h4>
<h4>Amount of Sleep: <?php echo $extracted['sleep_amount']. " hours";?> </h3>
<h4>Slept From: <?php echo $extracted['slept_from'];?> </h3>
<h4>Slept To: <?php echo $extracted['slept_to'];?> </h3>

  </div>

<?php include("include/scripts.php"); ?>

  </body>
</html>
