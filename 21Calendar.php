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
  //ini_set('display_errors','off');//關閉輸出錯誤訊息
  //定義變數
  //date_default_timezone_set("Asia/Taipei");
  $year = date('Y');
  $month = date('m');
  $rYear = rand(date('Y'), date('Y') + 10);
  $rMonth = rand(1, 12);
  $rDay = rand(1, date('t', $rMonth));
  ?>
  <div class="container-xxl">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="21Calendar.php" target="_self">Kyosuke's Calendar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link align-center" href="21Calendar.php?year=<?php echo $year ?>&month=<?php echo $month ?>">回當前日期</a>
            </li>
          </ul>
          <?php
          //定義變數
          $year = isset($_GET['year']) ? $_GET['year'] : date('Y'); //當前年
          $thisMonth = isset($_GET['month']) ? $_GET['month'] : date('m'); //當前月
          $fDate = strtotime("{$year}-{$thisMonth}-1"); //當月一號時間 Y-m-d
          $monthDay = date('t', $fDate); //當月天數28-31
          $startDayWeek = date('w', $fDate); //當月一號是周幾0-6
          $today = date('d', $fDate); //今日日期
          $pDays = date('t', strtotime("{$year}-{$thisMonth}-1 -1 Months")); //上月天數
          $nDays = date('w', strtotime("{$year}-{$thisMonth}-{$monthDay}")); //本月結束是周幾
          ?>

          <form class="d-flex" action="21Calendar.php" method="get">
            <input class="form-control mr-2" type="text" name="year" maxlength="4" size="3" placeholder="YYYY" value="<?=date('Y')?>" required>

            <select class="form-control mr-2" name="month">
              <?php
              for ($i = 1; $i < 13; $i++) {
                if($i==$thisMonth){
                  echo "<option value='" . $i . "' selected>" . $i . "月</option>";
                }else{
                  echo "<option value='" . $i . "'>" . $i . "月</option>";
                }
              }
              ?>
            </select>
            <button class="btn btn-outline-secondary" type="submit" value="submit">Search</button>
            <!-- <div class="w-25">
          <a class="btn btn-outline-secondary" href="21Calendar.php?year=<?php echo $rYear ?>&month=<?php echo $rMonth ?>">Pick good day!</a>
      <div class="alert alert-warning" role="alert">
        <?= "Info：幫您精挑細選了" . $year . "年" . $thisMonth . "月" . $rDay . "日這個特別日子，趕快安排些活動吧！" ?>
        </div>
        </div> -->
          </form>
        </div>
      </div>


    </nav>
    <?php
    //定義一個月有幾週
    if ($startDayWeek + $monthDay <= 28) {
      $week = 4;
    } elseif ($startDayWeek + $monthDay <= 35) {
      $week = 5;
    } elseif ($startDayWeek + $monthDay > 35 && $startDayWeek + $monthDay < 38) {
      $week = 6;
    }

    //定義跳月計算邏輯
    //下一月
    $nextYear = $year;
    $nextMonth = $thisMonth + 1;
    if ($nextMonth > 12) {
      $nextYear = $year + 1;
      $nextMonth = 1;
    }
    //上一月
    $preYear = $year;
    $preMonth = $thisMonth - 1;
    if ($preMonth < 1) {
      $preYear = $year - 1;
      $preMonth = 12;
    }
    //月份換算英文格式
    $enmonth = [
      '1'  => "January",
      '2'  => "February",
      '3'  => "March",
      '4'  => "April",
      '5'  => "May",
      '6'  => "June",
      '7'  => "July",
      '8'  => "August",
      '9'  => "September",
      '10' => "October",
      '11' => "November",
      '12' => "December"
    ];
    $ec = $enmonth[$thisMonth];
    ?>
    <div class="card mb-3 vh-75">
      <div class="row g-0">
        <div class="item col-md-3 border-right">
          <img class="d-none d-md-block w-100 h-100" src="https://picsum.photos/200/500/?random=1" alt="...">
          <img class="md-pic d-black d-md-none w-100" src="https://picsum.photos/768/200/?random=1" alt="...">
          <div class="overlay">
            <div class="syear display-1"><?= $year ?></div>
            <div class="smonth display-6 border-bottom"><?= $ec ?></div>
          </div>
          <div class="btn2">
            <a class="carousel-control-prev flex-column text-decoration-none" href="?year=<?php echo $preYear ?>&month=<?php echo $preMonth ?>" role="button" data-slide="prev">
              <p class="fas fa-angle-left"></p>
              <p class="h6 d-none d-sm-block">Month</p>
            </a>
            <a class="btn2-p carousel-control-prev flex-column text-decoration-none" href="?year=<?php echo $year - 1 ?>&month=<?php echo $thisMonth ?>" role="button" data-slide="prev">
              <p class="fas fa-angle-double-left"></p>
              <p class="h6 d-none d-sm-block">Year</p>
            </a>
            <a class="carousel-control-next flex-column text-decoration-none" href="?year=<?php echo $nextYear ?>&month=<?php echo $nextMonth ?>" role="button" data-slide="next">
              <span class="fas fa-angle-right"></span>
              <p class="h6 d-none d-sm-block">Month</p>
            </a>
            <a class="btn2-n carousel-control-next flex-column text-decoration-none" href="?year=<?php echo $year + 1 ?>&month=<?php echo $thisMonth ?>" role="button" data-slide="prev">
              <p class="fas fa-angle-double-right"></p>
              <p class="h6 d-none d-sm-block">Year</p>
            </a>
          </div>
        </div>
        <div class="col-12 col-md-9">
          <div class="card-body px-0 ">
            <table class="container-fluid text-center text-light">
              <thead>
                <td style="width: 14%;">SUN</td>
                <td style="width: 14%;">MON</td>
                <td style="width: 14%;">TUE</td>
                <td style="width: 14%;">WED</td>
                <td style="width: 14%;">THU</td>
                <td style="width: 14%;">FRI</td>
                <td style="width: 14%;">SAT</td>
              </thead>
              <tbody>
                <?php

                //萬年曆本體
                for ($i = 0; $i < $week; $i++) {
                  echo "<tr>";
                  for ($j = 0; $j < 7; $j++) {
                    if ($year == date('Y') && $thisMonth == date('m') && (($i * 7) + ($j + 1)) == date('j')) { //標註今日
                      echo "<td class='date today border border-white'>" . date('j');
                    } elseif ($i == 0 && $j < $startDayWeek) {
                      echo "<td class='date pmonth border border-white'>" . ($j + 1 - $startDayWeek + $pDays); //none
                    } elseif ((($i * 7) + ($j + 1)) - $startDayWeek > $monthDay) {
                      echo "<td class='date nmonth border border-white'>" . ($j - $nDays); //none
                    } else {
                      echo "<td class='date h4 border border-white'>" . (($i * 7) + ($j + 1) - $startDayWeek);
                    }
                    echo "</td>";
                  }
                  echo "<tr>";
                }
                ?>
              </tbody>
            </table>
            <div class="btn1">
              <a class="carousel-control-prev" href="?year=<?php echo $preYear ?>&month=<?php echo $preMonth ?>" role="button" data-slide="prev">
                <p class="text-dark h2 fas fa-angle-left"></p>
                <p class="d1 text-dark">Month</p>
              </a>
              <a class="btn2-p carousel-control-prev" href="?year=<?php echo $year - 1 ?>&month=<?php echo $thisMonth ?>" role="button" data-slide="prev">
                <p class="text-dark h2 fas fa-angle-double-left"></p>
                <p class="d1 text-dark">Year</p>
              </a>
              <a class="carousel-control-next" href="?year=<?php echo $nextYear ?>&month=<?php echo $nextMonth ?>" role="button" data-slide="next">
                <span class="text-dark h2 fas fa-angle-right"></span>
                <p class="d2 text-dark">Month</p>
              </a>
              <a class="btn2-n carousel-control-next" href="?year=<?php echo $year + 1 ?>&month=<?php echo $thisMonth ?>" role="button" data-slide="prev">
                <p class="text-dark h2 fas fa-angle-double-right"></p>
                <p class="d2 text-dark">Year</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>