<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="GreenKush">
<meta name="keywords" content="greenkush">
<meta name="author" content="greenkush">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title>@yield('title')</title>
<!-- Fevicon -->
<link rel="shortcut icon" href="{{ asset('assets\images\favicon.ico') }}">
<!-- Start css -->
<!-- Switchery css -->
<link href="{{ asset('assets\plugins\switchery\switchery.min.css') }}" rel="stylesheet">
<!-- Select2 css -->
<link href="{{ asset('assets\plugins\select2\select2.min.css') }}" rel="stylesheet" type="text/css">
<!-- DataTables css -->
<link href="{{ asset('assets\plugins\datatables\dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets\plugins\datatables\buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<!-- Responsive Datatable css -->
<link href="{{ asset('assets\plugins\datatables\responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets\css\icons.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets\css\flag-icon.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets\css\style.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets\plugins\pnotify\css\pnotify.custom.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets\plugins\sweet-alert2\sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link href="{{ asset('assets\plugins\summernote\summernote-bs4.css') }}" rel="stylesheet">
<!-- Datepicker css -->
<link href="{{ asset('assets\plugins\datepicker\datepicker.min.css') }}" rel="stylesheet" type="text/css">

<!-- End css -->
</head>
<body class="vertical-layout">
<!-- End Infobar Setting Sidebar -->
<!-- Start Containerbar -->
<div id="containerbar">
<!-- Start Leftbar -->
<div class="leftbar">
<!-- Start Sidebar -->
<div class="sidebar">
<!-- Start Logobar -->
<div class="logobar">
<a href="#" class="logo logo-large"><img src="{{ asset('img/logo/logo-footer.png') }}" class="img-fluid" alt="logo"></a>
<a href="#" class="logo logo-small"><img src="{{ asset('img/logo/logo-footer.png') }}" class="img-fluid" alt="logo"></a>
</div>
<!-- End Logobar -->
<!-- Start Navigationbar -->
<div class="navigationbar">
<ul class="vertical-menu">
    <!--<li>
        <a href="javaScript:void();">
          <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="dashboard"><span>Dashboard</span><i class="feather icon-chevron-right pull-right"></i>
        </a>
        <ul class="vertical-submenu">
            <li><a href="/coupons">Coupons</a></li>
        </ul>
    </li>-->
    <li><a href="/newjobs">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="dashboard"><span>All Jobs</span>
    </a></li>
    <li><a href="/newinterviews">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="closed"><span>Interviews</span>
    </a></li>
    <li><a href="/accounts">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="brands"><span>Employees</span>
    </a></li>
    <li><a href="/newleaves">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="models"><span>Leaves</span>
    </a></li>
    <li><a href="/newsalary">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="models"><span>Salary</span>
    </a></li>
    <li><a href="#">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="models"><span>Onboarding</span>
    </a></li>
    <li><a href="/newattendance">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="models"><span>Attendance</span>
    </a></li>
    <li><a href="/newholiday">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="models"><span>Calendar Holiday</span>
    </a></li>
    <li><a href="/newallcandidates">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="models"><span>Talent Pool</span>
    </a></li>
    <li><a href="/settings">
      <img src="{{ asset('assets\images\svg-icon\basic.svg') }}" class="img-fluid" alt="basic"><span>Settings</span>
    </a></li>
    <li>
      <a href="{{ route('logout') }}"
      onclick="event.preventDefault();document.getElementById('logout-form').submit();">
      <img src="{{ asset('assets\images\svg-icon\logout.svg') }}" class="img-fluid" alt="logout"><span>{{ __('Logout') }}</span></a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
    </li>
