@extends('frontend.layouts.master')
@section('content')
<section class="bg-half d-table w-100" style="background: url('{{ asset('image/product/'.$data->banner) }}') center center;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="page-next-level">
                    <h4 class="title text-white title-dark">{{ $data->title }}</h4>
                    <div class="page-next">
                        <nav aria-label="breadcrumb" class="d-inline-block">
                            <ul class="breadcrumb bg-white rounded shadow mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">AFC</a></li>
                                <li class="breadcrumb-item"><a href="#">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $data->name }}</li>
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
                            <li><a href="http://www.facebook.com/sharer.php?u={{route('product', $data->slug)}}" target="_blank" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                            <li><a href="https://twitter.com/share?url={{route('product', $data->slug)}}" target="_blank" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                        </ul><!--end icon-->
                    </div>

                    <div class="col-md-10">
                        
                        <img src="{{ asset('image/product/'.$data->image) }}" class="img-fluid rounded-md shadow" alt="">
                        <h2 class="mt-4">{{ $data->name }}</h2>
                        <h6><i class="mdi mdi-tag text-primary mr-1"></i>{{ $data->title }}</h6>

                        <p class="text-muted">{!! $data->description !!}</p>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection