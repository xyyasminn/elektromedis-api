<?php

namespace App\Http\Controllers;

use App\Models\AlatElektromedis;

class AlatViewController extends Controller
{
    public function index()
    {
        $data = AlatElektromedis::all();
        return view('alat.index', compact('data'));
    }
}
