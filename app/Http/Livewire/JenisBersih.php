<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Layanan;
use App\Models\Voucher;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use Illuminate\Support\Facades\Auth;

class JenisBersih extends Component
{
  public $address;
  public $address2;
  public $space;
  public $space2;
  public $voucher;
  public $discount;
  public $potongan;
  public $harga;
  public $luas;
  public $tambahanLuas;
  public $subtotal;
  public $total;
  public $message;
  public $idService;

  public function mount()
  {
    $this->space = 3;
    $this->space2 = 3;
    $this->message = "";
  }

  public function render()
  {
    if (!empty($this->space) && !empty($this->space2)) {
      $this->luas = $this->space * $this->space2;
      if ($this->luas > 9) {
        $this->tambahanLuas = $this->luas - 9;
      }else {
        $this->tambahanLuas = 0;
      }

      $bersih = Layanan::where('jenisservice_id', 2)->first();
      $this->harga = $bersih->price;
      $this->idService = $bersih->id;

      $this->subtotal = $this->harga + ($this->tambahanLuas * 20000);
      $this->potongan = $this->subtotal * $this->discount / 100;
      $this->total = $this->subtotal - $this->potongan;
    }
    return view('livewire.jenis-bersih');
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

  public function storeBersih()
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
      'space' => $this->luas,
      'voucher_code' => $this->voucher,
      'subtotal' => $this->subtotal,
    ]);

    Voucher::where('voucher_code', $this->voucher)->update([
      'status' => 0
    ]);

    session()->flash('pesan', 'Transaksi berhasil di proses');
  }
}
