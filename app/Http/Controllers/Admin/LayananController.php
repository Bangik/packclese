<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Layanan;

class LayananController extends Controller
{

  public function index()
  {
    $Layanan = Layanan::all();
    return view('admin.Layanan.index')->with('Layanan',$Layanan);
  }

  public function create(){
    return view('admin.Layanan.create');
  }

  public function store(Request $Request){

    $this->validate($Request,[
      'name' => 'required',
      'jenisservice_id' => 'required',
      'description' => 'required',
      'rate' => 'required',
      'price' => 'required',

    ]);

    $Layanan = new Layanan();
    $Layanan->name = $Request->name;
    $Layanan->jenisservice_id = $Request->jenisservice_id;
    $Layanan->description = $Request->description;
    $Layanan->rate = $Request->rate;
    $Layanan->price = $Request->price;

    $image_path = "";
    if($Request->hasFile('picturePath')){
      $image = $Request->featured;
      $image_name = time().$image->getClientOriginalName();
      $image->move('uploads/Layanan/', $image_name);
      $image_path = 'uploads/Layanan/'. $image_name;
    }

    $Layanan->picturePath = $image_path;
    $Layanan->save();
    return redirect()->route('Home-JenisLayanan');

  }


}
