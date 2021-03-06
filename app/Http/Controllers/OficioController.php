<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oficio;

class OficioController extends Controller
{

    
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //listar todas las especialidades
         $oficios = Oficio::get();
         $listaoficio = [];
         foreach ($oficios as $oficio) {
             if($oficio->id != 1){
                 $listaespecialidades = [];
                 $especialidades = Oficio::find($oficio->id)->especialidad;
                 foreach($especialidades as $especialidad){
                     array_push($listaespecialidades, $especialidad);
                 }
                 array_push($listaoficio, ['Oficio'=>$oficio ,'Especialidades'=>$listaespecialidades]);
             }
         }
         //return dd($listaoficio);
         return view('admin.altaOficio', [
             'listaoficio' => $listaoficio
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valido los datos enviados del formulario
        $this->validate($request, [
            'nombre' => 'required|unique',
        ]);

        // crear un nuevo recurso
        $oficio = new Oficio();
    	$oficio->nombre = $request['nombre'];
    	$oficio->save();
        //retorn
        return back()->with('message', 'Guardado con Éxito.')->with('typealert', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $oficio = Oficio::find($id);
            $oficio->delete();
            return back()->with('message', 'Se borró exitosamente : '.$oficio->nombre)->with('typealert', 'success');
        } catch (\Throwable $th) {
            return back()->with('message', 'Error al borrar (No se puede borrar un oficio que se encuentra asignado)')->with('typealert', 'danger');
        }
    }
    public function nuevo(){
        
        return back()->with('message', 'Guardado con Éxito.')->with('typealert', 'success');
    }
}
