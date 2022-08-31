@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
@endsection

@section('content')
    <section class="banner">
        <div class="">
            <div class="">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($banners as $banner)
                            <li>
                                <img class="img-fluid" src="{{ asset('images/banner.jpg') }}" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="sect">
        <div class="container">
            <div class="">
                <div class="title">
                    <h2>¡EMPIEZA A PARTICIPAR YA!</h2>
                </div>
            </div>
            <div class="row mt_50">
                <div class="col-md-6">
                    <div class="pasos">
                        <h2><a href="#"><img src="{{ asset('images/paso1.png') }}" alt=""></a> <span>REGISTRA TUS DATOS</span></h2>
                        <div class="img_pasos">
                            <a href="/register"><img src="{{ asset('images/img_perfil.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pasos">
                        <h2><img src="{{ asset('images/paso2.png') }}" alt=""> <span>SUBE TU FACTURA Y PARTICIPA POR INCREIBLES PREMIOS </span></h2>
                        <div class="img_pasos_dos">
                            <img src="{{ asset('images/registrohome.png') }}" alt="">
                        </div>
                    </div>
                </div>

                <p class="titulohome2">TODOS LOS VIERNES DE MARZO Y ABRIL SORTEAREMOS INCREIBLES PREMIOS</p>

            </div>

            @if ($nextContest)
                <div class="row_gen">
                    <div class="subtitle">
                        <h3>PRÓXIMO SORTEO {{ Utils::spanishDate($nextContest->contest_date) }}</h3>
                    </div>
                    <div class="count">
                        <div id="countdown" class="row justify-content-center align-items-center"></div>
                    </div>
                    <div class="subtitle">
                        <h4 id="premios2">Sigue participando, hay muchos premios por ganar</h4>
                    </div>
                </div>
            @endif

        </div>

    </section>
    <section class="sect_2" id="anclajuegos">
        <div class="container">
            <div class="">
                <div class="title">
                    <h2>PARTICIPA POR ESTE INCREIBLE PREMIO</h2>
                </div>
            </div>
            <div class="row pre">
                <div class="premio col-md-8">
                    <div class="content_premios">
                        <img class="img-fluid" src="{{ asset('images/premio1.png') }}" alt="">
                    </div>
                </div>

            </div>

            @if (count($hall))
                <div class="pre">
                    <div class="videos" class="videos" style="margin-bottom: 100px;">
                        <div class="owl-carousel owl-theme">
                            @foreach ($hall as $item)
                                @php
                                    $video = !empty($item->video) ? json_decode($item->video)[0]->download_link : '';
                                @endphp
                                <div class="item video-btn" data-toggle="modal" data-src="{{ Voyager::image( $video ) }}" data-target="#myModal">
                                    <div class="hovereffect">
                                        <img class="img-responsive" src="{{ Voyager::image( $item->image ) }}" alt="">
                                        <div class="overlay">
                                            <a class="info" href="javascript:void(0);">
                                                {{ $item->title }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="titleboton" style="margin-bottom: 30px;">
                        <a class="ganadoresboton" href="/ganadores"><h2 id="juegos2">Ver lista de Ganadores</h2></a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <video id="video" class="video-fluid z-depth-1" controls>
                            <source />
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/countdown.jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-172963319-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-172963319-1');
</script>



<!-- Facebook Pixel Code -->
     <script>
    ! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
    n.callMethod ?
    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '485738455529935');
    fbq('track', 'PageView');
      </script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=485738455529935&ev=PageView&noscript=1" /></noscript>
<!-- End Facebook Pixel Code -->

    <script>
        $(document).ready(function() {

            @if ($nextContest)
                $('#countdown')
                    .countdown(
                        '{{ $nextContest->contest_date->format("Y/m/d H:i:s") }}',
                        function(event) {
                            $(this).html(event.strftime('<div class="col-xs-3 col-sm-2 animated rotateIn" id="days"><div class="wrapper"><span class="time">%w</span><span class="label">semanas</span></div></div><div class="col-xs-3 col-sm-2 animated rotateIn" id="days"><div class="wrapper"><span class="time">%d</span><span class="label">días</span></div></div><div class="col-xs-3 col-sm-2 animated rotateIn" id="hours"><div class="wrapper"><span class="time">%H</span><span class="label">horas</span></div></div><div class="col-xs-3 col-sm-2 animated rotateIn" id="minutes"><div class="wrapper"><span class="time">%M</span><span class="label">minutos</span></div></div><div class="col-xs-3 col-sm-2 animated rotateIn" id="seconds"><div class="wrapper"><span class="time">%S</span><span class="label">segundos</span></div></div>'));
                        }
                    );
            @endif

            $('.flexslider').flexslider({
                animation: "slide"
            });

            $('.owl-carousel').owlCarousel({
                // loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            })

            $('.video-btn').click(function() {
                var videoSrc = $(this).data( "src" );
                $('#video source').attr('src', videoSrc);
                $('#video').get(0).load();
            });

            $('#myModal').on('shown.bs.modal', function (e) {
                $('#video').get(0).play();
            })

            $('#myModal').on('hide.bs.modal', function (e) {
                $('#video').get(0).pause();
            });
        });
    </script>
@endsection
