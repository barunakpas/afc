@extends('frontend.layouts.master2')
@section('content')
<!-- Hero Start -->
<!--<section class="bg-half-170 d-table w-100" style="background: url('https://afcultima.com/wp-content/uploads/2019/11/BAHAN_WEBSITE_REVISI_TAMBAHAN-04.jpg') center right;" id="home">
    <div class="container">
        <div class="row position-relative align-items-center ">
            <div class="col-lg-7">
                <div class="title-heading">
                    <h1 class="heading mb-3">Utkusuki</h1>
                    <p class="para-desc text-muted">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap4 html page.</p>
                </div>
            </div>
        </div>
    </div>
</section-->
<section class="mt-70 section-banner">
    <picture>
        <source media="(max-width: 618px)" srcset="{{ asset('image/product/'.$data->banner_small) }}">
        <source media="(min-width: 619px)" srcset="{{ asset('image/product/'.$data->banner) }}">
        <img id="crewimage" src="{{ asset('image/product/'.$data->banner) }}" style="float: right; width: 100%; height: auto;">
        <div class="container-banner">
            <div class="banner-text">
                <div class="font-banner">
                    <h2 class="h2-banner">{{ $data->title }} </h2>
                    <p class="p-banner">{!! $data->description !!}</p>
                </div>
            </div>
        </div>
    </picture>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-5">
                <div class="position-relative">
                    <img src="{{ asset('image/product/'.$data->image) }}" class="rounded img-fluid mx-auto d-block" alt="">
                </div>
            </div><!--end col-->

            <div class="col-lg-7 col-md-7 mt-4 pt-2 mt-sm-0 pt-sm-0">
                <div class="section-title ml-lg-4">
                    <h4 class="title mb-4">{{ $data->title_1 }}</h4>
                    <p class="text-muted">{{ $data->description_1 }}</p>
                    <a href="whatsapp://send?phone={{GeneralHelp::general()->whatsapp}}&text={{$data->whatsapp_message}}" class="btn btn-primary mt-4">Beli Sekarang</a>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <h4 class="title mb-4">{{ $data->name }} Dapat Mengatasi :</span></h4>
        <div class="row">
            @foreach($produkResolves as $produkResolve)
            <div class="col-lg-4 col-md-6 mb-4 pb-2">
                <div class="media key-feature align-items-center p-3 rounded shadow">
                    <div class="icon text-center rounded-circle mr-3">
                        {{ $produkResolve->no }}
                    </div>
                    <div class="media-body">
                        <h4 class="title mb-0">{{ $produkResolve->title }}</h4>
                    </div>
                </div>
            </div><!--end col-->
            @endforeach
            
        </div><!--end row-->
    </div>
</section>

<section class="section">
    <div class="container">

        <div class="row">
            <img src="{{ asset('image/product/'.$data->banner_1) }}" alt="" width="100%">
        </div><!--end row-->
    </div><!--end container-->
</section>

<!-- CTA Start -->
<section class="section bg-cta" data-jarallax='{"speed": 0.5}' style="background: url('{{ asset('image/product/'.$data->banner_2) }}')" id="cta">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-6 text-center">
            </div>
            <div class="col-lg-6 col-md-6 ta-right" >
                <div class="section-title">
                    <h4 class="title title-dark text-white mb-4">{{ $data->title_2 }}</h4>
                    <p class="text-light para-dark para-desc mx-auto">{{ $data->description_2 }}</p>
                </div>
            </div><!--end col-->

        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
<!-- CTA End -->

<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h4 class="title"> Patent {{ $data->name }}</h4>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            @foreach($produkPatens as $produkPaten)
            <div class="col-md-4 col-12 mt-5">
                <div class="features text-center">
                    <div class="image position-relative d-inline-block">
                        <img src="{{ asset('image/product/'.$produkPaten->image) }}" class="avatar avatar-ex-large" alt="">
                    </div>

                    <div class="content mt-4">
                        <h4 class="title-2">{{ $produkPaten->title }}</h4>
                        <p class="text-muted mb-0">{{ $produkPaten->description }}</p>
                    </div>
                </div>
            </div><!--end col-->
            @endforeach
            
        </div><!--end row-->
    </div>
</section>

<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h4 class="title">Manfaat {{ $data->name }}</h4>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-12 mt-4">
                <div id="customer-testi" class="owl-carousel owl-theme">
                    @foreach($produkBenefits as $produkBenefit)
                    <div class="card customer-testi text-center border-0 shadow rounded m-2">
                        <div class="card-body">
                            <img src="{{ asset('image/product/'.$produkBenefit->image) }}" class="" style="width: 100%" alt="">
                            <p class="text-muted mt-4">{{ $produkBenefit->no }}. {{ $produkBenefit->title }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div><!--end col-->
        </div><!--end row-->
        
    </div><!--end container-->
</section>

<section class="section bg-cta" data-jarallax='{"speed": 0.5}' style="background: url('{{ asset('image/product/'.$data->banner_3) }}') right no-repeat" id="cta">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 text-center">
            </div>
            <div class="col-lg-6 col-md-6 ta-right" >
                <div class="section-title">
                    <h4 class="title title-dark text-white mb-4">{{ $data->title_3 }}</h4>
                    <p class="text-light para-dark para-desc mx-auto">{{ $data->description_3 }}</p>
                    <a href="whatsapp://send?phone={{GeneralHelp::general()->whatsapp}}&text={{$data->whatsapp_message}}" class="btn btn-primary mt-4">Beli Sekarang</a>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section><!--end section-->
@endsection

@section('scripts')
@endsection