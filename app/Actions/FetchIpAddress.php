<?php

namespace App\Actions;

use Illuminate\Support\Facades\Http;


class FetchIpAddress
{
  public function get()
  {
    $response = Http::get('https://api.ipify.org?format=json');

    return $response->json('ip');
  }
}
