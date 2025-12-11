<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Guru;

class GuruFrontendController extends Controller
{
    public function index()
    {
        $guru = Guru::orderBy('urut', 'ASC')->get();
        return view('frontend.guru.index', compact('guru'));
    }
}
