<?php

if (!function_exists('format_seconds')) {
    /**
     * @param $seconds
     * @return string
     */
    function format_seconds($seconds, $format = '%02d:%02d:%02d')
    {
        $h = floor($seconds / 3600);
        $m = floor($seconds / 60 % 60);
        $s = floor($seconds % 60);

        return sprintf($format, $h, $m, $s);
    }
}