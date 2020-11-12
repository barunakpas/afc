@extends('frontend.layouts.master')
@section('title', 'News')
@section('content')
    <section class="bg-half d-table w-100" style="background: url('{{ asset('image/product/login_1.jpg') }}') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title text-white title-dark"> News</h4>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">AFC</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">News</li>
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

    <!-- Blog STart -->
    <section class="section">
        <div class="container">
            @if(count($datas) > 0)
            <div class="row">
                    @foreach($datas as $data)
                    <div class="col-lg-4 col-md-6 mb-4 pb-2">
                        <div class="card blog rounded border-0 shadow overflow-hidden">
                            <div class="position-relative">
                                <img src="{{ asset('image/blog/'.$data->image) }}" class="card-img-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body content">
                                <h5><a href="{{ route('news_detail', $data->slug) }}" class="card-title title text-dark">{{ $data->title }}</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-3">
                                    <ul class="list-unstyled mb-0">
                                        <li class="list-inline-item mr-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="mdi mdi-heart-outline mr-1"></i>{{ $data->view }}</a></li>
                                    </ul>
                                    <a href="{{ route('news_detail', $data->slug) }}" class="text-muted readmore">Read More<i class="mdi mdi-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light date"><i class="mdi mdi-calendar-check"></i> {{ date('d M Y', strtotime($data->created_at)) }}</small>
                            </div>
                        </div>
                    </div><!--end col-->
                    @endforeach

                <!-- PAGINATION START -->
                {{ $datas->links() }}
                <!--div class="col-12">
                    <ul class="pagination justify-content-center mb-0">
                        <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous">Prev</a></li>
                        <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next">Next</a></li>
                    </ul>
                </div--><!--end col-->
                <!-- PAGINATION END -->
            </div><!--end row-->

            @else
                <h4 style="text-align: center">News Not Found ...</h4>
            @endif
        </div><!--end container-->
    </section><!--end section-->
    <!-- Blog End -->
@endsection