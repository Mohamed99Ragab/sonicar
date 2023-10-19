<head>
    <title>@yield('title')</title>
    <!-- description -->
    <meta name="description" content="@yield('meta_description')">
    <!-- keywords -->
    <meta name="keywords" content="css3, html5, bootstrap">
    <meta charset="utf-8">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <!-- ++++ favicon ++++ -->

    <link rel="apple-touch-icon" sizes="36x36" href="{{asset('website/images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('website/images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('website/images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('website/images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('website/images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('website/images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('website/images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('website/images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('website/images/icon.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('website/images/icon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('website/images/icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('website/images/icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('website/images/icon.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('website/images/icon.png')}}">




    <!-- ++++ bootstrap ++++ -->
    <link rel="stylesheet" href="{{asset('website/css/bootstrap.css')}}" />
    <!-- ++++ owl carousel ++++ -->
    <link rel="stylesheet" href="{{asset('website/css/owl.carousel.min.css')}}" />
    <!-- ++++ magnific-popup  ++++ -->
    <link rel="stylesheet" href="{{asset('website/css/magnific-popup.css')}}" />
    <!-- ++++ font IcoMoon ++++ -->
    <link rel="stylesheet" href="{{asset('website/css/fonts.css')}}" />
    <!-- font awesome -->
    <link rel="stylesheet" href="{{asset('website/css/all.min.css')}}">
    <!-- ++++ style ++++ -->
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('website/css/responsive.css')}}" />
    <!-- Slider Revolution CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('website/revolution/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website/revolution/css/navigation.css')}}">
    <!-- ++++ [if IE]>
    <script src="{{asset('website/js/html5shiv.js')}}"></script>
    <![endif] ++++ -->
    @yield('css')
    <link rel="stylesheet" href="{{asset('website/css/custom.css')}}">

</head>
