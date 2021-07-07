<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use Midtrans\Config;
use Midtrans\Snap;
use App\Helpers\ResponseFormatter;

class TransactionController extends Controller
{
  public function storeLaundry(Request $request)
  {
    $request->validate([
      'service_id' => 'required',
      'weight' => 'required',
    ]);

    $transaksi = Transaction::create([
      'user_id' => $request->user_id,
      'total' => $request->total,
      'status' => "PROCESS",
      'payment_url' => "COD",
    ]);

    $detailTransaksi = DetailTransaction::create([
      'transaction_id' => $transaksi->id,
      'service_id' => $request->service_id,
      'address' => $request->address,
      'weight' => $request->weight,
      'extra' => $request->antar,
      'subtotal' => $request->total,
    ]);

    if ($request->paymentMethod == 1) {
      // Konfigurasi midtrans
      Config::$serverKey = config('services.midtrans.serverKey');
      Config::$isProduction = config('services.midtrans.isProduction');
      Config::$isSanitized = config('services.midtrans.isSanitized');
      Config::$is3ds = config('services.midtrans.is3ds');

      $transaksi = Transaction::with(['detailTransaction','user'])->find($transaksi->id);
      // $nameService = Layanan::find($this->jenisLaundry);

      $midtrans = array(
        'transaction_details' => array(
          'order_id' =>  $transaksi->id,
          'gross_amount' => (int) $transaksi->total,
        ),
        'customer_details' => array(
          'first_name'    => $transaksi->user->name,
          'email'         => $transaksi->user->email,
          'phone'         => $transaksi->user->phoneNumber,
        ),
        'enabled_payments' => array('gopay','bank_transfer'),
        'vtweb' => array(),
      );

      try {
        // Ambil halaman payment midtrans
        $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

        $transaksi->payment_url = $paymentUrl;
        $transaksi->save();

        $data = array_merge($transaksi->toArray(), $detailTransaksi->toArray());
        // Redirect ke halaman midtrans
        return ResponseFormatter::success($data,'Transaksi berhasil');
      }
      catch (Exception $e) {
        return ResponseFormatter::error($e->getMessage(),'Transaksi Gagal');
      }
    }else {
      $data = array_merge($transaksi->toArray(), $detailTransaksi->toArray());

      return ResponseFormatter::success($data,'Transaksi berhasil');
    }
  }
}
