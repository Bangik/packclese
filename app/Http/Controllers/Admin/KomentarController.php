<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Komentar;
use App\Models\User;
use App\Models\JenisLayanan;

class KomentarController extends Controller
{

  public function index()
  {
    $Komentar = Komentar::orderBy('id', 'desc')->get();
    return view('admin.komentar.index')->with('Komentar', $Komentar);
  }

  public function delete($id)
  {
    $Komentar = Komentar::find($id);
    $Komentar->delete();

    toastr()->success('Data Berhasil Dihapus');

    return redirect()->route('index-komentar');
  }
}
