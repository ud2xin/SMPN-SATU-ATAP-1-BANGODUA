<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class LokasiFrontendController extends Controller
{
    public function index()
    {
        $data = [
            'nama_sekolah' => 'SMPN SATU ATAP 1 BANGODUA',
            'alamat' => 'SMPN SATU ATAP 1 BANGODUA',
            'maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3086.5447156466503!2d108.246806074993!3d-6.522862293469691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ec526b3818a79%3A0xbe5d071b4cd3cfee!2sSMPN%20SATU%20ATAP%201%20BANGODUA!5e1!3m2!1sid!2sid!4v1765394237763!5m2!1sid!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        ];

        return view('frontend.lokasi.index', $data);
    }
}
