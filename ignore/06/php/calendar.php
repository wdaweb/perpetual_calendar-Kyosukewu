<STYLE TYPE="text/css">
    <!--
    @import "../css/style.css";
    -->
</STYLE>
<?php

include 'LunarCalendar.php';







class Calendar
{
    protected $_table; //table表格
    protected $_currentDate; //現在日期
    protected $_year;    //年
    protected $_month;    //月
    protected $_days;    //天數
    protected $_dayofweek; //1號是星期幾

    public function __construct() //建構子
    {
        $this->_table = "";
        $this->_year = isset($_GET["y"]) ? $_GET["y"] : date("Y");  //取得年值，空值為:後面參數
        $this->_month = isset($_GET["m"]) ? $_GET["m"] : date("m"); //取得月值，空值時為:後面參數

        // 測試參數值
        // echo "<hr>(1)".$_GET["y"]."<hr>(2)".$_GET["y"]."<hr>(3)".date("Y");
        // echo "<hr>(1)".$_GET["m"]."<hr>(2)".$_GET["m"]."<hr>(3)".date("m");
        // echo "<hr>year".$this->_year."<hr>month".$this->_month ;
        if ($this->_month > 12) { //下一年
            $this->_month = 1;
            $this->_year++;
        }
        if ($this->_month < 1) { //下一月
            $this->_month = 12;
            $this->_year--;
        }
        $this->_currentDate = $this->_year . '年' . $this->_month . '月份'; //得到的日期值
        $this->_days           = date("t", mktime(0, 0, 0, $this->_month, 1, $this->_year)); //算該月應有天數
        $this->_dayofweek    = date("w", mktime(0, 0, 0, $this->_month, 1, $this->_year)); //月份的一號是星期幾
    }
    /**
     * 印表格抬頭
     */
    protected function _showTitle()
    {
        $lunar = new Lunar();
        $month = $lunar->convertSolarToLunar($this->_year, $this->_month, 1);
        // $this->_table="<th colspan='7' style='text-align:left'>"111"</th>";
        $this->_table .= "<table class='Breat'><thead>";
        $this->_table .= "<tr>";
        $this->_table .= "<th  colspan='7'><div class='th1 th1-1 rgb Breat btn'>今&nbsp&nbsp天&nbsp&nbsp日&nbsp&nbsp期&nbsp&nbsp為</div></th>";
        $this->_table .= "</tr>";
        $this->_table .= "<tr>";
        $this->_table .= "<th  colspan='7'><div class='th1 th1-2'>國曆 : " . $this->_currentDate . "</div></th>";
        $this->_table .= "</tr>";
        $this->_table .= "<tr>";
        $this->_table .= "<th colspan='4' ><div class='th2 th2-1'>農曆:" . $month[3] . "(" . $month[6] . ")年" . $month[1] . $month[2] . "日</div></th>";
        $this->_table .= "<th colspan='3' style='text-align:right'><div class='th2 th2-2'><a href='?y=" . ($this->_year) . "&m=" . ($this->_month - 1) . "'>上一月</a>&nbsp<a href='?y=" . ($this->_year) . "&m=" . ($this->_month + 1) . "'>下一月</a></div>";
        // $this->_table.="<th colspan='2' text-align:right><a href='?y=".($this->_year)."&m=".($this->_month+1)."'>下一月</a></th></tr></thead>";
        $this->_table .= "</tr></th></thead><tbody>";
        $this->_table .= "<tr>";
        $this->_table .= "<td style='color:red'>星期日</td>";
        $this->_table .= "<td>星期一</td>";
        $this->_table .= "<td>星期二</td>";
        $this->_table .= "<td>星期三</td>";
        $this->_table .= "<td>星期四</td>";
        $this->_table .= "<td>星期五</td>";
        $this->_table .= "<td style='color:red'>星期六</td>";
        $this->_table .= "</tr>";
    }

    //  畫表單

