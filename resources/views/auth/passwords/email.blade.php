@extends('layouts.app')

@section('content')
    <section class="login">
        <div class="container-fluid">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <div class="girl">
                        <img class="img-fluid" src="{{ asset('images/girl.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form_login">
                        <h2>{{ __('Reset Password') }}</h2>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <input id="email" name="email" type="email" class="fadeIn second form-control @error('email') is-invalid @enderror"
                                placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus maxlength="190">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           
                            <input type="submit" class="bt_ingresar" value="Enviar">
                        </form>
                        <!-- Remind Passowrd -->
                        <div id="formFooter">
                            <a class="underlineHover" href="{{ route('register') }}">¿Eres nuevo? Regístrate aquí</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
