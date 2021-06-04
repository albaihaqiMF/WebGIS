<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layouts.head')
    <title>WebGIS</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <style>
        body,* {
            margin: 0;
            padding: 0;
        }
        .navbar{
            height: 70px;
        }
        #mapid {
            height: calc(100vh - 70px);
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="padding: 0">
        <div class="navbar">
            <div class="navbar-brand">WebGIS</div>
        </div>
        <div id="mapid"></div>
    </div>
</body>
<script src="{{ asset('js/map/index.js')}}"></script>

</html>