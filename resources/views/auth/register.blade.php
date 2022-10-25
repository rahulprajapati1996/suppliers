<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-signup-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 23 Apr 2022 04:18:05 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Sign Up | {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="assets/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Create New Account</h5>
                                    <p class="text-muted">Get your free {{ env('APP_NAME') }} account now</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form class="needs-validation" novalidate method="post" action="/registration">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3 col-6">
                                                <label for="first_name" class="form-label">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="first_name" class="form-control"
                                                    id="first_name" placeholder="Enter first name" required>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                                @if ($errors->has('first_name'))
                                                <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                                            @endif
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label for="last_name" class="form-label">Last Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="last_name" class="form-control"
                                                    id="last_name" placeholder="Enter last name" required>
                                                <div class="invalid-feedback">
                                                    This field is required.
                                                </div>
                                                @if ($errors->has('last_name'))
                                                <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="mb-3 col-12">
                                            <label for="company" class="form-label">Company Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="company" class="form-control" id="company"
                                                placeholder="Enter company name" required>
                                            <div class="invalid-feedback">
                                                This field is required.
                                            </div>
                                            @if ($errors->has('company'))
                                                <div class="invalid-feedback">{{ $errors->first('company') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-3 col-12">
                                            <label for="email" class="form-label">Email <span
                                                    class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="Enter email address" required>
                                            <div class="invalid-feedback">
                                                This field is required.
                                            </div>
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                        <div class="mb-2 col-12">
                                            <label for="password" class="form-label">Password <span
                                                    class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Enter password" required>
                                            <div class="invalid-feedback">
                                                This field is required.
                                            </div>
                                            @if ($errors->has('password'))
                                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>
                                </div>
                                <div class="mb-4">
                                    <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the
                                        {{env('APP_NAME')}} <a href="#"
                                            class="text-primary text-decoration-underline fst-normal fw-medium">Terms
                                            of Use</a></p>
                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-success w-100" type="submit">Sign Up</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <p class="mb-0">Already have an account ? <a href="/login"
                                class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i>
                            by Themesbrand
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/libs/particles.js/particles.js"></script>
    <script src="assets/js/pages/particles.app.js"></script>
    <script src="assets/js/pages/form-validation.init.js"></script>
</body>

</html>
