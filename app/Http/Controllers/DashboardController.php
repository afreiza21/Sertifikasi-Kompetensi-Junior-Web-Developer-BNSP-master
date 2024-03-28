<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => env('APP_NAME') . '| Dashboard',
        ];

        if (Auth::user()->role == 'admin') {
            return view('dashboard.index', $data);
        } else {
            return view('dashboard.index_siswa', $data);
        }
    }
}
