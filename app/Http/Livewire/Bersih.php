<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Layanan;
use App\Models\Komentar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Bersih extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  public $comment;
  public $service_id;

  public function render()
  {
    $bersih = DB::table('services')
    ->select('services.*', 'jenisservices.jenis', 'service_photos.*', 'services.id as layanan_id')
    ->leftJoin('jenisservices', 'services.jenisservice_id', '=', 'jenisservices.id')
    ->leftJoin('service_photos', 'service_photos.service_id', '=', 'services.id')
    ->where('services.jenisservice_id', '=', 2)
    ->get();

    $bersih2 = Layanan::where('jenisservice_id', 2)->first();
    $bersihPaginate = $bersih2->Komentar()->where('comment_id', null)->orderBy('created_at', 'desc')->paginate(3);
    $this->service_id = $bersih2->id;

    return view('livewire.bersih', compact('bersih', 'bersihPaginate'))->extends('layouts.app');
  }

  public function saveComment()
  {
    $this->validate([
      'comment' => 'required',
    ]);

    Komentar::create([
      'user_id' => Auth::user()->id,
      'service_id' => $this->service_id,
      'comment_id' => null,
      'komentar' => $this->comment,
    ]);

    $this->reset('comment');
  }
}
