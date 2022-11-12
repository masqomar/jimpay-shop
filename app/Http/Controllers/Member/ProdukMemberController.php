<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukMemberController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view anggota')->only('index', 'show');
    //     $this->middleware('permission:create anggota')->only('create', 'store');
    // }

    public function index()
    {
        return view('member.produk-member.index');
    }
}
