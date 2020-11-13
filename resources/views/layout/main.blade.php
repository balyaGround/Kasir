<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>Burger Bg F</title>
    <link rel="apple-touch-icon" href="{{asset('original-asset/logo.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('original-asset/logo.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/vendors/css/tables/datatable/datatables.min.css">

    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-extended.css')}}">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/colors.css">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/components.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/pages/app-ecommerce-shop.css">


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/plugins/tour/tour.css">
    <!-- END: Page CSS-->

    {{--    <button class="btn-suc"></button>--}}
<!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('custom-assets')}}/css/style.css">
    <!-- END: Custom CSS-->


    @yield('css')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="2-columns">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- BEGIN: Header-->

<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center mt-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon feather icon-menu"></i></a></li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                        <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                        <!--     i.ficon.feather.icon-menu-->
                        {{--                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon feather icon-check-square"></i></a></li>--}}
                        {{--                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li>--}}
                        {{--                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon feather icon-mail"></i></a></li>--}}
                        {{--                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon feather icon-calendar"></i></a></li>--}}

                    </ul>

                    <ul class="nav navbar-nav">
                        {{--                   --}}
                        {{--                        <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>--}}
                        {{--                            <div class="bookmark-input search-input">--}}
                        {{--                                <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>--}}
                        {{--                                <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0" data-search="template-list">--}}
                        {{--                                <ul class="search-list search-list-bookmark"></ul>--}}
                        {{--                            </div>--}}
                        {{--                            <!-- select.bookmark-select-->--}}
                        {{--                            <!--   option Chat-->--}}
                        {{--                            <!--   option email-->--}}
                        {{--                            <!--   option todo -->--}}
                        {{--                            <!--   option Calendar-->--}}
                        {{--                        </li>--}}
                        <li>
                            <div class="row ">
                                <div class="col-md-12 col-12">

                                    {!! $pesan ?? ''!!}
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
                <ul class="nav navbar-nav float-right">

                    <li class="dropdown dropdown-user nav-item ">
                        <div class=" m-1 kliker">
                            <a class="dropdown-toggle nav-link dropdown-user-link border  rounded rounded-pill" style="border-color: #626262 !important;" href="#" data-toggle="dropdown">
                                @if(auth()->user()->image_uri != '')
                                    <span><img class="round"
                                               src="{{asset('storage/images/imageUser/small/').'/'.auth()->user()->image_uri}}"
                                               alt="avatar" height="40" width="40"></span>
                                @else
                                    <span><img class="round" src="{{asset('original-asset/Kasir/img/man1.png')}}" alt="avatar" height="40" width="40"></span>
                                @endif
                                <div class="user-nav d-sm-flex d-none">
                                    <span class="user-name text-bold-600 ml-1 font-medium-4 my-1">{{auth()->user()['username']}}</span>
                                    {{--                                    <span class="user-status">Available</span>--}}
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mt-3">
                                <div class="row p-3 justify-content-center mx-2 d-none d-sm-none d-md-block">
                                    <div class="col-md-12 text-center">
                                        @if(auth()->user()->image_uri != '')
                                            <span><img class="round"
                                                       src="{{asset('storage/images/imageUser/small/').'/'.auth()->user()->image_uri}}"
                                                       alt="avatar" height="100" width="100"></span>
                                        @else
                                            <span><img class="round" src="{{asset('original-asset/Kasir/img/man1.png')}}" alt="avatar" height="100" width="100"></span>
                                        @endif
                                        <h3 class="mt-1">{{auth()->user()->name}}</h3>
                                        <h4 class="">{{auth()->user()->email}}</h4>
                                        <a class="dropdown-item rounded rounded-pill border my-1 mx-2" style="border-color: #0B0B0B !important;"  href="{{route('profile.index')}}"><i
                                                class="feather icon-settings"></i> Profile </a>
                                        {{--                                <a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My Inbox</a>--}}
                                        <a class="dropdown-item rounded rounded-pill border my-1 mx-2" style="border-color: #0B0B0B !important   " href="{{route('logout')}}"><i class="feather icon-log-out"></i>
                                            Logout</a>
                                    </div>
                                </div>
                                <div class="d-block d-sm-block d-md-none ">
                                    <a class="dropdown-item" href="{{route('profile.index')}}"><i class="feather icon-settings"></i> Password</a>
                                    {{--                                <a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My Inbox</a>--}}
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('logout')}}"><i class="feather icon-log-out"></i> Logout</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Files</h6>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{asset('assets')}}/images/icons/xls.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                        Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;17kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{asset('assets')}}/images/icons/jpg.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;11kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{asset('assets')}}/images/icons/pdf.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                        Marketing Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;150kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{asset('assets')}}/images/icons/doc.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;256kb</small>
        </a></li>
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Members</h6>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{asset('assets')}}/images/portrait/small/avatar-s-8.jpg" alt="png"
                                               height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{asset('assets')}}/images/portrait/small/avatar-s-1.jpg" alt="png"
                                               height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{asset('assets')}}/images/portrait/small/avatar-s-14.jpg" alt="png"
                                               height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                        Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{asset('assets')}}/images/portrait/small/avatar-s-6.jpg" alt="png"
                                               height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span>
            </div>
        </a></li>
</ul>
<!-- END: Header-->
{{--    <li class="nav-item active"></li>--}}

<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    {{--    <img src="{{asset('original-asset/logo.png')}}" class="" >--}}
    <div class="navbar-header my-2 text-center" style="width: 100%">
        <ul class=" ">
            <li class="nav-item ">
                <img src="{{asset('original-asset/logo.png')}}" class="">
            </li>
            {{--            <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">--}}
            {{--                    <div class="brand-logo"></div>--}}
            {{--                    <h2 class="brand-text mb-0">Vuexy</h2>--}}
            {{--                </a></li>--}}
            {{--            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>--}}
        </ul>
    </div>
    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @include('layout.sidebar')
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper pt-2">
        <div class="content-header row ">
        </div>
        <div class="content-body pt-1 mt-1">
            @yield('content')
        </div>
    </div>
    {{--    @include('layout.sample-content')--}}
</div>
<!-- END: Content-->


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<!-- BEGIN: Footer-->
@include('layout.footer')
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets')}}/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('assets')}}/vendors/js/charts/apexcharts.min.js"></script>
<script src="{{asset('assets')}}/vendors/js/extensions/tether.min.js"></script>
{{--<script src="{{asset('assets')}}/vendors/js/extensions/shepherd.min.js"></script>--}}
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('assets')}}/js/core/app-menu.js"></script>
<script src="{{asset('assets')}}/js/core/app.js"></script>
<script src="{{asset('assets')}}/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{asset('assets')}}/js/scripts/pages/dashboard-analytics.js"></script>
<!-- END: Page JS-->
<script>
    $(".navigation>li").each(function () {
        {{--console.log('{{env('APP_URL')}}/'+location.pathname)--}}
        let tes = '{{env('APP_URL')}}' + location.pathname;
        // console.log(tes)
        var navItem = $(this);
        if (navItem.find("a").attr("href") === tes) {
            navItem.addClass("active");
        }
    });

    // $(".kliker").click(function (e) {
    //     // $(".kliker").css("background-color","#D25627");
    //     // $(".dropdown-user-link").css("color","#ffffff");
    // })
</script>
@yield('js')

</body>
<!-- END: Body-->

</html>
