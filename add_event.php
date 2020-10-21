<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Events</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <br>
    <h1>Add Event</h1>
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

  <form method="POST" action="events_vars.php">

  <div class="form-group">
    <label for="event_title">Event</label>
    <input name="event_title" type="text" class="form-control">
  </div>

  <div class="form-group">
    <label for="repeat_freq">Repeat Frequency</label>
    <select class="form-control" name="repeat_freq">
      <option value="Never">Never</option>
      <option value="Daily">Every Day</option>
      <option value="Weekly">Every Week</option>
      <option value="Monthly">Every Month</option>
      <option value="Yearly">Every Year</option>
      <!-- Add more catefories somehow  -->
    </select>
  </div>

  <div class="form-group">
    <label for="event_from">Time From</label>
    <input class="form-control" type="datetime-local" value="From" name="event_from">
    <!-- <input name="slept_from" type="text" class="form-control" id="slept_from" placeholder="Ex: 12:10 am"> -->
  </div>

  <div class="form-group">
    <label for="event_to">To</label>
    <input class="form-control" type="datetime-local" value="To" name="event_to">
  </div>

  <div class="form-group">
    <label for="location">Location</label>
    <input name="location" type="text" class="form-control">
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Add Event</button>
</form>
</div>
</div>
</div>
<?php include("include/scripts.php"); ?>
</body>
</html>
