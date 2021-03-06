<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>{!! $title !!}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    {{Html::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all')}}
    {{Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}
    {{Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}
    {{Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}
    {{Html::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}
    @yield('style', '')
    {{Html::style('assets/global/plugins/bootstrap-toastr/toastr.min.css')}}
    {{Html::style('assets/global/css/components.css')}}
    {{Html::style('assets/global/css/plugins.min.css')}}
    {{Html::style('assets/layouts/layout4/css/layout.css')}}
    {{Html::style('assets/layouts/layout4/css/themes/default.min.css')}}
    {{Html::style('assets/layouts/layout4/css/custom.css')}}
    {{Html::favicon(env('APP_FAVICON'))}}

</head>

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="{{URL::action('HomeController@index')}}">
                <img src="{{ env('APP_URL') }}images/gugi.png" alt="logo" class="logo-default"/> </a>
            <div class="menu-toggler sidebar-toggler">
            </div>
        </div>
        <a role="button" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse"> </a>
        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a role="button" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <span class="username username-hide-on-mobile">{!! Session::get('user')->username !!}</span>
                            {{ HTML::image('images/avatar.png', 'alt', ['class' => 'img-circle']) }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="#">
                                    <i class="fa fa-user"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-lock"></i> Change password
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::action('AccessController@logout') }}">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item start {{ Request::is('/') ? 'active' : '' }}">
                    <a href="{{URL::action('HomeController@index')}}" class="nav-link">
                        <i class="fa fa-home"></i>
                        <span class="title"> Home </span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('merchant*') ? 'active' : '' }}">
                    <a href="{{URL::action('MerchantController@index')}}" class="nav-link">
                        <i class="fa fa-archive"></i>
                        <span class="title"> Merchants </span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('category*') ? 'active' : '' }}">
                    <a href="{{URL::action('CategoryController@index')}}" class="nav-link">
                        <i class="fa fa-folder-open"></i>
                        <span class="title"> Categories </span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('source*') ? 'active' : '' }}">
                    <a href="{{URL::action('SourceController@index')}}" class="nav-link">
                        <i class="fa fa-link"></i>
                        <span class="title"> Source </span>
                        <span class="selected"></span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            @yield('pagecontent', '')
        </div>
    </div>
</div>
<div class="page-footer">
    <div class="page-footer-inner"> 2017 © Copyright <a href="{{ env('APP_URL') }}">{!! env('APP_NAME') !!}</a></div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
{{Html::script('assets/global/plugins/jquery.min.js')}}
{{Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}
{{Html::script('assets/global/plugins/js.cookie.min.js')}}
{{Html::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}
{{Html::script('assets/global/plugins/jquery.blockui.min.js')}}
{{Html::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}
{{Html::script('assets/global/scripts/app.min.js')}}
{{Html::script('assets/layouts/layout/scripts/layout.min.js')}}
{{Html::script('assets/global/plugins/bootstrap-toastr/toastr.min.js')}}
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    toastr.options = {
        closeButton: true,
        debug: false,
        positionClass: "toast-top-right",
        onclick: null,
        showDuration: "1000",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };
</script>
@if (Session::has('error'))
    <script type="text/javascript">
        toastr['error']('{!! Session::get("error") !!}');
    </script>
@elseif(Session::has('success'))
    <script type="text/javascript">
        toastr['success']('{!! Session::get("success") !!}');
    </script>
@elseif(Session::has('warning'))
    <script type="text/javascript">
        toastr['warning']('{!! Session::get("warning") !!}');
    </script>
@endif
@yield('script', '')
</body>
</html>