<?php
class MoonPhase
{
    function get($date) {
if (!isset($date))
{
list($y, $m, $d) = preg_split('/-/', date("Y-n-j"));
}

else {
    list($y, $m, $d) = preg_split('/-/', date("Y-n-j", strtotime($date)));
}
// oblicza fazy księżyca domyślnie 7 faz: 0 - nów, 4 - pełnia
if ($m < 3) {
    $y--;
    $m += 12;
}
++$m;
$c = 365.25 * $y;
$e = 30.6 * $m;
$jd = $c + $e + $d - 694039.09; /* jd is total days elapsed */
$jd /= 29.53; /* divide by the moon cycle (29.53 days) */
$jd = abs($jd) - floor(abs($jd)); /* subtract integer part to leave fractional part of original jd */
$b = $jd * 8 + 0.5; /* scale fraction from 0-8 and round by adding 0.5 */
$b = $b & 7; /* 0 and 8 are the same so turn 8 into 0 */
return $b;
}}