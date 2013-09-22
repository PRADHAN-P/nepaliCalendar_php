<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Pradhan Pashupati</title>

    <style type="text/css">
        html {
            font-family: Arial;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        a:hover {
            color: #1d5aff;
        }

        #cover {
            width: 365px;
            border: 2px solid #333;
            padding: 5px;
        }

        #date_box {
            width: 50px;
            height: 40px;
            padding-top: 10px;
            border: 1px solid #ccc;
            text-align: center;
            float: left;
        }

        .today_date {
            background: #ddeff6;
        }

        .clear {
            clear: both;
        }

        .controller {
            padding: 9px 0px;
        }

        #prev {
            float: left;
            width: 80px;
        }

        .date {
            width: 205px;
            float: left;
            text-align: center;
        }

        #next {
            float: right;
            width: 80px;
            text-align: right;
        }

        .eng_date {
            font-size: 10px;
            float: right;
            padding: 20px 5px 0px 0px;
            color: #777;
        }
    </style>

</head>
<body>


<?php
include('nepali_calendar.php');
$num = $_GET[num];
if (!$num) {
    $num = 1;
}

$year = date('Y');
$day = date('d');
$month = date('m');

//generate todays date
$cal = new Nepali_Calendar();
$today_nep_cal = $cal->eng_to_nep($year, $month, $day);
$today_nep_date = $today_nep_cal[date];
$today_nep_month = $today_nep_cal[month];
$today_nep_year = $today_nep_cal[year];

//generates next nepali month from next english date
$create_date = mktime(0, 0, 0, date("m") + $num, date("d"), date("Y"));
$mm = date('m', $create_date);
$make_date = $cal->eng_to_nep(date('Y', $create_date), $mm, 1);

$nep_year = $make_date[year];
$nep_month = $make_date[month];
$nep_date = $make_date[date];
$nep_day = $make_date[day];
$nep_month_name = $make_date[n_month_name];
$nep_total_days = $make_date[total_day];

$nepali_date = $nep_month_name . " " . $nep_year;

//get the starting day for nepali month
$get_eng_date = $cal->nep_to_eng($nep_year, $nep_month, 1);
$eng_num_day = $get_eng_date[num_day];

?>

<br/><br/>
<?php
$get_eng_month = $cal->nep_to_eng($nep_year, $nep_month, 1);
$get_eng_month_nx = $cal->nep_to_eng($nep_year, $nep_month, $nep_total_days);
echo substr($get_eng_month[e_month_name], 0, 3) . "-" . substr($get_eng_month_nx[e_month_name], 0, 3) . " " . date('Y', $create_date);
//    echo date('Y', $create_date) . " " . date('F', $create_date) . " " . date('d', $create_date);
?>
<div id="cover">
    <div class="controller">
        <div id="prev">
            <a href="index.php?num=<?php echo $num - 1; ?>"><< Prev</a>
        </div>
        <div class="date"><?php echo $nepali_date; ?></div>
        <div id="next">
            <a href="index.php?num=<?php echo $num + 1; ?>">Next >></a>
        </div>
        <div class="clear"></div>
    </div>
    <div id="date_box">Sun</div>
    <div id="date_box">Mon</div>
    <div id="date_box">Tue</div>
    <div id="date_box">Wed</div>
    <div id="date_box">Thurs</div>
    <div id="date_box">Fri</div>
    <div id="date_box">Sat</div>
    <?php for ($j = 0; $j < $eng_num_day - 1; $j++) {
    ?>
    <div id="date_box">&nbsp;</div>
    <?php } ?>
    <?php
    for ($i = 1; $i <= $nep_total_days; $i++) {
        ?>
        <div id="date_box" class="<?php
            if ($i == $today_nep_date && $nep_year == $today_nep_year && $nep_month == $today_nep_month) {
                echo 'today_date';
            }
            ?>">
            <?php echo $i; ?>
            <span class="eng_date">
                <?php
                $eng_date = $cal->nep_to_eng($nep_year, $nep_month, $i);
                echo $eng_date[date];
                ?>
            </span>
        </div>
        <?php } ?>
    <div class="clear"></div>
</div>
</body>
</html>