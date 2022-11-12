<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberDashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view anggota')->only('index', 'show');
    //     $this->middleware('permission:create anggota')->only('create', 'store');
    //     $this->middleware('permission:edit anggota')->only('edit', 'update');
    //     $this->middleware('permission:delete anggota')->only('destroy');
    // }

    public function index()
    {
        return view('member.dashboard');
    }
}
