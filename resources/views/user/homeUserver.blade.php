@extends('layout.layoutUser')

@section('content')
<section class="section-gap">
    <div class="container">
      <div class="row">
        @auth


          <div class="col-lg-12 text-end">
             <a href="{{route('katalog')}}"> <button class="btn btn-success mx-2">PRODUK</button></a>

          </div>
          @endauth
      </div>
    </div>
  </section>

  <section class="section-gap">
      <div class="container box-about d-flex justify-content-center align-items-center">
          <div class="row align-items-stretch">
              <div class="col-lg-4 about-img my-auto mx-auto">
                  <img class=""  src="{{asset('images/about.png')}}" alt="">
              </div>
              <div class="col-lg-7 about-content d-flex flex-column">
                  <h2 class="text-center py-5">Tentang Kami</h2>
                  <p class="px-4 flex-grow-1">Kami adalah perusahaan yang menyediakan berbagai jenis
                      produk beton, termasuk paving block, batako, batu split.
                      Kami menawarkan produk-produk yang berkualitas tinggi dan memiliki banyak pilihan untuk memenuhi kebutuhan
                      pelanggan kami. Kami mengutamakan kualitas dan kepuasan pelanggan, dan kami siap membantu anda dengan semua kebutuhan anda tentang produk-produk beton kami</p>
              </div>
          </div>
      </div>
  </section>

  <section class="section-gap">
      <div class="container product-us">
          <div class="row d-flex justify-content-center align-items-center text-center">

          <div class="col-lg-12 py-4">
              <h1 class="text-center">Produk Kami</h1>
          </div>

        <div class="product-img   ">
          <div class="col-lg-4  ">
              <img class="my-2 " src="{{asset('images/batako.png')}}" alt="">
              <h2>Batako</h2>
          </div>

          <div class="col-lg-4 ">
              <img class="" src="{{asset('images/paving.png')}}" alt="">
              <h2>Paving</h2>
          </div>

          <div class="col-lg-4 ">
              <img class="" src="{{asset('images/batuSplit.png')}}" alt="">
              <h2>Batu Split</h2>
          </div>
        </div>
      </div>
      </div>
  </section>

  <section class="section-gap">
      <div class="container box-product d-flex justify-content-center align-items-center">
          <div class="row align-items-stretch">
              <div class="col-lg-4 product-img my-auto mx-auto">
                  <img class=""  src="{{asset('images/batako.png')}}" alt="">
              </div>
              <div class="col-lg-7 align-items-center product-content d-flex d-flex align-items-center">

                  <p class="px-4 flex-grow-1">Dengan menggunakan <strong>batako</strong>, anda bisa mendapatkan
                      dinding yang lebih kokoh dan kuat dibandingkan
                      material lainnya.</p>
              </div>
          </div>
      </div>
  </section>

  <section class="section-gap">
      <div class="container box-product d-flex justify-content-center align-items-center">
          <div class="row ">
              <div class="col-lg-7 product-content d-flex align-items-center">

                  <p class="px-4 flex-grow-1"><strong>Paving Block</strong> produk beton pracetak yang terbuat dari
                      campuran bahan bangunan seperti semen portland,
                      pasir, batu screening,air dan material agregat lainnya</p>
              </div>
              <div class="col-lg-4 product-img my-auto mx-auto">
                  <img class=""  src="{{asset('images/paving2.png')}}" alt="">
              </div>
          </div>
      </div>
  </section>

  <section class="section-gap">

      <div class="container box-pelanggan ">
          <div class="row">
              <div class="col-lg-12 py-3 px-3">
                  <h2>Review Pelanggan</h2>
              </div>
          </div>
          <div class="row  d-flex justify-content-center align-items-center">
              <div class="col-lg-3 img-pelanggan text-center">
                  <img src="{{asset('images/user.png')}}" alt="">
                  <p>ariyasela@gmail.com</p>
              </div>
              <div class="col-lg-3 img-pelanggan text-center">
                  <img src="{{asset('images/user.png')}}" alt="">
                  <p>ariyasela@gmail.com</p>
              </div>
              <div class="col-lg-3 img-pelanggan text-center">
                  <img src="{{asset('images/user.png')}}" alt="">
                  <p>ariyasela@gmail.com</p>
              </div>
          </div>
      </div>
  </section>

@endsection
