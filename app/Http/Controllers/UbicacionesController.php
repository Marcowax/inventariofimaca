<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ubicacion;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UbicacionRequest;

class UbicacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubicaciones = Ubicacion::orderBy('nombre_ubicacion', 'asc')->paginate(8);
		//return $ubicaciones;
		return view('ubicaciones.index')->with('ubicaciones', $ubicaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function ShowForm()
	{
		return view('ubicaciones.new');
	}
	
    public function create(Request $request)
    {
		$validator = Validator::make($request->all(), [
		'nombre_ubicacion'=>'required|unique:ubicacions,nombre_ubicacion,'.$request->id,
	]);

	if($validator->fails()){
	return back()->withInput()->withErrors($validator);
	}
		$ubicacion = new Ubicacion;
		$ubicacion->nombre_ubicacion = $request->nombre_ubicacion;
		$ubicacion->created_at = now();
		$ubicacion->updated_at = now();
		$ubicacion->save();
		return back()->with('mensaje', '¡La ubicación o departamento se ha registrado exitosamente!');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ubicacion = ubicacion::findOrFail($id);
		return view('ubicaciones.editubicacion')->with('ubicacion', $ubicacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $validator = Validator::make($request->all(), [
		'nombre_ubicacion'=>'required|unique:ubicacions,nombre_ubicacion,'.$request->id,
	]);

	if($validator->fails()){
	return back()->withInput()->withErrors($validator);
	}
		$ubicacion = ubicacion::find($id);
		$ubicacion->nombre_ubicacion = $request->nombre_ubicacion;
		$ubicacion->updated_at = now();
		$ubicacion->save();
		return redirect('/ubicaciones')->with('mensaje', '¡La ubicación se ha modificado exitosamente!');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		Ubicacion::destroy($id);
		$ubicaciones = Ubicacion::orderBy('nombre_ubicacion', 'asc')->get();
		//return $inventario;
		return back()->with(array('ubicaciones', $ubicaciones, 'mensaje' => '¡La ubicación o departamento ha sido eliminado exitosamente!'));
    }
	
	public function destroyMany(Request $request)
    {
		if(empty($request->ids)){
			$ubicaciones = Ubicacion::orderBy('nombre_ubicacion', 'asc')->get();
			//return $inventario;
			return back()->with(array('ubicaciones', $ubicaciones, 'mensaje' => '¡Debe seleccionar al menos una ubicación o departamento!'));	
		}else{
			Ubicacion::destroy($request->ids);
			$ubicaciones = Ubicacion::orderBy('nombre_ubicacion', 'asc')->get();
			//return $inventario;
			return back()->with(array('ubicaciones', $ubicaciones, 'mensaje' => '¡Las ubicaciones o departamentos seleccionados han sido eliminados exitosamente!'));
		}
    }
}