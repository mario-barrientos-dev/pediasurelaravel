@extends('layouts.app')

@section('content')
    <section class="login">
        <div class="container-fluid">

            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ Session::get('message') }}</strong>
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
                        <h2>EDITAR PERFIL</h2>
                        <form method="POST" action="{{ route('postEditProfile') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') ?? $customer->name }}" required autocomplete="name" placeholder="Nombre" autofocus maxlength="190">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') ?? $customer->email }}" required autocomplete="email" placeholder="E-mail" maxlength="190">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="phone" name="phone" type="number" class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') ?? $customer->phone }}" required autocomplete="phone" placeholder="Número de teléfono" maxlength="10">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                        autocomplete="new-password" placeholder="Contraseña" maxlength="190">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="password-confirm" name="password_confirmation" type="password" class="form-control"
                                        autocomplete="new-password" placeholder="Confirmar contraseña" maxlength="190">
                                </div>
                                <div class="col-md-12">
                                    <p>Dejar en blanco para mantener la contraseña actual</p>
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
