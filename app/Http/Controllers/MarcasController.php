<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\MarcaRequest;
use DB;

class MarcasController extends Controller
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
		$ContadorTotal = DB::table('inventarios')
			->select(DB::raw('count(marca_id) as contador, marca_id'))							
				->groupBy('marca_id')
				->get();
		$marca=DB::table('marcas')
			->select('nombre_marca', 'id')
			->orderBy('nombre_marca', 'asc')
			->paginate(20);
		return view('marcas.index')->with(array('ContadorTotal' => $ContadorTotal, 'marca' => $marca));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function ShowForm()
	{
		return view('marcas.new');
	}
	
	public function ShowMarca($id)
	{
		$equipo = DB::table('inventarios')
			->select('id', 'nombre_equipo', 'serial', 'modelo')
				->where('marca_id', '=', $id)
				->get();
		$marca = marca::find($id);
		return view('marcas.detalles')->with(array('equipo' => $equipo, 'marca' => $marca));
	}
	
	public function create(Request $request)
    {
		$validator = Validator::make($request->all(), [
		'nombre_marca'=>'required|unique:marcas,nombre_marca,'.$request->id,
	]);

	if($validator->fails()){
	return back()->withInput()->withErrors($validator);
	}
		$marca = new Marca;
		$marca->nombre_marca = $request->nombre_marca;
		$marca->created_at = now();
		$marca->updated_at = now();
		$marca->save();
		return redirect('/marcas/register')->with('mensaje', '¡La marca se ha registrado exitosamente!');
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
        $marca = marca::findOrFail($id);
		return view('marcas.editmarca')->with('marca', $marca);
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
		'nombre_marca'=>'required|unique:marcas,nombre_marca,'.$request->id,
	]);

	if($validator->fails()){
	return back()->withInput()->withErrors($validator);
	}
		$marca = marca::find($id);
		$marca->nombre_marca = $request->nombre_marca;
		$marca->updated_at = now();
		$marca->save();
		return redirect('/marcas')->with('mensaje', '¡La marca se ha modificado exitosamente!');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Marca::destroy($id);
		$marcas = Marca::orderBy('nombre_marca', 'asc')->get();
		//return $inventario;
		return back()->with(array('marcas' => $marcas, 'mensaje' => '¡La marca ha sido eliminado exitosamente!'));
    }
	public function destroyMany(Request $request)
    {
		if(empty($request->ids)){
			$marcas = Marca::orderBy('nombre_marca', 'asc')->get();
			//return $inventario;
			return back()->with(array('marcas' => $marcas, 'mensaje' => '¡Debe seleccionar al menos una marca!'));
		}else{
			Marca::destroy($request->ids);
			$marcas = Marca::orderBy('nombre_marca', 'asc')->get();
			//return $inventario;
			return back()->with(array('marcas' => $marcas, 'mensaje' => '¡Las marcas selecionas han sido eliminados exitosamente!'));
		}
	}
}