<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $campeone->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estilo_ID') }}
            {{ Form::select('estilo_ID', $estilo,$campeone->estilo_ID, ['class' => 'form-control' . ($errors->has('estilo_ID') ? ' is-invalid' : ''), 'placeholder' => 'Estilo']) }}
            {!! $errors->first('estilo_ID', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('posicion_ID') }}
            {{ Form::select('posicion_ID', $posicion, $campeone->posicion_ID, ['class' => 'form-control' . ($errors->has('posicion_ID') ? ' is-invalid' : ''), 'placeholder' => 'Posicion']) }}
            {!! $errors->first('posicion_ID', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
