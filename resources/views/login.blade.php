<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SideCampus - Home of Books</title>
    <link rel="shortcut icon" href="{{ url('') }}/public/assets/images/favicon.ico" />
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/typography.css">
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/style.css">
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/responsive.css">
</head>


<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Sign in Start -->


    <section class="sign-in-page">
        <div class="container p-0">
            <div class="row no-gutters height-self-center">
                <div class="col-sm-12 align-self-center page-content rounded">
                    <div class="row m-0">
                        <div class="col-sm-12 sign-in-page-data">

                           

                            <div class="sign-in-from bg-primary rounded">

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                                @endif
                                @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                                @endif


                                <h3 class="mb-0 text-center text-white">Welcome Back!</h3>
                                <p class="text-center text-white">Enter your email address and password to contine.</p>




                                <form class="mt-4 form-text" action="sign-in" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" required class="form-control mb-0 text-black" name="email" id="exampleInputEmail1"
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <a href="sign-in.html#" class="float-right text-dark">Forgot password?</a>
                                        <input type="password" required name="password" class="form-control mb-0 text-black" id="exampleInputPassword1"
                                            placeholder="Password">
                                    </div>
                                    <div class="d-inline-block w-100">
                                        <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="sign-info text-center">
                                        <button type="submit" class="btn btn-white d-block w-100 mb-2">Sign in</button>
                                        <span class="text-dark dark-color d-inline-block line-height-2">Don't have an
                                            account? <a href="sign-up.html" class="text-white">Sign up</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- color-customizer END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ url('') }}/public/assets/js/jquery.min.js"></script>
    <script src="{{ url('') }}/public/assets/js/popper.min.js"></script>
    <script src="{{ url('') }}/public/assets/js/bootstrap.min.js"></script>
    <!-- Appear JavaScript -->
    <script src="{{ url('') }}/public/assets/js/jquery.appear.js"></script>
    <!-- Countdown JavaScript -->
    <script src="{{ url('') }}/public/assets/js/countdown.min.js"></script>
    <!-- Counterup JavaScript -->
    <script src="{{ url('') }}/public/assets/js/waypoints.min.js"></script>
    <script src="{{ url('') }}/public/assets/js/jquery.counterup.min.js"></script>
    <!-- Wow JavaScript -->
    <script src="{{ url('') }}/public/assets/js/wow.min.js"></script>
    <!-- Apexcharts JavaScript -->
    <script src="{{ url('') }}/public/assets/js/apexcharts.js"></script>
    <!-- Slick JavaScript -->
    <script src="{{ url('') }}/public/assets/js/slick.min.js"></script>
    <!-- Select2 JavaScript -->
    <script src="{{ url('') }}/public/assets/js/select2.min.js"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="{{ url('') }}/public/assets/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="{{ url('') }}/public/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="{{ url('') }}/public/assets/js/smooth-scrollbar.js"></script>
    <!-- lottie JavaScript -->
    <script src="{{ url('') }}/public/assets/js/lottie.js"></script>
    <!-- am core JavaScript -->
    <script src="{{ url('') }}/public/assets/js/core.js"></script>
    <!-- am charts JavaScript -->
    <script src="{{ url('') }}/public/assets/js/charts.js"></script>
    <!-- am animated JavaScript -->
    <script src="{{ url('') }}/public/assets/js/animated.js"></script>
    <!-- am kelly JavaScript -->
    <script src="{{ url('') }}/public/assets/js/kelly.js"></script>
    <!-- am maps JavaScript -->
    <script src="{{ url('') }}/public/assets/js/maps.js"></script>
    <!-- am worldLow JavaScript -->
    <script src="{{ url('') }}/public/assets/js/worldLow.js"></script>
    <!-- Raphael-min JavaScript -->
    <script src="{{ url('') }}/public/assets/js/raphael-min.js"></script>
    <!-- Morris JavaScript -->
    <script src="{{ url('') }}/public/assets/js/morris.js"></script>
    <!-- Morris min JavaScript -->
    <script src="{{ url('') }}/public/assets/js/morris.min.js"></script>
    <!-- Flatpicker Js -->
    <script src="{{ url('') }}/public/assets/js/flatpickr.js"></script>
    <!-- Style Customizer -->
    <script src="{{ url('') }}/public/assets/js/style-customizer.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{ url('') }}/public/assets/js/chart-custom.js"></script>
    <!-- Custom JavaScript -->
    <script src="{{ url('') }}/public/assets/js/custom.js"></script>
</body>

</html>
