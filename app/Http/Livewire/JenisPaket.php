<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Layanan;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class JenisPaket extends Component
{
  public $provinsi1;
  public $provinsi2;
  public array $listKota = [];
  public array $listKota2 = [];
  public $origin;
  public $destination;
  public $courier;
  public array $listLayananCourier = [];
  public $layananCourier;
  public $layananCourier2;
  public $idService;
  public $address;
  public $address2;
  public $weight;
  public $ongkir;
  public $voucher;
  public $potongan;
  public $discount;
  public $harga;
  public $subtotal;
  public $total;
  public $message;

  public function render()
  {

    if ($this->provinsi1 == 0) {
      $this->origin = 0;
      $this->reset('listKota');
    }else {
      $this->listKota = RajaOngkir::kota()->dariProvinsi($this->provinsi1)->get();
    }

    if ($this->provinsi2 == 0) {
      $this->destination = 0;
      $this->reset('listKota2');
    }else {
      $this->listKota2 = RajaOngkir::kota()->dariProvinsi($this->provinsi2)->get();
    }

    if ($this->origin != 0 && $this->destination != 0 && !empty($this->courier) && $this->weight != 0) {
      $this->listLayananCourier = RajaOngkir::ongkosKirim([
        'origin'        => $this->origin,
        'destination'   => $this->destination,
        'weight'        => $this->weight,
        'courier'       => $this->courier
      ])->get();

      $this->listLayananCourier = $this->listLayananCourier[0]['costs'];

      if (!empty($this->layananCourier)) {
        $pisahString = explode(',', $this->layananCourier);
        $this->layananCourier2 = $pisahString[0];
        $this->ongkir = $pisahString[1];
      }else {
        $this->ongkir = 0;
      }

      $paket = Layanan::where('jenisservice_id', 3)->first();
      $this->harga = $paket->price;
      $this->idService = $paket->id;

      $this->subtotal = $this->harga + $this->ongkir;
      $this->potongan = $this->subtotal * $this->discount / 100;
      $this->total = $this->subtotal - $this->potongan;

    }

    $listProvinsi = RajaOngkir::provinsi()->all();

    return view('livewire.jenis-paket', compact('listProvinsi'));
  }

  public function reedeem($voucher)
  {
    try {
      $voucherAll = Voucher::where('status', 1)->where('voucher_code', $voucher)->first();

      if (time() > strtotime($voucherAll->expired)) {
        $this->message = "Kode Voucher kadaluarsa";
      }else {
        $this->discount = $voucherAll->discount;
        $this->message = "Kode Voucher berhasil digunakan";
        $this->voucher = $voucherAll->voucher_code;
      }

    } catch (\Exception $e) {
      $this->discount = 0;
      $this->message = "Kode Voucher tidak valid";
    }
  }

  public function resetbtn()
  {
    $this->reset('voucher');
    $this->reset('message');
    $this->discount = 0;
  }

  public function storePaket()
  {
    $this->validate([
      'address' => 'required',
      'space' => 'required',
      'space2' => 'required',
    ]);

    $transaksi = Transaction::create([
      'user_id' => Auth::user()->id,
      'total' => $this->total,
      'status' => "menunggu pembayaran",
      'payment_url' => "menunggu pembayaran",
    ]);

    DetailTransaction::create([
      'transaction_id' => $transaksi->id,
      'service_id' => $this->idService,
      'address' => $this->address,
      'address_detail' => $this->address2,
      'origin' => $this->origin,
      'destination' => $this->destination,
      'weight' => $this->weight,
      'courier' => $this->courier,
      'voucher_code' => $this->voucher,
      'subtotal' => $this->subtotal,
    ]);

    Voucher::where('voucher_code', $this->voucher)->update([
      'status' => 0
    ]);

    session()->flash('pesan', 'Transaksi berhasil di proses');
  }
}