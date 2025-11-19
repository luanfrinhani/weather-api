<?php

namespace Src\Interface\Controller\V1;

use App\Http\Controllers\Controller;
use Src\Infrastructure\Client\WeatherClient;

class WeatherController extends Controller
{
    public function __construct(private readonly WeatherClient $weatherClient)
    {
    }

    public function getLocationWeather()
    {
        return $this->weatherClient->getLocationWeather('London');
    }
}
