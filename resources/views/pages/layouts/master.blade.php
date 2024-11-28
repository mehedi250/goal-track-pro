<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>@yield('title', 'Page') | {{ config('app.name', 'Laravel') }}</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
  <link href="{{ asset('assets/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />    

  <link id="main-css-href" rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <link href="{{ asset('assets/images/favicon.png') }}" rel="shortcut icon" />


  {{-- <script src="{{ asset('assets/plugins/nprogress/nprogress.js') }}"></script> --}}
</head>
    <body class="navbar-fixed sidebar-fixed" id="body">
        <script>
            NProgress.configure({ showSpinner: false });
            NProgress.start();
        </script>


        <div class="wrapper">
            @include('pages.layouts.sidebar')

            <div class="page-wrapper">
                
                <!-- Header -->
                @include('pages.layouts.header')

                <div class="content-wrapper">
                    @yield('content')
                </div>
                
                <!-- Footer -->
                @include('pages.layouts.footer')

            </div>
        </div>
        
        
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/simplebar/simplebar.min.js') }}"></script>
        {{-- <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script> --}}

        
        
        <script src="{{ asset('assets/plugins/apexcharts/apexcharts.js') }}"></script>
        
        
        
        {{-- <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script> --}}
        
  
        
        <script src="{{ asset('assets/js/mono.js') }}"></script>
        <script src="{{ asset('assets/js/chart.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>


    </body>
</html>
