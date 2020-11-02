<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>萬年曆</title>
  <?php
  include 'php/calendar.php';
  ?>
  <style>
    @import url(https://fonts.googleapis.com/earlyaccess/cwtexyen.css);
  </style>
</head>

<body>
  <div class="out ">
    <div class="date">
      <?php
      $calc = new Calendar();
      $calc->showCalendar();
      ?>
    </div>
    <div class="backgroundFlash"></div>
  </div>


  <h1>水哦</h1>
</body>

</html>