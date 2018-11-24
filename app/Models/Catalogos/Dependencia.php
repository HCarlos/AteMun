<?php

namespace App\Models\Catalogos;

use App\Filters\Catalogo\Dependencia\DependenciaFilter;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dependencia extends Model
{
    use SoftDeletes;

    protected $guard_name = 'web';
    protected $table = 'dependencias';

    protected $fillable = [
        'id', 'dependencia', 'abreviatura','class_css','visible_internet','is_areas','jefe_id','user_id',
    ];
    protected $casts = ['visible_internet'=>'boolean','is_areas'=>'boolean',];

    public function scopeFilterBy($query, $filters){
        return (new DependenciaFilter())->applyTo($query, $filters);
    }

    public function jefe() {
//        return $this->belongsTo(User::class,'jefe_id','id');
        return $this->hasOne(User::class,'id','jefe_id');
    }

    public function estatus(){
        return $this->belongsToMany(Estatu::class,'estatus','estatu_id');
    }

    public function isVisibleInternet(){
        return $this->visible_internet;
    }

    public function isArea(){
        return $this->is_areas;
    }

    public static function findOrImport($dependencia,$abreviatura,$class_css,$visible_internet,$is_areas,$jefe_id,$user_id){
        $obj = static::where('dependencia', $dependencia)->first();
        if (!$obj) {
            $obj = static::create([
                'dependencia' => strtoupper($dependencia),
                'abreviatura' => strtoupper($abreviatura),
                'class_css' => $class_css,
                'visible_internet' => $visible_internet,
                'is_areas' => $is_areas,
                'jefe_id' => $jefe_id,
                'user_id' => $user_id,
            ]);
        }
//        $jefe = User::find($jefe_id);
//        $obj->Jefe()->create($jefe);
        return $obj;
    }


}