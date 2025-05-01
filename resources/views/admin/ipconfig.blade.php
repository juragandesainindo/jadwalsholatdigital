<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('adminKit/css/bootstrap.min.css') }}">

    <title>IPCONFIG</title>

    <link rel="website icon" type="svg" href="{{ asset('assets/img/logo2.svg') }}">

    <link href="{{ asset('adminKit/css/app.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="main">

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3"><strong>Network Information</strong></h1>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Admin Panel URL</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="globe"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="mb-5">{{ $adminUrl }}</h3>
                                    <h3>{!! $qrCode !!}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>


    <script src="{{ asset('adminKit/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminKit/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('adminKit/js/app.js') }}"></script>


</body>

</html>