</ul>
</div>
<!-- End Navigationbar -->
</div>
<!-- End Sidebar -->
</div>
<!-- End Leftbar -->
<!-- Start Rightbar -->
<div class="rightbar">
<!-- Start Topbar Mobile -->
<div class="topbar-mobile">
<div class="row align-items-center">
<div class="col-md-12">
    <div class="mobile-logobar">
        <a href="/" class="mobile-logo"><img src="{{ asset('img/logo/logo.png') }}" class="img-fluid" alt="logo"></a>
    </div>
    <div class="mobile-togglebar">
        <ul class="list-inline mb-0">
            <li class="list-inline-item">
                <div class="topbar-toggle-icon">
                    <a class="topbar-toggle-hamburger" href="javascript:void();">
                        <img src="{{ asset('assets\images\svg-icon\horizontal.svg') }}" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                        <img src="{{ asset('assets\images\svg-icon\verticle.svg') }}" class="img-fluid menu-hamburger-vertical" alt="verticle">
                     </a>
                 </div>
            </li>
            <li class="list-inline-item">
                <div class="menubar">
                    <a class="menu-hamburger" href="javascript:void();">
                        <img src="{{ asset('assets\images\svg-icon\collapse.svg') }}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                        <img src="{{ asset('assets\images\svg-icon\close.svg') }}" class="img-fluid menu-hamburger-close" alt="close">
                     </a>
                 </div>
            </li>
        </ul>
    </div>
</div>
</div>
</div>
<!-- Start Topbar -->
<div class="topbar">
<!-- Start row -->
<div class="row align-items-center">
<!-- Start col -->
<div class="col-md-12 align-self-center">
    <div class="togglebar">
        <ul class="list-inline mb-0">
            <li class="list-inline-item">
                <div class="menubar">
                    <a class="menu-hamburger" href="javascript:void();">
                       <img src="{{ asset('assets\images\svg-icon\collapse.svg') }}" class="img-fluid menu-hamburger-collapse" alt="collapse">
                       <img src="{{ asset('assets\images\svg-icon\close.svg') }}" class="img-fluid menu-hamburger-close" alt="close">
                     </a>
                 </div>
            </li>
            <li class="list-inline-item">
                <div class="searchbar">
                    <form>
                        <div class="input-group">
                          <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                          <div class="input-group-append">
                            <button class="btn" type="submit" id="button-addon2"><img src="{{ asset('assets\images\svg-icon\search.svg') }}" class="img-fluid" alt="search"></button>
                          </div>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <div class="infobar">
        <ul class="list-inline">
            <li class="list-inline-item">
                <div class="profilebar">
                    <div class="dropdown">
                      <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php $profile_image = Auth()->user()->profile_image; ?>
                        @if(empty($profile_image))
                          <img src="{{ asset('assets\images\users\profile.svg') }}" class="img-fluid" alt="profile">
                        @else
                          <img src="{{ asset('storage/'.$profile_image ) }}" class="img-fluid" alt="profile" style="border-radius:100%;">
                        @endif
                        <span class="feather icon-chevron-down live-icon"></span></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                            <div class="dropdown-item">
                                <div class="profilename">
                                  <h5>{{ Auth::user()->name }}</h5>
                                </div>
                            </div>
                            <div class="userbox">
                                <ul class="list-unstyled mb-0">
                                    <li class="media dropdown-item">
                                        <a href="/settings" class="profile-icon"><img src="{{ asset('assets\images\svg-icon\user.svg') }}" class="img-fluid" alt="user">My Profile</a>
                                    </li>
                                    <li class="media dropdown-item">
                                        <a href="#" class="profile-icon"><img src="{{ asset('assets\images\svg-icon\email.svg') }}" class="img-fluid" alt="email">Email</a>
                                    </li>
                                    <li class="media dropdown-item">
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="profile-icon">
                                        <img src="{{ asset('assets\images\svg-icon\logout.svg') }}" class="img-fluid" alt="logout">{{ __('Logout') }}</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- End col -->
</div>
<!-- End row -->
</div>
<!-- End Topbar -->
<!-- Start Breadcrumbbar -->
@yield('breadcrumb')
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
@yield('contentbar')
<!-- End Contentbar -->
<!-- Start Footerbar -->
<div class="footerbar">
<footer class="footer">
<p class="mb-0">© {{ date('Y') }} Doctor Display - All Rights Reserved.</p>
</footer>
</div>
<!-- End Footerbar -->
</div>
<!-- End Rightbar -->
</div>
<!-- End Containerbar -->
<!-- Start js -->
@yield('scripts')
<!-- End js -->
</body>
</html>
