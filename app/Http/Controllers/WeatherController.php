<?php

namespace App\Http\Controllers;

use App\Actions\FetchIpAddress;
use Illuminate\Http\Request;
use App\Actions\FetchWeatherData;
use Inertia\Inertia;


class WeatherController extends Controller
{
    public function show(Request $request, FetchWeatherData $fetchWeatherData, FetchIpAddress $fetchIpAddress)
    {
        $ipAddress = $fetchIpAddress->get();

        $days = $request->input('days', 7);
        $city = $request->input('q', $ipAddress);
        $currentWeatherData = $fetchWeatherData->current($city);
        $forecastWeatherData = $fetchWeatherData->forecast($city, $days);



        return Inertia::render('Weather', [
            'currentWeatherData' => $currentWeatherData,
            'forecastWeatherData' => $forecastWeatherData
        ]);
    }
}
