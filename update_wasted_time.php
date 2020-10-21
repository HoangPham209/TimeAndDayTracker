<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update Wasted Time</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <br>
    <h1>Update Wasted Time</h1>
    <br>
  </div>
  <div class="container">
  <div class="row">
  <div class="col-md-12"><hr></div>
  <div class="col-md-6">

  <?php if(isset($_GET['error'])):?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>EOOOPS!</strong> <?php echo $_GET['error']; ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>

  <!-- fetch data from the row id -->
  <?php
    include('include/db.php');
    $sql = "SELECT * FROM `wasted_time_data` WHERE id = ".$_GET['wasted_time_id'];

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
  ?>

  <form method="POST" action="wasted_time_updater.php">

    <?php //$wasted_time_id = $_GET['wasted_time_id'];
    $wasted_time_id = $row['id'];
    //$sleep_id = $_SESSION['sleep_id'];
     ?>
     <div class="form-group">
       <label for="wasted_time_id">ID</label>
       <input name="wasted_time_id" type="number" class="form-control" value="<?php echo $row['id']; ?>" readonly>
     </div>

  <div class="form-group">
    <label for="date">Date</label>
    <input class="form-control" type="date" name="date" value="<?php echo $row['date'];?>">
    <!-- value="2011-08-19" -->
    <!-- <input name="date" class="datepicker" data-date-format="yyyy-mm-dd" id="date" placeholder="Ex: 2020-03-27"> -->
  </div>

  <div class="form-group">
    <label for="category">Category of Application</label>
    <select class="form-control" name="category">
      <option value="<?php echo $row['category'];?>"><?php echo $row['category'];?> </option>
      <option value="Binge Watch">Binge Watch</option>
      <option value="Gaming">Gaming</option>
      <option value="Social Media">Social Media</option>
      <option value="Misc">Miscellaneous</option>
    </select>

  </div>

  <div class="form-group">
    <label for="app_name">Application Name</label>
    <input name="app_name" type="text" class="form-control" value="<?php echo $row['app_name'];?>">
  </div>

  <div class="form-group">
    <label for="time_amount">Amount of Time Wasted</label>
    <input name="time_amount" type="text" class="form-control"  value="<?php echo $row['time_amount'];?>">
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
</div>
</div>
<?php include("include/scripts.php"); ?>
</body>
</html>
