<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Models\JenisLayanan;
use App\Models\Layanan;

class JenisLayananController extends Controller
{
  public function all()
  {
    $jenisLayanan = JenisLayanan::query()->paginate(6);

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

  public function laundry()
  {
    $laundry = Layanan::where('jenisservice_id', 1)->paginate();

    if ($laundry) {
      return ResponseFormatter::success(
          $laundry,
          'Data berhasil diambil'
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
