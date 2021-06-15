<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\JenisLayanan;
use Illuminate\Support\Str;

class LayananController extends Controller
{

  public function index()
  {
    $Layanan = Layanan::all();
    return view('admin.Layanan.index')->with('Layanan',$Layanan);
  }

  public function create(){
    $Layanan = Layanan::all();
    $JenisLayanan = JenisLayanan::all();
    return view('admin.Layanan.create',compact('Layanan','JenisLayanan'));
  }

  public function store(Request $Request){

    $this->validate($Request,[
      'name' => 'required|max:255',
      'jenisservice_id' => 'required',
      'description' => 'required',
      'rate' => 'required',
      'price' => 'required',
      'picturePath' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',

    ]);

    $Layanan = new Layanan();
    $Layanan->name = $Request->name;
    $Layanan->jenisservice_id = $Request->jenisservice_id;
    $Layanan->description = $Request->description;
    $Layanan->rate = $Request->rate;
    $Layanan->price = $Request->price;

    $image_path = "";
    if($Request->hasFile('picturePath')){
      $image = $Request->picturePath;
      $image_name = time().$image->getClientOriginalName();
      $image->move('img/services/', $image_name);
      $image_path = 'img/services/'. $image_name;
    }

    $Layanan->picturePath = $image_path;
    $Layanan->save();
    return redirect()->route('Home-Layanan');

  }

  public function edit($id)
  {
    $Layanan = Layanan::find($id);
    $JenisLayanan = JenisLayanan::all();
    return view('admin.Layanan.edit', compact('Layanan','JenisLayanan'));

  }

  public function update(Request $Request,$id)
  {

    $this->validate($Request,[
      'name' => 'required|max:255',
      'jenisservice_id' => 'required',
      'description' => 'required',
      'rate' => 'required',
      'price' => 'required',

    ]);

    $Layanan = Layanan::find($id);
    $Layanan->name = $Request->name;
    $Layanan->jenisservice_id = $Request->jenisservice_id;
    $Layanan->description = $Request->description;
    $Layanan->rate = $Request->rate;
    $Layanan->price = $Request->price;

    if($Request->hasFile('picturePath')){
      if (file_exists($Layanan->picturePath)) {
        unlink($Layanan->picturePath);

      }
      $image = $Request->picturePath;
      $image_name = time().$image->getClientOriginalName();
      $image->move('img/services/', $image_name);
      $Layanan->picturePath = 'img/services/'. $image_name;


    }

    $Layanan->save();
    return redirect()->route('Home-Layanan');

  }

    public function trash($id)
    {
      $Layanan = Layanan::find($id);
      $Layanan->delete();
      return redirect()->route('Home-Layanan');
    }

    public function trashed()
    {
      $Layanan = Layanan::onlyTrashed()->get();
      return view('admin.Layanan.trashed')->with('Layanan', $Layanan);

    }

    public function restore($id)
    {
      $Layanan = Layanan::withTrashed()->where('id',$id)->first();

      $Layanan->restore();

      return redirect()->route('Home-Layanan');
    }

    public function delete($id)
    {
      $Layanan = Layanan::withTrashed()->where('id',$id)->first();

      if (file_exists($Layanan->picturePath)) {
        unlink($Layanan->picturePath);

      }


      $Layanan->forceDelete();
      return redirect()->route('Trashed-Layanan');
    }


}
