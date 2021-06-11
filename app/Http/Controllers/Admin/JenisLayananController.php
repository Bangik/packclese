<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JenisLayanan;

class JenisLayananController extends Controller
{

  public function index()
  {
    $JenisLayanan = JenisLayanan::all();
    return view('admin.JenisLayanan.index')->with('JenisLayanan',$JenisLayanan);
  }

  public function create(){
    return view('admin.JenisLayanan.create');
  }

  public function store(Request $Request){

    $this->validate($Request,[
      'jenis' => 'required'
    ]);

    $JenisLayanan = new JenisLayanan();
    $JenisLayanan->jenis = $Request->jenis;
    $JenisLayanan->save();

    return redirect()->route('Home-JenisLayanan');
  }

  public function edit($id){
    $JenisLayanan = JenisLayanan::find($id);
    return view('admin.JenisLayanan.edit')->with('JenisLayanan',$JenisLayanan);

  }

  public function update(Request $Request, $id)
  {
    $JenisLayanan = JenisLayanan::find($id);

    $JenisLayanan->jenis = $Request->jenis;
    $JenisLayanan->save();
    return redirect()->route('Home-JenisLayanan');
  }

  public function delete($id)
  {
    $JenisLayanan = JenisLayanan::find($id);
    $JenisLayanan->delete();
    return redirect()->route('Home-JenisLayanan');
  }

}
