<?php

namespace app;

class DateFormatter
{
    const PATTERN = "Y.m.d";

    public static function convert($date)
    {
        return !empty($date) ? date(self::PATTERN, strtotime($date)) : null;
    }
}