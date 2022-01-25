<!doctype html>
<html lang="en">
    <head>
        <title>{{ $title ?? 'App Toko' }}</title>
        <!-- Required meta tags -->
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Toko Codekop Menjual berbagai macam hijab, jaket, aksesoris dan pakaian islami pria dan wanita" name="description">
        <meta content="{{ $title ?? 'App Toko' }}" name="keywords">
        <meta property="og:locale" content="ID_id"/>
        <meta property="og:type" content="website"/>
        <meta property="og:image" content="{{ asset('assets/img/keranjang.png') }}">
        <!-- Bootstrap CSS -->
        <link rel="shortcut icon" href="{{ asset('assets/img/keranjang.png') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <!-- navbar -->
        <nav class="navbar navbar-expand-md navbar-custom shadow-sm py-3 fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-dark pt-2"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                        </li>
                        @foreach($kategori as $r)
                        <li class="nav-item">
                            <a class="nav-link active" 
                                aria-current="page" 
                                href="{{ url('kategori/'.$r->id) }}">
                                {{ $r->nama_kategori }}
                            </a>
                        </li>
                        @endforeach
                        <li class="nav-item">
                            @if(isset(auth()->user()->name))
                                <a class="nav-link active bg-primary text-white" href="{{ url('admin') }}">Dashboard</a>
                            @else 
                                <a class="nav-link active" href="{{ url('login') }}">Login</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#" 
                                data-bs-toggle="modal" data-bs-target="#ModalSearch" 
                                tabindex="-1" aria-disabled="true">
                                <i class="fas fa-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navbar -->
        <!-- main -->
        @php 
            $profil = App\Models\User::where('id', 1)->first();
        @endphp
        <div class="clearfix  mt-5 pt-4"></div>
        <div class="main">
            @yield('content')
        </div>
        <!-- end main -->
        <!-- footer -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <h4>Butuh Bantuan</h4>
                        <p class="pt-2">08:00 - 17:00 WIB / (Senin - Jumat)</p>
                        <i class="fas fa-envelope-square me-2"></i> {{ $profil->email }}
                        <br>
                        <i class="fas fa-map-marker-alt me-2"></i> {{ $profil->address }}
                        <br><br>
                    </div>
                    <div class="col-sm-4">
                        <h4>Tetap Terhubung Dengan Kami</h4>
                        <a href="#" class="text-terhubung"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-terhubung"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-terhubung"><i class="fab fa-news"></i></a>
                        <a href="#" class="text-terhubung"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-terhubung"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-terhubung"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container text-center">
                Copyright &copy; <?= date('Y');?> {{ config('app.name') }} All Reserved
                <br>
                Web Belajar Laravel Codekop.com
            </div>
        </div>
        <!-- end footer -->
        <!-- modal cari -->
        <div class="modal fade" id="ModalSearch" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <i class="fas fa-search mr-2"></i> Cari Produk
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="get" action="{{ url('search') }}">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="keyword" autocomplete="off" class="form-control" placeholder="Search disini !">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal cari -->
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Bootstrap JS -->
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
            crossorigin="anonymous"></script>
        @yield('javascript')
  </body>
</html>