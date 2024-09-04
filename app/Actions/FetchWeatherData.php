<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class FetchWeatherData
{
  public function current($q)
  {
    try {
      $response = Http::get(config('services.weather.api_url') . '/current.json', [
        'q' => $q,
        'key' => config('services.weather.api_key')
      ]);

      if ($response->successful()) {
        return $response->json();
      } else {
        Log::error('Weather API request failed', [
          'status' => $response->status(),
          'response' => $response->body()
        ]);
      }
    } catch (\Exception $e) {
      Log::error('Error fetching weather data', ['exception' => $e->getMessage()]);
    }

    return null;
  }

  public function forecast($q, $days)
  {
    try {
      $response = Http::get(config('services.weather.api_url') . '/forecast.json', [
        'q' => $q,
        'days' => $days,
        'key' => config('services.weather.api_key')
      ]);

      if ($response->successful()) {
        return $response->json();
      } else {
        Log::error('Weather API request failed', [
          'status' => $response->status(),
          'response' => $response->body()
        ]);
      }
    } catch (\Exception $e) {
      Log::error('Error fetching weather data', ['exception' => $e->getMessage()]);
    }

    return null;
  }
}
