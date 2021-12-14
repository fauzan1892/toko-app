@extends('layouts.frontend')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-9 mx-auto">
            <!--product -->
            <div class="product">
                <h4 class="mb-4"><b>{{ $title }}</b></h4>
                @include('components.frontend.produk_list')
                <br>
                {{ $produk->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')

@endsection