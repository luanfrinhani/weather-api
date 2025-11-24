<?php

namespace Src\Interface\Controller\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\Domain\Exception\UnauthorizedException;
use Src\Infrastructure\Client\WeatherClient;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class WeatherController extends Controller
{
    public function __construct(private readonly WeatherClient $weatherClient)
    {
    }

    public function getLocationWeather(Request $request)
    {
        $location = $request->query('city') . ',' . $request->query('country');
        try {
            return $this->weatherClient->getLocationWeather($location);
        } catch (UnauthorizedException $unauthorizedException) {
            throw new UnauthorizedHttpException($unauthorizedException->getMessage());
        }
    }
}
