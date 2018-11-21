<div class="form-group row mb-3">
    <label for = "clave_nivel" class="col-md-3 col-form-label">Clave</label>
    <div class="col-md-9">
        <input type="text" name="clave_nivel" id="clave_nivel" value="{{ old('clave_nivel',$items->clave_nivel) }}" class="form-control"  />
    </div>
    <label for = "nivel" class="col-md-3 col-form-label">Nivel</label>
    <div class="col-md-9">
        <input type="text" name="nivel" id="nivel" value="{{ old('nivel',$items->nivel) }}" class="form-control"  />
    </div>

    <label for = "clave_nivel_registro" class="col-md-3 col-form-label">Clave Registro</label>
    <div class="col-md-9">
        <input type="text" name="clave_nivel_registro" id="clave_nivel_registro" value="{{ old('clave_nivel_registro',$items->clave_nivel_registro) }}" class="form-control" />
    </div>
    <label for = "nivel_oficial" class="col-md-3 col-form-label">Clave Oficial</label>
    <div class="col-md-9">
        <input type="text" name="nivel_oficial" id="nivel_oficial" value="{{ old('nivel_oficial',$items->nivel_oficial) }}" class="form-control" />
    </div>
    <label for = "prefijo_evaluacion" class="col-md-3 col-form-label">Prefijo Eval.</label>
    <div class="col-md-9">
        <input type="text" name="prefijo_evaluacion" id="prefijo_evaluacion" value="{{ old('prefijo_evaluacion',$items->prefijo_evaluacion) }}" class="form-control" />
    </div>

    <label for = "numero_evaluacion" class="col-md-3 col-form-label">Número Eval.</label>
    <div class="col-md-9">
        <input type="number" min="1" max="8" name="numero_evaluacion" id="numero_evaluacion" value="{{ old('numero_evaluacion',$items->numero_evaluacion) }}" class="form-control" />
    </div>
    <label for = "nivel_fiscal" class="col-md-3 col-form-label">Nivel Fiscal</label>
    <div class="col-md-9">
        <input type="text" name="nivel_fiscal" id="nivel_fiscal" value="{{ old('nivel_fiscal',$items->nivel_fiscal) }}" class="form-control" />
    </div>
    <label for = "fecha_actas" class="col-md-3 col-form-label">Fecha Actas</label>
    <div class="col-md-9">
        <input type="date" name="fecha_actas" id="fecha_actas" value="{{ old('fecha_actas',$items->fecha_actas) }}" class="form-control" />
    </div>
</div>


<input type="hidden" name="id" value="{{$items->id}}" >

<hr>
