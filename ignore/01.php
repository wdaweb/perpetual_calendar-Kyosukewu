<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Calender</title>
    <link rel="stylesheet" href="reset.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&family=Roboto&display=swap&family=Fredoka+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
    html,body{
  height: 100%;
}

body {
  font-family: "Roboto","Noto Sans TC", sans-serif;
  background-image:url(https://i.imgur.com/P9MNu36.gif);
  background-repeat:no-repeat;
  background-position:bottom left;
  background-size: auto;
  background-color:#FFE66F;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

.wrap_text{
  width: 100%;
  font-family: "Fredoka One","Roboto";
  font-size: 4vw;
  text-align: center;
  margin-left: 36%;
  margin-bottom: -5%;

}

.wrap_bg{
  position: absolute;
  right: 0;
  bottom:0;
}

.container{
    width: 100%;
    margin: 0 30%;
    position: relative;
    left:18%;
  }

.calendar{
  width: 100%;
  background-color:#FFF4C1;
  border-radius: 15px;
  border: 5px solid #000;
  margin-bottom: 1%;
}

table {
  width: 100%;
}

tr,td {
  width: 3rem;
  height:4.5vw;
  font-size: 1.5rem;
  text-align: center;
  position: relative;
  line-height: 3.5vw;
}

.holiday{
  font-size: 10px;
  display: block;
  color:rgb(38, 31, 128);
  font-weight: bold;
  line-height: 0;
  margin-top:-10%;
}

.holiday p{
  margin:10px 0;
}

table td:first-child {
  color: red;
  font-weight: bold;
}

table tr:nth-child(1) td:nth-child(1){
  border-radius: 10px 0 0 0 ;
}

table tr:nth-child(1) td:nth-child(7){
  border-radius: 0 10px 0 0 ;
}

table tr:first-child {
  background-color: rgb(226, 218, 169);
  height: 3.5vw;
}

table td:last-child {
  color: #00cc00;
  font-weight: bold;
}

.today{
  display: inline-block;
  width: 40px;
  height: 40px;
  background-color: #FFE66F;
  border-radius: 40px;
  line-height: 40px;
}

.btn {
  width: 100%;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  padding-bottom: 2%;
}

.btn a{
  margin: 0 2%;
  text-decoration: none;
  color: #ffffff;
  background-color:rgb(196, 79, 79);
  padding:0.6rem 0.9rem;
  border-radius:10px;
  position: relative;
  overflow: hidden;
  font-size: 0.8rem;
}

.btn .nextM::after,.btn .nextM::before{
  content: "";
  width: 100%;
  height: 100%;
  position: absolute;
  top:0;
  left:0;
  z-index: 1;
  background-color: rgba(255,255,255,0.25);
  transition: all 0.3s;
  transition-timing-function: linear ;
  transform: translate(-100%,0);

}

.btn .nextM:hover::after{
  transform: translate(100%,0);
}

.btn .nextM:hover::before{
  transform: translate(100%,0);
  transition-delay: 0.3s;
}

.btn .lastM::after,.btn .lastM::before{
  content: "";
  width: 100%;
  height: 100%;
  position: absolute;
  top:0;
  left:0;
  z-index: 1;
  background-color: rgba(255,255,255,0.25);
  transition: all 0.3s;
  transition-timing-function: linear ;
  transform: translate(100%,0);
}
.btn .lastM:hover::after{
  transform: translate(100%,0);
}

.btn .lastM:hover::before{
  transform: translate(-100%,0);
  transition-delay: 0.3s;
}

select{
  width: 5vw;
  height: 2vw;
  text-align: center;
  text-align-last: center;
  background-color: #FFF4C1;
  border-radius: 10px;
  border-color: chocolate;
}

select[name="month"]{
  width: 3vw;
}

input[type="submit"]{
  font-size: 0.8rem;
  width: 2.5vw;
  height: 2vw;
  font-family: "Roboto","Noto Sans TC", sans-serif;
  background-color: #FFF4C1;
  border-radius:10px;
  border:1px solid chocolate;
  cursor: pointer;
  padding: 0 2%;
}

input[type="submit"]:hover{
  color: rgb(255, 255, 255);
  background-color: rgb(0, 0, 0);
  border: none;
}

select:focus,input[type="submit"]:focus{
  outline:none;
}

.btn .thisM{
  background-color: rgb(30, 78, 64);
  color: #fff;
}

.btn .thisM:hover{
  background-color: rgb(92, 231, 155);
}

.time_now{
  font-size: 4vw;
  position: absolute;
  top:0;
  left:0;
  margin-left: 13%;
  margin-top: 10%;
}


.time{
  font-family: "Fredoka One","Roboto";
  color: rgb(77, 74, 74);
}

#clock{
  font-family: "Fredoka One","Roboto";
  color: rgb(77, 74, 74);
  margin-left: 10%;
}


@media screen and (min-width:1300px) and (max-width:1500px){
  tr,td{
    font-size: 1.2rem;
  }
}

@media screen and  ( min-width:1024px) and (max-width:1299px){
body{
  background-size:50%;
}
.wrap .wrap_text{
  font-size: 4vw;
}
.wrap_bg{
  display: none;
}

tr,td {
width: 3rem;
height:3rem;
line-height: 3rem;
}

.btn {
  flex-direction: column;
  position: fixed;
  right:-45%;
  bottom: 10%;
}

select{
  width: 5.5vw;
  display: block;
  margin: 10px 0;
  padding: 2px;
}

select[name="month"]{
  width: 5.5vw;
}

input{
  display: block;
  margin: 10px 0;
}

input[type="submit"]{
  width: 5vw;
}

.btn a{
  margin: 10px 0;
}

.time_now{
  margin-left: 15%;
  margin-top: 5%;
}
}

@media screen and  ( min-width:800px) and (max-width:1023px){
  body{
    background-size:50%;
  }
  .wrap_text{
    font-size: 4vw;
    margin-left: 35%;
  }
  .wrap_bg{
    display: none;
  }
  
  tr,td {
  width: 2.5rem;
  height:2.5rem;
  line-height: 2.5rem; 
  font-size: 1rem;
  }

  .holiday{
    font-size: 10px;
    display:block;
    font-weight: normal;
 
  }
  
  .btn {
    flex-direction: column;
    position: fixed;
    right:-45%;
    bottom: 10%;
  }
  
  select{
    width: 6vw;
    display: block;
    margin: 5px 0;
    padding: 2px;
    font-size: 12px;
  }
  
  select[name="month"]{
    width: 6vw;
  }
  
  input{
    display: block;
    margin: 5px 0;
  }
  
  input[type="submit"]{
    width: 6vw;
  }
  
  .btn a{
    margin: 5px 0;
  }
  
  .time_now{
    margin-left: 15%;
    margin-top: 5%;
  }
  .today{
    display: inline-block;
    width: 30px;
    height: 30px;
    background-color: #FFE66F;
    border-radius: 30px;
    line-height: 30px;
  }
}



@media screen and  ( min-width:600px) and (max-width:799px){
  body{
    background-image:none;
    flex-direction: column;
    justify-content: flex-start;
  }

  .container{
    width: 70%;
    margin:0 auto;
    position: static;
  }

  .wrap_text{
    margin-left:0;
    margin-bottom: 1%;
    margin-top:3%;
    font-size: 8vw;

  }
  .time_now{
    position: static;
    margin:0 auto;
    margin-top:3%;
    font-size: 7vw;
    color: rgb(15, 15, 97);
  }

  tr,td{
    font-size:14px;
    height: 7vw;
    line-height: 7vw;
  }

  .holiday{
    font-size:10px;
    line-height: 0;
  }

  .today{
    width: 30px;
    height: 30px;
    border-radius: 30px;
    line-height: 30px;
  }

  .btn {
    width: 100%;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-bottom: 2%;
    position: absolute;
    bottom:17%;
    left:0;
  }

  .btn a{
    text-decoration: none;
    color: chocolate;
    background-color:#FFE66F;
    padding:0;
    border-radius:0;
    position: relative;
    font-size: 0.8rem;
    overflow: visible;
  }

  .btn a:hover{
    color: rgb(108, 69, 172);
  }

  .selec{
    position:relative;
    top:50px;
    margin-bottom:1%;
  }

  .btn .nextM{
    position: absolute;
    right:28%;
    top:200%;
  }

  .btn .lastM{
    position: absolute;
    left:28%;
    top:200%;
  }

  .btn .nextM::after,.btn .nextM::before{
    content: "";
    width: 0%;
    height: 0%;
    position: static;
    background-color: none;
    transition: none;
    transition-timing-function: linear ;
    transform: none; 
  }

  .btn .nextM::before{
    content:" >> ";
    background-color:#FFE66F;
  }
  
  .btn .nextM:hover::before{
    color:#00cc00;
    margin-right: 3px;
    font-size: 14px;
  }

  .btn .nextM::after{
    content: " month";
    background-color:#FFE66F;
  }
  
  .btn .lastM::after,.btn .lastM::before{
    content: "";
    width: 0%;
    height: 0%;
    position: static;
    background-color: none;
    transition: none;
    transition-timing-function: linear ;
    transform: none; 
  }

  .btn .lastM::before{
    content:"   <<";
    background-color:#FFE66F;
    position: absolute;
    left:110%;

  }
  
  .btn .lastM:hover::before{
    color:#00cc00;
    margin-left: 3px;
    font-size: 14px;
  }

  .btn .lastM::after{
    content: " month";
    background-color:#FFE66F;
  }

  .btn form{
    margin:0 -20% ;
    width: 100%;
  }

  .btn form select{
    width: 15%;
    height: 20%;
    padding: 5px 0;
  }

  input[type="submit"]{
    display: inline-block;
    width: 9vw;
    height:4vw;
    position: absolute;
    top:140%;
    right:45.5%;
  }

  .btn .thisM{
    position: absolute;
    top:254%;
    width: 30%;
    height: 30px;
    line-height:30px;
  }

  .btn .thisM:hover{
    border-radius:0;
    background-color: rgb(53, 6, 80);
    color:rgb(0, 255, 98);
  }

}


@media screen and  (min-width:400px) and (max-width:599px){

  body{
    background-image:none;
    flex-direction: column;
    justify-content: space-between;

  }

  .container{
    width: 100%;
    position: static;
    left:0;
    margin:0;
  }

  .calendar{
    border:none;
  }

  .wrap_bg{
    display: none;
  }

  .wrap_text{
    margin:0;
    font-size: 2.5rem;
  }

  .time_now{
    position: static;
    margin:0;
    background-color: rgb(31, 10, 88);
    width: 100%;
    text-align: right;
    font-size: 1.5rem;
  }

  #clock,.time{
    margin: 5px 0;
    padding-right:10px;
    color:#fff;
  }

  tr,td{
    width: 3.5rem;
    height: 3rem;
    font-size: 1rem;
    line-height:3rem;
  }
  
  table tr:nth-child(2),table tr:nth-child(3),table tr:nth-child(4),table tr:nth-child(5),table tr:nth-child(6){
    border-bottom:1px solid #e1e2a2 ;
  }

  .selec{
  position: fixed;
  left:0;
  top:35vh;
  width: 100%;
  }
  
  .btn form select{
    width: 20%;
    height: 20%;
    padding: 5px 0;
  }

  .selec select[name="month"]{
    width: 15%;
  }

  input[type="submit"]{
    display: inline-block;
    width: 15%;
    padding: 5px 0;
    height:20%;
  }

}


