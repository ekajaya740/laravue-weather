<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IPController extends Controller
{
    public function getIpAddress(Request $request)
    {
        $ipAddress = $request->ip();
        return response()->json(['ipAddress' => $ipAddress]);
    }
}
