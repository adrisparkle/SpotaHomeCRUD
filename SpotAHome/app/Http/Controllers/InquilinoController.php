<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquilino;

class InquilinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Supongo la llamada a la bdd y la paginacion
        $inquilinos=Inquilino::orderBy('id','DESC')->paginate(3);
        //retorna la vista
        return view('Inquilino.index', compact('inquilinos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Esto si no entiendo, una vista supongo
        return view('Inquilino.create');
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
        $this->validate($request,['nombre'=>'required','email'=>'required','telefono'=>'required','fecha_nacimiento'=>'required','genero'=>'required','nacionalidad'=>'required','usuario'=>'required','contraseña'=>'required']);
        Inquilino::created($request->all());
        return redirect()->route('Inquilino.index')->with('success','Registro creado satisfactoriamente');

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
        $inquilinos=Inquilino::find($id);
        return view('Inquilino.show', compact('inquilinos'));
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
        $inquilinos=Inquilino::find($id);
        return view('Inquilino.edit',compact('inquilinos'));
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
        $this->validate($request,['nombre'=>'required','email'=>'required','telefono'=>'required','fecha_nacimiento'=>'required','genero'=>'required','nacionalidad'=>'required','usuario'=>'required','contraseña'=>'required']);
        Inquilino::find($id)->update($request->all());

        return redirect()->route('Inquilino.index')->with('success','Registro actualizado satisfactoriamente');

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
        Inquilino::find($id)->delete();
        return redirect()->route('Inquilino.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
