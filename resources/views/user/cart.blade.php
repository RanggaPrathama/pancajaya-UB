@extends('layout.layoutUser')

@section('content')

<section class="section-gap">
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-12">
                <h2>Keranjang Saya</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($carts as $cart )
            <div class="col-lg-12 py-3" data-idproduct="{{$cart->id_product}}" data-quantity="{{$cart->quantity}}" data-hargaproduct="{{$cart->harga_product}}">
               <div class="card">
                <div class="row">

                    <div class="col-lg-4">
                      <div style="margin:10px; display:flex; align-items:center; justify-content:center; background-size: cover; width:300px; height:300px; background-position:center; background-repeat:no-repeat ">
                        <img src="{{asset('product/'.$cart->gambar_product)}}" style="width: 100%; height:auto; object-fit:cover" alt="">
                      </div>
                    </div>

                    <div class="col-lg-8 d-flex align-items-center">

                        <div class="d-flex align-content-center flex-column">
                            <form id="formPembayaran" method="POST" action="{{route('pemesanan.store')}}">
                                @csrf
                            <h2 class="py-3">{{$cart->nama_product}}</h2>
                            <p>harga : {{$cart->harga_product}}</p>
                            <input type="number " value="{{$cart->quantity}}" min="1" name="quantity" class="quantity form-control my-3">
                            <input type="hidden" class="totalHarga" name="totalHarga" >
                        </div>

                    </div>
                </div>
               </div>
            </div>
            @endforeach


        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12 text-end">
                <div class="d-flex text-end justify-content-end">
                    <h4  class="px-5">Total : <span class="subtotalDisplay" style="color: red"> </span></h4>
                <button class="btn btn-success px-3 py-2 buttonPembayaran">Bayar Sekarang </button>
                </div>
            </form>
            </div>
        </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script>
    $(document).ready(function(){
    let data = [];
    $('[data-idproduct]').each(function(){
        data.push({
            'id_product' : $(this).data('idproduct'),
            'quantity' : $(this).data('quantity'),
            'harga_product' : $(this).data('hargaproduct')
        })


        let updateSubtotal = function() {
                let subtotal = 0;
                data.forEach(item => {
                    subtotal += item.quantity * item.harga_product;
                });

               $('.totalHarga').val(subtotal)
               let total = $('.totalHarga').val()
                console.log(total);
                $('.subtotalDisplay').text(subtotal.toLocaleString(
                    'id-ID', {
                        style: 'currency',
                        currency: 'IDR'
                    }
                ));
            };

            updateSubtotal();

            $('.quantity').on('input', function() {
                let id = $(this).data('id');
                let newQuantity = parseInt($(this).val());
                let index = data.findIndex(item => item.idDetail_cookies === id);
                if (index !== -1) {
                    data[index].quantity = newQuantity;
                    updateSubtotal();
                    console.log(data)

                }
                console.log(data);
            });

            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '.buttonPembayaran', function(e) {
        e.preventDefault();

        let form = $('#formPembayaran');
        let totalHarga = $('.totalHarga').val();

        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: {
                dataCart: JSON.stringify(data),
                totalHarga: totalHarga
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: "Data Tersimpan!",
                        text: "Silahkan Klik Melanjutkan Pemesanan!",
                        icon: "success"
                    }).then(function(){
                        window.location.href = `/pembayaran/${response.data}`;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message || 'Something went wrong!',
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        });
    });



    })
});
  </script>
@endsection
