<?php

if (!function_exists('format_number')) {
    function format_number($value, $decimal = 2)
    {
        if (!$value) {
            return null;
        }

        return round($value, $decimal);
    }
}