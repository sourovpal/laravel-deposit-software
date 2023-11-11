
<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from coderthemes.com/moltran/layouts/blue-vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2023 07:47:10 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Login In to Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{ asset('backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-stylesheet" />
        <style>
            .form-error{
                font-size:12px;
                padding:6px 0px;
                color:#ff0058;
            }
        </style>
    </head>

    <body class="authentication-page">

        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-header bg-img p-5 position-relative">
                                <div class="bg-overlay"></div>
                                <h4 class="text-white text-center mb-0">Sign In to Dashboard</h4>
                            </div>
                            <div class="card-body p-4 mt-2">
                                <form method="post" action="" class="p-3">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <input class="form-control" name="email" type="email" required=""  placeholder="Email">
                                        @error('email') <span class="d-block form-error">{{ $message }}</span> @enderror
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                        @error('password') <span class="d-block form-error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group text-center mt-5 mb-4">
                                        <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> Log In </button>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-sm-7 mx-auto">
                                            <a href="pages-recoverpw.html"><i class="fa fa-lock mr-1"></i> Forgot your password?</a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <!-- end row -->

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
        </div>

        <!-- Vendor js -->
        <script src="{{ asset('backend/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/js/app.min.js') }}"></script>

    </body>


</html>