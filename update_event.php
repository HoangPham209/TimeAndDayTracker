<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update Event</title>
    <?php include("include/head.php"); ?>
  </head>
  <body>
  <?php include("include/navigation.php"); ?>

  <div class="container">
    <br>
    <h1>Update Event</h1>
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

    <?php if(isset($_GET['message'])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>YOU UPDATED IT!</strong><?php echo $_GET['message']; ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php endif; ?>

  <!-- fetch data from the row id -->
    <?php
    //$sleep_id = $_SESSION['sleep_id'];
      include('include/db.php');
      $sql = "SELECT * FROM `events_data` WHERE id = ".$_GET['event_id'];

      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($result);
    ?>

  <form method="POST" action="event_updater.php">
    <?php //$event_id = $_GET['event_id'];
    $event_id = $row['id'];
    ?>

    <div class="form-group">
      <label for="event_id">ID</label>
      <input name="event_id" type="number" class="form-control" value="<?php echo $row['id']; ?>" readonly>
    </div>

    <div class="form-group">
      <label for="event_title">Event</label>
      <input name="event_title" type="text" class="form-control" value="<?php echo $row['event_title'];?>">
    </div>

    <div class="form-group">
      <label for="repeat_freq">Repeat Frequency</label>
      <select class="form-control" name="repeat_freq">
        <option value="<?php echo $row['repeat_freq'];?>"> <?php echo $row['repeat_freq'];?> </option>
        <option value="Never">Never</option>
        <option value="Every Day">Every Day</option>
        <option value="Every Week">Every Week</option>
        <option value="Every Month">Every Month</option>
        <option value="Every Year">Every Year</option>
        <!-- Add more catefories somehow  -->
      </select>
    </div>

  <div class="form-group">
    <label for="event_from">Time From</label>
    <input class="form-control" type="datetime-local" name="event_from" value="<?php echo date('Y-m-d\TH:i:s', strtotime($row['event_from'])); ?>" >
    <!-- <input name="slept_from" type="text" class="form-control" id="slept_from" placeholder="Ex: 12:10 am"> -->
  </div>

  <div class="form-group">
    <label for="event_to">To</label>
    <input class="form-control" type="datetime-local" name="event_to" value="<?php echo date('Y-m-d\TH:i:s', strtotime($row['event_to'])); ?>" >
  </div>

  <div class="form-group">
    <label for="location">Location</label>
    <input name="location" type="text" class="form-control" value="<?php echo $row['location'];?>">
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <input name="description" type="text" class="form-control" value="<?php echo $row['description'];?>"></input>
  </div>

  <button type="submit" class="btn btn-primary">Update Event</button>
</form>
</div>
</div>
</div>
<?php include("include/scripts.php"); ?>
</body>
</html>
