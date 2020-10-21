<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update Sleep</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <br>
    <h1>Update Sleep</h1>
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
  //$sleep_id = $_SESSION['sleep_id'];
    include('include/db.php');
    $sql = "SELECT * FROM `sleep_data` WHERE id = ".$_GET['sleep_id'];

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
  ?>

<!-- POST ALL THE INFO TO UPDATER -->
  <form method="POST" action="sleep_updater.php">

<?php $sleep_id = $_GET['sleep_id'];
$sleep_id = $row['id'];
//$sleep_id = $_SESSION['sleep_id'];
 ?>
 <div class="form-group">
   <label for="sleep_id">ID</label>
   <input name="sleep_id" type="number" class="form-control" value="<?php echo $row['id']; ?>" readonly>
 </div>

  <div class="form-group">
    <label for="date">Date</label>
    <input name="date" class="datepicker" data-date-format="mm/dd/yyyy"  value="<?php echo $row['date']; ?>" >
  </div>

  <div class="form-group">
    <label for="sleep_amount">Amount of sleep</label>
    <input name="sleep_amount" type="text" class="form-control" id="sleep_amount" value="<?php echo $row['sleep_amount']; ?>" readonly>
  </div>

  <div class="form-group">
    <label for="slept_from">Slept From</label>
    <input class="form-control" type="datetime-local"
value="<?php echo date('Y-m-d\TH:i:s', strtotime($row['slept_from']) );?>" id="slept_from" name = "slept_from">
    <!-- <input name="slept_from" type="text" class="form-control" id="slept_from" placeholder="Ex: 12:10 am"> -->
  </div>

  <div class="form-group">
    <label for="slept_to">Slept to</label>
    <input class="form-control" type="datetime-local" value="<?php echo date('Y-m-d\TH:i:s',strtotime($row['slept_to']) );?>" id="slept_to" name ="slept_to">
  </div>
<!-- href="sleep_updater.php?sleep_id='php echo sleep_id'" -->
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
</div>
</div>
<?php include("include/scripts.php"); ?>
</body>
</html>
