<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Captura;
use App\Models\Movimiento;

use App\Http\Controllers\FormatoBajas;
use App\Http\Controllers\FormatoAltas;
use App\Http\Controllers\FormatoSimple;


class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $anio, $quincena)
    {
        //que quincena a visualizar
        // dd($request);
        $q = intval($quincena);
        $a = intval($anio);

        //dd($quincena, $anio);
        $obj = Captura::where('anio', $a)
            ->where('quincena', $q)
            ->orderBy('movimiento', 'ASC')
            ->orderBy('cr', 'ASC')
            ->get();
        
        return view('pages.reportes.index', compact('obj'));
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
     * @param  \App\Models\Captura  $captura
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $movto = intval($request->input('movimiento'));
        $anio = intval($request->input('anio'));
        $quincena = intval($request->input('quincena'));
        $rfc = $request->input('rfc');

        $obj = Captura::where('anio',$anio)
            ->where('quincena', $quincena)
            ->where('rfc','=', $rfc)
            ->where('movimiento','=', $movto)
            ->first();
        
        $rpt= $this->get_tipo_reporte($movto, $obj);
        //dd($rpt);
        $rpt->reporte();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Captura  $captura
     * @return \Illuminate\Http\Response
     */
    public function edit(Captura $captura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Captura  $captura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Captura $captura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Captura  $captura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Captura $captura)
    {
        //
    }

    /************************************************************************/
    public function search(){
        //retornar el listado de capturas (agrupar por yar y por qna)
        $search = Captura::select('anio','quincena')
            ->selectRaw('count(quincena) as numeral')
            ->groupBy(['anio', 'quincena'])
            ->orderBy('anio', 'DESC')
            ->orderBy('quincena', 'DESC')
            ->get();
        //dd($search);
        return view('pages.reportes.search', compact('search'));

    }

    /************************************************************************/

    public function get_tipo_reporte($movimiento, $obj){
        
        $movto = Movimiento::where('movto','=',$movimiento)->first();

        switch(intval($movto->movto)){
            case 1101:
            case 1102:
            case 1103:
                $rpt = new FormatoBajas($obj);
                break;
            case 2003:
            case 2004:
                $rpt = new FormatoLicencias($obj);
                break;
            case 3001:
            case 3004:
                $rpt = new FormatoReanudaciones($obj);
                break;
            case 4003:
            case 4005:
            case 4503:
                $rpt = new FormatoAltas($obj);
                break;
            case 8201:
                $rpt = new FormatoTitularizacion($obj);
                break;
            case 5001:
            case 5002:
            case 5501:
                $rpt = new FormatoPromociones($obj);
                break;
            //en cualquier caso, FormatoSimple
            default: $rpt = new FormatoSimple($obj);
                break;
        }
        return $rpt;
    }
}
