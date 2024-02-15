<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Side Campus - All Books Available</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ url('') }}/public/assets/images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ url('') }}/public/assets/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ url('') }}/public/assets/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ url('') }}/public/assets/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ url('') }}/public/assets/css/responsive.css">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="index.html" class="header-logo">
                  <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
                  <div class="logo-title">
                     <span class="text-primary text-uppercase">Side Campus</span>
                  </div>
               </a>
               <div class="iq-menu-bt-sidebar">
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="las la-bars"></i></div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li>
                       
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
               </nav>
               <div id="sidebar-bottom" class="p-3 position-relative">
                  <div class="iq-card">
                     <div class="iq-card-body">
                        <div class="sidebarbottom-content">
                           <a href="log-out"  class="btn w-100 btn-primary mt-4">Log Out</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
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
                           {{-- <img src="{{ url('') }}/public/assets/images/logo.png" class="img-fluid rounded-normal" alt=""> --}}
                           {{-- <div class="logo-title">
                              <span class="text-primary text-uppercase">Side Campus</span>
                           </div> --}}
                        </a>
                     </div>
                  </div>
                  <div class="navbar-breadcrumb">
                     <h5 class="mb-0">Dashbord</h5>
                     <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Dashbord</li>
                        </ul>
                     </nav>
                  </div>
                  {{-- <div class="iq-search-bar">
                     <form action="admin-dashboard.html#" class="searchbox">
                        <input type="text" class="text search-input" placeholder="Search Here...">
                        <a class="search-link" href="admin-dashboard.html#"><i class="ri-search-line"></i></a>
                     </form>
                  </div> --}}
                  {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button> --}}
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                        {{-- <li class="nav-item nav-icon search-content">
                           <a href="admin-dashboard.html#" class="search-toggle iq-waves-effect text-gray rounded">
                              <i class="ri-search-line"></i>
                           </a>
                           <form action="admin-dashboard.html#" class="search-box p-0">
                              <input type="text" class="text search-input" placeholder="Type here to search...">
                              <a class="search-link" href="admin-dashboard.html#"><i class="ri-search-line"></i></a>
                           </form>
                        </li>
                        <li class="nav-item nav-icon">
                           <a href="admin-dashboard.html#" class="search-toggle iq-waves-effect text-gray rounded">
                           <i class="ri-notification-2-line"></i>
                           <span class="bg-primary dots"></span>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">All Notifications<small class="badge  badge-light float-right pt-1">4</small></h5>
                                    </div>
                                    <a href="admin-dashboard.html#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{ url('') }}/public/assets/images/user/01.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Emma Watson Barry</h6>
                                             <small class="float-right font-size-12">Just Now</small>
                                             <p class="mb-0">95 MB</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="admin-dashboard.html#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{ url('') }}/public/assets/images/user/02.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">New customer is join</h6>
                                             <small class="float-right font-size-12">5 days ago</small>
                                             <p class="mb-0">Cyst Barry</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="admin-dashboard.html#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{ url('') }}/public/assets/images/user/03.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Two customer is left</h6>
                                             <small class="float-right font-size-12">2 days ago</small>
                                             <p class="mb-0">Cyst Barry</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="admin-dashboard.html#" class="iq-sub-card" >
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{ url('') }}/public/assets/images/user/04.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">New Mail from Fenny</h6>
                                             <small class="float-right font-size-12">3 days ago</small>
                                             <p class="mb-0">Cyst Barry</p>
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                           <a href="admin-dashboard.html#" class="search-toggle iq-waves-effect text-gray rounded">
                           <i class="ri-mail-line"></i>
                           <span class="bg-primary dots"></span>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">All Messages<small class="badge  badge-light float-right pt-1">5</small></h5>
                                    </div>
                                    <a href="admin-dashboard.html#" class="iq-sub-card">
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{ url('') }}/public/assets/images/user/01.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Barry Emma Watson</h6>
                                             <small class="float-left font-size-12">13 Jun</small>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="admin-dashboard.html#" class="iq-sub-card">
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{ url('') }}/public/assets/images/user/02.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Lorem Ipsum Watson</h6>
                                             <small class="float-left font-size-12">20 Apr</small>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="admin-dashboard.html#" class="iq-sub-card">
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{ url('') }}/public/assets/images/user/03.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Why do we use it?</h6>
                                             <small class="float-left font-size-12">30 Jun</small>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="admin-dashboard.html#" class="iq-sub-card">
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{ url('') }}/public/assets/images/user/04.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Variations Passages</h6>
                                             <small class="float-left font-size-12">12 Sep</small>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="admin-dashboard.html#" class="iq-sub-card">
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="avatar-40 rounded" src="{{ url('') }}/public/assets/images/user/05.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Lorem Ipsum generators</h6>
                                             <small class="float-left font-size-12">5 Dec</small>
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                           <a href="admin-dashboard.html#" class="search-toggle iq-waves-effect text-gray rounded">
                           <i class="ri-shopping-cart-2-line"></i>
                           <span class="badge badge-danger count-cart rounded-circle">4</span>
                           </a>
                           <div class="iq-sub-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 toggle-cart-info">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white">All Carts<small class="badge  badge-light float-right pt-1">4</small></h5>
                                    </div>
                                    <a href="admin-dashboard.html#" class="iq-sub-card">
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="rounded" src="images/cart/01.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Night People book</h6>
                                             <p class="mb-0">$32</p>
                                          </div>
                                          <div class="float-right font-size-24 text-danger"><i class="ri-close-fill"></i></div>
                                       </div>
                                    </a>
                                    <a href="admin-dashboard.html#" class="iq-sub-card">
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="rounded" src="images/cart/02.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">The Sin Eater Book</h6>
                                             <p class="mb-0">$40</p>
                                          </div>
                                          <div class="float-right font-size-24 text-danger"><i class="ri-close-fill"></i></div>
                                       </div>
                                    </a>
                                    <a href="admin-dashboard.html#" class="iq-sub-card">
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="rounded" src="images/cart/03.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">the Orange Tree</h6>
                                             <p class="mb-0">$30</p>
                                          </div>
                                          <div class="float-right font-size-24 text-danger"><i class="ri-close-fill"></i></div>
                                       </div>
                                    </a>
                                    <a href="admin-dashboard.html#" class="iq-sub-card">
                                       <div class="media align-items-center">
                                          <div class="">
                                             <img class="rounded" src="images/cart/04.jpg" alt="">
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Harsh Reality book</h6>
                                             <p class="mb-0">$25</p>
                                          </div>
                                          <div class="float-right font-size-24 text-danger"><i class="ri-close-fill"></i></div>
                                       </div>
                                    </a>
                                    <div class="d-flex align-items-center text-center p-3">
                                       <a class="btn btn-primary mr-2 iq-sign-btn" href="admin-dashboard.html#" role="button">View Cart</a>
                                       <a class="btn btn-primary iq-sign-btn" href="admin-dashboard.html#" role="button">Shop now</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </li> --}}
                        <li class="line-height pt-3">
                           <a href="admin-dashboard.html#" class="search-toggle iq-waves-effect d-flex align-items-center">
                              <img src="{{ url('') }}/public/assets/images/user/1.jpg" class="img-fluid rounded-circle mr-3" alt="user">
                              
                           </a>
                           <div class="iq-sub-dropdown iq-user-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white line-height">Hello Admin</h5>
                                       <span class="text-white font-size-12">Active</span>
                                    </div>
                                    <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
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
                                    <a href="profile-edit.html" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-profile-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Edit Profile</h6>
                                             <p class="mb-0 font-size-12">Modify your personal details.</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="account-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-account-box-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Account settings</h6>
                                             <p class="mb-0 font-size-12">Manage your account parameters.</p>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="privacy-setting.html" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-lock-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Privacy Settings</h6>
                                             <p class="mb-0 font-size-12">Control your privacy parameters.</p>
                                          </div>
                                       </div>
                                    </a>
                                    <div class="d-inline-block w-100 text-center p-3">
                                       <a class="bg-primary iq-sign-btn" href="sign-in.html" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
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
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Uses</a></li>
                     </ul>
                  </div>
                  <div class="col-lg-6 text-right">
                     Copyright 2020 <a href="index.html">Side Campus</a> All Rights Reserved.
                  </div>
               </div>
            </div>
         </footer>
         <!-- Footer END -->
         <!-- color-customizer -->
      
   
   

      
    <script src="{{ url('') }}/public/assets/js/jquery.min.js"></script>
      <script src="{{ url('') }}/public/assets/js/popper.min.js"></script>
      <script src="{{ url('') }}/public/assets/js/bootstrap.min.js"></script>
      <script src="{{ url('') }}/public/assets/js/jquery.dataTables.min.js"></script>
      <script src="{{ url('') }}/public/assets/js/dataTables.bootstrap4.min.js"></script>
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
