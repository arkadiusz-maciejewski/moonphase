<?php

/**
 * Calculates moon phases by date:
 * 0 - New Moon
 * 1 - Waxing Crescent
 * 2 - First Quarter
 * 3 - Waxing Gibbous
 * 4 - Full Moon
 * 5 - Waning Gibbous
 * 6 - Last Quarter
 * 7 - Waning Crescent
 */
class MoonPhase
{
    /**
     * @param $date
     * @return int
     */
    function get($date)
    {
        list($year, $month, $day) = preg_split('/-/', date("Y-n-j", strtotime($date)));
        if ($month < 3) {
            $year--;
            $month += 12;
        }
        $daysAD = 365.25 * $year;
        $daysThisYear = 30.6 * ($month + 1);
        $totalDays = $daysAD + $daysThisYear + $day - 694039.09;
        $totalDays /= 29.53;
        $totalDays = abs($totalDays) - floor(abs($totalDays));
        $moonPhase = $totalDays * 8 + 0.5;
        $moonPhase = $moonPhase & 7;
        return $moonPhase;
    }
}