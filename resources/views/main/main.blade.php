<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SideCampus - Home of Books</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="" {{ url('') }}/public/assets/images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ url('') }}/public/assets/css/responsive.css">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="">
        <!-- TOP Nav Bar -->
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-menu-bt d-flex align-items-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="las la-bars"></i></div>
                        </div>
                        <div class="iq-navbar-logo d-flex justify-content-between">
                            <a href="index.html" class="header-logo">
                                <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
                                <div class="logo-title">
                                    <span class="text-primary text-uppercase">Booksto</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="navbar-breadcrumb">
                        <h5 class="mb-0">Welcome</h5>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Home Page</li>
                            </ul>
                        </nav>
                    </div>
                    <div class="iq-search-bar">
                        {{-- <form action="index.html#" class="searchbox">
                            <input type="text" class="text search-input" placeholder="Search Here...">
                            <a class="search-link" href="index.html#"><i class="ri-search-line"></i></a>
                        </form> --}}
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-label="Toggle navigation">
                        <i class="ri-menu-3-line"></i>
                    </button>


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-list">
                            {{-- <li class="nav-item nav-icon search-content">
                                <a href="index.html#" class="search-toggle iq-waves-effect text-gray rounded">
                                    <i class="ri-search-line"></i>
                                </a>
                                <form action="index.html#" class="search-box p-0">
                                    <input type="text" class="text search-input" placeholder="Type here to search...">
                                    <a class="search-link" href="index.html#"><i class="ri-search-line"></i></a>
                                </form>
                            </li> --}}


                          @auth
                            <li class="line-height pt-3">
                                <a href="index.html#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                    <img src="{{ url('') }}/public/assets/images/user/1.jpg"
                                        class="img-fluid rounded-circle mr-3" alt="user">
                                    <div class="caption">
                                        <h6 class="mb-1 line-height">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h6>
                                        <p class="mb-0 text-primary">Click for more</p>
                                    </div>
                                </a>
                                <div class="iq-sub-dropdown iq-user-dropdown">
                                    <div class="iq-card shadow-none m-0">
                                        <div class="iq-card-body p-0 ">
                                            <div class="bg-primary p-3">
                                                <h5 class="mb-0 text-white line-height">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
                                                @if (Auth::user()->status == 1)

                                                <span class="text-white font-size-12">Active</span>

                                                @else

                                                <span class="text-white font-size-12">Inactive</span>

                                                @endif

                                            </div>
                                            <a href="profile" class="iq-sub-card iq-bg-primary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-primary">
                                                        <i class="ri-file-user-line"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">My Profile</h6>
                                                        <p class="mb-0 font-size-12">View personal profile details.</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="plan" class="iq-sub-card iq-bg-primary-hover">
                                                <div class="media align-items-center">
                                                    <div class="rounded iq-card-icon iq-bg-primary">
                                                        <i class="ri-profile-line"></i>
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <h6 class="mb-0 ">My Plan</h6>
                                                        <p class="mb-0 font-size-12">Manage your Subscription</p>
                                                    </div>
                                                </div>
                                            </a>


                                            <div class="d-inline-block w-100 text-center p-3">
                                                <a class="bg-primary iq-sign-btn" href="log-out" role="button">Sign
                                                    out<i class="ri-login-box-line ml-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @else

                            <div class="d-inline-block w-100 text-center p-3">
                                <a href="login" class="btn btn-success my-3">Login</a>

                                <a href="register" class="btn btn-danger my-3">Register</a>
                            </div>




                          @endauth


                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- TOP Nav Bar END -->
        @yield('content')

        <!-- Footer -->
        <footer class="iq-footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 text-right">
                        Copyright 2020 <a href="index.html#">Booksto</a> All Rights Reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer END -->
        <!-- color-customizer -->




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
