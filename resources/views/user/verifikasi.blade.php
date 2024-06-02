@extends('layout.layoutUser')

@section('content')
<section class="section-gap">
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center align-items-center text-center">
                <div class="d-flex flex-column justify-content-center align-items-center text-center ">
                    <div class="bg-green text-ellipsis align-content-center " style="width: 250px; height:250px; border-radius:50%" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-patch-check-fill text-white" viewBox="0 0 16 16">
                            <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
                          </svg>

                    </div>
                    <div class="content py-4">
                        <h2 >Terimakasih !</h2>
                    <h5>  Bukti pembayaran akan kami kirim melalui email jika berhasil diproses</h5>
                    </div>

                   <a href="{{route('homeUser')}}"> <button class="btn btn-success px-5 py-2">Selesai</button></a>

                </div>
            </div>
        </div>
      </div>
 </section>
@endsection
