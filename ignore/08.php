<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>萬年曆</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif,'標楷體';
        }
        .CalHedder{
            margin: 0 auto;
            width:720px;
            padding: 10px;
        }
        .CalHedder_L{
            float:left;
            font-size:30px;
            font-weight:bolder;
        }
        .CalHedder_R{
            float:right;
        }
        table{
            margin: 0 auto;
            border:1px solid black;
        }
        th{
            width:100px;
            height:100px;
            text-align:center;
            background-color: rgb(58, 57, 57);
            color:#fff;
            font-size:25px;
        }
        td{
            position:relative;
            width:100px;
            height:100px;
            text-align:center;
            background-color: #F0F0F0;
        }
        td.holiday{
            background-color: #ffCCCC;
            color:#af0000;
            font-weight:bold;
            font-size:20px;
        }
        td.tday{
            background-color: #ffaaaa;
        }
        td.xday{
            background-color: #726c70;
        }
        td.nday{
            background-color: #ccc3c9;
        }
        .dayarea{                       
            position: absolute;
            top: 2px;
            left:2px;
            border:1px solid black;
            width:15px;
            height:15px;
            padding: 5px;
            text-align:center;
            font-size:12px;
            background-color: #FFFFFF;
            color:#000;
        }
        .clear {clear: both;}
        .btn {
           
            margin: 5px;
            border: 2px solid #155799;
            padding: 6px 10px;
            font-size: 15px;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #155799;
            background-color: #F1F2F2;
            transition: all 0.5s;
        }
        .CalHedder_R a{text-decoration:none;}
        .btn:hover {
            background-color: #155799;
            border-color: #155799;
            color: #F1F2F2;
        }

    </style>
</head>
<body>
<?php
     
    if (isset($_GET['ym'])) {
        if (strtotime($_GET['ym'])){
            $YM = $_GET['ym'];
        }else{
            header('location: '. $_SERVER['PHP_SELF'] );
        }
    } else {
        $YM=date("Y-m");
    }    
    $firstday = date('Y-m-01', strtotime($YM)); // 取得該月份的第一天
    $firstweekday  = date('w', strtotime($firstday)); // 取得該月份的第一天是星期幾
    $dayCount = date("t",strtotime($YM)); // 取得該月份有幾天

    // 根據日期顯示td內容
    function ShowDayTD($date){
        $ShowDayTDStr='';
        $Holiday = [
            strtotime("2019-10-10")=>"國慶日",
            strtotime("2019-10-11")=>"國慶日",
            strtotime("2020-01-01")=>"元旦",
            strtotime("2020-01-23")=>"春節",
            strtotime("2020-01-24")=>"春節",
            strtotime("2020-01-25")=>"春節",
            strtotime("2020-01-26")=>"春節",
            strtotime("2020-01-27")=>"春節",
            strtotime("2020-01-28")=>"春節",
            strtotime("2020-01-29")=>"春節",
            strtotime("2020-02-28")=>"228紀念日",
            strtotime("2020-02-29")=>"228紀念日",
            strtotime("2020-03-01")=>"228紀念日",
            strtotime("2020-04-02")=>"清明兒童節",
            strtotime("2020-04-03")=>"清明兒童節",
            strtotime("2020-04-04")=>"清明兒童節",
            strtotime("2020-04-05")=>"清明兒童節",
            strtotime("2020-05-01")=>"勞動節",
            strtotime("2020-05-02")=>"勞動節",
            strtotime("2020-05-03")=>"勞動節",
            strtotime("2020-06-25")=>"端午節",
            strtotime("2020-06-26")=>"端午節",
            strtotime("2020-06-27")=>"端午節",
            strtotime("2020-06-28")=>"端午節",
            strtotime("2020-10-01")=>"中秋節",
            strtotime("2020-10-02")=>"中秋節",
            strtotime("2020-10-03")=>"中秋節",
            strtotime("2020-10-04")=>"中秋節",
            strtotime("2020-10-09")=>"國慶日",
            strtotime("2020-10-10")=>"國慶日",
            strtotime("2020-10-11")=>"國慶日"
        ];
        if (strtotime($date)){
            // 紀念日顯示
            foreach ($Holiday as $key => $value) {
                if ($key==strtotime($date)){
                    $ShowDayTDStr='<td  class="holiday" ><span class="dayarea">'.date("d",strtotime($date)).'</span>'.$value.'</td>';
                }
            }
            // 今天顯示
            if ($ShowDayTDStr == '') {
                if (strtotime(date("Y-m-d")) == strtotime($date)){
                    $ShowDayTDStr='<td  class="tday" ><span class="dayarea">'.date("d",strtotime($date)).'</span>今日</td>';
                }
            }
            // 星期六日顯示
            if ($ShowDayTDStr == '') {
                if (date("w",strtotime($date)) == 0 || date("w",strtotime($date)) == 6){
                    $ShowDayTDStr='<td  class="xday" ><span class="dayarea">'.date("d",strtotime($date)).'</span></td>';
                }
            }
            // 平常日期顯示
            if ($ShowDayTDStr == '') {
                $ShowDayTDStr='<td  class="nday" ><span class="dayarea">'.date("d",strtotime($date)).'</span></td>';
            }
        }else{
            $ShowDayTDStr='<td ></td>';
        }
        return $ShowDayTDStr;
    }

    echo '<div class="CalHedder">';
    echo '<div class="CalHedder_L">'. date("西元Y年m月",strtotime($YM)) .'</div>';
    echo '<div class="CalHedder_R">';
    echo '<a href="?ym='.date("Y-m",strtotime('-1 month',strtotime($YM))).'" ><span class="btn">上個月</span></a>';
    echo '<a href="?ym='.date("Y-m",strtotime('+1 month',strtotime($YM))).'" ><span class="btn">下個月</span></a>';
    echo '</div>';
    echo '</div>';
    echo '<div class="clear"></div>';
    echo '<table>';
    echo '<tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr>';
    $dd = 0;
    for ($i=1; $i <= 6 ; $i++) { 
        echo '<tr>';
        for ($j=1; $j <= 7 ; $j++) { 
            $xday='';
            if ($i==1) {
                if ($firstweekday < $j) {
                    $dd++;
                    echo ShowDayTD($YM.'-'.$dd);
                } else {
                    echo ShowDayTD('');
                }
            } elseif ($dd >= $dayCount ) {
                $dd++;
                echo ShowDayTD('');
            } else {
                $dd++;
                echo ShowDayTD($YM.'-'.$dd);
            }  
        }
        echo '</tr>';
    }
    echo '</table>';
?> 
</body>
</html>