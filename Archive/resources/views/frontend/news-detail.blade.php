@extends('frontend.layouts.master')
@section('content')
 <section class="bg-half d-table w-100" style="background: url('{{ asset('image/product/login_1.jpg') }}') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title text-white title-dark"> {{ $data->title }}</h4>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">AFC</a></li>
                                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('news') }}">News</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail News</li>
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
            <div class="row">
                <!-- BLog Start -->
                <div class="col-lg-8 col-md-6">
                    <div class="card blog blog-detail border-0 shadow rounded">
                        <img src="{{ asset('image/blog/'.$data->image) }}" class="img-fluid rounded-top" alt="">
                        <div class="card-body content">
                            <h6><i class="mdi mdi-tag text-primary mr-1"></i>{{ $data->title }} - {{ date('d M Y', strtotime($data->created_at)) }}</h6>
                            <p class="text-muted mt-3"> {!! $data->desc !!} </p>
                            
                            <div class="post-meta mt-3 mb-3">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-muted like"><i class="mdi mdi-eye mr-1"></i>{{ $data->view }}</a></li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h4 class="widget-title">Bagikan :</h4>
                                <ul class="list-unstyled social-icon mb-0 mt-4">
                                    <li class="list-inline-item"><a href="http://www.facebook.com/sharer.php?u={{route('news_detail', $data->slug)}}" target="_blank" class="rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook fea icon-sm fea-social"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></a></li>
                                    <li class="list-inline-item"><a href="https://twitter.com/share?url={{route('news_detail', $data->slug)}}" target="_blank" class="rounded"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter fea icon-sm fea-social"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></a></li>
                                </ul><!--end icon-->
                            </div>
                        </div>
                    </div>

                    <!--div class="card shadow rounded border-0 mt-4">
                        <div class="card-body">
                            <h5 class="card-title mb-0">Related Posts :</h5>

                            <div class="row">
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="card blog rounded border-0 shadow">
                                        <div class="position-relative">
                                            <img src="images/blog/01.jpg" class="card-img-top rounded-top" alt="...">
                                        <div class="overlay rounded-top bg-dark"></div>
                                        </div>
                                        <div class="card-body content">
                                            <h5><a href="javascript:void(0)" class="card-title title text-dark">Design your apps in your own way</a></h5>
                                            <div class="post-meta d-flex justify-content-between mt-3">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="list-inline-item mr-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                                </ul>
                                                <a href="page-blog-detail.html" class="text-muted readmore">Read More <i class="mdi mdi-chevron-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="author">
                                            <small class="text-light user d-block"><i class="mdi mdi-account"></i> Calvin Carlo</small>
                                            <small class="text-light date"><i class="mdi mdi-calendar-check"></i> 13th August, 2019</small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 mt-4 pt-2">
                                    <div class="card blog rounded border-0 shadow">
                                        <div class="position-relative">
                                            <img src="images/blog/02.jpg" class="card-img-top rounded-top" alt="...">
                                        <div class="overlay rounded-top bg-dark"></div>
                                        </div>
                                        <div class="card-body content">
                                            <h5><a href="javascript:void(0)" class="card-title title text-dark">How apps is changing the IT world</a></h5>
                                            <div class="post-meta d-flex justify-content-between mt-3">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="list-inline-item mr-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                                </ul>
                                                <a href="page-blog-detail.html" class="text-muted readmore">Read More <i class="mdi mdi-chevron-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="author">
                                            <small class="text-light user d-block"><i class="mdi mdi-account"></i> Calvin Carlo</small>
                                            <small class="text-light date"><i class="mdi mdi-calendar-check"></i> 13th August, 2019</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div!-->

                </div>
                <!-- BLog End -->

                <!-- START SIDEBAR -->
                <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 sidebar sticky-bar rounded shadow">
                        <div class="card-body">
                            <!-- SEARCH -->
                            <div class="widget mb-4 pb-2">
                                <h4 class="widget-title">Search</h4>
                                <div id="search2" class="widget-search mt-4 mb-0">
                                    <form method="get" action="{{ route('news') }}" class="searchform">
                                        <div>
                                            <input type="text" class="border rounded" name="searchKey" id="searchKey" placeholder="Search Keywords..." required="">
                                            <input type="submit" id="searchsubmit" value="Search">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- SEARCH -->

                            <!-- CATAGORIES -->
                            <!--div class="widget mb-4 pb-2">
                                <h4 class="widget-title">Catagories</h4>
                                <ul class="list-unstyled mt-4 mb-0 blog-catagories">
                                    <li><a href="jvascript:void(0)">Finance</a> <span class="float-right">13</span></li>
                                    <li><a href="jvascript:void(0)">Business</a> <span class="float-right">09</span></li>
                                    <li><a href="jvascript:void(0)">Blog</a> <span class="float-right">18</span></li>
                                    <li><a href="jvascript:void(0)">Corporate</a> <span class="float-right">20</span></li>
                                    <li><a href="jvascript:void(0)">Investment</a> <span class="float-right">22</span></li>
                                </ul>
                            </div-->
                            <!-- CATAGORIES -->

                            <!-- RECENT POST -->
                            <div class="widget mb-4 pb-2">
                                <h4 class="widget-title">Recent Post</h4>
                                <div class="mt-4">
                                    @foreach($resentPosts as $resentPost)
                                    <div class="clearfix post-recent">
                                        <div class="post-recent-thumb float-left"> <a href="{{ route('news_detail', $resentPost->slug) }}"> <img alt="{{ $resentPost->title }}" src="{{ asset('image/blog/'.$resentPost->image) }}" class="img-fluid rounded"></a></div>
                                        <div class="post-recent-content float-left"><a href="{{ route('news_detail', $resentPost->slug) }}">{{ $resentPost->title }}</a><span class="text-muted mt-2">{{ date('d M Y', strtotime($resentPost->created_at)) }}</span></div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- RECENT POST -->

                            <!-- TAG CLOUDS -->
                            <!--div class="widget mb-4 pb-2">
                                <h4 class="widget-title">Tags Cloud</h4>
                                <div class="tagcloud mt-4">
                                    <a href="jvascript:void(0)" class="rounded">Business</a>
                                    <a href="jvascript:void(0)" class="rounded">Finance</a>
                                    <a href="jvascript:void(0)" class="rounded">Marketing</a>
                                    <a href="jvascript:void(0)" class="rounded">Fashion</a>
                                    <a href="jvascript:void(0)" class="rounded">Bride</a>
                                    <a href="jvascript:void(0)" class="rounded">Lifestyle</a>
                                    <a href="jvascript:void(0)" class="rounded">Travel</a>
                                    <a href="jvascript:void(0)" class="rounded">Beauty</a>
                                    <a href="jvascript:void(0)" class="rounded">Video</a>
                                    <a href="jvascript:void(0)" class="rounded">Audio</a>
                                </div>
                            </div-->
                            <!-- TAG CLOUDS -->
                            
                        </div>
                    </div>
                </div><!--end col-->
                <!-- END SIDEBAR -->
            </div><!--end row-->
        </div><!--end container-->
    </section>
@endsection