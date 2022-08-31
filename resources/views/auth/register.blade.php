@extends('layouts.app')

@section('head')
    {!! htmlScriptTagJsApi([]) !!}
@endsection

@section('content')
<section class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="girl2">
                    <img class="img-fluid" src="{{ asset('images/girl.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form_login">
                    <h2>¡EMPIEZA A PARTICIPAR YA!
REGISTRA TUS DATOS, SUBE TU FACTURA Y PODRÁS GANAR UN KIT TABLET
</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}" required autocomplete="name" placeholder="Nombre" autofocus maxlength="190">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="last_name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Apellido" autofocus maxlength="190">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="identification" name="identification" type="number" class="form-control @error('identification') is-invalid @enderror"
                                    value="{{ old('identification') }}" required autocomplete="identification" placeholder="Número de identificación" maxlength="30">

                                @error('identification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail" maxlength="190">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input id="phone" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}" required autocomplete="phone" placeholder="Número de teléfono" maxlength="10">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    required autocomplete="new-password" placeholder="Contraseña" maxlength="190"><p class="alertacontraseña">La contraseña debe tener mínimo 6 caracteres que incluyan: un caracter especial (¿@!.,#), una letra mayúscula, una letra minúscula y un número. EJ: Pedro.2020</p>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input id="password-confirm" name="password_confirmation" type="password" class="form-control"
                                    required autocomplete="new-password" placeholder="Confirmar contraseña" maxlength="190">
                            </div>
                            <div class="col-md-12">
                                <!--<p>SI SOS UN GANADOR, DEBÉS RECLAMAR TU PREMIO EN COMPAÑÍA DE UN MAYOR DE EDAD Y PRESENTAR LOS SOBRES FÍSICOS EN BUENAS CONDICIONES</p>-->
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input id="terms" name="terms" type="checkbox" value="first_checkbox" required>
                                    Acepto
                                    <a class="terminoslink" href="{{ route('regulation') }}" target="_blank">Términos y condiciones</a>
                                    y Política de Privacidad
                                </label>
                            </div>
                            <div class="col-md-6">
                                {!! ReCaptcha::htmlFormSnippet() !!}
                                @error('g-recaptcha-response d-block')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="bt_ingresar" value="Enviar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
