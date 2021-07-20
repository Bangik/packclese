<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Layanan;
use App\Models\Komentar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\JenisLayanan;
use App\Models\Rating;

class Titip extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  public $comment;
  public $service_id;
  public $total_rate;

  public function render()
  {
    $titip = DB::table('services')
    ->select('services.*', 'jenisservices.jenis', 'service_photos.*', 'services.id as layanan_id')
    ->leftJoin('jenisservices', 'services.jenisservice_id', '=', 'jenisservices.id')
    ->leftJoin('service_photos', 'service_photos.service_id', '=', 'services.id')
    ->where('services.jenisservice_id', '=', 4)
    ->get();

    $rate1 = Rating::where('jenisservice_id',1)->sum('rate');
    $jum_rate = Rating::where('jenisservice_id',1)->count('id');

    $titip2 = Layanan::where('jenisservice_id', 4)->first();

    $total_rate = $rate1 / $jum_rate;

    $jenis_service = JenisLayanan::where('id', '1')->first();

    $jenis_service->rate = $total_rate;
    $jenis_service->save();

    $laundryPaginate = $laundry2->Komentar()->where('comment_id', null)->orderBy('created_at', 'desc')->paginate(3);
    $this->service_id = $laundry2->id;

    $titipPaginate = $titip2->Komentar()->where('comment_id', null)->orderBy('created_at', 'desc')->paginate(3);
    $this->service_id = $titip2->id;

    return view('livewire.titip', compact('titip', 'titipPaginate'))->extends('layouts.app');
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
