<?php

namespace App\Http\Controllers;

use App\Exports\ProviderExport;
use App\Models\Provider;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::orderBy('updated_at', 'desc')->paginate(15);

        return view('providers.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Provider::create($request->all());

            return redirect()->route('providers.index')->with('message', 'Creado con Exito');
        } catch (\Throwable $th) {
            return 'Error en la Base de Datos';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('providers.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        try {
            $provider->update($request->all());

            return redirect()->route('providers.index')->with('message', 'Actualizado con Exito');
        } catch (\Throwable $th) {
            return 'Error en la Base de Datos';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        try {
            $provider->delete();

            return redirect()->route('providers.index')->with('message', 'Eliminado con Exito');
        } catch (\Throwable $th) {
            return 'Error en la Base de Datos';
        }
    }

    public function export()
    {
        return Excel::download(new ProviderExport, 'Proveedores.xlsx');
    }
}
