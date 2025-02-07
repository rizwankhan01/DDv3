<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('metadesc')">
    <meta name="keywords" content="mobile screen replacement chennai, doctor display, samsung s7 edge display price in chennai, mobile display change,
    honor 7x screen replacement, mobile display change in chennai, doorstep mobile repair in chennai, doorstep Apple mobile phone screen replacement" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta name="theme-color" content="#FCC72C" />

    <!-- og tags -->
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('metadesc')" />
    <meta property="og:image" content="{{ URL::asset('img/logo/logo-mail.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ URL::asset('img/icon.png') }}">

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/revoulation.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/plugins.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('style.min.css')}}">
    <meta name="robots" content="index, follow">

    <script>
      window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
      ga('create', 'UA-65390322-3', 'auto');
      ga('send', 'pageview');
      ga(function() {
        var trackers = ga.getAll();
        trackers.forEach(function(tracker) {
          var clientId = tracker.get('clientId');
          document.getElementById('ga_id').value = clientId;
          document.getElementById('ga_id2').value = clientId;
        });
      });
    </script>
    <script async src='https://www.google-analytics.com/analytics.js'></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5aff2d0e6d6a0b001193c222&product=sop' async='async'></script>
    @livewireStyles
</head>

<body class="template-color-1 template-font-1">
  @if(empty(Session::get('city') ) AND str_contains(url()->current(), 'orderconfirmed')!==true)
  <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display:block;top:100px;">
    <div class="modal-dialog modal-dialog-centered" role="document" style="top:-75px;">
      <div class="modal-content">
        <div class="modal-body">
          <center>
            <h5 class="modal-title" id="exampleModalLabel">Select Your City</h5><br>
            <a class="brook-btn bk-btn-theme-border btn-sd-size btn-rounded space-between" href="select-city/Chennai">Chennai</a>
            <a class="brook-btn bk-btn-theme-border btn-sd-size btn-rounded space-between" href="select-city/Bangalore">Bangalore</a>
          </center>
        </div>
      </div>
    </div>
  </div>
