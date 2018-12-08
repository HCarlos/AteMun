
<div class="form-group row mb-3">
    <label for = "calle_id" class="col-md-3 col-form-label">Calle</label>
    <div class="col-md-9">
        <select class="calle_id form-control select2" data-toggle="select2"  name="calle_id" id="calle_id" size="1">
            @foreach($calles as $t)
                <option value="{{$t->id}}" {{ old('calle_id') == $t->id ? ' selected ':''}}>{{ $t->calle }}</option>
            @endforeach
        </select>
    </div>
    <label for = "num_ext" class="col-md-3 col-form-label">Núm. Exterior</label>
    <div class="col-md-9">
        <input type="text" name="num_ext" id="num_ext" value="{{ old('num_ext') }}" class="form-control" />
    </div>
    <label for = "num_int" class="col-md-3 col-form-label">Núm. Interior</label>
    <div class="col-md-9">
        <input type="text" name="num_int" id="num_int" value="{{ old('num_int') }}" class="form-control" />
    </div>
    <label for = "colonia_id" class="col-md-3 col-form-label">Colonia</label>
    <div class="col-md-9">
        <select class="colonia_id form-control " name="colonia_id" id="colonia_id" size="1">
            @foreach($colonias as $t)
                <option value="{{$t->id}}" {{ old('colonia_id') == $t->id ? ' selected ':''}}>{{ $t->colonia }}</option>
            @endforeach
        </select>
    </div>
    <label for = "localidad_id" class="col-md-3 col-form-label">Localidad</label>
    <div class="col-md-9">
        <select class="localidad_id form-control " name="localidad_id" id="localidad_id" size="1">
            @foreach($localidades as $t)
                <option value="{{$t->id}}" {{ old('localidad_id') == $t->id ? ' selected ':''}}>{{ $t->comunidad }}</option>
            @endforeach
        </select>
    </div>
    <label for = "codigopostal_id" class="col-md-3 col-form-label">CP</label>
    <div class="col-md-9">
        <select class="codigopostal_id form-control " name="codigopostal_id" id="codigopostal_id" size="1">
            @foreach($codigospostales as $t)
                <option value="{{$t->id}}" {{ old('codigopostal_id') == $t->id ? ' selected ':''}}>{{ $t->cp }}</option>
            @endforeach
        </select>
    </div>
    <label for = "latitud" class="col-md-3 col-form-label">Latitud</label>
    <div class="col-md-9">
        <input type="text" name="latitud" id="latitud" value="{{ old('latitud') }}" class="form-control" pattern="^(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$"/>
    </div>
    <label for = "longitud" class="col-md-3 col-form-label">Longitud</label>
    <div class="col-md-9">
        <input type="text" name="longitud" id="longitud" value="{{ old('longitud') }}" class="form-control" pattern="^(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)$"/>
    </div>
</div>
<input type="hidden" name="id" value="0" >
<input type="hidden" name="comun_id" id="comun_id" value="0" >

<hr>
