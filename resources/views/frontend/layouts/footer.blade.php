<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                <a href="{{ route('home') }}" class="logo-footer" style="padding: 5px; background: white; border-radius: 5px;">
                    <img src="{{ asset('image/'.GeneralHelp::general()->logo) }}" height="24" alt="">
                </a>
                <p class="mt-4">
                    Komitmen kami bagi Indonesia menyediakan All Natural Supplement dengan kualitas terbaik dari bahan bahan anti aging super premium yang sudah mendapatkan patent dan penghargaan Internasional dengan Marketing Plan terbaik di Indonesia saat ini.
                </p>
            </div><!--end col-->
            
            <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h4 class="text-light footer-head">Kontak Kami</h4>
                <ul class="list-unstyled footer-list mt-4">
                    <li><a href="page-services.html" class="text-foot"><i class="mdi mdi-phone mr-1"></i> {{ GeneralHelp::general()->phone }}</a></li>
                    <li><a href="page-team.html" class="text-foot"><i class="mdi mdi-whatsapp mr-1"></i> {{ GeneralHelp::general()->whatsapp }}</a></li>
                    <li><a href="page-pricing.html" class="text-foot"><i class="mdi mdi-email mr-1"></i> {{ GeneralHelp::general()->email }}</a></li>
                    <li><a href="page-aboutus.html" class="text-foot"><i class="mdi mdi-map-marker mr-1"></i>{{ GeneralHelp::general()->address }}</a></li>
                </ul>
            </div><!--end col-->

            <div class="col-lg-4 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <h4 class="text-light footer-head">Sosial Media</h4>
                <p class="mt-4">Dapatkan Informasi Lainnya di Sosial Media AFC</p>
                <ul class="list-unstyled social-icon social mb-0 mt-4">
                    @foreach(GeneralHelp::sosmed() as $sosmed)
                    <li class="list-inline-item">
                        <a href="{{ $sosmed->url }}" target="_blank" class="rounded">
                            <span class="mdi {{ $sosmed->icon }}"></span>
                        </a>
                    </li>
                    @endforeach
                </ul><!--end icon-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer>
<footer class="footer footer-bar">
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="text-sm-left">
                    <p class="mb-0">© {{ date('Y') }} AFC. Design with <a href="indowebapps.com" target="_blank">Indowebapps</a></p>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</footer><!--end footer-->
<!-- Footer End -->