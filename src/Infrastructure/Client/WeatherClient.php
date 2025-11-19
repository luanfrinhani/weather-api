<?php

namespace Src\Infrastructure\Client;

use Illuminate\Support\Facades\Http;
use Src\Infrastructure\Utils\ConfigLaravel;

class WeatherClient
{
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct(
        private readonly ConfigLaravel $config
    ) {
        $this->baseUrl = $this->config->get('services.weather.base_url');
        $this->apiKey = $this->config->get('services.weather.api_key');
    }

    public function getLocationWeather(string $location)
    {
        $url = "$this->baseUrl/$location?key=$this->apiKey";
        $response = Http::get($url);
        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
