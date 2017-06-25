<?php

namespace App\Libraries;

class Helper
{
    public static function ping($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_exec($ch);

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return $statusCode == 200;
    }

    public static function teamspeakPing($url)
    {
        $isRunning = false;

        $socket = @fsockopen($url, 10011);

        if (is_resource($socket)) {
            socket_set_timeout($socket, 5);

            if ($socket and (rtrim(fgets($socket, 4096)) == "TS3")) {
                $isRunning = true;
            }

            fclose($socket);
        }

        return $isRunning;
    }
}
