<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LaundryController extends Controller
{
  public function index()
  {
    $laundry = Layanan::where('jenisservice_id', 1)->get();

    return view('layanan.laundry', compact('laundry'));

  }
}