@media screen and  (min-width:350px) and (max-width:399px){

  body{
    background-image:none;
    flex-direction: column;
    justify-content: space-between;

  }

  .container{
    width: 100%;
    position: static;
    left:0;
    margin:0;
  }

  .calendar{
    border:none;
  }

  .wrap_bg{
    display: none;
  }

  .wrap_text{
    margin:0;
    font-size: 2rem;
    margin-bottom: 1%;
  }

  .time_now{
    position: static;
    margin:0;
    background-color: rgb(31, 10, 88);
    width: 100%;
    text-align: right;
    font-size: 1.5rem;
  }

  #clock,.time{
    margin: 5px 0;
    padding-right:10px;
    color:#fff;
  }

  tr,td{
    width: 3.5rem;
    height: 3rem;
    font-size: 1rem;
    line-height:3rem;
  }
  
  table tr:nth-child(2),table tr:nth-child(3),table tr:nth-child(4),table tr:nth-child(5),table tr:nth-child(6){
    border-bottom:1px solid #e1e2a2 ;
  }

  .selec{
  position: absolute;
  left:0;
  top:36vh;
  width: 100%;
  }
  
  .btn form select{
    width: 20%;
    height: 20%;
    padding: 5px 0;
  }

  .selec select[name="month"]{
    width: 15%;
  }

  input[type="submit"]{
    display: inline-block;
    width: 15%;
    padding: 5px 0;
    height:20%;
  }
  
}

