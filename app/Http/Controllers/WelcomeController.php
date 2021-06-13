<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisLayanan;

class WelcomeController extends Controller
{
  public function index()
  {
    $jenisLayanan = JenisLayanan::all();
    return view('welcome', compact('jenisLayanan'));
  }
}
