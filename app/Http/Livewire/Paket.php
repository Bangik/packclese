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

class Paket extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
  public $comment;
  public $service_id;
  public $total_rate;

  protected $listeners = [
      'refreshParent' => '$refresh','fileChoosen'
  ];
  
  public function render()
  {
    $paket = DB::table('services')
    ->select('services.*', 'jenisservices.jenis', 'service_photos.*', 'services.id as layanan_id')
    ->leftJoin('jenisservices', 'services.jenisservice_id', '=', 'jenisservices.id')
    ->leftJoin('service_photos', 'service_photos.service_id', '=', 'services.id')
    ->where('services.jenisservice_id', '=', 3)
    ->get();

    $rate1 = Rating::where('jenisservice_id',3)->sum('rate');
    $jum_rate = Rating::where('jenisservice_id',3)->count('id');

    $paket2 = Layanan::where('jenisservice_id', 3)->first();

    $total_rate = $rate1 / $jum_rate;

    $jenis_service = JenisLayanan::where('id', '3')->first();

    $jenis_service->rate = $total_rate;
    $jenis_service->save();

    $paketPaginate = $paket2->Komentar()->where('comment_id', null)->orderBy('created_at', 'desc')->paginate(3);
    $this->service_id = $paket2->id;

    return view('livewire.paket', compact('paket', 'paketPaginate','jenis_service'))->extends('layouts.app');
  }

  public function selectItem($itemId, $action)
  {
      $this->selectedItem = $itemId;
      $this->selectedAction = $action;

      if ($action == 'Paket') {
        $this->emit('getModelId', $this->selectedItem);
        $this->emit('getActionId', $this->selectedAction);
        $this->dispatchBrowserEvent('openModal_paket');;

      }
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
