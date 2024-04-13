<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="assets/logoucb.png" type="image/x-icon">
    <title>@yield('title')</title>
    <style>
        #contenedor-carga{
            background-color: white;
            height: 100%;
            width: 100%;
            position: fixed;
            transition: all 1s ease;
            z-index: 100000;
        }

        #carga{
            border: 15px solid #ccc;
            border-top-color: #0054a6;
            border-top-style: groove;
            height: 100px;
            width: 100px;
            border-radius: 100%;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            animation: girar 2s linear infinite;
        }

        @keyframes girar{
            from{ transform: rotate(0deg);}
            to { transform: rotate(360deg);}
        }
    </style>
    <!-- CSS files -->
    @vite('resources/js/app.js')
</head>
<body class=" border-top-wide border-primary d-flex flex-column">
    <div id="contenedor-carga">
        <div id="carga"></div>
    </div>
<div class="page page-center">
    @yield('content')
</div>
<script type="module">
    window.onload = function () {
        let contenedor = document.getElementById('contenedor-carga');

        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = 0;
    }
</script>
</body>
</html>
