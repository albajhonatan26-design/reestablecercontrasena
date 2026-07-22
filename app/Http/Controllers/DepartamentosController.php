<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamentos;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Consultar los departamentos y mostrarlos en las vistas 
        $departamentos = Departamentos::orderBy('nombre','ASC')->get();
        return view('departamentos.listar', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamentos.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  Enviiar los datos a la base de datos
        $departamento = new Departamentos();
        $departamento->nombre = $request->nombre;
        $departamento->save();
        return redirect()->route('departamentos.index');
    }

    /** 
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Aca llamamos al formulario
        $departamento = Departamentos::findOrFail($id);
        return view('departamentos.editar', compact('departamento'));
    }

    /**
     * 
     */
    public function update(Request $request, string $id)
    {
        $departamento = Departamentos::findOrFail($id);
        $departamento->nombre = $request->nombre;
        $departamento->save();
        return redirect()->route('departamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departamento = Departamentos::findOrFail($id);
        $departamento->delete();
        return redirect()->route('departamentos.index');
    }
}
