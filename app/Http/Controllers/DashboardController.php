<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user()->level;

        if ($user === 'Admin') {
            return view('dashboard');
        }

        return view('member.dashboard');
    }
}
