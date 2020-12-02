<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="foto" class="control-label">{{ 'Foto' }}</label>
    <input class="form-control" name="foto" type="file" id="foto" value="{{ isset($musicaagrupacione->foto) ? $musicaagrupacione->foto : ''}}" >
    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($musicaagrupacione->nombre) ? $musicaagrupacione->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('informacion') ? 'has-error' : ''}}">
    <label for="informacion" class="control-label">{{ 'Informacion' }}</label>
    <input class="form-control" name="informacion" type="text" id="informacion" value="{{ isset($musicaagrupacione->informacion) ? $musicaagrupacione->informacion : ''}}" >
    {!! $errors->first('informacion', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
