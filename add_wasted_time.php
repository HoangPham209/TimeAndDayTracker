<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Wasted Time</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <!-- Content here -->
    <br>
    <h1>Add Wasted Time</h1>

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

  <form method="POST" action="wasted_time_vars.php">

  <div class="form-group">
    <label for="date">Date</label>
    <input class="form-control" type="date" id="date" name="date">
    <!-- value="2011-08-19" -->
    <!-- <input name="date" class="datepicker" data-date-format="yyyy-mm-dd" id="date" placeholder="Ex: 2020-03-27"> -->
  </div>

  <div class="form-group">
    <label for="category">Category of Application</label>
    <select class="form-control" name="category">
      <option value="Binge Watch">Binge Watch</option>
      <option value="Gaming">Gaming</option>
      <option value="Social Media">Social Media</option>
      <option value="Misc">Miscellaneous</option>
      <!-- Add more catefories somehow  -->
    </select>
    <!-- <input name="category" type="text" class="form-control" id=""  placeholder="Ex: "> -->
  </div>

  <div class="form-group">
    <label for="app_name">Application Name</label>
    <input name="app_name" type="text" class="form-control" id="app_name" placeholder="Ex: Youtube or Among Us">
  </div>

  <div class="form-group">
    <label for="time_amount">Amount of Time Wasted</label>
    <div class="form-row">
      <div class="col-2">
        <input type="number" class="form-control mb-2" id="time_amount_hours" placeholder="hour(s)" name="time_amount_hours">
        <!-- <label class="sr-only" for="inlineFormInput">Hours</label> -->
      </div>
      <div class="col-2">
        <input type="number" class="form-control mb-2" id="time_amount_minutes" placeholder="minute(s)" name="time_amount_minutes">
        <!-- <label class="sr-only" for="inlineFormInput">Minutes</label> -->
      </div>
    </div>
    <!-- <input name="time_amount" type="text" class="form-control" id="time_amount" placeholder="Ex: 1 hr 20 mins "> -->
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
<?php include("include/scripts.php"); ?>
</body>
</html>
