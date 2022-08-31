@extends('layouts.app')

@section('content')
    <section class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="girl">
                        <img class="img-fluid" src="{{ asset('images/girl.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form_login">
                        <h2>Login</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input id="email" name="email" type="email" class="fadeIn second form-control @error('email') is-invalid @enderror"
                                placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus maxlength="190">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <input id="password" name="password" type="password" class="fadeIn third form-control @error('password') is-invalid @enderror"
                                required autocomplete="current-password" placeholder="Contraseña" maxlength="190">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <a class="forgot" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                            
                            <input type="submit" class="bt_ingresar" value="Ingresar">
                        </form>
                        <!-- Remind Passowrd -->
                       <!-- <div id="formFooter">
                            <a class="underlineHover" href="{{ route('register') }}">¿ERES NUEVO? REGISTRATE AQUÍ</a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
