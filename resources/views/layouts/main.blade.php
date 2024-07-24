<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!--meta http-equiv="Content-Security-Policy" content="default-src https:" /-->
    <title>@yield('title') | Transfer of Human Biological Material (THBM) Portal</title>
    <link href="{{ asset('public/assets/css') }}/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset('public/assets/css') }}/frontend.css" rel="stylesheet">
</head>
<body>
 @include('frontend.pages.header')
	<main>
			@yield('content')
	</main>
    @include('frontend.pages.footer')
	 <script src="{{ asset('public/assets/js') }}/bootstrap.bundle.min.js"></script>
	 <script src="{{ asset('public/assets/js') }}/jquery.min.js"></script>


</body>
</html>
