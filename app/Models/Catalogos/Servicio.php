<?php

namespace App\Models\Catalogos;

use App\Filters\Catalogo\ServicioFilter;
use App\Models\Denuncias\Denuncia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
    use SoftDeletes;

    protected $guard_name = 'web';
    protected $table = 'servicios';

    protected $fillable = [
        'id', 'servicio','habilitado', 'medida_id', 'subarea_id',
    ];

    protected $casts = ['habilitado'=>'boolean',];

    public function scopeFilterBy($query, $filters){
        return (new ServicioFilter())->applyTo($query, $filters);
    }

    public function isEnabled(){
        return $this->habilitado;
    }

    public function medida() {
        return $this->hasOne(Medida::class,'id', 'medida_id');
    }

//    public function medidas() {
//        return $this->hasOne(Medida::class,'id', 'medida_id');
//    }


    public function subarea() {
        return $this->hasOne(Subarea::class,'id','subarea_id');
    }

    public function subareas() {
        return $this->belongsToMany(Subarea::class,'servicio_subarea','servicio_id','subarea_id');
    }

    public function area() {
        return $this->hasOne(Area::class,'id','area_id');
    }

    public function dependencia(){
        return $this->hasOne(Dependencia::class,'id','servicio_id');
    }

    public function dependencias(){
        return $this->belongsToMany(Dependencia::class,'denuncia_dependencia_servicio_estatus','servicio_id','dependencia_id');
    }

    public function denuncias(){
        return $this->belongsToMany(Denuncia::class,'denuncia_dependencia_servicio_estatus','servicio_id','denuncia_id');
    }

    public function estatus(){
        return $this->belongsToMany(Estatu::class,'denuncia_dependencia_servicio_estatus','servicio_id','estatu_id');
    }


    public static function findOrImport($servicio,$habilitado,$medida_id,$subarea_id){
        $obj = static::where('servicio', trim($servicio))->first();
        if (!$obj) {
            $obj = static::create([
                'servicio' => strtoupper(trim($servicio)),
                'habilitado' => $habilitado,
                'medida_id' => $medida_id,
                'subarea_id' => $subarea_id,
            ]);
            if ($obj->id > 0) {
                $obj->subareas()->attach($subarea_id);
            }
        }
        return $obj;
    }
    
    
    
}
