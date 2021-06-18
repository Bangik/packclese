@extends('layouts.welcome')
@section('section')
<main id="main">
  <!-- ======= Home Section ======= -->
  <section class="section">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-5" data-aos="fade-up">
        <h2 class="section-heading">Packclese</h2><br>
        <p>Packclese sendiri dibuat pada tahun 2021 dan ditujukan kepada masyarakat agar mempermudah menggunakan jasa layanan
          yang kami sediakan. Packlese juga memiliki aplikasi yang tersedia di perangkat android dengan nama yang sama yaitu Packlese
          hal ini bertujuan agar masyarakat lebih mudah mengakses jasa layanan kami melalui device android yang dimiliki.</p>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center text-center mb-5" data-aos="fade">
        <div class="col-md-6 mb-5">
          <img src="{{asset('softland/assets/img/undraw_svg_1.svg')}}" alt="Image" class="img-fluid">
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="step">
            <span class="number">01</span>
            <h3>Download</h3>
            <p>Download aplikasi di playstore anda.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="step">
            <span class="number">02</span>
            <h3>Sign Up</h3>
            <p>Silahkan registrasi terlebih dahulu.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="step">
            <span class="number">03</span>
            <h3>Enjoy the app</h3>
            <p>Selamat menikmati jasa layanan kami.</p>
          </div>
        </div>
      </div>
    </div>

    <section class="section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 me-auto">
            <h3 class="mb-4">Layanan Bersih - Bersih</h3>
            <p class="mb-4">Layanan pembersihan umum ruangan secara menyeluruh serta profesional meliputi
              mengelap debu, mengepel lantai, merapikan kamar tidur/barang, dan membersihkan kamar mandi.</p>
            <p><a href="#" class="btn btn-primary">More</a></p>
          </div>
          <div class="col-md-6" data-aos="fade-left">
            <img src="{{asset('img/bersih.png')}}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 ms-auto order-2">
            <h2 class="mb-4">Layanan Titip Barang</h2>
            <p class="mb-4">Layanan penitipan barang seperti buku, baju, perabotan, dsb. Dalam layanan kami, keamanan dan kondisi barang
              pelanggan sangat terjamin karena kami berorientasi pada kepuasan pelanggan.</p>
            <p><a href="#" class="btn btn-primary">More</a></p>
          </div>
          <div class="col-md-6" data-aos="fade-right">
            <img src="{{asset('img/titip-barang.png')}}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 me-auto">
            <h2 class="mb-4">Layanan Titip Motor</h2>
            <p class="mb-4">Layanan penitipan motor dengan menjamin kondisi dan keamanan motor pelanggan dengan tawaran
              biaya yang cukup terjangkau oleh masyarakat.</p>
            <p><a href="#" class="btn btn-primary">More</a></p>
          </div>
          <div class="col-md-6" data-aos="fade-right">
            <img src="{{asset('img/motor.png')}}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 ms-auto order-2">
            <h2 class="mb-4">Layanan Laundry</h2>
            <p class="mb-4">Layanan laundry mulai dari cuci sampai setrika dengan harga yang ditawarkan cukup terjangkau serta
              bisa juga untuk diantar maupun dijemput.</p>
            <p><a href="#" class="btn btn-primary">More</a></p>
          </div>
          <div class="col-md-6" data-aos="fade-right">
            <img src="{{asset('img/laundry.png')}}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 md-auto">
            <h2 class="mb-4">Layanan Paket Barang</h2>
            <p class="mb-4">Layanan paket barang pelanggan, bekerja sama dengan jasa pengiriman seperti
              JNE, JNT, POS dan lain sebagainya.</p>
            <p><a href="#" class="btn btn-primary">More</a></p>
          </div>
          <div class="col-md-6" data-aos="fade-right">
            <img src="{{asset('img/shipping.png')}}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-4 ms-auto order-2">
            <h2 class="mb-4">Layanan Paket Motor</h2>
            <p class="mb-4">Layanan pengiriman kendaraan bermotor melalui jasa pengiriman seperti Indah Cargo, KAI Express
              dan lain sebagainya.</p>
            <p><a href="#" class="btn btn-primary">More</a></p>
          </div>
          <div class="col-md-6" data-aos="fade-right">
            <img src="{{asset('img/motorpaket.png')}}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Testimonials Section ======= -->
    <section class="section border-top border-bottom">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-4">
            <h2 class="section-heading">Review From Our Users</h2>
          </div>
        </div>
        <div class="row justify-content-center text-center">
          <div class="col-md-7">

            <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="review text-center">
                    <p class="stars">
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill muted"></span>
                    </p>
                    <h3>Excellent App!</h3>
                    <blockquote>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus pariatur, numquam
                        aperiam dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti minus animi,
                        provident voluptates consectetur maiores quos.</p>
                    </blockquote>

                    <p class="review-user">
                      <img src="{{asset('softland/assets/img/person_1.jpg')}}" alt="Image" class="img-fluid rounded-circle mb-3">
                      <span class="d-block">
                        <span class="text-black">Jean Doe</span>, &mdash; App User
                      </span>
                    </p>

                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="review text-center">
                    <p class="stars">
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill muted"></span>
                    </p>
                    <h3>This App is easy to use!</h3>
                    <blockquote>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus pariatur, numquam
                        aperiam dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti minus animi,
                        provident voluptates consectetur maiores quos.</p>
                    </blockquote>

                    <p class="review-user">
                      <img src="{{asset('softland/assets/img/person_2.jpg')}}" alt="Image" class="img-fluid rounded-circle mb-3">
                      <span class="d-block">
                        <span class="text-black">Johan Smith</span>, &mdash; App User
                      </span>
                    </p>

                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="review text-center">
                    <p class="stars">
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill muted"></span>
                    </p>
                    <h3>Awesome functionality!</h3>
                    <blockquote>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius ea delectus pariatur, numquam
                        aperiam dolore nam optio dolorem facilis itaque voluptatum recusandae deleniti minus animi,
                        provident voluptates consectetur maiores quos.</p>
                    </blockquote>

                    <p class="review-user">
                      <img src="{{asset('softland/assets/img/person_3.jpg')}}" alt="Image" class="img-fluid rounded-circle mb-3">
                      <span class="d-block">
                        <span class="text-black">Jean Thunberg</span>, &mdash; App User
                      </span>
                    </p>

                  </div>
                </div><!-- End testimonial item -->

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->
  </section>
  <!-- ======= CTA Section ======= -->
  <section class="section cta-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2>Get The Apps Now</h2>
        </div>
        <div class="col-md-5 text-center text-md-end">
          <p><a href="#" class="btn d-inline-flex align-items-center"><i class="bx bxl-apple"></i><span>App store</span></a> <a href="#" class="btn d-inline-flex align-items-center"><i class="bx bxl-play-store"></i><span>Google play</span></a></p>
        </div>
      </div>
    </div>
  </section><!-- End CTA Section -->

</main><!-- End #main -->
@endsection