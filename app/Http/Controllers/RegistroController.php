<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registro;

class RegistroController extends Controller
{

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros=Registro::orderBy('id','DESC')->paginate(3);
        return view('Registro.index',compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Registro.create');
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
        $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'correo'=>'required', 'telefono'=>'required']);
        Registro::create($request->all());
        return redirect()->route('registro.index')->with('success','Registro creado satisfactoriamente');
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
        $registros=Registro::find($id);
        return  view('registro.show',compact('registros'));
      
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
        $registro=registro::find($id);
        return view('registro.edit',compact('registro'));
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
        $this->validate($request,[ 'nombre'=>'required', 'apellido'=>'required', 'correo'=>'required', 'telefono'=>'required']);

        registro::find($id)->update($request->all());
        return redirect()->route('registro.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Registro::find($id)->delete();
        return redirect()->route('registro.index')->with('success','Registro eliminado satisfactoriamente');
    }


     /**
     * Ejemplo de método REST 
     *
     * @return \Illuminate\Http\Response
     */

    public function getRegistros(){
        $registros=Registro::all();
        return response()->json($registros);
    }
}
