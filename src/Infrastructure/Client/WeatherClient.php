<?php

namespace Src\Infrastructure\Client;

use Illuminate\Support\Facades\Http;
use Src\Domain\Exception\BadRequestException;
use Src\Domain\Exception\UnauthorizedException;
use Src\Domain\Processor\ExceptionStrategyProcessor;
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

    /**
     * @throws UnauthorizedException
     * @throws BadRequestException
     */
    public function getLocationWeather(string $location)
    {
        $url = "$this->baseUrl/$location?key=$this->apiKey";
        $response = Http::get($url);
        if ($response->failed()) {
            ExceptionStrategyProcessor::process($response->status());
        }

        return $response->json();
    }
}
