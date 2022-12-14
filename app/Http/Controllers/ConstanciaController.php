<?php

namespace App\Http\Controllers;

//use App\Models\Captura;
use Illuminate\Http\Request;

use App\Exports\CapturasExport;
use Maatwebsite\Excel\Facades\Excel;

class ConstanciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.constancia.index');
    }

    /*******************/
    public function export(Request $request){

        $a = $request->input('anio', 2022);
        $q = $request->input('quincena');
        $fname = "contancia_".$a."__".$q.".xlsx";

        //return (new CapturasExport($a, $q))->download($fname);
        return Excel::download( new CapturasExport($a,$q), $fname);
    }
}
