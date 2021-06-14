<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Layanan;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\Auth;

class JenisLaundry extends Component
{
    public $jenisLaundry;
    public $total;
    public $weight;
    public $antar;
    public $harga;

    public function mount()
    {
      $this->weight = 1;
    }

    public function render()
    {
      if (!empty($this->jenisLaundry) && !empty($this->weight)) {
        $tes = Layanan::where('id', $this->jenisLaundry)->get();
        $this->harga = $tes['0']->price;
        $this->total = ($tes['0']->price * $this->weight) + $this->antar;
      }

      $laundry = Layanan::where('jenisservice_id', 1)->get();

        return view('livewire.jenis-laundry', compact('laundry'));
    }

    public function storeLaundry()
    {
      $this->validate([
        'jenisLaundry' => 'required',
        'weight' => 'required',
      ]);

      $transaksi = Transaction::create([
        'user_id' => Auth::user()->id,
        'total' => $this->total,
        'status' => "menunggu pembayaran",
        'payment_url' => "menunggu pembayaran",
      ]);

      DetailTransaction::create([
        'transaction_id' => $transaksi->id,
        'service_id' => $this->jenisLaundry,
        'weight' => $this->weight,
        'extra' => $this->antar,
        'quantity' => 1,
        'subtotal' => $this->total,
      ]);
  }


}
