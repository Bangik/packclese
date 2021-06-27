<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\JenisLayanan;

class JenisLayananController extends Controller
{
  public function all()
  {
    $jenisLayanan = JenisLayanan::all();

    if ($jenisLayanan) {
      return ResponseFormatter::success(
          $jenisLayanan,
          'Data produk berhasil diambil'
      );
    }else {
      return ResponseFormatter::error(
        null,
        'Data produk tidak ada',
        404
      );
    }
  }
}
