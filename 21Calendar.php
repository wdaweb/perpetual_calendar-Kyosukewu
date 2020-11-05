<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/a1381bb91e.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <title>Kyosuke's Calendar</title>
</head>
<style>
  body {
    height: 100vh;
    background-image: linear-gradient(135deg, #fff 30%, #eee 80%);
    overflow: hidden;
  }

  .card {
    box-shadow: 0px 0px 15px #555;
  }

  .item {
    position: relative;
  }

  .overlay {
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: center;
    background: rgba(0, 0, 0, 0.4);
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    color: #fff;
  }

  thead tr {
    background: #333;
    height: 50px;
    color: #fff;
  }

  tbody tr {
    background: #ddd;
  }

  tbody td {
    font-size: 20px;
    height: 12%;
    color: #666;
  }

  tbody td:nth-child(6n+1) {
    background: #fcc;
    color: #f77;
  }

  thead td:nth-child(6n+1) {
    background: rgb(131, 18, 18);
  }

  .today {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #ccc;
    color: #eee;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    color: #fff;
    background: rgb(124, 246, 255);
    box-shadow: 0 0 20px #fff;
    text-shadow: 0 0 10px rgb(50, 111, 116);
    /* opacity: .3; */
  }

  .pmonth,
  .nmonth {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #ccc;
    color: #eee;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
  }

  #pick {
    width: 300%;
  }

  .sday {
    color: #f33 !important;
    background: #ffa !important;
    box-shadow: 0 0 20px #ffd;
  }

  .sign {
    bottom: 10%;
    left: 0;
    right: 0;
  }

  @media screen and (min-width: 1500px) {
    table {
    height: 80vh;
  }
    .alert {
      display: none;
      top: 3%;
      right: 0%;
      opacity: .9;
      z-index: 10;
    }

    .btn2 {
      display: none;
    }

    .carousel-control-prev {
      left: -5%;
      width: 5%;
      flex-direction: column;
    }

    .carousel-control-next {
      right: -5%;
      width: 5%;
      flex-direction: column;
    }

    .btn2-p {
      left: -8%;
      width: 3%;
    }

    .btn2-n {
      right: -8%;
      width: 3%;
    }
  }

  @media screen and (max-width: 1500px) and (min-width: 768px) {
    table {
    height: 75vh;
  }
    .alert {
      display: none;
      top: 3%;
      right: 0%;
      opacity: .9;
      z-index: 10;
    }

    .btn2 {
      display: none;
    }

    .card-body {
      position: relative;
      padding: 1rem 1rem 3.5rem;
    }

    .carousel-control-prev {
      left: 20%;
      width: 5%;
      top: 95%;
      height: 5%;
    }

    .carousel-control-next {
      right: 20%;
      width: 5%;
      top: 95%;
      height: 5%;
    }

    .d1 {
      margin-left: .5rem;
      margin-bottom: .5rem;
    }

    .d2 {
      margin-right: .5rem;
      margin-bottom: .5rem;
      order: -1;
    }

    .btn2-p {
      left: 5%;
      width: 3%;
    }

    .btn2-n {
      right: 5%;
      width: 3%;
    }
  }

  @media screen and (max-width: 768px) {
    .sign {
      font-size:1rem;
      bottom: 10%;
      left: 0;
      right: 0;
    }

    .alert {
      display: none;
      top: 3%;
      right: 0%;
      opacity: .9;
      z-index: 10;
    }

    table {
      height: 45vh;
    }

    .btn1 {
      display: none;
    }

    .card-body {
      position: relative;
      padding: 0;
    }

    .carousel-control-prev {
      left: 15%;
      width: 5%;
      justify-content: center;
    }

    .carousel-control-next {
      right: 15%;
      width: 5%;
      justify-content: center;
    }

    .btn2-p {
      left: 5%;
      width: 3%;
    }

    .btn2-n {
      right: 5%;
      width: 3%;
    }
  }

  @media screen and (max-height: 700px) {

    .d1,
    .d2 {
      display: none;
    }

    .carousel-control-prev {
      width: 5%;
      bottom: 1%;
      justify-content: flex-end;
    }

    .carousel-control-next {
      width: 5%;
      bottom: 1%;
      justify-content: flex-end;
    }
  }
</style>

