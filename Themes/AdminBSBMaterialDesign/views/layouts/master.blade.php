<!DOCTYPE html>
<html>
<head>
    <base src="{{ URL::asset('/') }}" />
    <meta charset="UTF-8">
    <title>
        @section('title')
        {{ Setting::get('core::site-name') }} | Admin
        @show
    </title>
    <meta id="token" name="token" value="{{ csrf_token() }}" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    {!! Theme::style('plugins/bootstrap/css/bootstrap.css') !!}
    {!! Theme::style('plugins/node-waves/waves.css') !!}
    {!! Theme::style('plugins/animate-css/animate.css') !!}
    {!! Theme::style('plugins/morrisjs/morris.css') !!}
    {!! Theme::style('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') !!}
    {!! Theme::style('css/style.css') !!}
    {!! Theme::style('css/themes/all-themes.css') !!}

    {!! Theme::script('plugins/jquery/jquery.min.js') !!}
    {!! Theme::script('plugins/bootstrap/js/bootstrap.js') !!}
    {!! Theme::script('plugins/bootstrap-select/js/bootstrap-select.js') !!}
    {!! Theme::script('plugins/jquery-slimscroll/jquery.slimscroll.js') !!}
    {!! Theme::script('plugins/node-waves/waves.js') !!}
    {!! Theme::script('js/admin.js') !!}
    {!! Theme::script('js/demo.js') !!}

    <style>
    	.btn-text{ 
    		position: relative;
    		top: -3px;
    	}
    </style>

    @include('partials.asgard-globals')
    @section('styles')
    @show

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="{{ config('asgard.core.core.skin', 'theme-blue') }}" style="padding-bottom: 0 !important;">
	<!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
     <!-- #END# Page Loader -->
     <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    @include('partials.top-nav')
    <!-- #Top Bar -->
    <section>
    	@include('partials.sidebar-nav')
    </section>
    <section class="content">
    	<div class="container-fluid">
	    	<div class="block-header">
	    		@yield('content-header')
	    	</div>
    		@include('flash::message')
	    	<div class="row clearfix">
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	            	@yield('content')
	            </div>
	        </div>
	    </div>
    </section>

<?php if (is_module_enabled('Notification')): ?>
    <script src="https://js.pusher.com/3.0/pusher.min.js"></script>
    <script src="{{ Module::asset('notification:js/pusherNotifications.js') }}"></script>
    <script>
        $(".notifications-list").pusherNotifications({
            pusherKey: '{{ env('PUSHER_KEY') }}',
            loggedInUserId: {{ $currentUser->id }}
        });
    </script>
<?php endif; ?>

@section('scripts')
@show
</body>
</html>
