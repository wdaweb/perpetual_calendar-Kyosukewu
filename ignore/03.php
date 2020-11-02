<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homework</title>
    <style>
        /* 有顯示當日框功能 */
        body{
            margin:0;
            background : linear-gradient(to right, #3498db, #70db93);
        }
        table{
            width : 50vw;
            height : 50vh;
            margin : 0 auto;
            margin-bottom :0;
            border-collapse: collapse;
        }
        tr>td:nth-child(7), tr>td:first-child{
            color : #f00;
        }
        tr>td:nth-child(7){
            background : #ff00;
        }
        tr>td:first-child{
            background : #fdbc83;
        }
        td{
            font-family :verdana, Arial, "microsoft jhenghei", sans-serif;
            height : 2rem;
            width : 1.5rem;
            text-align : center;
            background : #fff0;
            text-shadow: 1px 1px 2px #111;
            box-shadow: 0px 0px 10px #eee5;
            border-radius: 30px;
            font-size:20px;
            line-height : 16px;
        }
        .d1{
            margin : 5% 20%;
            display : flex;
            justify-content: space-around;
        }
        a{
            text-decoration: none;
            font-size : 1.25rem;
            color : #00f;
            text-shadow: 1px 1px 2px #006;
        }
        .d2{
            font-size : 1.5rem;
            color : #ff5;
            text-shadow: 1px 1px 3px #ff3;
        }
        .light{
            box-shadow: 0px 0px 15px #fff;
        }
        .red{
            font-size:14px;
            text-shadow: 0px 0px 0px #111;
            color : #f00;
        }
        .lightblue{
            font-size:14px;
            text-shadow: 0px 0px 0px #111;
            color : #0ff;
        }
        .redtext{
            color : #f00;
        }
    </style>
</head>
<?php
		date_default_timezone_set("Asia/Taipei");
    $holiday = [];
    $nnniversary = [];
    for ($i = 1; $i <= 12; $i++) {
        $holiday[$i] = [];
        $nnniversary[$i] = [];
    }
    $holiday[1][1] = "元旦";
    $holiday[2][28] = "和平紀念日";
    $nnniversary[3][8] = "婦女節";
    $nnniversary[3][14] = "反侵略日";
    $nnniversary[3][29] = "青年節";
    $holiday[4][4] = "兒童節";
    $holiday[4][5] = "清明節";
    $nnniversary[4][7] = "言論自由日";
    $holiday[5][1] = "勞動節";
    $nnniversary[7][15] = "解嚴紀念日";
    $nnniversary[9][3] = "軍人節";
    $nnniversary[9][28] = "教師節";
    $holiday[10][10] = "國慶日";
    $nnniversary[10][24] = "聯合國日";
    $nnniversary[10][25] = "台灣光復節";
    $nnniversary[12][25] = "行憲紀念日";
?>
<body>    
    <?php
        $week = ['日','一','二','三','四','五','六'];
        
        $this_year = date("Y");
        $this_month = date("n");        
        $month_count = $this_month;
        $tmp_year = $this_year;
        if( !empty($_GET["mon"])) {
            $month_count = $_GET["mon"];
        }
        if( !empty($_GET["year"])) {
            $tmp_year = $_GET["year"];
        }
        $smon1 = $month_count - 1;
        $smon2 = $month_count + 1;
        $sye1 = $tmp_year;
        $sye2 = $tmp_year;
        if ($smon1 < 1) {
            $smon1 = 12;
            $sye1 -= 1;
        }
        if ($smon2 > 12) {
            $smon2 = 1;
            $sye2 += 1;
        }
    ?>
    <div class="d1">
        <a href='?mon=<?=$smon1;?>&year=<?=$sye1;?>'><?=$smon1;?>月</a>        
        <div class="d2"><?=$tmp_year;?>年<?=$month_count;?>月</div>
        <a href='?mon=<?=$smon2;?>&year=<?=$sye2;?>'><?=$smon2;?>月</a>
    </div>
    <?php
        echo "<table>";
        echo "<tr>";
        for ($i = 0; $i < 7; $i++) {
            echo "<td>"; echo $week[$i]; echo "</td>";
        }
        echo "</tr>";
    
        $ct = 0;
        $day = 0;
        $month = strtotime("$tmp_year/$month_count/1 0:0:0");
        $start = date("w", $month);
        $num = date("t", $month);
        $today = date("j");
        $end = ($start + $num) % 7;
        if ($end != 0) {
            $end = 7 - $end;
        }    
        
        do {
            if ($ct % 7 == 0) {
                echo "<tr>";
            }

            if (($this_month == $month_count) && ($day + 1 == $today) && ($tmp_year == $this_year)) {
                echo "<td class='light'>";
            } else {
                echo "<td>";
            }

            if ($start != 0) {
                $start--;
            } elseif (($num == $day) && ($end != 0)) {
                $end--;
            } else {
                $day++;                

                if (!empty($holiday[$month_count][$day])) {
                    echo "<span class='redtext'>".$day."</span>";
                    echo "<br><span class='red'>".$holiday[$month_count][$day]."</span>";
                } elseif (!empty($nnniversary[$month_count][$day])) {
                    echo $day;
                    echo "<br><span class='lightblue'>".$nnniversary[$month_count][$day]."</span>";
                } else {
                    echo $day;
                }
            }
            echo "</td>";
            if ($ct % 7 == 6) {
                echo "</tr>";
            }
            $ct += 1;
        } while(($num != $day) || (!$end == 0))
    ?>
</body>
</html>