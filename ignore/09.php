<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        
        $year = isset($_GET["y"])?$_GET["y"]:date("Y");
        $month= isset($_GET["m"])?$_GET["m"]:date("m");

        if ($month>12){
                $month=1;
                $year++;
        }

        if ($month<1){
                $month=12;
                $year--;
        }

        $currentDate = $year.'年'.$month.'月份';
        $days        = date("t",mktime(0,0,0,$month,1,$year));
        $startDays   = date("w",mktime(0,0,0,$month,1,$year));

        echo "<h1>" . $currentDate . "</h1>";

    ?>

    <table border="1">
        <tr>
            <th style="color:red">星期日</th>
            <th>星期一</th>
            <th>星期二</th>
            <th>星期三</th>
            <th>星期四</th>
            <th>星期五</th>
            <th style="color:red">星期六</th>
        </tr>
    
    <?php

    $nums=$startDays+1;
    echo "<tr>";   //要先有一個<tr>
        for ($i=1;$i<=$startDays;$i++){
            echo "<td></td>";
        }
        for ($i=1;$i<=$days;$i++){
            if ($nums%7==0){
                echo "<td>$i</td>";
                echo "</tr><tr>";  //標籤的順序要和第一個<tr>對應   
            }else{
                echo "<td>$i</td>";
            }
            $nums++;
        }
        echo "</tr></table>";   //表格的結束標籤
        echo "<h2><a href='?y=" . ($year) . "&m=" . ($month-1) . "'>上一月</a>";
        echo "<a href='?y=" . ($year) . "&m=" . ($month+1) . "'>下一月</a></<a>";

    ?>
</body>
</html>