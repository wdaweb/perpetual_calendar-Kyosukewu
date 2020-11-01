<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a1381bb91e.js" crossorigin="anonymous"></script>
  <title>Kyosuke's Calendar</title>

</head>

<body>
  <?php
  ini_set('display_errors','off');//關閉輸出錯誤訊息
  //定義變數
  $year = date('Y');
  $month = date('m');
  ?>
  <div class="container-xxl">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Kyosuke's Calendar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link align-center" href="21Calendar.php?y=<?php echo $year ?>&m=<?php echo $month ?>">回當前日期</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">其他查詢</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control mr-2" type="search" placeholder="YYYYmmdd">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
          </form>

        </div>
      </div>
    </nav>
    <?php
    //定義變數
    $year = $_GET['y'] ? $_GET['y'] : date('Y'); //當前年
    $thisMonth = $_GET['m'] ? $_GET['m'] : date('m'); //當前月
    $fDate = strtotime("{$year}-{$thisMonth}-1"); //當月一號時間
    $monthDay = date('t', $fDate); //當月天數
    $startDayWeek = date('w', $fDate); //當月一號是周幾
    $today = date('d', $fDate); //今日日期
    //定義一個月有幾週
    if ($startDayWeek + $monthDay <= 28) {
      $week = 4;
    } elseif ($startDayWeek + $monthDay <= 35) {
      $week = 5;
    } elseif ($startDayWeek + $monthDay > 35 && $startDayWeek + $monthDay < 38) {
      $week = 6;
    }
    //定義跳月計算邏輯
    //下一月/年
    $nextYear = $year;
    $nextMonth = $thisMonth + 1;
    if ($nextMonth > 12) {
      $nextYear = $year + 1;
      $nextMonth = 1;
    }
    //上一月/年
    $preYear = $year;
    $preMonth = $thisMonth - 1;
    if ($preMonth < 1) {
      $preYear = $year - 1;
      $preMonth = 12;
    }

    ?>
    <div class="card mb-3 vh-75">
      <div class="row g-0">
        <div class="item col-md-3 border-right">
          <img class="d-none d-md-block w-100 h-100" src="https://picsum.photos/200/500/?random=1" alt="...">
          <img class="md-pic d-black d-md-none w-100" src="https://picsum.photos/768/200/?random=1" alt="...">
          <div class="overlay">
            <div class="year"><?= $year ?>年</div>
            <div class="month"><?= $thisMonth ?>月</div>
          </div>
          <div class="btn2">
                  <a class="carousel-control-prev flex-column text-decoration-none" href="21Calendar.php?y=<?php echo $preYear ?>&m=<?php echo $preMonth ?>" role="button" data-slide="prev">
                    <p class="fas fa-angle-left"></p>
                    <p class="h6 d-none d-sm-block">Month</p>
                  </a>
                  <a class="btn2-p carousel-control-prev flex-column text-decoration-none" href="21Calendar.php?y=<?php echo $preYear - 1 ?>&m=<?php echo $thisMonth ?>" role="button" data-slide="prev">
                    <p class="fas fa-angle-double-left"></p>
                    <p class="h6 d-none d-sm-block">Year</p>
                  </a>
                  <a class="carousel-control-next flex-column text-decoration-none" href="21Calendar.php?y=<?php echo $nextYear ?>&m=<?php echo $nextMonth ?>" role="button" data-slide="next">
                    <span class="fas fa-angle-right"></span>
                    <p class="h6 d-none d-sm-block">Month</p>
                  </a>
                  <a class="btn2-n carousel-control-next flex-column text-decoration-none" href="21Calendar.php?y=<?php echo $nextYear + 1 ?>&m=<?php echo $thisMonth ?>" role="button" data-slide="prev">
                    <p class="fas fa-angle-double-right"></p>
                    <p class="h6 d-none d-sm-block">Year</p>
                  </a>
                </div>
        </div>

        <div class="col-12 col-md-9">
          <div class="card-body px-0 ">
            <table class="container-fluid text-center text-light">
              <thead>
                <td>日</td>
                <td>一</td>
                <td>二</td>
                <td>三</td>
                <td>四</td>
                <td>五</td>
                <td>六</td>
              </thead>
              <tbody>
                <?php
                for ($i = 0; $i < $week; $i++) {
                  echo "<tr>";
                  for ($j = 0; $j < 7; $j++) {
                    echo "<td class='date text-dark border border-white'>";
                    if ($i == 0 && $j < $startDayWeek) {
                      //none
                    } elseif ((($i * 7) + ($j + 1)) - $startDayWeek > $monthDay) {
                      //none
                    } else {
                      echo (($i * 7) + ($j + 1) - $startDayWeek);
                    }
                    echo "</td>";
                  }
                  echo "<tr>";
                }
                ?>
              </tbody>
            </table>
            <div class="btn">
              <a class="carousel-control-prev flex-column" href="21Calendar.php?y=<?php echo $preYear ?>&m=<?php echo $preMonth ?>" role="button" data-slide="prev">
                <p class="text-dark h2 fas fa-angle-left"></p>
                <p class="d1 text-dark">Month</p>
              </a>
              <a class="btn2-p carousel-control-prev flex-column" href="21Calendar.php?y=<?php echo $preYear - 1 ?>&m=<?php echo $thisMonth ?>" role="button" data-slide="prev">
                <p class="text-dark h2 fas fa-angle-double-left"></p>
                <p class="d1 text-dark">Year</p>
              </a>
              <a class="carousel-control-next flex-column" href="21Calendar.php?y=<?php echo $nextYear ?>&m=<?php echo $nextMonth ?>" role="button" data-slide="next">
                <span class="text-dark h2 fas fa-angle-right"></span>
                <p class="d1 text-dark">Month</p>
              </a>
              <a class="btn2-n carousel-control-next flex-column" href="21Calendar.php?y=<?php echo $nextYear + 1 ?>&m=<?php echo $thisMonth ?>" role="button" data-slide="prev">
                <p class="text-dark h2 fas fa-angle-double-right"></p>
                <p class="d1 text-dark">Year</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>

</html>