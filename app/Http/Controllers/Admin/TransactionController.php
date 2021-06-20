<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
  public function index()
  {
    $transactions = Transaction::all();

    return view('admin.transaksi.index', compact('transactions'));
  }

  public function detail($id)
  {
    $transaction = Transaction::where('id', $id)->first();
    $detailTransactions = DetailTransaction::where('transaction_id', $id)->first();

    if ($detailTransactions->service->jenisservice_id == 1) {
      return view('admin.transaksi.detailLaundry', compact(['transaction', 'detailTransactions']));
    }elseif ($detailTransactions->service->jenisservice_id == 2) {
      return view('admin.transaksi.detailBersih', compact(['transaction', 'detailTransactions']));
    }elseif ($detailTransactions->service->jenisservice_id == 3) {
      return view('admin.transaksi.detailPaket', compact(['transaction', 'detailTransactions']));
    }elseif ($detailTransactions->service->jenisservice_id == 4) {
      return view('admin.transaksi.detailTitip', compact(['transaction', 'detailTransactions']));
    }
  }

  public function trash($id)
  {
    $transaction = Transaction::find($id);
    $transaction->delete();
    toastr()->success('Data Berhasil Dihapus');
    return redirect()->route('index-transaksi');
  }

  public function trashed()
  {
    $transactions = Transaction::onlyTrashed()->get();
    return view('admin.transaksi.trashed', compact('transactions'));
  }

  public function restore($id)
  {
    $transaction = Transaction::withTrashed()->where('id',$id)->first();
    $transaction->restore();
    toastr()->success('Data Berhasil Dipulihkan');
    return redirect()->route('index-transaksi');
  }

  public function delete($id)
  {
    $transaction = Transaction::withTrashed()->where('id',$id)->first();
    $transaction->forceDelete();
    toastr()->success('Data Berhasil Dihapus Permanen');
    return redirect()->route('index-transaksi');
  }
}
