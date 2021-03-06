<?php

namespace App;

use App\Filters\User\UserFilter;
use App\Models\Denuncias\Respuesta;
use App\Models\Familias\Familia;
use App\Models\Familias\Parentesco;
use App\Models\Users\UserAdress;
use App\Models\Users\UserDataExtend;
use App\Notifications\MyResetPassword;
use App\Traits\User\UserAttributes;
use App\Traits\User\UserImport;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
//use App\Notifications\MyResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements MustVerifyEmail
{
    use SoftDeletes, Notifiable;
    use HasRoles;
    use UserImport, UserAttributes;

    protected $guard_name = 'web';
    protected $table = 'users';

    protected $fillable = [
        'id',
        'username', 'email', 'password',
        'nombre','ap_paterno','ap_materno',
        'admin','alumno','delegado',
        'curp','emails','celulares','telefonos',
        'fecha_nacimiento','genero',
        'root','filename','filename_png','filename_thumb',
        'empresa_id','status_user','ip','host',
        'logged','logged_at','logout_at',
    ];

    protected $hidden = ['password', 'remember_token',];
    protected $casts = ['admin'=>'boolean','alumno'=>'boolean','delegado'=>'boolean',];

    public function scopeFilterBy($query, $filters){
        return (new UserFilter())->applyTo($query, $filters);
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function user_adress(){
        return $this->hasOne(UserAdress::class);
    }

    public function user_data_extend(){
        return $this->hasOne(UserDataExtend::class);
    }

    public function respuestas(){
        return $this->belongsToMany(Respuesta::class);
    }

    public function isAdmin(){
        return $this->admin;
    }

    public function isDelegado(){
        return $this->delegado;
    }

    public function isRole($role): bool{
        return $this->hasRole($role);
    }

    public function IsEmptyPhoto(){
        return $this->filename == '' ? true : false;
    }

    public function IsFemale(){
        return $this->genero == 0 ? true : false;
    }

    public function scopeMyID(){
        return $this->id;
    }

    public function scopeRole(){
        return $this->roles()->first();
    }

    public function sendPasswordResetNotification($token){
        $this->notify(new MyResetPassword($token));
    }



}

