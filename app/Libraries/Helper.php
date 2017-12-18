<?php

namespace App\Libraries;

use App\Models\Enums\Application;
use App\Models\PingLog;
use ConsoleTVs\Charts\Facades\Charts;
use GameQ\GameQ;

class Helper
{
    /**
     * @param string $url
     * @return mixed
     */
    public static function getContentFromUrl($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $content = curl_exec($curl);

        curl_close($curl);

        return $content;
    }

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
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_exec($ch);

        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $ping = curl_getinfo($ch, CURLINFO_TOTAL_TIME) * 1000;

        curl_close($ch);

        return [
            'application' => $application,
            'isRunning' => $status == 200,
            'ping' => round($ping),
        ];
    }

    /**
     * @param $application
     * @param $gameType
     * @param $ip
     * @param $port
     * @param array $options
     * @return array
     */
    public static function gameServerPing($application, $gameType, $ip, $port, $options = [])
    {
        $serverAddress = $ip . ':' . $port;

        $startTime = microtime(true);

        $gameQ = new GameQ();
        $gameQ->addServer([
            'type' => $gameType,
            'host' => $serverAddress,
            'options' => $options
        ]);

        $results = $gameQ->process();

        $timeElapsed = round((microtime(true) - $startTime) * 1000);

        return [
            'application' => $application,
            'isRunning' => $results[$serverAddress]['gq_online'],
            'ping' => round($timeElapsed),
            'serverInfo' => $results[$serverAddress]
        ];
    }

    /**
     * @param $application
     * @param $voiceType
     * @param $ip
     * @param $port
     * @param $queryPort
     * @return array
     */
    public static function voiceServerPing($application, $voiceType, $ip, $port, $queryPort)
    {
        return self::gameServerPing($application, $voiceType, $ip, $port, ['query_port' => $queryPort]);
    }


    /**
     * @param $application
     * @return array
     */
    public static function getChartDataFor($application)
    {
        $data = [];
        $pingLogs = PingLog::whereApplication($application)->orderBy('created_at', 'desc')->take(15);

        foreach ($pingLogs->get()->reverse() as $pingLog) {
            $data[] = [
                $pingLog->created_at->format('H:i'),
                $pingLog->is_running ? $pingLog->ping : -1
            ];
        }

        return $data;
    }

    public static function getInformationForApplications()
    {
        return [
            'carbonNotes' => self::ping(Application::CARBON_NOTES, 'https://carbon-notes.de'),
            'strahlungswerte' => self::ping(Application::STRAHLUNGSWERTE, 'https://strahlungswerte.de'),
            'sternenflottenDivision' => self::ping(Application::SFD, 'https://sternenflotten-division.net'),
            'networkGamingClan' => self::ping(Application::NETWORK_GAMING_CLAN, 'https://network-gaming-clan.de'),
            'asphyxiatedDreams' => self::ping(Application::ASPHYXIATED_DREAMS, 'https://asphyxiated-dreams.de'),
            'lastEscape' => self::ping(Application::LAST_ESCAPE, 'https://last-escape.net'),
            'wallabag' => self::ping(Application::WALLABAG, 'https://wallabag.andreas-wiedel.de'),
            'rss' => self::ping(Application::RSS, 'https://crystal-rss.rocks'),
            'seafile' => self::ping(Application::SEAFILE, 'https://seafile.andreas-wiedel.de'),
            'teamspeak3' => self::voiceServerPing(Application::TEAMSPEAK_3, 'teamspeak3', env('SERVER_IP'), 9987, 10011),
        ];
    }

    public static function getInformationForApplicationsWithCharts()
    {
        $applicationPings = self::getInformationForApplications();

        foreach ($applicationPings as $key => $applicationPing) {
            $applicationPings[$key]['chart_data'] = self::getChartDataFor($applicationPing['application']);
        }

        return $applicationPings;
    }
}