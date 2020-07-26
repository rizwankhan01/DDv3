<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/icon.png">


    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/revoulation.css">
    <link rel="stylesheet" href="css/plugins.min.css">
    <link rel="stylesheet" href="style.min.css">
</head>

<body class="template-color-1 template-font-1">

    <!-- Wrapper -->
    <div id="wrapper" class="wrapper brown-3">

        <!-- Header -->
        <header class="br_header header-default  black-logo--version haeder-fixed-width haeder-fixed-150 headroom--sticky header-mega-menu clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="header__wrapper mr--0">
                            <!-- Header Left -->
                            <div class="header-left">
                                <div class="logo">
                                    <a href="https://doctordisplay.in">
                                        <img src="img/logo/logo.png" alt="doctordisplay logo">
                                    </a>
                                </div>
                            </div>
                            <!-- Mainmenu Wrap -->
                            <div class="mainmenu-wrapper d-none d-lg-block">
                                <nav class="page_nav">
                                    <ul class="mainmenu">
                                        <li class="lavel-1"><a href="tel:04446270777"><span>04446270777</span></a></li>
                                        <li class="lavel-1"><a href="https://doctordisplay.in"><span>Home</span></a></li>
                                        <li class="lavel-1"><a href="https://doctordisplay.in/story"><span>Our Story</span></a></li>
                                        <li class="lavel-1"><a href="https://doctordisplay.in/blog"><span>Blog</span></a></li>
                                        <li class="lavel-1"><a href="https://doctordisplay.in/contact"><span>Contact</span></a></li>
                                    </ul>
                                </nav>
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
                        <a href="https://doctordisplay.in">
                            <img src="img/logo/logo.png" alt="Doctor Display Logo">
                        </a>
                    </div>
                    <a class="mobile-close" href="#"></a>
                </div>
                <div class="menu-content">
                    <ul class="menulist object-custom-menu">
                      <li><a href="tel:04446270777"><span>04446270777</span></a></li>
                      <li><a href="https://doctordisplay.in"><span>Home</span></a></li>
                      <li><a href="https://doctordisplay.in/story"><span>Our Story</span></a></li>
                      <li><a href="https://doctordisplay.in/blog"><span>Blog</span></a></li>
                      <li><a href="https://doctordisplay.in/contact"><span>Contact</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Popup Menu -->

        @yield('breadcrumb')
        <!-- Page Conttent -->
        @yield('pagecontent')
        <!--// Page Conttent -->
    </div>


    <!--// Wrapper -->
    @yield('scripts')

</body>
</html>
