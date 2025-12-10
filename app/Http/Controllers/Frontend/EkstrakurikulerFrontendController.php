<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerFrontendController extends Controller
{
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::orderBy('created_at', 'desc')->paginate(6);
        return view('frontend.ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function show($id)
    {
        $ekskul = Ekstrakurikuler::findOrFail($id);
        return view('frontend.ekstrakurikuler.show', compact('ekskul'));
    }
}
