@extends('frontend.layouts.master')
@section('title', 'AFC')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('frontend/css/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- Hero Start -->
<section class="bg-half-260 bg-primary d-table w-100" style="background: url('{{ asset('image/'.$home_slider->banner) }}') center center;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-heading text-center mt-4">
                    <h1 class="display-4 title-dark font-weight-bold text-white mb-3">{{ $home_slider->title }}</h1>
                    <p class="para-desc mx-auto text-white-50">{{ $home_slider->description }}</p>
                    <div class="mt-4 pt-2">
                        <a href="whatsapp://send?phone={{GeneralHelp::general()->whatsapp}}&text=Saya mau beli produk AFC" class="btn btn-primary"><i class="mdi mdi-chat"></i> Beli Sekarang</a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container--> 
</section><!--end section-->
<!-- Hero End -->

<!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--Shape End-->

<!-- Feature Start -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Product Kami</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Memperkenalkan Terobosan Ilmiah Modern Teknologi Jepang & Inggris Raya</p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            @foreach($products as $product)
            <div class="col-md-6 col-12 mt-4 pt-2">
                <div class="card text-center rounded border-1">
                    <div class="card-body">
                        <div class="p-3 bg-white rounded shadow d-inline-block">
                            <img src="{{ asset('image/product/'.$product->image) }}" class="avatar avatar-small" alt="">
                        </div>
                        <div class="mt-4">
                            <h5><a href="{{ route('product', $product->slug) }}">{{ $product->name }}</a></h5>
                            <p class="mt-3 mb-0">{{ $product->title }}</p>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            
            @endforeach
        </div>
    </div><!--end container-->

</section><!--end section-->
<!-- Feature End -->

@if(count($homeSections) > 0)
    @foreach($homeSections as $homeSection)
    <section class="section @if($homeSection->bg_color == 2) bg-light @endif">
        <div class="container">
            <div class="row align-items-center">
                @if($homeSection->img_loc == 1)
                    @if($homeSection->type == 1)
                        @if($homeSection->description != null || $homeSection->description != "")
                            <div class="col-lg-5 col-md-6 col-12">
                                <img src="{{ asset('image/home-section/'.$homeSection->image) }}" class="img-fluid rounded" alt="">
                            </div><!--end col-->
                        @else
                            <div class="col-lg-12 col-md-12 col-12">
                                <img src="{{ asset('image/home-section/'.$homeSection->image) }}" class="img-fluid rounded" alt="">
                            </div><!--end col-->
                        @endif
                    @endif
                    @if($homeSection->description != null || $homeSection->description != "")
                        @if($homeSection->type == 1)
                            <div class="col-lg-7 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                <div class="section-title ml-lg-4">
                                    <h4 class="title mb-4">{{ $homeSection->title }}</h4>
                                    {!! $homeSection->description !!}
                                </div>
                            </div><!--end col-->
                        @else
                            <div class="col-lg-12 col-md-12 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                <div class="section-title ml-lg-4">
                                    <h4 class="title mb-4 center">{{ $homeSection->title }}</h4>
                                    {!! $homeSection->description !!}
                                </div>
                            </div><!--end col-->
                        @endif
                    @endif
                @else
                    @if($homeSection->description != null || $homeSection->description != "")
                        @if($homeSection->type == 1)
                            <div class="col-lg-7 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                                <div class="section-title ml-lg-4">
                                    <h4 class="title mb-4">{{ $homeSection->title }}</h4>
                                    {!! $homeSection->description !!}
                                </div>
                            </div><!--end col-->
                        @endif
                    @endif
                    @if($homeSection->type == 1)
                        @if($homeSection->description != null || $homeSection->description != "")
                            <div class="col-lg-5 col-md-6 col-12">
                                <img src="{{ asset('image/home-section/'.$homeSection->image) }}" class="img-fluid rounded" alt="">
                            </div><!--end col-->
                        @else
                            <div class="col-lg-12 col-md-12 col-12">
                                <img src="{{ asset('image/home-section/'.$homeSection->image) }}" class="img-fluid rounded" alt="">
                            </div><!--end col-->
                        @endif
                    @endif
                @endif
            </div><!--end row-->
        </div><!--enc container-->
    </section>
    @endforeach
@endif

<section class="section">
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
                <div class="card pricing-rates business-rate shadow bg-light rounded text-center border-0" @if($package->highlight == 1) style="background: #dcdcdc !important;" @endif>
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

<!-- Shape Start -->
<div class="position-relative">
    <div class="shape overflow-hidden text-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!--Shape End-->

<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title mb-4 pb-2">
                    <h4 class="title mb-4">Berita AFC</h4>
                    <p class="text-muted para-desc mx-auto mb-0">Dapatkan informasi menarik mengenai <span class="text-primary font-weight-bold">AFC</span></p>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="card blog rounded border-0 shadow">
                    <div class="position-relative">
                        <img src="{{ asset('image/blog/'.$blog->image) }}" class="card-img-top rounded-top" alt="...">
                    <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="card-body content">
                        <h5><a href="{{ route('news_detail', $blog->slug) }}" class="card-title title text-dark">{{ $blog->title }}</a></h5>
                        <div class="post-meta d-flex justify-content-between mt-3">
                            <ul class="list-unstyled mb-0">
                                <li class="list-inline-item mr-2 mb-0"><a href="javascript:void(0)" class="text-muted like"><i class="mdi mdi-heart-outline mr-1"></i>{{ $blog->view }}</a></li>
                            </ul>
                            <a href="{{ route('news_detail', $blog->slug) }}" class="text-muted readmore">Read More <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="author">
                        <small class="text-light date"><i class="mdi mdi-calendar-check"></i> {{ date('d M Y', strtotime($blog->created_at)) }}</small>
                    </div>
                </div>
            </div><!--end col-->
            @endforeach
        </div><!--end row-->
    </div><!--end container-->
</section>

<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="faq-content mr-lg-5">
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

            <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <img src="{{ asset('frontend/images/illustrator/faq.svg') }}" alt="">
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>

<section class="section" style="background: url('{{ asset('frontend/images/coworking/bg04.jpg') }}') center center;">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="section-title mr-lg-4">
                    <h4 class="title title-dark text-light mb-4">Ayo Buruan Bergabung dengan AFC</h4>
                    <p class="text-light para-dark para-desc mb-0">Semakin Tertarik Untuk Mengkonsumsi SOP SUBARASHI & UTSUKUSHHII Sekarang? SUDAH TERBUKTI KUALITASNYA!</p>
                    <div class="watch-video mt-4 pt-2">
                        <a href="https://www.youtube.com/watch?v=Cp_vghhW3qQ&feature=youtu.be" class="video-play-icon watch title-dark text-light mb-2"><i class="mdi mdi-play play-icon-circle text-center d-inline-block mr-2 rounded-circle text-white title-dark position-relative play play-iconbar"></i> TONTON VIDEO</a>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-6 col-md-6 mt-6 mt-sm-0 pt-2 pt-sm-0">
                <div class="card rounded shadow border-0">
                    <div class="card-body">
                        <h5 class="text-center">Mau Jadi Member</h5>

                        <form id="sendEmail">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Nama <span class="text-danger">*</span></label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <input name="nama" id="nama" type="text" class="form-control pl-5" placeholder="First Name :" required>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group position-relative">
                                        <label>Email / No. Handphone <span class="text-danger">*</span></label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail fea icon-sm icons"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <input name="email" id="email" type="text" class="form-control pl-5" placeholder="Your email :" required>
                                    </div> 
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Subject</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book fea icon-sm icons"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                        <input name="subject" id="subject" type="text" class="form-control pl-5" placeholder="Subject" required>
                                    </div>                                                                               
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="form-group position-relative">
                                        <label>Pesan</label>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle fea icon-sm icons"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                        <textarea name="message" id="message" rows="4" class="form-control pl-5" placeholder="Your Message :" required></textarea>
                                    </div>
                                </div>
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary btn-block" value="Send Message">
                                    <div style="margin-top:10px;padding: 8px; color: #e43f52; background-color: rgba(228, 63, 82, 0.2); border: 1px solid rgba(228, 63, 82, 0.2); border-radius: 6px; text-align: center; font-size: 16px; font-weight: 600; display: none;" id="sendEmailErr">
                                        Kirim pesan gagal, silahkan kirim ulang atau hubungi admin...
                                    </div>

                                    <div style="margin-top:10px;padding: 8px; color: #52af6f; background-color: rgba(103, 173, 166, 0.2); border: 1px solid rgba(38, 123, 40, 0.2); border-radius: 6px; text-align: center; font-size: 16px; font-weight: 600; display: none" id="sendEmailSuc">
                                        Kirim pesan berhasil, anda akan di hubungi oleh admin AFC dalam waktu kurang dari 24 jam, Terimakasih
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div>
                </div>                             
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>

@endsection
@section('scripts')
    <script type="text/javascript">
        $( '#sendEmail' ).on( 'submit', function(e) {
            e.preventDefault();

            var nama = $('#nama').val();
            var email = $('#email').val();
            var subject = $('#subject').val();
            var message = $('#message').val();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
                type: "POST",
                url: 'sendEmail',
                data: { name:nama, email:email, subject:subject, message:message },
                beforeSend: function() {
                    $("#submit").prop('disabled', true);
                    $("#submit").val('Sedang proses kirim...');
                },
                success: function( response ) {
                    if(response.status == 200){
                        $("#sendEmailSuc").show();
                        $("#sendEmailErr").hide();
                    }else{
                        $("#sendEmailErr").show();
                        $("#sendEmailSuc").hide();
                    }
                    $("#submit").val('Kirim Pesan');
                    $("#submit").prop('disabled', false);
                },
                error: function(err){
                    alert(JSON.stringify(err));
                    $("#sendEmailErr").show();
                    $("#sendEmailSuc").hide();
                    $("#submit").val('Kirim Pesan');
                    $("#submit").prop('disabled', false);
                }
            });

        });

    </script>
@endsection