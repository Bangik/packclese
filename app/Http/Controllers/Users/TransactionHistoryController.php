<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use App\Models\Rating;

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
  // 
  // public function rating_laundry(Request $request){
  //
  //   // $this->validate($Request,[
  //   //   'input_ratinglaundry' => 'required',
  //   // ]);
  //   //
  //   // $Rating = Rating::create([
  //   //   'user_id' => Auth::user()->id,
  //   //   'jenisservice_id' => 1,
  //   //   'rate' => $Request->input_ratinglaundry,
  //   // ]);
  //
  //   // $this->dispatchBrowserEvent('closeModal_rt_laundry');
  //     alert('hallo');
  // }
}
