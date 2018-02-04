<?php

namespace Dpods;

class DateArray
{
    /**
     * Creating date collection between two dates
     *
     * Example 1
     * date_range("2014-01-01", "2014-01-20", "+1 day", "m/d/Y");
     *
     * Example 2 - you can use even time
     * date_range("01:00:00", "23:00:00", "+1 hour", "H:i:s");
     *
     * @author Ali OYGUR <alioygur@gmail.com>
     * @param string since any date, time or datetime format
     * @param string until any date, time or datetime format
     * @param string step
     * @param string date of output format
     * @return array
     */
    public static function indexed($from, $to, $step = '+1 day', $outputFormat = 'Y-m-d') {
        $dates = array();
        $current = strtotime($from);
        $last = strtotime($to);

        while($current <= $last) {
            $dates[] = date($outputFormat, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }

    /**
     * Create associative date collection between two dates
     *
     * Example 1
     * date_range("2014-01-01", "2014-01-20", 0, "+1 day", "m/d/Y");
     *
     * Example 2 - you can use even time
     * date_range("01:00:00", "23:00:00", 0, "+1 hour", "H:i:s");
     *
     * @param $from
     * @param $to
     * @param null $default
     * @param string $step
     * @param string $outputFormat
     * @return array
     */
    public static function assoc($from, $to, $default = null, $step = '+1 day', $outputFormat = 'Y-m-d')
    {
        $dates = self::indexed($from, $to, $step, $outputFormat);
        return array_fill_keys($dates, $default);
    }
}

