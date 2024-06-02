@extends('layout.layoutUser')

@section('content')

<section class="section-gap">
    <div class="container bg-white bg-white-container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center-form">
                <div class="bg-green">
                    <h2 class="py-3 text-center">UD.PANCAJAYA</h2>
                    <form action="{{route('regsiterPost')}}" method="POST" >
                        @csrf
                    <div class="form-container ">

                        <div class="col-lg-7">
                            <input type="text" name="name" placeholder="name" class="form-control my-3 @error('name') is-invalid @enderror ">
                            @error('name')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-container">
                        <div class="col-lg-7">
                            <input type="email" name="email" placeholder="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                             <div class="alert alert-danger">
                                {{$message}}
                             </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-container">
                        <div class="col-lg-7">
                            <input type="password" name="password" class="form-control my-3 @error('password') is-invalid @enderror" placeholder="password " >
                            @error('password')
                            <div class="alert alert-danger">
                               {{$message}}
                            </div>
                           @enderror
                        </div>
                    </div>
                    <div class="form-container">
                        <div class="col-lg-7">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="password confirmation">
                        </div>
                    </div>
                    <div class="button-auth text-center my-3">
                    <button type="submit"  style="margin: 20px 0; padding: 10px 50px; background-color:rgb(46, 77, 46); color:white" class="btn">Register</button>
                    <a style="text-decoration: none; color:black" href=""><p>Sudah Punya Akun ? <span style="color: green" class="text-green-200">Login Akun</span> </p></a>
                </div>
                </div>
            </div>
        </form>
        </div>
    </div>
  </section>
@endsection
