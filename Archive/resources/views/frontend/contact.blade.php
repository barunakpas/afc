@extends('frontend.layouts.master')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
 <section class="bg-half d-table w-100" style="background: url('{{ asset('image/product/login_1.jpg') }}') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title text-white title-dark"> Contact</h4>
                        <div class="page-next">
                            <nav aria-label="breadcrumb" class="d-inline-block">
                                <ul class="breadcrumb bg-white rounded shadow mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">AFC</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
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

    <section class="section pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card contact-detail text-center border-0">
                            <div class="card-body p-0">
                                <div class="icon">
                                    <img src="image/icon/bitcoin.svg" class="avatar avatar-small" alt="">
                                </div>
                                <div class="content mt-3">
                                    <h4 class="title font-weight-bold">No. Handpone</h4>
                                    <p class="text-muted">{{ GeneralHelp::general()->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card contact-detail text-center border-0">
                            <div class="card-body p-0">
                                <div class="icon">
                                    <img src="image/icon/Email.svg" class="avatar avatar-small" alt="">
                                </div>
                                <div class="content mt-3">
                                    <h4 class="title font-weight-bold">Email</h4>
                                    <p class="text-muted">{{ GeneralHelp::general()->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card contact-detail text-center border-0">
                            <div class="card-body p-0">
                                <div class="icon">
                                    <img src="image/icon/location.svg" class="avatar avatar-small" alt="">
                                </div>
                                <div class="content mt-3">
                                    <h4 class="title font-weight-bold">Location</h4>
                                    <p class="text-muted">{{ GeneralHelp::general()->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6 pt-2 pt-sm-0 order-2 order-md-1">
                        <div class="card shadow rounded border-0">
                            <div class="card-body py-5">
                                <h4 class="card-title">Get In Touch !</h4>
                                <div class="custom-form mt-4">
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
                                </div><!--end custom-form-->
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-7 col-md-6 order-1 order-md-2">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <img src="{{ asset('image/contact.svg') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container-fluid mt-100 mt-60">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="card map border-0">
                            <div class="card-body p-0">
                                {!! GeneralHelp::general()->map !!}
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
                    }else{
                        $("#sendEmailErr").show();
                    }
                    $("#submit").val('Kirim Pesan');
                    $("#submit").prop('disabled', false);
                },
                error: function(err){
                    $("#sendEmailErr").show();
                    $("#submit").val('Kirim Pesan');
                    $("#submit").prop('disabled', false);
                }
            });

        });
    </script>
@endsection 