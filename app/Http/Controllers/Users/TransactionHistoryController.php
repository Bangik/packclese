<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\DetailTransaction;

class TransactionHistoryController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $transactions = Transaction::where('user_id', Auth::user()->id)->get();

    return view('user.riwayat-transaksi', compact('transactions'));
  }

  public function detail($id)
  {
    $transaction = Transaction::where('id', $id)->first();
    $detailTransactions = DetailTransaction::where('transaction_id', $id)->first();

    if ($detailTransactions->service->jenisservice_id == 1) {
      return view('user.detailLaundry', compact(['transaction', 'detailTransactions']));
    }elseif ($detailTransactions->service->jenisservice_id == 2) {
      return view('user.detailBersih', compact(['transaction', 'detailTransactions']));
    }elseif ($detailTransactions->service->jenisservice_id == 3) {
      return view('user.detailPaket', compact(['transaction', 'detailTransactions']));
    }elseif ($detailTransactions->service->jenisservice_id == 4) {
      return view('user.detailTitip', compact(['transaction', 'detailTransactions']));
    }
  }
}
