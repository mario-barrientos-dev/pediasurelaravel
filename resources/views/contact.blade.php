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
                        <h2>CONTÁCTANOS</h2>
                        <form method="POST" action="{{ route('sendContact') }}">
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
                                    <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail" maxlength="190">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <textarea id="message" name="message" rows="9" cols="20" class="form-control @error('message') is-invalid @enderror" placeholder="Mensaje">{{ old('message') }}</textarea>
                                    @error('message')
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
