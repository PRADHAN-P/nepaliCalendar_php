Full Nepali Calendar Coded in PHP
Features:
    Full Nepali Calendar
    English to Nepali Date Converter
    Nepali to English Date Converter

Converting English to Nepali Date
$cal = new Nepali_Calendar();
$today_nep_cal = $cal->eng_to_nep($year, $month, $day);


Converting Nepali to English Date
$cal = new Nepali_Calendar();
$today_nep_cal = $cal->nep_to_eng($year, $month, $day);