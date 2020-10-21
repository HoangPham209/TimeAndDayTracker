<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Sleep</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <br>
    <h1>Add data</h1>
    <br>
  </div>
  <div class="container">
  <div class="row">
  <div class="col-md-12"><hr></div>
  <div class="col-md-6">

  <?php
  if(isset($errorMsg)){
  echo $errorMsg;
}
  ?>

  <form method="POST" action="sleep_vars.php">

  <div class="form-group">
    <label for="date">Date</label>
    <input name="date" class="datepicker" data-date-format="yyyy-mm-dd" placeholder="Ex: 2020-05-23" >
  </div>

  <div class="form-group">
    <label for="sleep_amount">Amount of sleep</label>
    <input name="sleep_amount" type="text" class="form-control" id="sleep_amount" placeholder="Slept to - Slept From" readonly>
    <small id="sleepamounthelp" class="form-text text-muted" >Just enter Sleep interval Below</small>
  </div>

  <div class="form-group">
    <label for="slept_from">Slept From</label>
    <input class="form-control" type="datetime-local" placeholder="2020-10-19T20:45:00" name = "slept_from">
    <!-- <input name="slept_from" type="text" class="form-control" id="slept_from" placeholder="Ex: 12:10 am"> -->
  </div>

  <div class="form-group">
    <label for="slept_to">Slept to</label>
      <input class="form-control" type="datetime-local" placeholder="2020-10-20T7:22:14" name ="slept_to">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
<?php include("include/scripts.php"); ?>
</body>
</html>
