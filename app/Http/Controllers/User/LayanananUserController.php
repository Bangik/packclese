<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Layanan;

class LayanananUserController extends Controller
{

    public function index()
    {
        $Layanan = Layanan::all();
        return view('layouts.layanan.index')->with('layanan', $Layanan);
    }
}