<div class="overlay" style="background-color: #000; position: absolute; z-index: 1000;width:100%;height:100%;opacity:0.5;"></div>
@endif
    <!-- Wrapper -->
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <header class="br_header header-default header-transparent position-from--top light-logo--version haeder-fixed-width headroom--sticky header-mega-menu clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="header__wrapper mr--0">
                            <!-- Header Left -->
                            <div class="header-left flex-20">
                                <div class="logo">
                                    <a href="/">
                                        <img src="{{ URL::asset('img/logo/logo.png') }}" alt="Doctor Display Logo">
                                    </a>
                                </div>
                            </div>
                            <!-- Mainmenu Wrap -->

                            <!-- Header Right -->
                            <div class="header-flex-right flex-80">
                              <div class="mainmenu-wrapper have-not-flex d-none d-lg-block">
                                  <nav class="page_nav">
                                      <ul class="mainmenu">
                                          <li class="lavel-1"><a href="/"><span>Home</span></a></li>
                                          <li class="lavel-1"><a href="/allbrands"><span>Select your Brand</span></a></li>
                                          <li class="lavel-1"><a href="/our-story"><span>Our Story</span></a></li>
                                          <li class="lavel-1"><a href="https://blog.doctordisplay.in"><span>Blog</span></a></li>
                                          <li class="lavel-1"><a href="/contact"><span>Contact</span></a></li>
                                      </ul>
                                  </nav>
                              </div>
                            </div>
                            <div class="header-right have-not-flex d-sm-flex pl--35 pr_md--40">
                                <div class="preview-button d-none d-sm-block">
                                  <a href="tel:04446270777" class="brook-btn bk-btn-white btn-sd-size btn-rounded space-between">
                                    <i class='fa fa-phone'></i>&nbsp;04446270777
                                  </a>
                                </div>
                                <div class="d-block d-lg-none light-version d-block d-xl-none">
                                  <a href="tel:04446270777" class="text-white"><i class="fa fa-phone"></i></a>
                                </div>
                                <div class="manu-hamber popup-mobile-click d-block d-lg-none light-version d-block d-xl-none">
                                    <div>
                                        <i></i>
                                    </div>
                                </div>
                                <!-- End Hamberger -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--// Header -->

        <!-- Start Popup Menu -->
        <div class="popup-mobile-manu popup-mobile-visiable">
            <div class="inner">
                <div class="mobileheader">
                    <div class="logo">
                        <a href="/">
                            <img src="{{ URL::asset('img/logo/logo-mail.png') }}" alt="Doctor Display Logo">
                        </a>
                    </div>
                    <a class="mobile-close" href="#"></a>
                </div>
                <div class="menu-content">
                    <ul class="menulist object-custom-menu">
                      <li class="lavel-1"><a href="tel:04446270777"><span>04446270777</span></a></li>
                      <li class="lavel-1"><a href="/"><span>Home</span></a></li>
                      <li class="lavel-1"><a href="/our-story"><span>Our Story</span></a></li>
                      <li class="lavel-1"><a href="/contact"><span>Contact</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Popup Menu -->

        </div>
        <!-- End Demo Option -->

        <!-- Start Breadcaump Area -->
        @yield('breadcrumb')
        <!-- End Breadcaump Area -->
        @yield('pagecontent')
        <!--// Page Conttent -->
    </div>

    <!-- Footer -->
    <footer id="bk-footer" class="page-footer bg_color--3 pl--150 pr--150 pl_lg--30 pr_lg--30 pl_md--30 pr_md--30 pl_sm--5 pr_sm--5">
        <!-- Start Footer Top Area -->
        <div class="bk-footer-inner pt--150 pb--30 pt_sm--100">
            <div class="container">
                <div class="row">

                    <div class="col-md-4">
                        <div class="footer-widget text-var--2">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ URL::asset('img/logo/logo-footer.png') }}" class='w-50' alt="DoctorDisplay white">
                                </a>
                            </div>
                            <div class="footer-inner">
                                <span class="text-white">A startup that specialises in mobile screen repair services. We Offer doorstep mobile screen replacement at an unbelievable pricing.</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="footer-widget text-var--2 menu--about">
                            <h2 class="widgettitle">Links</h2>
                            <div class="footer-menu">
                                <ul class="ft-menu-list bk-hover row">
                                  <div class="col-6">
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/our-story">Our Story</a></li>
                                    <li><a href="https://blog.doctordisplay.in">Blog</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                    <li><a href="/track-your-order">Track your order</a></li>
                                  </div>
                                  <div class="col-6">
                                    <li><a href="/allbrands">Select your Brand</a></li>
                                    <li><a href="/privacy">Privacy Policy</a></li>
                                    <li><a href="/report">Report an Issue</a></li>
                                    <li><a href="/repository">Repository</a></li>
                                  </div>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="footer-widget text-var--2 menu--contact">
                            <h2 class="widgettitle">Contact</h2>
                            <div class="footer-address">
                                <div class="bk-hover">
                                    <p><a href="mailto:order@doctordisplay.in">order@doctordisplay.in</a></p>
                                    <p><a href="tel:04446270777">04446270777</a></p>
                                    <p><b>Chennai:</b> Modern Tower, no.23, F6 ,First floor, Westcott Rd, Royapettah, Chennai, Tamil Nadu 600014</p>
                                    <p><b>Bangalore:</b>  No.18 /386, second floor S.N. Arcade, mahalingeshwara layout, Adugodi, Bangalore, Karnataka 560005</p>
                                </div>
                                <div class="social-share social--transparent text-white">
                                    <a href="https://www.facebook.com/displaydoctors"><i class="fab fa-facebook"></i></a>
                                    <a href="https://twitter.com/doctor_display"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.instagram.com/doctordisplay/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.youtube.com/channel/UCtnKHSIMmcyR_FfMEiDvg6A"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ptb--50 text-var-2 text-white">
                      <small>* All product names, logos, brands are property of the respective owners. All company, product and service names used here are for identification purposes only.
                        Use of these names, logos, brands does not imply endorsements.
                      </small>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Top Area -->

        <!-- Start Copyright Area -->
        <div class="copyright ptb--50 text-var-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="copyright-right text-md-right text-center">
                            <p>© 2020 Doctor Display. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area -->
    </footer>
    <!--// Footer -->

    @yield('scripts')
    @livewireScripts
</body>

</html>
