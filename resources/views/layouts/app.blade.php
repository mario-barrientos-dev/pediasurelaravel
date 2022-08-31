<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="facebook-domain-verification" content="o2n1knc00hxblwskml886ulmf6p30l" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pediasure</title>
    <link href="{{ asset('images/favicon.png') }}" type="image/x-icon" rel="icon" />

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BE0P222DCE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BE0P222DCE');
</script>
    
    <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '450184832930039'); 
fbq('track', 'PageView');
</script>
<noscript>
<img height="1" width="1" 
src="https://www.facebook.com/tr?id=450184832930039&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->



    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.0.12/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @yield('head')
</head>
<body>


    @include('layouts.nav')

    @yield('content')

    <footer>
        <div class="container">
            <div class="row_gen">
                <div class="nav_footer">
                    <ul>
                        <li class="br_nav"><a href="{{ route('faq') }}">Política de Manejo de Datos</a></li>
                        <li class="br_nav"><a href="{{ route('contact') }}">Contáctanos</a></li>
                        <li><a href="{{ route('regulation') }}">Reglamento</a></li>
                    </ul>
                </div>
            </div>
            <div class="row_gen">
                <h3 class="copy">Aplican términos y condiciones. Promoción válida hasta el 30 de abril del 2021.
Para más información ingresa en http://regresaconpediasure.com/  
</h3>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
