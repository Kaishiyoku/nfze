<?php

if (!function_exists('formatStatus')) {
    function formatStatus(bool $status): string
    {
        return __('health_status.index.' . ($status ? 'healthy' : 'unhealthy'));
    }
}
