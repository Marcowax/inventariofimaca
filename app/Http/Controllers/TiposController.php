<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TipoRequest;
use DB;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ContadorTotal = DB::table('inventarios')
			->select(DB::raw('count(tipo_id) as contador, tipo_id'))							
				->groupBy('tipo_id')
				->get();
		$tipo=DB::table('tipos')
			->select('nombre_tipo', 'id')
			->orderBy('nombre_tipo', 'asc')
			->paginate(20);
		return view('tipos.index')->with(array('ContadorTotal' => $ContadorTotal, 'tipo' => $tipo));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function ShowForm()
	{
		return view('tipos.new');
	}
	
	public function ShowTipo($id)
	{
		$equipo = DB::table('inventarios')
			->select('id', 'nombre_equipo', 'serial', 'modelo')
				->where('tipo_id', '=', $id)
				->get();
		$tipo = tipo::find($id);
		return view('tipos.detalles')->with(array('equipo' => $equipo, 'tipo' => $tipo));
	}

    public function create(Request $request)
    {
		$validator = Validator::make($request->all(), [
		'nombre_tipo'=>'required|unique:tipos,nombre_tipo,'.$request->id,
	]);

	if($validator->fails()){
	return back()->withInput()->withErrors($validator);
	}
		$tipo = new Tipo;
		$tipo->nombre_tipo = $request->nombre_tipo;
		$tipo->created_at = now();
		$tipo->updated_at = now();
		$tipo->save();
		return redirect('/tipos/register')->with('mensaje', '¡El tipo de equipo se ha registrado exitosamente!');
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
        $tipo = tipo::findOrFail($id);
		return view('tipos.edittipo')->with('tipo', $tipo);
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
		'nombre_tipo'=>'required|unique:tipos,nombre_tipo,'.$request->id,
	]);

	if($validator->fails()){
	return back()->withInput()->withErrors($validator);
	}
		$tipo = tipo::find($id);
		$tipo->nombre_tipo = $request->nombre_tipo;
		$tipo->updated_at = now();
		$tipo->save();
		return redirect('/tipos')->with('mensaje', '¡El tipo de equipo se ha modificado exitosamente!');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tipo::destroy($id);
		$tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
		//return $tipo;
		return back()->with(array('tipos' => $tipos, 'mensaje' => '¡El tipo ha sido eliminado exitosamente!'));
    }
	
    public function destroyMany(Request $request)
    {
		if(empty($request->ids)){
			$tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
			//return $tipo;
			return back()->with(array('tipos' => $tipos, 'mensaje' => '¡Debe seleccionar al menos un tipo!'));
		}else{
			Tipo::destroy($request->ids);
			$tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
			//return $tipo;
			return back()->with(array('tipos' => $tipos, 'mensaje' => '¡Los tipos seleccionados han sido eliminados exitosamente!'));
		}
    }
}