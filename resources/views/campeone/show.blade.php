@extends('layouts.app')

@section('template_title')
    {{ $campeone->name ?? "{{ __('Show') Campeone" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Campeones</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('campeones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $campeone->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Estilo:</strong>
                            {{  $campeone->estilo->nombre ?? "Ningun Estilo"}}
                        </div>
                        <div class="form-group">
                            <strong>Posicion:</strong>
                            {{  $campeone->posicion->nombre ?? "Ninguna Posicion"}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
