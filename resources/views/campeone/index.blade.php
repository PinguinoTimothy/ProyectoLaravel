@extends('layouts.app')

@section('template_title')
    Campeone
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Campeones') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('campeones.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Crear Nuevo Campeon') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <caption>Lista de Campeones</caption>

                                <tbody>
                                    @php($i = 0)
                                        <tr>
                                    @foreach ($campeones as $campeone)
                                        <td>
                                            <div class="card" style="width: 18rem;">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $campeone->nombre }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">
                                                        {{ $campeone->estilo->nombre ?? 'Ningun Estilo' }}</h6>
                                                    <p class="card-text">
                                                        {{ $campeone->posicion->nombre ?? 'Ninguna Posicion' }}</p>
                                                    <form action="{{ route('campeones.destroy', $campeone->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-outline-primary "
                                                            href="{{ route('campeones.show', $campeone->id) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                        <a class="btn btn-outline-success"
                                                            href="{{ route('campeones.edit', $campeone->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger"><i
                                                                class="fa fa-fw fa-trash"></i> {{ __('Borrar') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        @php($i++)
                                        @if ($i >= 3)
                                            @php($i = 0)
                                            </tr>
                                            <tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $campeones->links() !!}
            </div>
        </div>
    </div>
@endsection
