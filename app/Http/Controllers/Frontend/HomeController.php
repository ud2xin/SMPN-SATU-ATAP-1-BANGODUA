<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::with([
            'gambarBesar',
            'gambarKecil1',
            'gambarKecil2',
            'gambarKecil3',
            'gambarKecil4',
            'gambarKecil5',
            'gambarKecil6',
            'gambarKecil7',
            'gambarKecil8',
            'gambarKecil9',
            'gambarKecil10',
        ])->first();

        return view('frontend.index', compact('hero'));
    }
}
