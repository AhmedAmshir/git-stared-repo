<?php

namespace App\Clients;

use App\Enums\GitEnum;

class GitClient {

    protected $url;
    
    public function __construct($url) {
        $this->url = $url;
    }

    public function getRepos($params) {
        
        $url = $this->url.$params;
        $repos = $this->sendCurlRequest($url);

        $return = [];
        $repos = json_decode($repos, true);
        foreach ($repos['items'] as $repo) {
            $return[] = [
                'id'         => $repo['id'],
                'name'       => $repo['name'],
                'private'    => $repo['private'],
                'url'        => $repo['html_url'],
                'size'       => $repo['size'],
                'stars'      => $repo['stargazers_count'],
                'created_at' => $repo['created_at'],
            ];
        }
        return $return;
    }

    private function sendCurlRequest($url) {
        $curl = curl_init();

        $user_agent = array_key_exists('HTTP_USER_AGENT', $_SERVER) ? $_SERVER['HTTP_USER_AGENT'] : GitEnum::$default_user_agent;
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "cache-control: no-cache",
                "accept:application/vnd.github.v3+json",
                "user-agent:".$user_agent
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}
