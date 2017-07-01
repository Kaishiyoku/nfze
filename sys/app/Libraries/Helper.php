<?php

namespace App\Libraries;

use App\Models\Enums\Application;

class Helper
{
    /**
     * @param string $application
     * @param string $url
     * @return array
     */
    public static function ping($application, $url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_exec($ch);

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return [
            'application' => $application,
            'isRunning' => $statusCode == 200
        ];
    }

    /**
     * @param string $application
     * @param string $url
     * @return array
     */
    public static function teamspeakPing($application, $url)
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

        return [
            'application' => $application,
            'isRunning' => $isRunning
        ];
    }

    public static function getInformationForApplications()
    {
        return [
            'carbonNotes' => self::ping(Application::CARBON_NOTES, 'https://carbon-notes.de'),
            'sternenflottenDivision' => self::ping(Application::SFD, 'https://sternenflotten-division.net'),
            'networkGamingClan' => self::ping(Application::NETWORK_GAMING_CLAN, 'https://network-gaming-clan.de'),
            'asphyxiatedDreams' => self::ping(Application::ASPHYXIATED_DREAMS, 'https://asphyxiated-dreams.de'),
            'lastEscape' => self::ping(Application::LAST_ESCAPE, 'https://last-escape.net'),
            'wallabag' => self::ping(Application::WALLABAG, 'https://wallabag.andreas-wiedel.de'),
            'rss' => self::ping(Application::RSS, 'https://rss.andreas-wiedel.de'),
            'monica' => self::ping(Application::MONICA, 'https://monica.andreas-wiedel.de'),
            'seafile' => self::ping(Application::SEAFILE, 'https://seafile.andreas-wiedel.de'),
            'teamspeak3' => self::teamspeakPing(Application::TEAMSPEAK_3, 'network-gaming-clan.de')
        ];
    }
}
