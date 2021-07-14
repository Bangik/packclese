@extends('layouts.admin.app')
@section('titles', 'Detail Transaksi')
@section('maincontent')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Detail Transaksi</h1>
  <p class="mb-4">Data Detail Transaksi</p>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <tr>
            <th class="table-primary text-dark" width="35%">ID Transaksi</th>
            <td width="65%">{{$detailTransactions->transaction_id}}</td>
          </tr>
          <tr>
            <th class="table-primary text-dark" width="35%">Tanggal Transaksi</th>
            <td width="65%">{{date('l, d M Y - H.i', strtotime($detailTransactions->created_at))}}</td>
          </tr>
          <tr>
            <th class="table-primary text-dark">Nama Customer</th>
            <td>{{$transaction->user->name}}</td>
          </tr>
          <tr>
            <th class="table-primary text-dark">Alamat Customer</th>
            <td>{{$detailTransactions->address . ", " . $detailTransactions->address_detail}}</td>
          </tr>
          <tr>
            <th class="table-primary text-dark">Telepon</th>
            <td>{{$transaction->user->phoneNumber}}</td>
          </tr>
          <tr>
            <th class="table-primary text-dark">Metode Pembayaran</th>
            <td>{{$transaction->payment_url}}</td>
          </tr>
          <tr>
            <th class="table-primary text-dark">Status</th>
            <td>{{$transaction->status}}</td>
          </tr>
        </table>
      </div>
      <div class="table-responsive mt-3">
        <table class="table table-bordered text-center" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th>Paket Titip</th>
              <th>Tanggal Titip</th>
              <th>Tanggal Ambil</th>
              <th>Harga Layanan</th>
              <th>Quantity</th>
              <th>Diskon</th>
              <th>Sub Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$detailTransactions->service->name}}</td>
              <td>{{date('d M y', strtotime($detailTransactions->start))}}</td>
              <td>{{date('d M y', strtotime($detailTransactions->end))}}</td>
              <td>@currency($detailTransactions->service->price)</td>
              <td>{{$detailTransactions->quantity}}</td>
              <td class="text-danger">@currency($detailTransactions->voucher_code)</td>
              <td>@currency($transaction->total)</td>
            </tr>
            <tr>
              <td colspan="6" class="text-dark font-weight-bold">TOTAL</td>
              <td class="text-dark font-weight-bold">@currency($transaction->total)</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
