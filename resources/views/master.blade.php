<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href=" {!! asset('css/app.css') !!}">
	<style media="screen">			
		form { display: inline !important; }
		.thumbnail {
			min-height: 230px;
			max-height: 230px;	
		}		
	</style>
</head>
<body>
	<div class="container">
		@include('alert')
		@yield('content')
	</div>
</body>
</html>
