<html lang="en"><head>
        <meta charset="utf-8">
        <title>New User Registration - AFC</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&amp;display=swap" rel="stylesheet">
        <style type="text/css">
        	.btn-primary{
        		background-color: #2f55d4 !important;
			    border: 1px solid #2f55d4 !important;
			    color: #ffffff !important;
			    -webkit-box-shadow: 0 3px 5px 0 rgba(47, 85, 212, 0.3);
			    box-shadow: 0 3px 5px 0 rgba(47, 85, 212, 0.3);
        	}
        </style>
    </head>

    <body style="font-family: Nunito, sans-serif; font-size: 15px; font-weight: 400; overflow: visible;">
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->

        <!-- Hero Start -->
        <section style="align-items: center; padding: 20px 0;">
            <div class="container">
                <div class="row" style="justify-content: center;">
                    <div class="col-lg-6 col-md-8"> 
                        <table style="box-sizing: border-box; width: 100%; border-radius: 6px; overflow: hidden; background-color: #fff; box-shadow: 0 0 3px rgba(60, 72, 88, 0.15);">
                            <thead>
                                <tr style="background-color: #2f55d4; padding: 3px 0; line-height: 68px; text-align: center; color: #fff; font-size: 24px; font-weight: 700; letter-spacing: 1px;">
                                    <th scope="col"><img src="{{ asset('image/'.GeneralHelp::general()->logo) }}" height="24" alt=""></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td style="padding: 48px 24px 0; color: #161c2d; font-size: 18px; font-weight: 600;">
                                        New User Registrasi :
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 24px 24px 0;">
                                        <table style="max-width: 350px">
                                            <tbody>
                                                <tr>
                                                    <td style="min-width: 130px; padding-bottom: 8px;">Name :</td>
                                                    <td style="color: #8492a6;">{{ $data['name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 130px; padding-bottom: 8px;">Email/Phone :</td>
                                                    <td style="color: #8492a6;">{{ $data['email'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 130px; padding-bottom: 8px;">Subject :</td>
                                                    <td style="color: #8492a6;">{{ $data['subject'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="min-width: 130px; padding-bottom: 8px;">Message</td>
                                                    <td style="color: #8492a6;">{{ $data['message'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 15px 24px 15px; color: #8492a6;">
                                        AFC <br> {{ route('home') }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding: 16px 8px; color: #8492a6; background-color: #f8f9fc; text-align: center;">
                                        © {{ date('Y') }} <a href="{{ route('home') }}">AFC.</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <!-- Hero End -->
</body></html>