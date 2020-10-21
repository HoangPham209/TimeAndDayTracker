<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete Event</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <br>
    <h1>Delete Event</h1>
    <br>
    <?php
    if(isset($_GET['confirm'])){
    include('include/db.php');
    $sql = "DELETE FROM `events_data` WHERE id = ".$_GET['event_id'];

    // Perform query
    if ($result = mysqli_query($con, $sql)) {

    } else {
      echo "No results";
    }
    mysqli_close($con);
    //Redirect the user to another page
    header("location: planner.php");
    }
    else {
      ?>
      <div class="row">
        <div class="col">
          <h2>Are you sure?</h2>
        </div>
      </div>
      <a href="planner.php" class="btn btn-info">NO</a>
      <a href="delete_event.php?event_id=<?php echo $_GET['event_id']; ?>&confirm=1" onclick="alertFunction()" class="btn btn-danger">YES</a>
      <?
    }
    ?>
  </tbody>
</table>
  </div>


  <script type="text/javascript">
    function alertFunction(){
      alert("Data successfully Deleted");
    }
  </script>
<?php include("include/scripts.php"); ?>

  </body>
</html>
