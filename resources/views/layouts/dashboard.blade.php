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
<link rel="shortcut icon" href="https://doctordisplay.in/img/favicon.ico">
<!-- Start css -->
<!-- Switchery css -->
<link href="{{ asset('assets\plugins\switchery\switchery.min.css') }}" rel="stylesheet">
<!-- Slick -->
<link href="{{ asset('assets\plugins\slick\slick.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets\plugins\slick\slick-theme.css') }}" rel="stylesheet" type="text/css">
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
<!-- Summernote css -->
<link href="{{ asset('assets\plugins\summernote\summernote-bs4.css') }}" rel="stylesheet">

<link href="{{ asset('assets\plugins\ion-rangeSlider\ion.rangeSlider.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets\plugins\bootstrap-xeditable\css\bootstrap-editable.css') }}" rel="stylesheet" type="text/css">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- End css -->

<style>
@media only screen and (max-width: 1026px) {
    #bigimage {
        display: none;
    }
}
@media only screen and (min-width: 1026px) {
    #smallimage {
        display: none;
    }
}
</style>
@livewireStyles
</head>
<body class="vertical-layout">
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
    <li><a href="/dashboard">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="dashboard"><span>Dashboard</span>
    </a></li>
    <li><a href="javaScript:void();">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="orders"><span>Orders</span><i class="feather icon-chevron-right pull-right"></i>
    </a>
    <ul class="vertical-submenu">
      <li><a href="/home">Open<span class='pull-right'>@if($open!=0) {{ $open }} @endif</span></a></li>
      <li><a href="/close">Closed<span class='pull-right'>@if($close!=0) {{ $close }} @endif</span></a></li>
      <li><a href="/cancel">Cancelled<span class='pull-right'>@if($cancel!=0) {{ $cancel }} @endif</span></a></li>
    </ul>
    </li>
    <li><a href="/temperedglass">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="tickets"><span>Tempered Glass</span>
    </a></li>
    <li><a href="/storestock">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="tickets"><span>Store Stock</span>
    </a></li>
    <li><a href="/tickets">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="tickets"><span>Tickets</span>
    <span class='pull-right'>@if($ticket!=0) {{ $ticket }} @endif </span>
    </a></li>
    <li><a href="/enquiry">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="enquiry"><span>Enquiry</span>
    <span class='pull-right'>@if($enquiry!=0){{ $enquiry }} @endif</span>
    </a></li>
    <li><a href="/expenses">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="brands"><span>Expenses</span>
    </a></li>
    <li><a href="/brands">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="brands"><span>Brands</span>
    </a></li>
    <li><a href="/models">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="models"><span>Models</span>
    </a></li>
    <li><a href="/modelcolors">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="models"><span>Model Colors</span>
    </a></li>
    <li><a href="/addon">
      <img src="{{ asset('assets\images\svg-icon\dashboard.svg') }}" class="img-fluid" alt="models"><span>Addons</span>
    </a></li>
    <li><a href="/coupons">
      <img src="{{ asset('assets\images\svg-icon\basic.svg') }}" class="img-fluid" alt="basic"><span>Coupons</span>
    </a></li>
    <li><a href="/dealers">
      <img src="{{ asset('assets\images\svg-icon\basic.svg') }}" class="img-fluid" alt="basic"><span>Dealers</span>
    </a></li>
    <li><a href="/customers">
      <img src="{{ asset('assets\images\svg-icon\basic.svg') }}" class="img-fluid" alt="basic"><span>Customers</span>
    </a></li>
    <li><a href="/accounts">
      <img src="{{ asset('assets\images\svg-icon\basic.svg') }}" class="img-fluid" alt="basic"><span>User Accounts</span>
    </a></li>
    <li><a href="javaScript:void();">
      <img src="{{ asset('assets\images\svg-icon\basic.svg') }}" class="img-fluid" alt="orders"><span>Reports</span><i class="feather icon-chevron-right pull-right"></i>
    </a>
    <ul class="vertical-submenu">
      <li><a href="/reports">Sales Reports</a></li>
      <li><a href="/enquiryreports">Enquiry Reports</a></li>
    </ul>
    </li>
    <li><a href="/analytics">
      <img src="{{ asset('assets\images\svg-icon\basic.svg') }}" class="img-fluid" alt="basic"><span>Analytics</span>
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
        <a href="/home" class="mobile-logo"><img src="{{ asset('img/logo/logo-mail.png') }}" class="img-fluid" alt="logo"></a>
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
                    <form action="/search" method="post">
                      {{ csrf_field() }}
                      {{ method_field('post') }}
                        <div class="input-group">
                          <input type="search" class="form-control" name="search" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
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
<!-- Summernote JS -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.8/firebase-messaging.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyDVSPv0HVHKJfvr48fU0fuha8nDgI5DMVs",
    authDomain: "doctordisplay-ec8b6.firebaseapp.com",
    projectId: "doctordisplay-ec8b6",
    storageBucket: "doctordisplay-ec8b6.appspot.com",
    messagingSenderId: "778584535844",
    appId: "1:778584535844:web:c9aef0fbadbd547bd039b1",
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
        messaging.requestPermission().then(function () {
            return messaging.getToken()
        }).then(function(token) {

            axios.post("{{ route('fcmToken') }}",{
                _method:"PATCH",
                token
            }).then(({data})=>{
                console.log(data)
            }).catch(({response:{data}})=>{
                console.error(data)
            })

        }).catch(function (err) {
            console.log(`Token Error :: ${err}`);
        });
    }

    initFirebaseMessagingRegistration();

    messaging.onMessage(function({data:{body,title}}){
        new Notification(title, {body});
    });

</script>
@yield('scripts')
<!-- End js -->
@livewireScripts
</body>
</html>
