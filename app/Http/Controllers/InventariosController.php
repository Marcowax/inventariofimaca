<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;
use App\Marca;
use App\Tipo;
use App\Ubicacion;
use DateTime;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\InventarioRequest;

class InventariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
        $inventario = Inventario::orderBy('nombre_equipo', 'asc')->get();
		//return $inventario;
		return view('inventarios.index')->with('inventario', $inventario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	public function ShowForm()
	{
		$marcas = Marca::orderBy('nombre_marca', 'asc')->get();
		$tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
		$ubicaciones = Ubicacion::orderBy('nombre_ubicacion', 'asc')->get();
		return view('inventarios.new')->with(array('marcas' => $marcas, 'tipos' => $tipos, 'ubicaciones' => $ubicaciones));
	}
	
    public function create(Request $request)
    {
	$validator = Validator::make($request->all(), [
		'serial'=>'required|unique:inventarios,serial,'.$request->id,
		'marca'=>'required',
		'modelo'=>'required',
		'tipo'=>'required',
		'ubicacion'=>'required',
		'fecha_registro'=>'required|date_format:d-m-Y',
		'activo'=>'required',
	]);

	if($validator->fails()){
	return back()->withInput()->withErrors($validator);
	}
		$date = new DateTime($request->fecha_registro);
		$inventario = new Inventario;
		$inventario->nombre_equipo = $request->nombre_equipo;
		$inventario->serial = $request->serial;
		$inventario->marca_id = $request->marca;
		$inventario->modelo = $request->modelo;
		$inventario->tipo_id = $request->tipo;
		$inventario->ubicacion_id = $request->ubicacion;
		$inventario->fecha_registro = $date->format('Y-m-d');
		$inventario->activo = $request->activo;
		$inventario->created_at = now();
		$inventario->updated_at = now();
		$inventario->save();
		return redirect('/inventarios/register')->with('mensaje', '¡El Equipo se ha registrado exitosamente!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventario::destroy($id);
		$marcas = Marca::orderBy('nombre_marca', 'asc')->get();
		$tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
		$ubicaciones = Ubicacion::orderBy('nombre_ubicacion', 'asc')->get();
		//return $inventario;
		return back()->with(array('marcas' => $marcas, 'tipos' => $tipos, 'ubicaciones' => $ubicaciones, 'mensaje' => '¡El equipo ha sido eliminado exitosamente!'));
    }
}
