@extends('frontend.layouts.master')
@section('content')
 <section class="bg-half d-table w-100" style="background: url('{{ asset('image/product/login_1.jpg') }}') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title text-white title-dark"> FAQ</h4>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">AFC</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
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

                <div class="col-lg-8 col-md-7 col-12">

                    <div class="section-title mt-5" id="general">
                        <h4>Pertanyaan Umum</h4>
                    </div>

                    <div class="faq-content mt-4 pt-3">
                        <div class="accordion" id="accordionExampleone">
                            @foreach($faqs as $faq)
                            <div class="card border-0 rounded mb-2">
                                <a data-toggle="collapse" href="#collapse-{{$faq->id}}" class="faq position-relative collapsed" aria-expanded="false" aria-controls="collapseone">
                                    <div class="card-header border-0 bg-light p-3 pr-5" id="headingfifone">
                                        <h6 class="title mb-0"> {{$faq->question}}</h6>
                                    </div>
                                </a>
                                <div id="collapse-{{$faq->id}}" class="collapse" aria-labelledby="headingfifone" data-parent="#accordionExampleone" style="">
                                    <div class="card-body px-2 py-4">
                                        <p class="text-muted mb-0 faq-ans">{{$faq->answer}}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>
@endsection