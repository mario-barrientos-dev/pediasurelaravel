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
                        <h2>Regístrate</h2>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="E-mail" maxlength="190">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                        required autocomplete="new-password" placeholder="Contraseña" maxlength="190">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="password-confirm" name="password_confirmation" type="password" class="form-control"
                                        required autocomplete="new-password" placeholder="Confirmar contraseña" maxlength="190">
                                </div>
                                <div class="col-md-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <input type="submit" class="bt_ingresar" value="Restablecer">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
