<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Osis;

class OsisFrontendController extends Controller
{
    public function index()
    {
        $osis = Osis::where('is_active', 1)
            ->orderBy('urut', 'asc')
            ->get();

        return view('frontend.osis.index', compact('osis'));
    }
}
