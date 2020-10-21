<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Events Planner</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Here -->
  <?php include("include/head.php"); ?>
  </head>
  <body>
    <?php include("include/navigation.php"); ?>

    <div class="container">
      <br>
      <h1> Event Planner </h1>
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
          <th scope="col">Event</th>
          <th scope="col">Repeat Frequency</th>
          <th scope="col">From</th>
          <th scope="col">To</th>
          <th scope="col"> </th>
          <th scope="col"> </th>
          <th scope="col"> </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total_input = 0;
        include('include/db.php');
        $sql = "SELECT * FROM `events_data`";

        // Perform query
        if ($result = mysqli_query($con, $sql)) {
          $total_input = mysqli_num_rows($result);

          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>"; //row tag
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['event_title']."</td>";
            echo "<td>".$row['repeat_freq']."</td>";
            echo "<td>".$row['event_from']."</td>";
            echo "<td>".$row['event_to']."</td>";
            echo '<td><a href="event_details.php?event_id='.$row['id'].'">View Event</a></td>';
            echo '<td><a href="update_event.php?event_id='.$row['id'].'">Update Event</a></td>';
            echo '<td><a href="delete_event.php?event_id='.$row['id'].'">Delete Event</a></td>';
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
      <h3>Number of Events: <?php echo $total_input;?> </h3>
    </div>

    <!-- JS at the bottom  -->
    <?php include("include/scripts.php"); ?>
  </body>
</html>
