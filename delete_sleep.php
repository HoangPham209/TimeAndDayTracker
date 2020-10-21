<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delete</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
      <br>
    <h1>Delete Sleep Data</h1>
    <br>
    <?php
    if(isset($_GET['confirm'])){
    include('include/db.php');
    $sql = "DELETE FROM `sleep_data` WHERE id = ".$_GET['sleep_id'];


    // Perform query
    if ($result = mysqli_query($con, $sql)) {

    } else {
      echo "No results";
    }
    mysqli_close($con);
    //Redirect the user to another page
    header("location: sleep_table.php");
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
      <div class="col-3">
        <a href="sleep_table.php" class="btn btn-info">NO</a>
      </div>
      <div class="col"></div>
      <div class="col-3">
        <a href="delete_sleep.php?sleep_id=<?php echo $_GET['sleep_id']; ?>&confirm=1" onclick="alertFunction()" class="btn btn-danger">YES</a>
      </div>
    </div>
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
