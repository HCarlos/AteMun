<?php

namespace App\Http\Requests\Domicilio;

use App\Models\Catalogos\Domicilios\Codigopostal;
use App\Models\Catalogos\Domicilios\Comunidad;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Catalogos\Domicilios\Colonia;
use App\Rules\Uppercase;
use App\Classes\MessageAlertClass;
use Illuminate\Database\QueryException;

class ColoniaRequest extends FormRequest
{


    protected $redirectRoute = 'editColonia';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'colonia'         => ['required','min:2',new Uppercase,'unique:colonias,colonia,'.$this->id],
            'latitud'         => ['present'],
            'longitud'        => ['present'],
            'altitud'         => ['present'],
            'codigopostal_id' => ['required'],
            'comunidad_id'    => ['required'],
        ];
    }

    public function manage()
    {

        try {

            $CPs = Codigopostal::findOrFail($this->codigopostal_id);
            $Comunidad = Comunidad::findOrFail($this->comunidad_id);
            $Item = [
                'colonia' => strtoupper($this->colonia),
                'altitud' => $this->altitud ?? null,
                'latitud' => $this->latitud ?? null,
                'longitud' => $this->longitud ?? null,
                'codigopostal_id' => $this->codigopostal_id,
                'cp' => $CPs->cp,
                'comunidad_id' => $this->comunidad_id,
                'tipocomunidad_id' => $Comunidad->tipocomunidad_id,
            ];


            if ($this->id == 0) {
                $item = Colonia::create($Item);
            } else {
                $item = Colonia::find($this->id);
                $item->update($Item);
            }
        }catch (QueryException $e){
            $Msg = new MessageAlertClass();
            return $Msg->Message($e);
        }
        return $item;
    }

    protected function getRedirectUrl()
    {
        $url = $this->redirector->getUrlGenerator();
        if ($this->id > 0){
            return $url->route($this->redirectRoute,['Id'=>$this->id]);
        }else{
            return $url->route('newColonia');
        }
    }






}
