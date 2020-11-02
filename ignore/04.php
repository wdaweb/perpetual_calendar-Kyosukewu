<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kuan calendar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
        }
        .cla{
            display:flex;
            /* flex-direction:column; */
            flex-wrap:wrap;
            /* flex-flow:column; */
            padding:10px;
            justify-content:center;
            align-content:space-between;
            color:white;
            
        
        }
        table{  
            border-collapse:collapse;
            margin:1%; 
            background:#A13D63;
            border:black solid 2px;
            opacity:0.9; 
            /* border-radius: 5%; */
            /* 透明度 */
            
        }

        table td{
            border:1px solid #CCC;
            padding:25px;
            text-align:center;
            border:black solid 0.5px;
            /* border-radius: 20%; */
        }
        /* table td:nth-child(1) */
        table tr:nth-child(2){
            background:gray;
        } 
        </style>
</head>

<body>
    <?php
    if (!empty($_GET['year'])) {
        $year = $_GET['year'];
     } else {
        $year = date("Y");
     }
     if (!empty($_GET['mouth'])) {
        $m = $_GET['mouth'];
    
     } else {
        $m = date("m");
     }
    // 第一步驟作為判斷變數裡面是否為空值，如果是就用現在本機時間，
    // 如果非空值代表我有輸入變數控制，就以控制為主
    // 在一開始先宣告 年 跟 月的變數方便後面使用

    //  顯示用的跳躍月份

    if (!empty($_GET['mouth'])) {
        $nextmouth = $_GET['mouth']+1;
        $upmouth= $_GET['mouth']-1;
     } else {
        $nextmouth = date("m")+1;
        $upmouth= date("m")-1;
     }

    
    if($m==12){
        $nextmouth = 1;
        $nextyear =$year +1;
        // $year++;
    }else{
        $nextmouth;
        $nextyear = $year;
    }

    if($m==1){
        $upmouth = 12;
        $upyear=$year-1;
        // $year--;
    }else{
        $upmouth;
        $upyear = $year;
    }

    // if (!empty($_GET['year'])) {
    //     $year = $_GET['year'];
    //  } else {
    //     $year = date("Y");
    //  }

    

    ?>
<h1 align = "center">Calendar</h1>
<h2 align = "center">年份:<?php echo $year?></h2>
<div align = "center">
    <h3>
        <button class="btn btn-outline-primary">
        <a href="calendar.php?year=<?=$upyear?>&mouth=<?=$upmouth?>">上一月：<?php echo $upmouth?></a>
        </button>
        <button class="btn btn-outline-primary">
        <a href="">這個月：<?php echo $m ?></a>
        </button>
        <button class="btn btn-outline-primary">
        <a href="calendar.php?year=<?=$nextyear?>&mouth=<?=$nextmouth?>">下一月：<?php echo $nextmouth?></a>
        </button>
        <!-- 之後這邊再增加post去對變數做變化 -->
    </h3>
    <div><h6><form action="calendar.php" method="get">
        輸入年份: <input type="text" name="year" />
        輸入月份: <input type="text" name="mouth" />
　<input type="submit" value="送出表單" class="btn btn-secondary btn-sm"/>
</form></h6></div>
</div>
<div class="cla">

    <?php
  
    if($m == true || 0){
    ?>
    <!-- 目前想法是給年月各一個新的變數，用if去做月份的控制 -->

        <table class="table-dark table-hover">
        <tr><td colspan="7" class="thead-light">月份：<?=$m;?></tr></td>
            <tr>
                <td>日</td>
                <td>一</td>
                <td>二</td>
                <td>三</td>
                <td>四</td>
                <td>五</td>
                <td>六</td>
            </tr>

        <?php

            $firstDay = "$year-$m-01";
            $firstDayWeek = date("w", strtotime($firstDay));
            $lastDayWeek = date("t", strtotime($firstDay));

            // echo "第一天星期" . $firstDayWeek;
            // echo "<br>";
            // echo "月天數" . $lastDayWeek;

                for($i=0;$i<6;$i++){
                    echo "<tr>";
                    for($j=0;$j<7;$j++){
                        if($i==0 && $j<$firstDayWeek){
                            echo "<td>";
                            echo "</td>";
                        }else{
                            echo "<td>";
                            $num = $i*7+$j+1-$firstDayWeek;
                            if($num<=$lastDayWeek){
                                echo $num;
                            }
                            echo "</td>";
                        }
                    }
                    echo"</tr>";
                }           
                
                ?>
                </table>

                <?php
        }
        ?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>