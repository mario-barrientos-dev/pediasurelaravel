@extends('layouts.app')

@section('content')
    <section class="login">
        <div class="container content_into_perfil">
            <div class="row ">
                <div class="col-md-12">
                    <div class="row">
                        <div class="content_perfil">
                            <h2 class="titulocodigos">Ganadores</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive" id="sailorTableArea">
                            <table id="sailorTable" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>FECHA DEL SORTEO</th>
                                        <th>NOMBRE</th>
                                        <th>APELLIDO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($winners as $winner)
                                    <tr>
                                        <td>{{ $winner->contest->title }}</td>
                                        <td>{{ $winner->customer->name }}</td>
                                        <td>{{ $winner->customer->last_name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
