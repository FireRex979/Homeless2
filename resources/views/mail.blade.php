<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Citybook -Directory Listing Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== css  ===============-->	
		<link type="text/css" rel="stylesheet" href="{{asset('assets/user/css/reset.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('assets/user/css/plugins.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('assets/user/css/style.css')}}">
        <link type="text/css" rel="stylesheet" href="{{asset('assets/user/css/color.css')}}">
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="images/favicon.ico">
    </head>
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="pin"></div>
            <div class="pulse"></div>
        </div>
        <!--loader end-->
        <!-- Main  -->
        <div class="process-item">
            <h4>Halo Bapak Admin</h4>
            <p>{{$message}}</p>
        </div>
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script type="text/javascript" src="{{asset('assets/user/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/user/js/plugins.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/user/js/scripts.js')}}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&libraries=places&callback=initAutocomplete"></script>
    </body>
</html>