@media screen and (min-width:300px) and (max-width:349px){

  body{
    background-image:none;
    flex-direction: column;
    justify-content: space-between;

  }

  .container{
    width: 100%;
    position: static;
    left:0;
    margin:0;
  }

  .calendar{
    border:none;
  }

  .wrap_bg{
    display: none;
  }

  .wrap_text{
    margin:0;
    font-size: 2rem;
    margin-bottom: 1%;
  }

  .time_now{
    position: static;
    margin:0;
    background-color: rgb(31, 10, 88);
    width: 100%;
    text-align: right;
    font-size: 1.5rem;
  }

  #clock,.time{
    margin: 5px 0;
    padding-right:10px;
    color:#fff;
  }

  tr,td{
    width: 3.5rem;
    height: 3rem;
    font-size: 0.8rem;
    line-height:3rem;
    background-color: #fff;
  }
  
  table tr:nth-child(2),table tr:nth-child(3),table tr:nth-child(4),table tr:nth-child(5),table tr:nth-child(6){
    border-bottom:1px solid #e1e2a2 ;
  }

  .selec{
  position: absolute;
  left:0;
  top:26vh;
  width: 100%;
  }
  
  .btn form select{
    width: 20%;
    height: 20%;
    padding: 5px 0;
  }

  .selec select[name="month"]{
    width: 15%;
  }

  input[type="submit"]{
    display: inline-block;
    width: 15%;
    padding: 5px 0;
    height:20%;
  }
  
}
    </style>
