@extends('layout.layoutUser')

@section('content')
<section class="section-gap">
    <div class="container ">
        <div class="row py-5">
            <div class="col-lg-12">
                <h2>Pembayaran</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('pembayaran.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" id="name" class="form-control" value="{{auth()->user()->name}}" disabled>
                </div>
                <div class="form-group">
                    <label for="phone">No Hp:</label>
                    <input type="text" value="{{auth()->user()->no_hp}}" name="no_hp" id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" class="form-control" value="{{auth()->user()->email}}" disabled>
                </div>
                <div class="form-group">
                    <label for="address">Alamat:</label>
                    <input type="text" name="alamat" id="address" value="{{auth()->user()->alamat}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="shipping">Ongkir:</label>
                    <select id="shipping" name="id_ongkir" class="form-control">
                        @foreach ($ongkirs as $ongkir )
                        <option value="{{$ongkir->id_ongkir}}" >{{$ongkir->nama_ongkir}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="total">Total:</label>
                    <input type="number" id="total" class="form-control" value="{{$pemesanans->total_nilai}}" disabled>
                </div>
            </div>
        </div>

        <div class="row py-3">
            <div class="col-lg-12 d-flex align-items-center">
                <h5>Metode Pembayaran</h5>
                <div class="d-flex flex-column mx-5 text-center">
                    <img width="100" height="100" src="{{asset('payment/'.$payments->gambar_payment)}}" alt="">
                    <h6>{{$payments->no_rekening}}</h6>
                    <input type="hidden" name="id_payment" value="{{$payments->id_payment}}">
                    <input type="hidden" name="totalPembayaran" value="{{$pemesanans->total_nilai}}">
                    <input type="hidden" name="id_pemesanan" value="{{$pemesanans->id_pemesanan}}">
                </div>
            </div>
        </div>

        <div class="row py-3">
            <div class="col-lg-12 d-flex align-items-center">
                <div class="form-group">
                    <label for="paymentProof">Upload Bukti Bayar:</label>
                    <input type="file" name="buktiBayar" id="paymentProof" class="form-control" style="max-width: 400px;">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 text-end">
                <button type="submit" class="btn btn-success px-4 py-2">Buat Pesanan</button>
            </div>
        </div>
    </form>
    </div>
</section>

@endsection
