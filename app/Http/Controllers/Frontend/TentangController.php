<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        // Tampilkan view resources/views/frontend/tentang.blade.php
        return view('frontend.tentang');
    }
}
