<?php

if (!function_exists('formatStatus')) {
    function formatStatus(bool $status): string
    {
        return $status ? 'Healthy' : 'Unhealthy';
    }
}
