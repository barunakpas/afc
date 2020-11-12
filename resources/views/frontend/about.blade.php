@extends('frontend.layouts.master')
@section('content')
<section class="bg-half d-table w-100" style="background: url('{{ asset('image/product/login_1.jpg') }}') center center;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h4 class="title text-white title-dark"> Join AFC</h4>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">AFC</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Join AFC</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- Hero End -->

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-md-2 d-none d-md-block">
                        <ul class="list-unstyled text-center sticky-bar social-icon mb-0">
                            <li class="mb-3 h6">Share</li>
                            <li><a href="http://www.facebook.com/sharer.php?u={{route('about')}}" target="_blank" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                            <li><a href="https://twitter.com/share?url={{route('about')}}&text=Join AFC&hashtags=afc" target="_blank" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                        </ul><!--end icon-->
                    </div>

                    <div class="col-md-10">
                        
                        <img src="{{ asset('image/'.$data->banner) }}" class="img-fluid rounded-md shadow" alt="">

                        <h5 class="mt-4">{{ $data->title }}</h5>

                        <p class="text-muted">{!! $data->description !!}</p>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Beli Paket</h4>
                    <p class="text-muted para-desc mb-0 mx-auto">Beli paket <span class="text-primary font-weight-bold">AFC</span> lebih murah</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row align-items-center">
            @foreach($packages as $package)
            <div class="col-md-4 col-12 mt-4 pt-2">
                <div class="card pricing-rates business-rate shadow bg-light rounded text-center border-0" @if($package->highlight == 1) style="background: #dcdcdc !important;" @else style="background: #fffff !important" @endif>
                    <div class="card-body py-5">

                        <img src="{{ asset('image/package/'.$package->image) }}" alt="{{ $package->name }}" width="100%" style="padding:0px 20px; margin-bottom: 20px;">
                        <h2 class="title text-uppercase mb-4">{{ $package->name }}</h2>
                        <div class="justify-content-center mb-4">
                            <span style="text-decoration: line-through; color:red">Rp. {{ number_format($package->promo_price) }}</span><br>
                            <h3>Rp. {{ number_format($package->price) }}</h3>
                        </div>
                        
                        <ul class="list-unstyled mb-0 pl-0">
                            <li class="h6 text-muted mb-0"><span class="text-primary h5 mr-2"><span class="uim-svg" style=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><path class="uim-primary" d="M10.3125,16.09375a.99676.99676,0,0,1-.707-.293L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328l-6.1875,6.1875A.99676.99676,0,0,1,10.3125,16.09375Z" opacity=".99"></path><path class="uim-tertiary" d="M12,2A10,10,0,1,0,22,12,10.01146,10.01146,0,0,0,12,2Zm5.207,7.61328-6.1875,6.1875a.99963.99963,0,0,1-1.41406,0L6.793,12.98828A.99989.99989,0,0,1,8.207,11.57422l2.10547,2.10547L15.793,8.19922A.99989.99989,0,0,1,17.207,9.61328Z"></path></svg></span></span>{{ $package->sort_desc }}</li>
                        </ul>
                        <a href="whatsapp://send?phone={{GeneralHelp::general()->whatsapp}}&text={{$package->whatsapp_message}}" class="btn btn-primary mt-4">Pesan Sekarang</a>
                    </div>
                </div>
            </div><!--end col-->
            @endforeach
        </div><!--end row-->
    </div><!--end container-->
    <!-- Price End -->
</section>

@endsection