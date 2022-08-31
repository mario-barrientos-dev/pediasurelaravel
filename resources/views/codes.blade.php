@extends('layouts.app')

@section('content')
    <section class="login">
        <div class="container content_into_perfil">

            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ Session::get('message') }}</strong>
                </div>
            @endif

            <div class="row ">
                <div class="col-md-7">
                    <div class="row">
                        <div class="content_perfil">
                            <h2>Bienvenid@, {{ $customer->name }}</h2>
                                                        <a href="{{ route('editProfile') }}" class="bt_perfil">Editar perfil</a>
                        </div>
                    </div>


                    <div class="row mt_50">
                        <div class="col-md-10">
                        <div class="content_perfil2">
                            <h2 class="colorcodigo">Cómo registrar tus facturas</h2>
                        </div>
                    </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="img_explicacion">
                                        <img class="img-fluid" src="{{ asset('images/ResponsiveEmpaque1.png') }}" alt="">

                                    </div>
                                    <lu class="exp">
                                        <li>Compra tu Pediasure en tu presentación favorita. Ingresa tus datos más tu factura de compra en este link y ¡ya estás participando! Podrás ganar increíbles Kits Tablet de última generación y decenas de pijamitas Pediasure.
                                        </li>
                                    </lu>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="col-md-5">

                      <div class="row mt_50">
                        <div class="ingr_cod">
                            <form method="POST" action="{{ route('postCodes') }}" enctype="multipart/form-data">
                                @csrf
                                <h3>SUBE TU FACTURA</h3>
                               <div class="inputblanco"> 
                                    <button id="btnUpload" type="button" class="codes form-control @error('code') is-invalid @enderror">
                                        SUBE TU FACTURA AQUÍ
                                    </button>
                                    <input id="code" name="code" accept="image/*" type="file" style="display: none;" required></div>
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <!--<input type="submit" class="bt_ingresar" value="Enviar">-->
                            </form>
                        </div>
                    </div>

                     <div class="row">
                        <div class="content_perfil3">
                            <h2 class="titulocodigos">Tus Facturas Ingresadas</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive" id="sailorTableArea">
                            <table id="sailorTable" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>Factura</th>
                                        <th>Fecha de ingreso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customer->codes as $key => $code)
                                        <tr>
                                            <td>Factura #{{ $customer->codes->count() - $key }}</td>
                                            <td>{{ $code->created_at->format('Y-m-d h:i:s A') }}</td>
                                        </tr>
                                    @endforeach

                                    @if (empty($customer->codes->count()))
                                        <tr>
                                            <td>Aún no has cargado una factura</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row_gen">
                <div class="counter_int">
                    <div class="row_gen">

                        @if ($nextContest)
                            <div class="subtitle2">
                                <h3>PRÓXIMO SORTEO {{ Utils::spanishDate($nextContest->contest_date) }}</h3>
                            </div>
                            <div class="count">
                                <div id="countdown" class="row justify-content-center align-items-center"></div>
                            </div>
                        @endif

                        <div class="subtitle">
                            <!--<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</h4>
                            <h5>*Imágenes con fines ilustrativos, los códigos utilizados no tienen validez para esta promoción.</h5>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#btnUpload').on('click', function() {
                $('input#code').trigger('click');
            });
        });
    </script>

    @if ($nextContest)
        <script src="{{ asset('js/countdown.jquery.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#countdown')
                    .countdown(
                        '{{ $nextContest->contest_date->format("Y/m/d H:i:s") }}',
                        function(event) {
                            $(this).html(event.strftime('<div class="col-xs-3 col-sm-2 animated rotateIn" id="days"><div class="wrapper"><span class="time">%w</span><span class="label">semanas</span></div></div><div class="col-xs-3 col-sm-2 animated rotateIn" id="days"><div class="wrapper"><span class="time">%d</span><span class="label">días</span></div></div><div class="col-xs-3 col-sm-2 animated rotateIn" id="hours"><div class="wrapper"><span class="time">%H</span><span class="label">horas</span></div></div><div class="col-xs-3 col-sm-2 animated rotateIn" id="minutes"><div class="wrapper"><span class="time">%M</span><span class="label">minutos</span></div></div><div class="col-xs-3 col-sm-2 animated rotateIn" id="seconds"><div class="wrapper"><span class="time">%S</span><span class="label">segundos</span></div></div>'));
                        }
                    );
            });
        </script>
    @endif
@endsection
