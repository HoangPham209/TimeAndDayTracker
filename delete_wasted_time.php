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
    <h1>Delete Time</h1>
    <br>
    <?php
    if(isset($_GET['confirm'])){
    include('include/db.php');
    $sql = "DELETE FROM `wasted_time_data` WHERE id = ".$_GET['wasted_time_id'];
//"DELETE FROM `sleep_data` WHERE `sleep_data`.`id` = i" i will be in a loop like for int i=1 i++ i<10 or something

    // Perform query
    if ($result = mysqli_query($con, $sql)) {

    } else {
      echo "No results";
    }
    mysqli_close($con);
    //Redirect the user to another page
    header("location: wasted_time.php");
    }
    else {
      ?>
      <div class="row">
        <div class="col">
            <h2>Are you sure?</h2>
        </div>
      </div>
      <div class="row"></div>
      <div class="row">
        <div class="col-3"> <a href="wasted_time.php" class="btn btn-info">NO</a></div>
        <div class="col-5"></div>
        <div class="col-3">
          <a href="delete_wasted_time.php?wasted_time_id=<?php echo $_GET['wasted_time_id']; ?>&confirm=1" onclick="alertFunction()" class="btn btn-danger">YES</a>
        </div>
      <?
    }
    ?>
  </tbody>
</table>
<!-- <div> Delete Data Success! </div>   -->

</div>

<script type="text/javascript">
  function alertFunction(){
    alert("Data successfully Deleted");
  }
</script>

<?php include("include/scripts.php"); ?>

  </body>
</html>
