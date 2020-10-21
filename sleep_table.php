<html>
  <head>
    <meta charset="utf-8">
    <title>Sleep Data Table</title>
    <?php include("include/head.php"); ?>
  </head>

  <body>
    <?php include("include/navigation.php"); ?>
    <div class="container">
      <br>
      <h1> Sleep Data </h1>
      <br>

      <?php if(isset($_GET['message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>YOU UPDATED IT!</strong><?php echo $_GET['message']; ?>
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
          <th scope="col">Amount of Sleep (hrs)</th>
          <th scope="col">Slept From</th>
          <th scope="col">Slept To</th>
          <th scope="col"> </th>
          <th scope="col"> </th>
          <th scope="col"> </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total_input = 0;
        include('include/db.php');
        $sql = "SELECT * FROM `sleep_data` ORDER BY `sleep_data`.`id` DESC";

        // $sql = "SELECT * FROM `sleep_data` WHERE id = ".$_GET['sleep_id']; //get specific data row?

        // Perform query
        if ($result = mysqli_query($con, $sql)) {
          $total_input = mysqli_num_rows($result);
          // echo "Total Orders: " . mysqli_num_rows($result) . '<br>';
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>"; //row tag
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['sleep_amount']."</td>";
            echo "<td>".$row['slept_from']."</td>";
            echo "<td>".$row['slept_to']."</td>";

            echo '<td><a href="sleep_details.php?sleep_id='.$row['id'].'">View Data</a></td>';
            echo '<td><a href="update_sleep.php?sleep_id='.$row['id'].'">Update Data</a></td>';
            echo '<td><a href="delete_sleep.php?sleep_id='.$row['id'].'">Delete Data</a></td>';
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
      <h3>Total Input: <?php echo $total_input;?> </h3>
    </div>
    <?php include("include/scripts.php"); ?>

  </body>
</html>