    protected function _showDate()
    {
        $vocation = [
            "0101" => "元旦<br>中華民國開國紀念日",
            "0202" => "世界濕地日",
            "0210" => "國際氣象節",
            "0214" => "情人節",
            "0228" => "228和平紀念日",
            "0301" => "國際海豹日",
            "0303" => "全國愛耳日",
            "0308" => "婦女節",
            "0312" => "植樹節 孫中山逝世紀念日",
            "0314" => "國際警察日",
            "0315" => "消費者權益日",
            "0321" => "世界森林日<br>消除種族歧視國際日<br>世界兒歌日",
            "0322" => "世界水日",
            "0323" => "世界氣象日",
            "0324" => "世界防治結核病日",
            "0325" => "全國中小學生安全教育日",
            "0330" => "巴勒斯坦國土日",
            "0401" => "愚人節",
            "0404" => "兒童節",
            "0405" => "清明節",
            "0407" => "世界衛生日",
            "0422" => "世界地球日",
            "0423" => "世界圖書和版權日",
            "0424" => "亞非新聞工作者日",
            "0501" => "勞動節",
            "0504" => "青年節",
            "0505" => "碘缺乏病防治日",
            "0508" => "世界紅十字日",
            "0512" => "國際護士節",
            "0515" => "國際家庭日",
            "0517" => "世界電信日",
            "0518" => "國際博物館日",
            "0520" => "全國學生營養日",
            "0522" => "國際生物多樣性日",
            "0523" => "國際牛奶日",
            "0531" => "世界無煙日",
            "0601" => "國際兒童節",
            "0605" => "世界環境日",
            "0606" => "全國愛眼日",
            "0617" => "防治荒漠化和乾旱日",
            "0623" => "國際奧林匹剋日",
            "0625" => "全國土地日",
            "0626" => "國際禁毒日",
            "0702" => "國際體育記者日",
            "0707" => "抗日戰爭紀念日",
            "0711" => "世界人口日",
            "0730" => "非洲婦女日",
            "0808" => "爸爸節",
            "0908" => "國際掃盲日<br>國際新聞工作者日",
            "0914" => "世界清潔地球日",
            "0916" => "國際臭氧層保護日",
            "0920" => "國際愛牙日",
            "0927" => "世界旅遊日",
            "0928" => "孔子誕辰",
            "1001" => "國慶節<br>世界音樂日<br>國際老人節",
            "1002" => "國際和平與民主自由鬥爭日",
            "1004" => "世界動物日",
            "1006" => "老人節",
            "1008" => "全國高血壓日<br>世界視覺日",
            "1009" => "世界郵政日<br>萬國郵聯日",
            "1010" => "國慶日",
            "1013" => "世界保健日<br>國際教師節",
            "1014" => "世界標準日",
            "1015" => "國際盲人節(白手杖節)",
            "1016" => "世界糧食日",
            "1017" => "世界消除貧困日",
            "1022" => "世界傳統醫藥日",
            "1024" => "聯合國日<br>世界發展信息日",
            "1031" => "世界勤儉日",
            "1107" => "十月社會主義革命紀念日",
            "1109" => "全國消防安全宣傳教育日",
            "1110" => "世界青年節",
            "1111" => "國際科學與和平周(本日所屬的一周)",
            "1112" => "孫中山誕辰紀念日",
            "1114" => "世界糖尿病日",
            "1117" => "國際大學生節<br>世界學生節",
            "1121" => "世界問候日<br>世界電視日",
            "1129" => "國際聲援巴勒斯坦人民國際日",
            "1201" => "世界艾滋病日",
            "1203" => "世界殘疾人日",
            "1205" => "國際經濟和社會發展志願人員日",
            "1208" => "國際兒童電視日",
            "1209" => "世界足球日",
            "1210" => "世界人權日",
            "1221" => "國際籃球日",
            "1224" => "平安夜",
            "1225" => "聖誕節",
        ];
        $lunarHoladay = [
            "0101" => "春節",
            "0102" => "回娘家",
            "0103" => "睡到飽",
            "0115" => "元宵節",
            "0202" => "龍抬頭節",
            "0323" => "媽祖生辰",
            "0505" => "端午節",
            "0707" => "七夕情人節",
            "0715" => "中元節",
            "0815" => "中秋節",
            "0909" => "重陽節",
            "1208" => "臘八節",
            "1223" => "小年",
            "0100" => "除夕"
        ];
        $lunar = new Lunar();

        $this->_table .= "<tr>";
        $nums = $this->_dayofweek + 1;
        for ($i = 1; $i <= $this->_dayofweek; $i++) { //输出1号之前的空白日期
            $this->_table .= "<td> </td>";
        }
        for ($i = 1; $i <= $this->_days; $i++) {
            $lunarDay = $lunar->convertSolarToLunar($this->_year, $this->_month, $i);
            $lunarDay_1 = str_pad("$lunarDay[4]", 2, "0", STR_PAD_LEFT) . str_pad("$lunarDay[5]", 2, "0", STR_PAD_LEFT);
            //轉為陣列長度
            $month1 = str_pad("$this->_month", 2, "0", STR_PAD_LEFT);
            $num1 = str_pad("$i", 2, "0", STR_PAD_LEFT);
            $str = $month1 . $num1;
            $numDay="$i<br><div class='lunar'>$lunarDay[1]$lunarDay[2]";
            //判斷是否空值
            if (isset($vocation[$str])) {
                $vocationDay= "<br><div class='vocation'>$vocation[$str]</div>";
            }else{
                $vocationDay="";
            }
            if (isset($lunarHoladay[$lunarDay_1])) {
                $lunarHoladayDay= "<div class='lunarHoladay'>[$lunarHoladay[$lunarDay_1]]</div>";
            }else{
                $lunarHoladayDay="";
            }
            // $this->_table.=$str;
            // if(isset($vocation[$str])){
            //     $this->_table.=$vocation[$str];
            // }


            if ($nums % 7 == 0) { //換行
                $this->_table .= "<td><font color='red'>$numDay$vocationDay$lunarHoladayDay";             
                $this->_table .= "</div></td></tr><tr>";
            } elseif ($nums % 7 == 1) {
                $this->_table .= "<td><font color='red'>$numDay$vocationDay$lunarHoladayDay";            
                $this->_table .= "</div></td>";
            } else {
                $this->_table .= "<td>$numDay$vocationDay$lunarHoladayDay";            
                $this->_table .= "</div></td>";
            }
           
            $nums++;
        }
        $this->_table .= "</tr></tbody></table>";
        // $this->_table.="<td><h3><a href='?y=".($this->_year)."&m=".($this->_month-1)."'>上一月</a></td>&nbsp";
        // $this->_table.="<td><a href='?y=".($this->_year)."&m=".($this->_month+1)."'>下一月</a></h3></td>";
    }
    /**
     * 輸出日期
     */
    public function showCalendar()
    {
        $this->_showTitle();
        $this->_showDate();
        echo $this->_table;
    }
}
// $calc=new Calendar();
// $calc->showCalendar();