</head>

<body onload="startTime()">
    <?php
    $this_day = date("d");
    $this_year = date("Y");
    $this_month = date("n");
    if (isset($_GET["year"])) {
        $year =  $_GET["year"];
    } else {
        $year = $this_year;
    }
    if (isset($_GET["month"])) {
        $month =  $_GET["month"];
    } else {
        $month = $this_month;
    }
    ?>
    <div class="time_now">
        <div class="time"><?= $this_year . " / " . $this_month . " / " . $this_day ?></div>
        <div id="clock"></div>
    </div>
        <div class="wrap_text">
            <span><?= $year ?> , <?= date('F', mktime(0, 0, 0, $month)) ?></span>
        </div>


    <div class="container">
        <div class="calendar">
            <?php
            $firstday = date("w", strtotime(date("$year-$month-01")));
            $lastday  = date("t", strtotime(date("$year-$month-d")));

            if ($month + 1 >= 13) {
                $mnext = 1;
                $ynext = $year + 1;
            } else {
                $mnext = $month + 1;
                $ynext = $year;
            }

            if ($month - 1 <= 0) {
                $mlast = 12;
                $ylast = $year - 1;
            } else {
                $mlast = $month - 1;
                $ylast = $year;
            }
            ?>
            <table>
                <tr>
                    <td>SUN</td>
                    <td>MON</td>
                    <td>TUE</td>
                    <td>WED</td>
                    <td>THU</td>
                    <td>TUR</td>
                    <td>SAT</td>
                </tr>
