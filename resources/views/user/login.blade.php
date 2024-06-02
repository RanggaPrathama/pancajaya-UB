@extends('layout.layoutUser')

@section('content')

<section class="section-gap">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="container bg-white bg-white-container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center-form">
                <div class="bg-green">
                    <h2 class="py-3 text-center">UD.PANCAJAYA</h2>
                    <form action="{{route('loginPost')}}" method="POST">
                        @csrf
                    <div class="form-container py-3">
                        <div class="col-lg-7">
                            <input type="email" name="email" placeholder="email" class="form-control my-3">
                        </div>
                    </div>
                    <div class="form-container">
                        <div class="col-lg-7">
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                    </div>
                    <div class="button-auth text-center my-3">
                    <button type="submit"  style="margin: 20px 0; padding: 10px 50px; background-color:rgb(46, 77, 46); color:white" class="btn">Login</button>
                    <a style="text-decoration: none; color:black" href="{{route('register')}}"><p>Belum Punya Akun ? <span style="color: green" class="text-green-200">Buat Akun</span> </p></a>
                </div>
                </div>
            </div>
        </form>
        </div>
    </div>
  </section>
@endsection
