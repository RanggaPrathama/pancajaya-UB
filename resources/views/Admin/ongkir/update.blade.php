
@extends('layout.layoutAdmin')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Update Data ongkir</h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">ongkir</li>
        </ol>
      </nav>
      <!-- /resources/views/post/Update.blade.php -->


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Update Post Form -->
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Update ongkir</h5>
                    <form action="{{ route('ongkir.update',$ongkirs->id_ongkir) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                  <div class="col-lg-6">

                      <label for="">Nama ongkir</label>
                      <input type="text" value="{{old('nama_ongkir', $ongkirs->nama_ongkir)}}" name="nama_ongkir" class="form-control  @error('nama_ongkir')
                      is-invalid
                      @enderror" >
                      @error('nama_ongkir')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                      @enderror
                      <br>


                      <label for="">Harga ongkir</label>
                      <input type="number" value="{{old('harga_ongkir', $ongkirs->harga_ongkir)}}" name="harga_ongkir" class="form-control @error('harga_ongkir')
                        is-invalid
                      @enderror" >
                      @error('harga_ongkir')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                      @enderror
                     <br>

                  </div>
                  <div class="text-end py-4" >
                    <button type="submit" class="btn btn-primary"> Update Data</button>
                 </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </section>

  </main><!-- End #main -->
@endsection


