<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            {{ Setting::get('core::site-name') }}
        @show
    </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <link rel="stylesheet" href="{{ asset('themes/adminbsbmaterialdesign/plugins/bootstrap/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminbsbmaterialdesign/plugins/node-waves/waves.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminbsbmaterialdesign/plugins/animate-css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminbsbmaterialdesign/css/style.css') }}"/>

    <script src="{{ asset('themes/adminbsbmaterialdesign/plugins/jquery/jquery.min.js') }}"></script>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">

<div class="login-box">
    @yield('content')
</div>

<!-- Bootstrap -->
<script src="{{ asset('themes/adminbsbmaterialdesign/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('themes/adminbsbmaterialdesign/plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('themes/adminbsbmaterialdesign/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('themes/adminbsbmaterialdesign/plugins/js/admin.js') }}"></script>
    <script src="{{ asset('themes/adminbsbmaterialdesign/plugins/js/pages/examples/sign-in.js') }}"></script>

</body>
</html>
