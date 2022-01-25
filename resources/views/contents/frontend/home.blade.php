@extends('layouts.frontend')
@section('content')
<!-- promosi -->
{{-- <div class="promosi pt-3 pb-3">
    <div class="container text-center blink_me">
        HIJUB GREAT DEALS 12.12, Get Extra Disc. Rp120.000,- Min. Purchase Rp200.000,-. Kode GS-120
    </div>
</div> --}}
<!-- end promosi -->
<!-- carausel -->
<div id="carouselId" class="carousel slide" data-bs-ride="carousel">
    {{-- <ol class="carousel-indicators">
        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
    </ol> --}}
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img src="{{asset('assets/img/photo1.png')}}" class="img-fluid w-100" id="gambar_slider" alt="First slide">
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/img/photo2.png')}}" class="img-fluid w-100" id="gambar_slider" alt="Second slide">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-9 mx-auto">
            <!--product -->
            <div class="product">
                <h4 class="mb-4"><b>Terbaru</b></h4>
                @include('components.frontend.produk_list')
            </div>
            <!-- end product -->
            <div class="official mt-3">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="official-content">
                            <h4><b>Offline Stores</b></h4>
                            <p>Saat ini kami memiliki 2 toko yang tersebar di seluruh jabodetabek dan akan terus berkembang</p>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <img src="{{ asset('assets/img/offline_store.jpeg') }}" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')

@endsection