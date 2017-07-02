<?php

if (!function_exists('format_seconds')) {
    /**
     * @param $seconds
     * @return string
     */
    function format_seconds($seconds)
    {
        $h = floor($seconds / 3600);
        $m = floor($seconds / 60 % 60);
        $s = floor($seconds % 60);

        return $h . ':' . $m . ':' . $s;
    }
}