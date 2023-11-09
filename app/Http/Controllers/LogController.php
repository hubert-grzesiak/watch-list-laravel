<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function index()
    {
        $logFilePath = storage_path('logs/laravel.log');

        if (File::exists($logFilePath)) {
            $logs = File::get($logFilePath);
            $logLines = explode(PHP_EOL, $logs);
        } else {
            $logLines = ["Plik z logami nie istnieje."];
        }

        return view('logs.index', compact('logLines'));
    }
}
