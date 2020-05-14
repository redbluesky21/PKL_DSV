<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                background: url("/assets/images/bgtop.png");
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 43px;
            }

            .title2{
                font-size: 30px;
                color: #e7e7e7;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .btn2{
                font-size: 43px;
                background-color: white;
                color: black;
                border-radius: 42px;
                padding: 50% auto
            }
            .btn2:hover {
                background-color: #e7e7e7; color: black;
                color: black;
            }
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <b> DIGITAL CERTIFICATE VALIDATION </b>
                 </div>                                         
                <div>
                    <a href="{{ route('login') }}">
                    <img src="{{URL::asset('/assets/images/DIlogo.png')}}" alt="logo diskominfo batu" height="auto" width="25%">
                    </a>
                </div>
                <div class="title2 m-b-md">
                    <a href="https://diskominfo.batukota.go.id/" style="text-decoration: none;color: white;">
                    <img src="{{URL::asset('/assets/images/KBlogo.png')}}" alt="logo kabupaten batu" height="auto" width="20px">
                    <b> DINAS KOMUNIKASI DAN INFORMATIKA KOTA BATU </b>
                    </a>
                 </div>  

            </div>
        </div>
    </body>
</html>
