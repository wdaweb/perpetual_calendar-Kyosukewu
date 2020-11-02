<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALENDAR</title>
    <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="bootstrap.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- handmade -->
    <!-- <link rel="stylesheet" type="text/css" herf="handmade.css"> -->


</head>
<body>
<?php
date_default_timezone_set("Asia/Taipei");
?>
<div class="display-2 pl-3 bg-info text-white font-weight-bold">CALENDAR</div>
<div class="row justify-content-around">
<div class="col-sm-12 col-md-3 bg-light shadow-lg text-center">
    <!-- Today -->
    <div class="t m-2 h3 font-weight-light">TODAY</div>
    <div class="todayInfo container p-4 bg-secondary text-white col-7 text-center shadow">
        <div class="y"><?=date("Y");?></div>
        <div class="m"><?=date("M");?></div>
        <div class="num h1"><?=date("d");?></div>
        <div class="wday m-auto p-1 rounded-sm text-white font-weight-light"><?=date("l");?></div>
    </div>
    <!-- 搜尋日期 -->
    <div class="searchBar">
        <form method="get" class="form-group m-3">
            <p class="mt-5 mb-1 font-weight-bold">Search</p> 
            <div class="searchtext mb-1">
                <!-- *****如何限制輸入:
                            1. 年份欄位驗證四位數字且首位不得為零，或者遵循限制(1970~~) -->
            <input class="text-center m-1" type="text" maxlength="4" size="3" name="year" id="year" placeholder="<?=date("Y");?>">
            <select class="custom-select-sm m-1" name="month" id="month">
                <!-- 設定搜尋月份，預設為當月 -->
                <?php
                for($i=1;$i<13;$i++){
                    echo "<option value="."\"$i\"";
                    if(date("n")==$i){
                        echo " selected";
                    }
                    echo ">".$i."月</option>";
                }
                ?>
            </select>
            </div>
            <div class="mt-3">                
                <input class="btn btn-sm btn-warning pr-3 pl-3 m-1" type="reset" name="clear" value="clear">
                <input class="btn btn-sm btn-success pr-3 pl-3 m-1" type="submit" value="submit">
            </div>
        </form>
    </div>
</div>

<?php
// 日期函數(指定或預設)
if(isset($_GET['now'])){
    $now=$_GET['now'];
}elseif(isset($_GET['year'])){
    $now=$_GET['year']."-".$_GET['month'];
}elseif(!isset($_GET['year']) && isset($_GET['month'])){
    $now=date("Y")."-".$_GET['month'];
}else{
    $now=date("Y-n");
}

$prevYear=date("Y-n",strtotime("-1 year",strtotime($now)));
$prevMonth=date("Y-n",strtotime("-1 month",strtotime($now)));
$nextMonth=date("Y-n",strtotime("+1 month",strtotime($now)));
$nextYear=date("Y-n",strtotime("+1 year",strtotime($now)));

?>    

<div class="col-sm-12 col-md-7">
    <!-- 按鈕調整前後年/月 -->
    <div class="selectBar text-center mt-3">
            <a href="?now=<?=$prevYear;?>"><button class="btn btn-sm btn-outline-dark m-1">Last Year</button></a>
            <a href="?now=<?=$prevMonth;?>"><button class="btn btn-sm btn-outline-secondary m-1">Last Month</button></a>
            <a href="?now=<?=date("Y");?>"><button class="btn btn-sm btn-outline-success m-1">Today</button></a>
            <a href="?now=<?=$nextMonth?>"><button class="btn btn-sm btn-outline-secondary m-1">Next Month</button></a>
            <a href="?now=<?=$nextYear;?>"><button class="btn btn-sm btn-outline-dark m-1">Next Year</button></a>
    </div>


    <!-- 月曆區 -->
    <?php
                $firstDay="$now-01";
                $firstDayWeek=date("w",strtotime($firstDay));
                $monthDays=date("t",strtotime($firstDay));

    // 節日設定
    $Holiday=[
        '1-1'=>'元旦',
        '2-28'=>'和平紀念日',
        '4-4'=>'兒童節',
        '4-5'=>'清明節',
        '5-1'=>'勞動節',
        '9-3'=>'軍人節',
        '10-10'=>'國慶日',
    ];
    

    // 農曆(用hover顯示?)
    // 放假:端午、中秋

    
    ?>
        <div class="mt-3  w-100 vh-75 shadow">
            <table class="month text-center w-100 m-auto row">
            <tbody class="m-auto">
                <tr class="text-info font-weight-bold">
                    <td colspan="7">
                    <!-- 顯示英文月份 -->
                        <div class="thisMonth mt-3 m-1 h2"><?=date("F",strtotime($now));?></div>
                        <div class="thisYear mt-0 mb-4 h5 font-weight-light border-bottom border-info"><?=date("Y",strtotime($now));?></div>
                    </td>
                </tr>
                <tr class="weekti text-success font-weight-normal dspace-around h5">
                    <td class="col">SUN</td>
                    <td class="col">MON</td>
                    <td class="col">TUE</td>
                    <td class="col">WED</td>
                    <td class="col">THU</td>
                    <td class="col">FRI</td>
                    <td class="col">SAT</td>
                </tr>
                
                <?php
                for($i=0;$i<6;$i++){
                    echo "<tr class='align-items-around'>";
                    for($j=0;$j<7;$j++){
                        if($i==0 && $j<$firstDayWeek){
                            echo "<td class='py-2'>";
                            echo "</td>";
                        }else{
                            echo "<td class='py-2'>";
                            $num=$i*7+$j+1-$firstDayWeek;
                            $md=date("n",strtotime($firstDay)).'-'.$num;
                            if($num<=$monthDays){
                                echo "<div>".$num."</div>";
                                foreach($Holiday as $key => $value){
                                    if($md == $key){
                                        echo "<small class='m-0 small text-muted border-top border-warning'>".$value."</small>";
                                        // echo $value;
                                        // echo "</p>";
                                    }
                                }
                            }
                            echo "</td>";
                        }
                    }
                    echo "</tr>";   
                }    
                ?>
            </tbody>
            </table>
        </div>
</div>
</div>
<div class="fixed-bottom card-footer text-info text-right">copyright &copy yyc</div>
</body>
</html>