<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Melody - Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/images/favicon.png') }}">
    {{-- <link href="plugins/sweetalert/css/sweetalert.css" rel="stylesheet"> --}}
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="/">
                                    <h4>Login</h4>
                                </a>

                                <form action="/login" method="POST" class="mt-5 mb-5 login-input">
                                    @csrf
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control"
                                            value="{{ Session::get('email') }}" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control"
                                            value="{{ Session::get('password') }}" placeholder="Password" required>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">Sign
                                        In</button>
                                </form>
                                {{-- <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html"
                                        class="text-primary">Sign Up</a> now</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ asset('admin/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/settings.js') }}"></script>
    <script src="{{ asset('admin/js/gleek.js') }}"></script>
    <script src="{{ asset('admin/js/styleSwitcher.js') }}"></script>
    {{-- <script src="plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="plugins/sweetalert/js/sweetalert.init.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>

@if (Session::get('belumlogin'))
    <script>
        swal("Opps Error", "Silahkan Login Dulu", "error");
    </script>
@endif

@if (Session::get('loginerror'))
    <script>
        swal("Opps Error", "Login Gagal", "error");
    </script>
@endif

@if (Session::get('bukanadmin'))
    <script>
        swal("Opps Error", "Anda Bukan Admin", "error");
    </script>
@endif

@if (Session::get('failed'))
    <script>
        swal("Opps Error", "Login Gagal", "error");
    </script>
@endif

@if (Session::get('logout'))
    <script>
        swal("Well Done", "Anda Berhasil Logout", "success");
    </script>
@endif