<?php
$holiday = ["0101" => "元旦", "0214" => "西洋情人節", "0228" => "和平紀念日", "0308" => "婦女節", "0312" => "植樹節", "0314" => "白色情人節", "0329" => "青年節", "0412" => "復活節", "0422" => "世界地球日", "0501" => "勞動節", "0512" => "國際護士節", "0715" => "解嚴紀念日", "0808" => "父親節", "0814" => "空軍節", "0903" => "軍人節", "0928" => "教師節", "1010" => "國慶日", "1024" => "臺灣聯國日", "1025" => "光復節", "1031" => "萬聖節", "1112" => "國父誕辰", "1225" => "行憲紀念日", "1225" => "聖誕節"];
$is_this_month = ($year == $this_year && $month == $this_month);

for ($i = 0; $i < 6; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 7; $j++) {
        echo "<td>";
        if ($i != 0 || $j >= $firstday) {
            $day = $i * 7 + $j + 1  - $firstday;
            if ($day <= $lastday) {
                if ($is_this_month && ($day == $this_day)) {
                    echo "<span class='today'>" . $day . "</span>";
                } else {
                    echo $day;
                }
                $arr=[];
                $holiday_key = sprintf("%02d%02d",$month,$day);
                if(array_key_exists($holiday_key, $holiday)){
                    $arr[]=$holiday[$holiday_key];
                }
                if ($month == 5 && $j == 0 && $day >= 8 && $day <= 14) {
                    $arr[]="母親節";
                }
                if($arr){
                    echo  "<span class='holiday'>" . array_shift($arr);
                    foreach($arr as $value){
                        echo "<p>".$value ."</p>";
                    }
                    echo  "</span>";
                }
            }
        }
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>
                <div class="btn">
                    <a class="lastM" href="index.php?year=<?= $ylast ?>&month=<?= $mlast ?>">Prev</a>
                    <form action="?" method="get">
                        <div class="selec">
                            <span>西元</span>
                            <select name="year" id="">
                                <?php
                                for ($j = 100; $j >= 0; $j--) {
                                    $upY = $year - $j;
                                    echo "<option value='$upY'>" . $upY . "</option>";
                                }
                                echo "<option value='$year' selected>" . $year . "</option>";
                                for ($i = 1; $i <= 100; $i++) {
                                    $nextY = $year + $i;
                                    echo "<option value='$nextY'>" . $nextY . "</option>";
                                }
                                ?>
                            </select>
                            <span>年</span>
                            <select name="month" id="">
                                <?php
                                for ($j = 1; $j <= $month - 1; $j++) {
                                    echo "<option value='$j'>" . $j . "</option>";
                                }
                                echo "<option value='$month' selected>" . $month . "</option>";
                                for ($i = $month + 1; $i < 13; $i++) {
                                    echo "<option value='$i'>" . $i . "</option>";
                                }
                                ?>
                            </select>
                            <span>月</span>
                            <input type="submit" value="查詢">
                    </form>
                </div>
                <a class="nextM" href="index.php?year=<?= $ynext ?>&month=<?= $mnext ?>">Next</a>
                <a class="thisM" href="index.php">本月</a>
        </div>
    </div>
    </div>
    <div class="wrap_bg">
        <img src="https://i.imgur.com/IlRhXr5.gif" alt="bg2">
    </div>

    <script>
        function startTime() {
            var today = new Date();
            var hh = today.getHours();
            var mm = today.getMinutes();
            var ss = today.getSeconds();
            mm = checkTime(mm);
            ss = checkTime(ss);
            document.getElementById('clock').innerHTML = hh + " : " + mm + " : " + ss;
            var timeoutId = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
    </script>

</body>

</html>