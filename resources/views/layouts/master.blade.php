<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper @yield('title')</title>
    <link href="{{ asset('layouts/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('layouts/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('layouts/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('layouts/js/html5shiv.js') }}"></script>
    <script src="{{ asset('layouts/js/respond.min.js') }}"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('layouts/images') }}/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('layouts/images') }}/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('layouts/images') }}/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('layouts/images') }}/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('layouts/images') }}/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<!--/header-->
	@include("layouts.elements.top")
	<!--/slider-->
	@include("layouts.elements.slide")
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include("layouts.elements.slidebar")
				</div>
				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
			</div>
		</div>
	</section>
	@include("layouts.elements.footer")
	<!--/Footer-->
    <script src="{{ asset('layouts/js/jquery.js') }}"></script>
	<script src="{{ asset('layouts/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('layouts/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('layouts/js/price-range.js') }}"></script>
    <script src="{{ asset('layouts/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('layouts/js/main.js') }}"></script>
</body>
</html>