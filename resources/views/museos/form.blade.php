<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="foto" class="control-label">{{ 'Foto: ' }}</label>
    @if(isset($museo->foto))
    <img src=" {{asset('storage').'/'.$museo->foto }}" class="img-thumbnail img-fluid" alt="" width="150">
    @endif
    <input class="form-control" name="foto" type="file" id="foto" value="{{ isset($museo->foto) ? $museo->foto : ''}}" >
    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($museo->nombre) ? $museo->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('informacion') ? 'has-error' : ''}}">
    <label for="informacion" class="control-label">{{ 'Informacion' }}</label>
    <input class="form-control" name="informacion" type="text" id="informacion" value="{{ isset($museo->informacion) ? $museo->informacion : ''}}" >
    {!! $errors->first('informacion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
