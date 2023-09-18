<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href=" {{ asset('assets/css/styles.css') }} " rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        @yield('style')
    </head>

    <body class="sb-nav-fixed">
        <!-- Top Navigation -->
        @include('include.adminNav')


        <div id="layoutSidenav">
            <!-- Side Bar Navigation -->
            <div id="layoutSidenav_nav">


                @include('include.adminSidebar')

            </div>

            <!-- Body Content -->
            <div id="layoutSidenav_content">

                <main>

                    @yield('content')

                </main>

                @include('include.adminFooter')

            </div>
        </div>
        @yield('script')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
        </script>
        <script src=" {{ asset('assets/demo/chart-area-demo.js')}} "></script>
        <script src=" {{ asset('assets/demo/chart-bar-dashboard.js') }} "></script>
        <script src=" {{ asset('assets/demo/chart-bar-stock.js') }} "></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
            crossorigin="anonymous"></script>
        <script src=" {{ asset('assets/js/datatables-simple-demo.js') }} "></script>
    </body>

</html>