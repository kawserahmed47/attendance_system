<!DOCTYPE html>
<html>
<head>
<title>Academic Education V2</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="{{asset('public/layout/styles/layout.css')}}" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<!-- Top Nav Bar -->
@include('front.layouts.topnav')


<!-- Header -->
@include('front.layouts.header')

<!-- Main Nav Bar -->
@include('front.layouts.mainnav')

<!-- Main Body -->

@yield('content')

<!-- Footer -->
@include('front.layouts.footer')

<!-- JAVASCRIPTS --> 
<script src="{{asset('public/layout/scripts/jquery.min.js')}}"></script> 
<script src="{{asset('public/layout/scripts/jquery.fitvids.min.js')}}"></script> 
<script src="{{asset('public/layout/scripts/jquery.mobilemenu.js')}}"></script> 
<script src="{{asset('public/layout/scripts/tabslet/jquery.tabslet.min.js')}}"></script>
</body>
</html>