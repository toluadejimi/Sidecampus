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

<body class="sidebar-main">
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
                    <div class="wrapper-menu open">
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


                            <li class="active active-menu">
                                <a href="admin-dashboard.html#admin" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Admin</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                <ul id="admin" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
                                    <li class="active"><a href="admin"><i class="las la-house-damage"></i>Dashboard</a></li>
                                    <li><a href="category"><i class="ri-function-line"></i>Books Category</a></li>
                                    <li><a href="author"><i class="ri-book-line"></i>Author</a></li>
                                    <li><a href="book-list"><i class="ri-file-pdf-line"></i>Books</a></li>
                                    <li><a href="users"><i class="ri-user-line"></i>Users</a></li>
                                    <li><a href="settings"><i class="ri-settings-line"></i>Settings</a></li>

                                </ul>
                            </li>


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
