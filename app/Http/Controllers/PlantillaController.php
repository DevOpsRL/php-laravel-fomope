<?php

namespace App\Http\Controllers;

use App\Models\Plantilla;
use App\Models\Movimiento;
use Illuminate\Http\Request;
//
use Illuminate\Support\Facades\DB;

class PlantillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos = Plantilla::get()->take(50);
        //dd($datos);

        return view('pages.plantillas.index', compact('datos'));
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
     * @param  \App\Models\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function show(Plantilla $plantilla)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function edit(Plantilla $plantilla)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plantilla $plantilla)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plantilla  $plantilla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantilla $plantilla)
    {
        //
    }

    /************************************/
    public function busqueda(Request $request) {

        $term = explode(' ',$request->get('subq-p'));
        //
       
        $q = "%".implode('%', $term)."%";
        
        $search = Plantilla::select('rfc', 'nombre', 'clave_presupuestal', 'curp')
            ->where('nombre', 'iLIKE', $q)
            ->get()->take(50); // various
        
        //dd($qlog);
        $fmov = Movimiento::where('habilitado','=',1)->get();

        return view('pages.plantillas.search', compact('search', 'q', 'fmov'));
        
    }
}
