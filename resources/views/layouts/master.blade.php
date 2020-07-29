<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('metadesc')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#FCC72C" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/icon.png">


    <!-- CSS
	============================================ -->
    <!-- Plugins -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/revoulation.css">
    <link rel="stylesheet" href="css/plugins.css"> -->

    <!-- Style Css -->
    <!-- <link rel="stylesheet" href="style.css"> -->

    <!-- Custom Styles -->
    <!-- <link rel="stylesheet" href="css/custom.css"> -->


    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/revoulation.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/plugins.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('style.min.css')}}">
</head>

<body class="template-color-1 template-font-1">
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

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
                                        <img src="https://doctordisplay.in/images/logo.png" alt="Doctor Display Logo">
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
                                          <li class="lavel-1"><a href="#"><span>Our Story</span></a></li>
                                          <li class="lavel-1"><a href="#"><span>Blog</span></a></li>
                                          <li class="lavel-1"><a href="#"><span>Contact</span></a></li>
                                      </ul>
                                  </nav>
                              </div>
                            </div>
                            <div class="header-right have-not-flex d-sm-flex pl--35 pr_md--40 pr_sm--40">
                                <div class="preview-button d-none d-sm-block">
                                  <a href="tel:04446270777" class="brook-btn bk-btn-white btn-sd-size btn-rounded space-between">
                                    <i class='fa fa-phone'></i>&nbsp;04446270777
                                  </a>
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
                            <img src="https://doctordisplay.in/images/logo-mail.png" alt="Multipurpose">
                        </a>
                    </div>
                    <a class="mobile-close" href="#"></a>
                </div>
                <div class="menu-content">
                    <ul class="menulist object-custom-menu">
                      <li class="lavel-1"><a href="tel:04446270777"><span>04446270777</span></a></li>
                      <li class="lavel-1"><a href="/"><span>Home</span></a></li>
                      <li class="lavel-1"><a href="#"><span>Our Story</span></a></li>
                      <li class="lavel-1"><a href="#"><span>Blog</span></a></li>
                      <li class="lavel-1"><a href="#"><span>Contact</span></a></li>
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

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="footer-widget text-var--2">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="https://doctordisplay.in/images/logo.png" alt="brook white">
                                </a>
                            </div>
                            <div class="footer-inner">
                                <p>Brook is a multi-purpose WordPress theme for big and small-sized businesses. Enjoy
                                    the theme's original design, functional features & responsive layouts.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt_mobile--40">
                        <div class="footer-widget text-var--2 menu--about">
                            <h2 class="widgettitle">About us</h2>
                            <div class="footer-menu">
                                <ul class="ft-menu-list bk-hover">
                                    <li><a href="about-us-01.html">About Us</a></li>
                                    <li><a href="team.html">Team</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="services-classic.html">Services</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--40 mt_sm--40">
                        <div class="footer-widget text-var--2 menu--contact">
                            <h2 class="widgettitle">Contact</h2>
                            <div class="footer-address">
                                <div class="bk-hover">
                                    <p>2005 Stokes Isle Apt. 896, <br> Vacaville 10010, USA</p>
                                    <p><a href="#">info@yourdomain.com</a></p>
                                    <p><a href="#">(+68) 120034509</a></p>
                                </div>
                                <div class="social-share social--transparent text-white">
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-dribbble"></i></a>
                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--40 mt_sm--40">
                        <div class="footer-widget text-var--2 menu--instagram">
                            <h2 class="widgettitle">Instagram</h2>

                            <div class="ft-instagram-list">

                                <div class="instagram-grid-wrap">

                                    <!-- Start Single Instagram -->
                                    <div class="item-grid grid-style--1">
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="img/instagram/instagram-1/instagram-7.jpg" alt="instagram images">
                                            </a>
                                            <div class="item-info">
                                                <div class="inner">
                                                    <a href="#"><i class="fas fa-heart"></i>1k</a>
                                                    <a href="#"><i class="fas fa-comment-dots"></i>9</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start Single Instagram -->

                                    <!-- Start Single Instagram -->
                                    <div class="item-grid grid-style--1">
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="img/instagram/instagram-1/instagram-8.jpg" alt="instagram images">
                                            </a>
                                            <div class="item-info">
                                                <div class="inner">
                                                    <a href="#"><i class="fas fa-heart"></i>1k</a>
                                                    <a href="#"><i class="fas fa-comment-dots"></i>9</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start Single Instagram -->

                                    <!-- Start Single Instagram -->
                                    <div class="item-grid grid-style--1">
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="img/instagram/instagram-1/instagram-9.jpg" alt="instagram images">
                                            </a>
                                            <div class="item-info">
                                                <div class="inner">
                                                    <a href="#"><i class="fas fa-heart"></i>1k</a>
                                                    <a href="#"><i class="fas fa-comment-dots"></i>9</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start Single Instagram -->

                                    <!-- Start Single Instagram -->
                                    <div class="item-grid grid-style--1">
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="img/instagram/instagram-1/instagram-10.jpg" alt="instagram images">
                                            </a>
                                            <div class="item-info">
                                                <div class="inner">
                                                    <a href="#"><i class="fas fa-heart"></i>1k</a>
                                                    <a href="#"><i class="fas fa-comment-dots"></i>9</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start Single Instagram -->

                                    <!-- Start Single Instagram -->
                                    <div class="item-grid grid-style--1">
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="img/instagram/instagram-1/instagram-11.jpg" alt="instagram images">
                                            </a>
                                            <div class="item-info">
                                                <div class="inner">
                                                    <a href="#"><i class="fas fa-heart"></i>1k</a>
                                                    <a href="#"><i class="fas fa-comment-dots"></i>9</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start Single Instagram -->

                                    <!-- Start Single Instagram -->
                                    <div class="item-grid grid-style--1">
                                        <div class="thumb">
                                            <a href="#">
                                                <img src="img/instagram/instagram-1/instagram-12.jpg" alt="instagram images">
                                            </a>
                                            <div class="item-info">
                                                <div class="inner">
                                                    <a href="#"><i class="fas fa-heart"></i>1k</a>
                                                    <a href="#"><i class="fas fa-comment-dots"></i>9</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Start Single Instagram -->

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Start Footer Top Area -->

        <!-- Start Copyright Area -->
        <div class="copyright ptb--50 text-var-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="copyright-left text-md-left text-center">
                            <ul class="bk-copyright-menu d-flex bk-hover justify-content-center justify-content-md-start flex-wrap flex-sm-nowrap">
                                <li><a href="#">Our blog</a></li>
                                <li><a href="#">Latest projects</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="copyright-right text-md-right text-center">
                            <p>© 2019 Brook. <a href="https://hasthemes.com/">All Rights Reserved.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area -->
    </footer>
    <!--// Footer -->

    @yield('scripts')

</body>

</html>
