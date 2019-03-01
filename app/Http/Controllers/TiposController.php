<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TipoRequest;

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
		//return $inventario;
		return view('tipos.index')->with('tipos', $tipos);
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
		$tipo->save();
		return redirect('/tipos/register')->with('mensaje', '¡El tipo se ha registrado exitosamente!');
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
        Tipo::destroy($id);
		$tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
		//return $inventario;
		return back()->with(array('tipos' => $tipos, 'mensaje' => '¡El tipo ha sido eliminado exitosamente!'));
    }
}
