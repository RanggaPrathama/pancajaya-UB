@extends('layout.layoutUser')

@section('content')

<section class="section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="font-weight-bold py-3">Jenis Produk</h2>
            </div>
        </div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

        <div class="row">
            @foreach ($products as $product )
            <div class="col-lg-4">
                <div class="d-flex align-items-center flex-column bg-white py-4">
                    <div class="relative">
                        <div style="width: 250px; background-size:cover; background-position:center; background-repeat:no-repeat">
                            <img style="width: 100%; object-fit:cover" src="{{ asset('product/' . $product->gambar_product) }}" alt="">
                        </div>
                        <div class="icon-circle" data-bs-toggle="modal" data-bs-target="#productModal"
                             data-bs-product-id="{{ $product->id_product }}"
                             data-bs-product-name="{{ $product->nama_product }}"
                             data-bs-product-stock="{{$product->stok}}"
                             data-bs-product-price="{{$product->harga_product}}"
                             data-bs-product-image="{{ asset('product/' . $product->gambar_product) }}">
                            <p style="font-size: 30px; font-weight:bold; margin-top:5px">+</p>
                        </div>
                    </div>
                    <h3 class="pt-3">{{ $product->nama_product }}</h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('cart.store')}}" method="POST">
                    @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <img id="productImage" class="img-fluid" alt="Product Image">
                        </div>
                        <div class="col-lg-8">
                            <h4 id="productName">Product Name</h4>
                            <p id="productStock">Stok: </p>
                            <p id="productPrice">Rp. </p>

                            <div class="quantity my-3">
                                <h5>Jumlah:</h5>
                                <input type="hidden" id="id_product" name="id_product">
                                <input type="number" name="quantity" id="quantity" class="form-control w-25 d-inline-block" value="1" min="1">
                            </div>
                            <div class="total my-3">
                                <h5>Total: Rp. <span id="totalPrice">1.000.000,00</span></h5>
                            </div>
                            <button type="submit" class="btn btn-success">Masukkan Keranjang</button>

                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var productModal = document.getElementById('productModal');
        productModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;

            // Get data from data-bs-* attributes
            var productId = button.getAttribute('data-bs-product-id');
            var productName = button.getAttribute('data-bs-product-name');
            var productStock = button.getAttribute('data-bs-product-stock');
            var productPrice = button.getAttribute('data-bs-product-price');
            var productImage = button.getAttribute('data-bs-product-image');

            // Update the modal's content.
            var modalId = productModal.querySelector('#id_product');
            var modalTitle = productModal.querySelector('.modal-title');
            var modalImage = productModal.querySelector('#productImage');
            var modalName = productModal.querySelector('#productName');
            var modalStock = productModal.querySelector('#productStock');
            var modalPrice = productModal.querySelector('#productPrice');
            var modalTotalPrice = productModal.querySelector('#totalPrice');

            modalId.value = productId;
            modalTitle.textContent = productName;
            modalImage.src = productImage;
            modalName.textContent = productName;
            modalStock.textContent = 'Stok: ' + productStock;
            modalPrice.textContent = 'Rp. ' + productPrice;
            modalTotalPrice.textContent = productPrice * 1;

            // Update total price when quantity changes
            var quantityInput = productModal.querySelector('#quantity');
            quantityInput.addEventListener('input', function() {
                var quantity = quantityInput.value;
                var totalPrice = productPrice * quantity;
                modalTotalPrice.textContent = totalPrice.toLocaleString('id-ID');
            });
        });
    });
</script>

@endsection
