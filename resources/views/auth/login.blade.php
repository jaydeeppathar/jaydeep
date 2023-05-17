<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title>Login Page - Allied</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/app-assets/css/pages/authentication.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminTheme/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <style type="text/css">
        .overlay {
          position: fixed;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          background: rgba(0, 0, 0, 0.7);
          transition: opacity 500ms;
          visibility: hidden;
          opacity: 0;
        }
        .overlay:target {
          visibility: visible;
          opacity: 1;
        }

        .popup {
          margin: 20% auto;
          padding: 20px;
          background: #fff;
          border-radius: 5px;
          width: 30%;
          position: relative;
          transition: all 5s ease-in-out;
        }

        .popup h2 {
          margin-top: 0;
          color: #333;
          font-family: Tahoma, Arial, sans-serif;
        }
        .popup .close {
          position: absolute;
          top: 20px;
          right: 30px;
          transition: all 200ms;
          font-size: 30px;
          font-weight: bold;
          text-decoration: none;
          color: #333;
        }
        .popup .close:hover {
          color: #06D85F;
        }
        .popup .content {
          max-height: 30%;
          overflow: auto;
        }

        @media screen and (max-width: 700px){
          .popup{
            width: 70%;
          }
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="{{ route('dashboard') }}" class="brand-logo">
                                    <img src="{{ asset('frontTheme/img/light-logo.png') }}" style="height:100px;">
                                </a>

                                <h4 class="card-title mb-1">Welcome to Allied! 👋</h4>
                                {{-- @if($error = Session::get('error'))
                                  <div class="alert alert-danger error alert-danger-cum" style="padding:10px !important;">
                                      {{ $error }}
                                  </div>
                                @endif --}}
                                @if (session('success'))
                                    <h4 class="alert alert-danger" role="alert">
                                          {{ session('success') }}
                                    </h4>
                                @endif
                                <form method="POST" class="auth-login-form mt-2" action="{{ route('login.post') }}">
                                    @csrf
                                    <div class="mb-1">
                                        <label for="login-email" class="form-label">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" placeholder="Enter Email" aria-describedby="login-email" tabindex="1" required autocomplete="email" autofocus />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong> 
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Password</label>
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">
                                                    <small>Forgot Password?</small>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror" id="login-password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password"  required autocomplete="current-password" />
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember-me" tabindex="3" {{ old('remember') ? 'checked' : '' }} />
                                            <label class="form-check-label" for="remember-me"> Remember Me </label>
                                        </div>
                                    </div>
                                    <p class="mb-1">
                                        <a href="">I forgot my password</a>
                                    </p>
                                    <p class="mb-0">
                                        <a href="{{ route('register')}}" class="text-center">Register</a>
                                    </p>
                                    <button type="submit" class="btn btn-primary w-100" tabindex="4">Login</button>
                                </form>

                                {{-- <p class="text-center mt-2">
                                    <span>New on our platform?</span>
                                    <a href="auth-register-basic.html">
                                        <span>Create an account</span>
                                    </a>
                                </p> --}}
                            </div>
                        </div>
                        <!-- /Login basic -->
                    </div>
                </div>

            </div>
        </div>
    </div>    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('adminTheme/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('adminTheme/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('adminTheme/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('adminTheme/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('adminTheme/app-assets/js/scripts/pages/auth-login.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>