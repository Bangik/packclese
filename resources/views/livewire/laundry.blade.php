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
              <h1 data-aos="fade-up" data-aos-delay="">Layanan Laundry</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <section class="site-section mb-4">
    <div class="container">
      <div class="row">
        <div class="col-md-6 blog-content">
          <div class="mt-3 mb-3">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                @foreach ($laundry[0]->photos as $key => $photo)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></button>
                @endforeach
              </div>
              <div class="carousel-inner">
                @foreach ($laundry[0]->photos as $key => $photo)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                  <img src="{{ asset($photo->picturePath) }}" class="d-block w-100" width="300" height="300">
                </div>
                @endforeach
              </div>
              <button type="button" class="carousel-control-prev" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button type="button" class="carousel-control-next" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="mb-3">
            <h5>Laundry</h5>
            <p class="stars">
              <span class="bi bi-star-fill"></span>
              <span class="bi bi-star-fill"></span>
              <span class="bi bi-star-fill"></span>
              <span class="bi bi-star-fill"></span>
              <span class="bi bi-star-fill muted"></span>
            </p>
            {!!$laundry[0]->description!!}
          </div>
        </div>
        <div class="col-md-6 sidebar">
          @livewire('jenis-laundry')
        </div>
      </div>
    </div>
  </section>
</main>