<body>
  <?php
  //ini_set('display_errors','off');//關閉輸出錯誤訊息
  //定義變數
  //date_default_timezone_set("Asia/Taipei");
  $year = date('Y');
  $month = date('m');
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
              <a class="nav-link align-center" href="21Calendar.php?year=<?php echo $year ?>&month=<?php echo $month ?>">Back to today</a>
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
          $rYear = rand(date('Y'), date('Y') + 1);

          if ($rYear > date('Y')) {
            $rMonth = rand(1, 12);
            $rDay = rand(1, date('t', $rMonth));
          } else {
            $rMonth = rand(date('m'), 12);
            $rDay = rand($today, date('t', $rMonth));
          }

          ?>
          <form class="d-flex" action="21Calendar.php" method="get">
            <input class="form-control mr-2" type="text" name="year" maxlength="4" size="3" placeholder="YYYY" value="<?= date('Y') ?>" required>

            <select class="form-control mr-2" name="month">
              <?php
              for ($i = 1; $i < 13; $i++) {
                if ($i == $thisMonth) {
                  echo "<option value='" . $i . "' selected>" . $i . "月</option>";
                } else {
                  echo "<option value='" . $i . "'>" . $i . "月</option>";
                }
              }
              ?>
            </select>
            <button class="btn btn-outline-secondary" type="submit" value="submit">Search</button>
            <div id="pick" class="pick btn btn-outline-secondary ml-3">Pick good day!</div>
            <script type="text/javascript">
              $(document).ready(function() { //文件準備完畢開始做事
                //做事的位置
                $("#pick").click(function() {
                  $("#alert").toggle();
                })
              })
            </script>
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
    <div id="alert" class="alert position-absolute alert-warning alert-dismissible fade show" role="alert">
      <?= "Info：幫您精挑細選了" . $year . "年" . $thisMonth . "月" . $rDay . "日這個特別日子，趕快安排些活動吧！ " ?>
      <br>
      <a class="text-center" href="21Calendar.php?year=<?php echo $rYear ?>&month=<?php echo $rMonth ?>">不喜歡這天？ 點擊這裡找尋新的命定之日！</a>
      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="card mb-3">
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
          <div class="card-body">
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
                $date = "";
                //萬年曆本體
                // for ($i = 0; $i < $week; $i++) {
                //   echo "<tr>";
                //   for ($j = 0; $j < 7; $j++) {
                //     if ($year == date('Y') && $thisMonth == date('m') && (($i * 7) + ($j + 1)) == date('j')) { //標註今日
                //       echo "<td class='date today border border-white'>" . date('j');
                //     } elseif ($i == 0 && $j < $startDayWeek) {
                //       echo "<td class='date pmonth border border-white'>" . ($j + 1 - $startDayWeek + $pDays); //none
                //     } elseif ((($i * 7) + ($j + 1)) - $startDayWeek > $monthDay) {
                //       echo "<td class='date nmonth border border-white'>" . ($j - $nDays); //none
                //     } else {
                //       echo "<td class='date h4 border border-white'>" . (($i * 7) + ($j + 1) - $startDayWeek);
                //     }
                //     echo "</td>";
                //   }
                //   echo "<tr>";
                // }
                ?>
                <?php
                include 'holiday.php';
                //萬年曆本體2
                for ($i = 0; $i < $week; $i++) {
                  echo "<tr>";
                  for ($j = 0; $j < 7; $j++) {
                    echo "<td class='position-relative border border-white'>";
                    $date = '';
                    if ($year == date('Y') && $thisMonth == date('m') && (($i * 7) + ($j + 1)) == date('j')) { //標註今日
                            echo "<div class='date today position-absolute border border-white'>".date('j')."</div>";
                    }
                    if ($i == 0 && $j < $startDayWeek) {
                      echo "<div class='date pmonth position-absolute'>" . ($j + 1 - $startDayWeek + $pDays) . "</div>"; //none
                    } else if ((($i * 7) + ($j + 1) - $startDayWeek) > $monthDay) {
                      echo "<div class='date nmonth position-absolute'>".($j - $nDays)."</div>"; //none
                    } else {
                      $date = (($i * 7) + ($j + 1) - $startDayWeek);
                    }
                    echo $date;
                    if (!empty($holiday[$thisMonth."-".$date])) {
                      echo "<br><div class='sign  text-danger position-absolute'>" . $holiday[$thisMonth."-".$date] . "</div>";
                    };
                    echo "</div>";
                  }
                  echo "</tr>";
                }
                //     if ($year == date('Y') && $thisMonth == date('m') && (($i * 7) + ($j + 1)) == date('j')) { //標註今日
                //       echo "<td class='date today border border-white'>" . date('j');
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
  <style>
    <?php
    if ($thisMonth == 1) {
      echo "
  .f1{
    right: 80%;
    animation: f1 1.5s forwards;
  }
  .f2{
    left: 75%;
    animation: f2 1.5s .2s forwards;
  }
  .f3{
    right: 30%;
    animation: f3 1.5s .4s forwards;
  }
  .f4{
    left: 20%;
    animation: f4 1.5s .3s forwards;
  }
  .f5{
    right: 50%;
    animation: f5 1.5s .5s forwards;
  }
    .f1,.f2,.f3,.f4,.f5{
      bottom: -100%;
      width: 10%;
    }
  @keyframes f1 {
    45%{
      right: 80%;
      bottom: 50%;
      width: 10%;
    }
    50%{
      right: 60%;
      bottom: 20%;
      width: 60%;
      opacity: 1;
    }
    100%{
      right: 60%;
      bottom: 20%;
      width: 60%;
      opacity: 0;
    }
  }
  @keyframes f2 {
    45%{
      left: 75%;
      bottom: 10%;
      width: 10%;
    }
    50%{
      left: 55%;
      bottom: 0%;
      width: 50%;
      opacity: 1;
    }
    100%{
      left: 55%;
      bottom: 0%;
      width: 50%;
      opacity: 0;
    }
  }
  @keyframes f3 {
    45%{
      right: 30%;
      bottom: 15%;
      width: 10%;
    }
    50%{
      right: 10%;
      bottom: -10%;
      width: 40%;
      opacity: 1;
    }
    100%{
      right: 10%;
      bottom: -10%;
      width: 40%;
      opacity: 0;
    }
  }
  @keyframes f4 {
    45%{
      left: 20%;
      bottom: 10%;
      width: 10%;
    }
    50%{
      left: 0%;
      bottom: -15%;
      width: 55%;
      opacity: 1;
    }
    100%{
      left: 0%;
      bottom: -15%;
      width: 55%;
      opacity: 0;
    }
  }
  @keyframes f5 {
    45%{
      right: 50%;
      bottom: 50%;
      width: 10%;
    }
    50%{
      right: 10%;
      bottom: -10%;
      width: 100%;
      opacity: 1;
    }
    100%{
      right: 10%;
      bottom: -10%;
      width: 100%;
      opacity: 0;
    }
  }
  @media screen and (max-width: 768px) {
    .f1,.f2,.f3,.f4,.f5{
      bottom: -100%;
      width: 10%;
    }
    @keyframes f1 {
    45%{
      right: 80%;
      bottom: 70%;
      width: 10%;
    }
    50%{
      right: 60%;
      bottom: 60%;
      width: 60%;
      opacity: 1;
    }
    100%{
      right: 60%;
      bottom: 60%;
      width: 60%;
      opacity: 0;
    }
  }
  @keyframes f2 {
    45%{
      left: 75%;
      bottom: 60%;
      width: 10%;
    }
    50%{
      left: 55%;
      bottom: 50%;
      width: 50%;
      opacity: 1;
    }
    100%{
      left: 55%;
      bottom: 50%;
      width: 50%;
      opacity: 0;
    }
  }
  @keyframes f3 {
    45%{
      right: 30%;
      bottom: 65%;
      width: 10%;
    }
    50%{
      right: 10%;
      bottom: 60%;
      width: 40%;
      opacity: 1;
    }
    100%{
      right: 10%;
      bottom: 60%;
      width: 40%;
      opacity: 0;
    }
  }
  @keyframes f4 {
    45%{
      left: 20%;
      bottom: 50%;
      width: 10%;
    }
    50%{
      left: 0%;
      bottom: 45%;
      width: 55%;
      opacity: 1;
    }
    100%{
      left: 0%;
      bottom: 45%;
      width: 55%;
      opacity: 0;
    }
  }
  @keyframes f5 {
    45%{
      right: 50%;
      bottom: 60%;
      width: 10%;
    }
    50%{
      right: 10%;
      bottom: 60%;
      width: 100%;
      opacity: 1;
    }
    100%{
      right: 10%;
      bottom: 60%;
      width: 100%;
      opacity: 0;
    }
  }
  }";
    } else {
      echo ".f1,.f2,.f3,.f4,.f5{
        display:none;
      }";
    }
    ?>
  </style>
  <div class="fire">
    <img class="f1 position-absolute" src="https://i.postimg.cc/1XgBtk7Z/firework.png">
    <img class="f2 position-absolute" src="https://i.postimg.cc/d1Cmc2hq/fireworkb.png">
    <img class="f3 position-absolute" src="https://i.postimg.cc/5yqB6f5T/fireworkg.png">
    <img class="f4 position-absolute" src="https://i.postimg.cc/HnC0YrMb/fireworkb2.png">
    <img class="f5 position-absolute" src="https://i.postimg.cc/jqzQ8hVc/fireworkr.png">
  </div>
</body>

</html>