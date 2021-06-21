<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\DetailTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

  public function jenisTransaction($id)
  {
    $transactions = DB::table('transactions')
    ->select('transactions.*', 'detail_transactions.transaction_id', 'services.jenisservice_id', 'users.name')
    ->leftJoin('detail_transactions', 'detail_transactions.transaction_id', '=', 'transactions.id')
    ->leftJoin('services', 'detail_transactions.service_id', '=', 'services.id')
    ->leftJoin('users', 'transactions.user_id', '=', 'users.id')
    ->where('services.jenisservice_id', '=', $id)
    ->orderBy('transactions.id', 'desc')
    ->get();
    // dd($transactions);
    return view('admin.transaksi.jenisTransaksi', compact('transactions'));
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
