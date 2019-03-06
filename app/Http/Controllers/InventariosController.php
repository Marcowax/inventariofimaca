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
use Barryvdh\DomPDF\Facade as PDF;
use DB;

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
		$inventario = DB::table('marcas')
			->join('inventarios', 'marcas.id', '=', 'inventarios.marca_id')
			->select('inventarios.id as id', 'inventarios.nombre_equipo as nombre_equipo', 'inventarios.serial as serial', 'inventarios.modelo as modelo', 'marcas.nombre_marca as nombre_marca')
			->paginate(8);		
		
		//return $inventario;
		return view('inventarios.index')->with('inventario', $inventario);
    }
	
	
    public function pdf()
    {        
        /**
         * toma en cuenta que para ver los mismos 
         * datos debemos hacer la misma consulta
        **/
		
		set_time_limit(300);
        $inventario = DB::table('marcas')
			->join('inventarios', 'marcas.id', '=', 'inventarios.marca_id')
			->select('inventarios.id as id', 'inventarios.nombre_equipo as nombre_equipo', 'inventarios.serial as serial', 'inventarios.modelo as modelo', 'marcas.nombre_marca as nombre_marca')
			->get();

        $pdf = PDF::loadView('inventarios.pdf.inventario', compact('inventario'));

        return $pdf->download('listado.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	public function ShowForm()
	{
		$fecha_registro = date("d-m-Y");
		$marcas = Marca::orderBy('nombre_marca', 'asc')->get();
		$tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
		$ubicaciones = Ubicacion::orderBy('nombre_ubicacion', 'asc')->get();
		return view('inventarios.new')->with(array('marcas' => $marcas, 'tipos' => $tipos, 'ubicaciones' => $ubicaciones, 'fecha_registro' => $fecha_registro));
	}
	
	public function ShowTipo($id)
	{
		$equipo = DB::table('inventarios')
			->select('id', 'nombre_equipo', 'serial', 'modelo')
				->where('tipo_id', '=', $id)
				->get();
		$tipo = tipo::find($id);
		return view('inventarios.detalles')->with(array('equipo' => $equipo, 'tipo' => $tipo));
	}
	
	public function Contador()
	{
		$ContadorTotal = DB::table('inventarios')
			->select(DB::raw('count(tipo_id) as contador, tipo_id'))
				->groupBy('tipo_id')
				->get();
		$tipo=DB::table('tipos')
			->select('nombre_tipo', 'id')
			->get();
		return view('inventarios.count')->with(array('ContadorTotal' => $ContadorTotal, 'tipo' => $tipo));
	}
	
    public function create(Request $request)
    {
	$validator = Validator::make($request->all(), [
		'nombre_equipo'=>'required',
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
		$inventario = new Inventario;
		$date = new DateTime($request->fecha_registro);
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
		return redirect('/inventarios/register')->with('mensaje', '¡El equipo se ha registrado exitosamente!');
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
        $inventario = inventario::select("id","nombre_equipo", "serial", "marca_id", "tipo_id", "modelo", 'ubicacion_id', 'fecha_registro', 'activo')->findOrFail($id);
		$marca_actual = marca::find($inventario->marca_id);
		$tipo_actual = tipo::find($inventario->tipo_id);
		$ubicacion_actual = ubicacion::find($inventario->ubicacion_id);
		return view('inventarios.showinventario')->with(array('inventario' => $inventario, 'marca_actual' => $marca_actual, 'tipo_actual' => $tipo_actual, 'ubicacion_actual' => $ubicacion_actual));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventario = inventario::select('id', 'nombre_equipo', 'serial', 'marca_id', 'tipo_id', 'modelo', 'ubicacion_id', 'fecha_registro')->findOrFail($id);
		$date = new DateTime($inventario->fecha_registro);
		$inventario->fecha_registro = $date->format('d-m-Y');
		$marcas = Marca::orderBy('nombre_marca', 'asc')->get();
		$marca_actual = marca::find($inventario->marca_id);
		$tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
		$tipo_actual = tipo::find($inventario->tipo_id);
		$ubicaciones = Ubicacion::orderBy('nombre_ubicacion', 'asc')->get();
		$ubicacion_actual = ubicacion::find($inventario->ubicacion_id);
		return view('inventarios.editinventario')->with(array('inventario' => $inventario, 'marcas' => $marcas, 'tipos' => $tipos, 'ubicaciones' => $ubicaciones, 'marca_actual' => $marca_actual, 'tipo_actual' => $tipo_actual, 'ubicacion_actual' => $ubicacion_actual));
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
		'nombre_equipo'=>'required',
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
		$inventario = inventario::find($id);
		$date = new DateTime($request->fecha_registro);
		$inventario->nombre_equipo = $request->nombre_equipo;
		$inventario->serial = $request->serial;
		$inventario->marca_id = $request->marca;
		$inventario->modelo = $request->modelo;
		$inventario->tipo_id = $request->tipo;
		$inventario->ubicacion_id = $request->ubicacion;
		$inventario->fecha_registro = $date->format('Y-m-d');
		$inventario->activo = $request->activo;
		$inventario->updated_at = now();
		$inventario->save();
		return redirect('/inventarios')->with('mensaje', '¡El equipo se ha modificado exitosamente!');
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
	
	public function destroyMany(Request $request)
    {
		if(empty($request->ids)){
			$marcas = Marca::orderBy('nombre_marca', 'asc')->get();
			$tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
			$ubicaciones = Ubicacion::orderBy('nombre_ubicacion', 'asc')->get();
			//return $inventario;
			return back()->with(array('marcas' => $marcas, 'tipos' => $tipos, 'ubicaciones' => $ubicaciones, 'mensaje' => '¡Debe seleccionar al menos un equipo!'));	
		}else{
			Inventario::destroy($request->ids);
			$marcas = Marca::orderBy('nombre_marca', 'asc')->get();
			$tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
			$ubicaciones = Ubicacion::orderBy('nombre_ubicacion', 'asc')->get();
			//return $inventario;
			return back()->with(array('marcas' => $marcas, 'tipos' => $tipos, 'ubicaciones' => $ubicaciones, 'mensaje' => '¡Los equipos seleccionados han sido eliminados exitosamente!'));
		}
    }
}