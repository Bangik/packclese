@extends('layouts.app')
@section('titless', 'Packlese - Detail Riwayat Transaksi')
@section('content')
<main id="main">
  <!-- ======= Single Blog Section ======= -->
  <section class="hero-section inner-page">
    <div class="wave">

      <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
          </g>
        </g>
      </svg>

    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-md-10 text-center hero-text">
              <h1 data-aos="fade-up" data-aos-delay="">Riwayat Transaksi</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <section class="site-section mb-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 blog-content mt-3 mb-3">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <tr>
                    <th class="table-primary text-dark" width="35%">Tanggal Transaksi</th>
                    <td width="65%">{{date('l, d M Y - H.i', strtotime($detailTransactions->created_at))}}</td>
                  </tr>
                  <tr>
                    <th class="table-primary text-dark" width="35%">ID Transaksi</th>
                    <td width="65%">{{$detailTransactions->transaction_id}}</td>
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
      </div>
    </div>
  </section>
</main>
@endsection
