<!doctype html>
@if(config('tablar.layout')=='rtl')
    <html lang="en" dir="rtl">
    @else
        <html lang="en">
        @endif
        <head>
            <meta charset="utf-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
            <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
            <link rel="shortcut icon" href="assets/logoucb.png" type="image/x-icon">
            <link rel="stylesheet" href="assets/css/styles.css">
            {{-- Custom Meta Tags --}}
            @yield('meta_tags')
            {{-- Title --}}
            <title>
                @yield('title_prefix', config('tablar.title_prefix', ''))
                @yield('title', config('tablar.title', 'Tablar'))
                @yield('title_postfix', config('tablar.title_postfix', ''))
            </title>
            <title>Dashboard</title>
            {{-- @vite(['resources/scss//app.css', 'resources/js/app.js']) --}}

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
            @if(config('tablar','vite'))
                @vite('resources/js/app.js')
                @vite('resources/css/app.css')
            @endif
            {{-- Custom Stylesheets (post Tablar) --}}
            @yield('tablar_css')
        </head>
        <body class="@yield('classes_body')" @yield('body_data')>

        @yield('body')
        @include('tablar::extra.modal')
        {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <script type="module">
            window.onload = function () {
                let contenedor = document.getElementById('contenedor-carga');
        
                contenedor.style.visibility = 'hidden';
                contenedor.style.opacity = 0;
            }
        </script>
        @yield('tablar_js')
        
        </body>
        </html>
