<?php

namespace App\Http\Controllers\Catalogos\Domicilio;

use App\Models\Catalogos\Domicilios\Codigopostal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Domicilio\ColoniaRequest;
use App\Models\Catalogos\Domicilios\Colonia;
use App\Models\Catalogos\Domicilios\Comunidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class ColoniaController extends Controller
{


    protected $tableName = "colonias";

// ***************** MUESTRA EL LISTADO DE USUARIOS ++++++++++++++++++++ //
    protected function index(Request $request)
    {
        ini_set('max_execution_time', 300);
        $filters = $request->all(['search']);
        $items = Colonia::query()
            ->filterBy($filters)
            ->orderByDesc('id')
            ->paginate();
        $items->appends($filters)->fragment('table');
        $user = Auth::User();

        return view('catalogos.catalogo.domicilio.colonia.colonia_list',
            [
                'items' => $items,
                'titulo_catalogo' => "Catálogo de " . ucwords($this->tableName),
                'titulo_header'   => ' ',
                'user' => $user,
                'searchInList' => 'listColonias',
                'newWindow' => true,
                'tableName' => $this->tableName,
                'showEdit' => 'editColonia',
//                'putEdit' => 'updateColonia',
                'newItem' => 'newColonia',
                'removeItem' => 'removeColonia',
//                'showProcess1' => 'showFileListUserExcel1A',
                'exportModel' => 11,
            ]
        );
    }

// ***************** EDITA LOS DATOS  ++++++++++++++++++++ //
    protected function editItem($Id)
    {
        $item = Colonia::find($Id);
        $Codigospostales =Codigopostal::all(['id','cp'])->sortBy('cp');
        $Comunidades = Comunidad::all(['id','comunidad'])->sortBy('comunidad');

        return view('catalogos.catalogo.domicilio.colonia.colonia_edit',
            [
                'user' => Auth::user(),
                'codigospostales' => $Codigospostales,
                'comunidades'     => $Comunidades,
                'items'           => $item,
                'editItemTitle'   => isset($item->colonia) ? $item->colonia : 'Nuevo',
                'putEdit'         => 'updateColonia',
                'titulo_catalogo' => "Catálogo de " . ucwords($this->tableName),
                'titulo_header'   => 'Editando el Folio '.$Id,
            ]
        );
    }

// ***************** GUARDA LOS CAMBIOS ++++++++++++++++++++ //
    protected function updateItem(ColoniaRequest $request)
    {
        $item = $request->manage();
        if (!isset($item->id)) {
            abort(405);
        }
        return Redirect::to('editColonia/'.$item->id);
    }

    protected function newItem()
    {
        $Codigospostales =Codigopostal::all(['id','cp'])->sortBy('cp');
        $Comunidades = Comunidad::all(['id','comunidad'])->sortBy('comunidad');
        //dd($Codigospostales);
        return view('catalogos.catalogo.domicilio.colonia.colonia_new',
            [
                'editItemTitle'   => 'Nuevo',
                'codigospostales' => $Codigospostales,
                'comunidades'     => $Comunidades,
                'postNew'         => 'createColonia',
                'titulo_catalogo' => "Catálogo de " . ucwords($this->tableName),
                'titulo_header'   => 'Nuevo registro ',
            ]
        );
    }

    // ***************** CREAR NUEVO ++++++++++++++++++++ //
    protected function createItem(ColoniaRequest $request)
    {
        //dd($request);
        $item = $request->manage();
//        dd($item);
        if (!isset($item->id)) {
            abort(404);
        }
        return Redirect::to('editColonia/'.$item->id);
    }

// ***************** ELIMINA EL ITEM VIA AJAX ++++++++++++++++++++ //
    protected function removeItem($id = 0)
    {
        $item = Colonia::withTrashed()->findOrFail($id);
        if (isset($item)) {
            if (!$item->trashed()) {
                $item->forceDelete();
            } else {
                $item->forceDelete();
            }
            return Response::json(['mensaje' => 'Registro eliminado con éxito', 'data' => 'OK', 'status' => '200'], 200);
        } else {
            return Response::json(['mensaje' => 'Se ha producido un error.', 'data' => 'Error', 'status' => '200'], 200);
        }
    }









}
