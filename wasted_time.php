<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Wasted Time Data Table</title>
    <?php include("include/head.php"); ?>
  </head>

  <body>
    <?php include("include/navigation.php"); ?>
    <div class="container">
      <br>
      <h1> Wasted Time Data  </h1>
      <br>

      <?php if(isset($_GET['message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>YOU UPDATED THE DATA!</strong><?php echo $_GET['message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php endif; ?>

      <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Date</th>
          <th scope="col">Category</th>
          <th scope="col">Application Name</th>
          <th scope="col">Amount of Time Wasted</th>
          <th scope="col"> </th>
          <th scope="col"> </th>
          <th scope="col"> </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total_input = 0;
        $total_hours = 0.0;
        include('include/db.php');
        $sql = "SELECT * FROM `wasted_time_data`";
        //get the aggregate data from the week like how much time slept in a week
        // $sql = "SELECT * FROM `sleep_data` WHERE id = ".$_GET['sleep_id']; //get specific data from row

        // Perform query
        if ($result = mysqli_query($con, $sql)) {
          $total_input = mysqli_num_rows($result);
          // echo "Total Orders: " . mysqli_num_rows($result) . '<br>';
          while ($row = mysqli_fetch_assoc($result)) {
            $total_hours += floatval($row['time_amount']);
            echo "<tr>"; //row tag
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['category']."</td>";
            echo "<td>".$row['app_name']."</td>";
            echo "<td>".$row['time_amount']."</td>";
            echo '<td><a href="wasted_time_details.php?wasted_time_id='.$row['id'].'">View Details</a></td>';
            echo '<td><a href="update_wasted_time.php?wasted_time_id='.$row['id'].'">Update Details</a></td>';
            echo '<td><a href="delete_wasted_time.php?wasted_time_id='.$row['id'].'">Delete Data</a></td>';
            echo "</tr>";
          }
          // Free result set\
          //echo "Returned rows!";
          mysqli_free_result($result);
        } else {
          echo "No results";
        }

        mysqli_close($con);

        ?>
      </tbody>
      </table>
      <h3>Total Hours: <?php echo $total_hours;?> </h3>
      <h3>Total Input: <?php echo $total_input;?> </h3>
    </div>
    <?php include("include/scripts.php"); ?>

  </body>
</html>
