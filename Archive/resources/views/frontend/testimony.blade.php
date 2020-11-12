@extends('frontend.layouts.master')
@section('title', 'Testimony')
@section('content')
 <section class="bg-half d-table w-100" style="background: url('{{ asset('image/product/login_1.jpg') }}') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title text-white title-dark"> Testimony</h4>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">AFC</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Testimony</li>
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

	<!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <ul class="col container-filter list-unstyled categories-filter text-center mb-0" id="filter">
                    <li class="list-inline-item"><a class="categories border d-block text-dark rounded active" data-filter="*">All</a></li>
                    @foreach($products as $product)
                    <li class="list-inline-item"><a class="categories border d-block text-dark rounded" data-filter=".product-{{ $product->id }}">{{ $product->name }}</a></li>
                    @endforeach
                </ul>
            </div><!--end row-->

            <div class="row projects-wrapper">
                @foreach($testimonies as $testimony)
                <div class="col-lg-3 col-md-6 col-12 mt-4 pt-2 product-{{ $testimony->product_id }}">
                    <div class="card border-0 work-container work-classic">
                        <div class="card-body p-0">

                            <img src="{{ asset('image/testimony/'.$testimony->image) }}" class="img-fluid rounded work-image" alt="">
                            @if($testimony->video != null || $testimony->video != "")
                            <div style="position: absolute; bottom: 10px; right: 10px; background: red; border-radius: 5px; padding: 5px 10px;">
                                <a href="{{ $testimony->video }}" target="_blank" class=" title-dark text-light mb-2"><i class="mdi mdi-play play-icon-circle text-center d-inline-block mr-2 rounded-circle text-white title-dark position-relative play play-iconbar"></i> TONTON VIDEO</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div><!--end col-->
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->

@endsection
@section('scripts')
	<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
     <script src="{{ asset('frontend/js/isotope.js') }}"></script>
	<script src="{{ asset('frontend/js/portfolio.init.js') }}"></script>
@endsection	