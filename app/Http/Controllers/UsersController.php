<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Auth;
use Hash;

class UsersController extends Controller
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
        $users = User::paginate(8);
		//return $users;
		return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $user = user::findOrFail($id);
		return view('/users/edituser')->with('user', $user);
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
		'nombre'=>'required',
		'email'=>'required|email|unique:users,email,'.$request->id,
		'administrador'=>'required',
	]);

	if($validator->fails()){
	return back()->withInput()->withErrors($validator);
	}
		$user = user::find($id);
		$user->name = $request->nombre;
		$user->email = $request->email;
		$user->administrator = $request->administrador;
		$user->updated_at = now();
		$user->save();
		return redirect('/users')->with('mensaje', '¡El Usuario se ha modificado exitosamente!');
	}
	
	public function password()
    {
        return view('users.password');
    }
	
	public function passwordupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
		'password_actual'=>'required',
		'nuevo_password'=>'required|min:6|max:18',
		'confirmar_password' => 'required|same:nuevo_password'
	]);
	
		if($validator->fails()){
			return back()->withInput()->withErrors($validator);
		}
	
		if (Hash::check($request->password_actual, Auth::user()->password)){
			$user = new User;
			$user->where('email', '=', Auth::user()->email)
				 ->update(['password' => bcrypt($request->nuevo_password)]);
			return redirect('/users/password')->with('mensaje', '¡El Usuario ha modificado su contraseña exitosamente!');
		}else{
			return redirect('/users/password')->with('mensaje', '¡La contraseña actual no es válida!');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
		return redirect('/users')->with('mensaje', '¡Usuario eliminado exitosamente!');
    }
}
