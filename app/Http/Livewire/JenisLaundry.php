<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Layanan;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;
use App\Helpers\ResponseFormatter;

class JenisLaundry extends Component
{
    public $jenisLaundry;
    public $address;
    public $address2;
    public $weight;
    public $antar;
    public $voucher;
    public $discount;
    public $potongan;
    public $message;
    public $harga;
    public $subtotal;
    public $total;

    public function mount()
    {
      $this->weight = 1;
    }

    public function render()
    {
      if ($this->jenisLaundry != 0 && !empty($this->weight)) {
        $layananAll = Layanan::where('id', $this->jenisLaundry)->first();
        $this->harga = $layananAll->price;

        $this->subtotal = ($layananAll->price * $this->weight) + $this->antar;
        $this->potongan = $this->subtotal * $this->discount / 100;
        $this->total = $this->subtotal - $this->potongan;

      }else {
        $this->reset(['harga', 'total', 'subtotal', 'potongan', 'message', 'discount']);
      }

      $laundry = Layanan::where('jenisservice_id', 1)->get();

        return view('livewire.jenis-laundry', compact('laundry'));
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
        'address' => $this->address,
        'address_detail' => $this->address2,
        'weight' => $this->weight,
        'voucher_code' => $this->potongan,
        'extra' => $this->antar,
        'subtotal' => $this->total,
      ]);

      Voucher::where('voucher_code', $this->voucher)->update([
        'status' => 0
      ]);

      // Konfigurasi midtrans
      Config::$serverKey = config('services.midtrans.serverKey');
      Config::$isProduction = config('services.midtrans.isProduction');
      Config::$isSanitized = config('services.midtrans.isSanitized');
      Config::$is3ds = config('services.midtrans.is3ds');

      $transaksi = Transaction::with(['detailTransaction','user', 'layanan'])->find($transaksi->id);

      $midtrans = array(
        'transaction_details' => array(
        'order_id' =>  $transaksi->id,
        'gross_amount' => (int) $transaksi->total,
      ),
      'customer_details' => array(
        'first_name'    => $transaksi->user->name,
        'email'         => $transaksi->user->email
      ),
        'enabled_payments' => array('gopay','bank_transfer'),
        'vtweb' => array(),
    );

    try {
      // Ambil halaman payment midtrans
      $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

      $transaksi->payment_url = $paymentUrl;
      $transaksi->save();

      // Redirect ke halaman midtrans
      return redirect($paymentUrl);
      // ResponseFormatter::success($transaksi,'Transaksi berhasil');
    }
    catch (Exception $e) {
        return ResponseFormatter::error($e->getMessage(),'Transaksi Gagal');
    }

      // session()->flash('pesan', 'Transaksi berhasil di proses');
  }


}
