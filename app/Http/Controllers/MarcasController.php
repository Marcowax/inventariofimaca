<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\MarcaRequest;

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
        $marcas = Marca::orderBy('nombre_marca', 'asc')->get();
		//return $marcas;
		return view('marcas.index')->with('marcas', $marcas);
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
		return redirect('/marcas/register')->with('mensaje', '¡El Equipo se ha registrado exitosamente!');
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
        Marca::destroy($id);
		$marcas = Marca::orderBy('nombre_marca', 'asc')->get();
		//return $inventario;
		return back()->with(array('marcas' => $marcas, 'mensaje' => '¡La marca ha sido eliminado exitosamente!'));
    }
}
