<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="http://localhost/favicon.ico"> 
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- load bootstrap from a cdn -->
	<link href="{{ asset('css/bootstrap533.min.css') }}" rel="stylesheet"> 
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">    
	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>	
	<script src="{{ asset('js/jquery341.min.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">   

</head>
<body>
