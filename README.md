<h3>Full Nepali Calendar Coded in PHP</h3>
<br />

<b>Features:</b>
    <ol>
        <li>Full Nepali Calendar</li>
        <li>English to Nepali Date Converter</li>
        <li>Nepali to English Date Converter</li>
    </ol>

<i>Converting English to Nepali Date</i><br />
$cal = new Nepali_Calendar();<br />
$today_nep_cal = $cal->eng_to_nep($year, $month, $day);<br />


<i>Converting Nepali to English Date</i><br />
$cal = new Nepali_Calendar();<br />
$today_nep_cal = $cal->nep_to_eng($year, $month, $day);<br />