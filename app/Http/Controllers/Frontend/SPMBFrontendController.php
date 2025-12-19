<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\SPMB;

class SPMBFrontendController extends Controller
{
    // Halaman publik SPMB
    public function index()
    {
        $spmb = SPMB::first();

        return view('Frontend.spmb', compact('spmb'));
    }
}
