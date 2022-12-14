<?php

namespace App\Http\Controllers;

use App\Models\Captura;
use App\Models\Plantilla;
use App\Models\Genero;
use App\Models\Civil;
use App\Models\Movimiento;
use App\Models\Centro;
use Illuminate\Http\Request;
//
use App\Http\Controllers\Formatos;
use App\Http\Controllers\FomopeAltas;
use App\Http\Controllers\FomopeBajas;
use App\Http\Controllers\FomopeTitularizacion;
//
use App\Http\Requests\FomopeRequest;
use App\Http\Requests\UpdateFomopeRequest;


class CapturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fmps = Captura::all()->take(50);
        
        
        return view('pages.captura.index', compact('fmps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        //dd($request);
        $d  = $request->get('rfcid');
        $rid = $request->get('movid');
        //$pagid = 'pages.captura.create';
        //dd($rid);
      
        switch( intval($rid)){
            case 2003:
            case 2004: 
                $pageid ='pages.captura.create';break;

            case 3001:
            case 3004:$pageid ='pages.captura.create';
                break;
            case 4003:
            case 4005:
                $pageid ='pages.captura.altas';
                break;
            case 5001:
            case 5002:
            case 5501:
                $pageid ='pages.captura.promociones';
                break;
            default: $pageid ='pages.captura.create';break;
        }
        //dd($pageid);
        $dato = Plantilla::where('rfc','ILIKE', $d)->first();
        $genero = Genero::all();
        $civil = Civil::all();
        $cr_cur = $dato->cr;
        $fmov = Movimiento::where('movto','=', $rid)->first();

        //dd($fmov);
        //
        return view($pageid,compact('dato','genero','civil','fmov', 'cr_cur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FomopeRequest $request)
    {
        //

        $validacion = $request->validated();
        //
        $n = new Captura();
        //$fmp = new Fomo;
        switch(intval($request->movto)) {
            case 1101:
            case 1104:
            case 1102:
            case 1103: 
                $fmp = new FomopeBajas($request);
                $fmp->fomope();
                break;
            case 2003:
            case 2004:
                $fmp = new FomopeLicencias($request);
                $fmp->fomope();
                break;
            case 3001:
            case 3004:
                $fmp = new FomopeReanudaciones($request);
                $fmp->fomope();
                break;
            case 4005:
            case 4003:
            case 4505:
            case 4503:

                $fmp = new FomopeAltas($request);
                $fmp->fomope();
                break;
             case 8201: 
                $fmp = new FomopeTitularizacion($request);
                $fmp->fomope();
                break;
            case 5001: 
            case 5501:
            case 5002:
                $fmp = new FomopePromociones($request);
                $fmp->fomope();
                break;
            default: break;
        }
        //
        //dd($fmp);   
        $n = new Captura();
        /* Aplicar herencia para general el objeto con los datos requeridos */
        $n->rfc = $fmp->get_rfc();
        $n->nombre = $fmp->get_nombre();
        $n->curp = $fmp->get_curp();
        // Datos del Domicilios
        $n->calle= $fmp->get_calle();
        $n->numero_ext= $fmp->get_numero_ext();
        $n->numero_int= $fmp->get_numero_int();
        $n->colonia= $fmp->get_colonia();
        $n->codigo_postal= $fmp->get_postal();
        $n->municipio= $fmp->get_municipio();
        $n->estado= $fmp->get_estado();
        $n->telefono = $fmp->get_telefono();
        $n->genero = $fmp->get_genero();
        $n->civil = $fmp->get_civil();
        $n->hijos = $fmp->get_hijos();
        //
        $n->clave_presupuestal = $fmp->get_clave_presupuestal();
        $n->cr = $fmp->get_cr();
        $n->estructura = $fmp->get_estructura();
        $n->tipo_trabajador = $fmp->get_trabajador();
        // Datos del sustituto
        $n->rfc_sustituto = $fmp->get_rfc_sustituto();
        $n->nombre_sustituto = $fmp->get_nombre_sustituto();
        $n->curp_sustituto = $fmp->get_curp_sustituto();
        $n->clave_sustituto = $fmp->get_clave_sustituto();
        $n->cr_sustituto = $fmp->get_cr_sustituto();
        $n->efectos_del = $fmp->get_efectos_del();
        $n->estructura_sustituto = $fmp->get_estructura_sustituto();
        $n->efectos_al = $fmp->get_efectos_al();
        $n->motivo = $fmp->get_motivo();
        $n->elaboracion = $fmp->get_elaboracion();
        // Datos del fomope
        $n->lote = $fmp->get_lote();
        $n->documento = $fmp->get_documento();
        $n->horas = $fmp->get_horas();
        $n->movimiento = $fmp->get_movimiento();
        $t = $fmp->get_grupo_movimiento($fmp->get_movimiento());
        //dd($t);
        $n->tipo_movimiento = $t;
        $n->vigencia_del = $fmp->get_vigencia_del();
        $n->vigencia_al = $fmp->get_vigencia_al();
        $n->justificacion = $fmp->get_justificacion();
        $n->anio = $fmp->get_anio();
        $n->quincena = $fmp->get_quincena();
        
        // datos del pie de fomope
        $n->elabora_nombre = $fmp->get_elabora_nombre();
        $n->elabora_cargo = $fmp->get_elabora_cargo();
        $n->vobo_nombre = $fmp->get_vobo_nombre();
        $n->vobo_cargo = $fmp->get_vobo_cargo();
        $n->autoriza_nombre = $fmp->get_autoriza_nombre();
        $n->autoriza_cargo = $fmp->get_autoriza_cargo();
        $n->rubricas = $fmp->get_rubricas();
       //
        $n->quinquenio = $fmp->get_quinquenio();
        //dd($n);

        $n->save();
        
        return redirect("r/list/$n->anio/$n->quincena/")->with('success','Se ha ealizado la accion correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Captura  $captura
     * @return \Illuminate\Http\Response
     */
    public function show(Captura $captura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Captura  $captura
     * @return \Illuminate\Http\Response
     */
    public function edit($rfc, $movimiento,$quincena, $anio)
    {
        //
        $_rfc = $rfc;
        $_mov = intval($movimiento);
        $_qna = intval($quincena);
        $_anio = intval($anio);

        $dato = Captura::where('rfc',$_rfc)
            ->where('movimiento', $_mov)
            ->where('quincena', $_qna)
            ->where('anio', $_anio)
            ->first();

        $genero = Genero::all();
        $civil = Civil::all();
        $fmov = Movimiento::where('movto', $_mov)->first();
        $cr = Centro::where('cr', $dato->cr)->first();

        // que tipo de pagina..
        $pageid = $this->redirect_to_pag($_mov);
        //dd($pageid);
        return view($pageid, compact('dato', 'genero', 'civil','fmov', 'cr'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Captura  $captura
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFomopeRequest $request)
    {
        //
        $validacion = $request->validated();
        //dd($request);

        $_rfc = $request->input('rfc');
        $_mov = $request->input('movimiento');
        $_qna = $request->input('quincena');
        $_anio = $request->input('anio');

        $upd = Captura::where('rfc', $_rfc)
            ->where('movimiento', $_mov)
            ->where('quincena', $_qna)
            ->where('anio', $_anio)
            ->first();
        $upd = $this->generate_fomope($request, $upd);
        //dd($upd);
        $upd->save();
        //
        return redirect("r/list/$upd->anio/$upd->quincena/")->with('success','Se ha ealizado la accion correctamente');

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

    public function busqueda(Request $request) {

        $term = explode(' ',$request->get('subq-f'));
        $q = "%".implode('%', $term)."%";

        $fmps = Captura::select('capturas.rfc', 'plantillas.nombre', 'capturas.movimiento', 'capturas.vigencia_del')
            ->join('plantillas','plantillas.rfc','capturas.rfc')
            ->where('plantillas.nombre','ILIKE', $q)
            ->get()->take(50);
        
      

        return view('pages.captura.search', compact('fmps'));
    }
    public function search_to_capturas(Request $request) {

        $term = explode(' ',$request->get('subq-capt'));
        $q = "%".implode('%', $term)."%";

        $search = Captura::select('capturas.rfc', 'plantillas.nombre', 'capturas.movimiento', 'capturas.vigencia_del', 'capturas.quincena', 'capturas.anio')
            ->join('plantillas','plantillas.rfc','capturas.rfc')
            ->where('plantillas.nombre','ILIKE', $q)
            ->get()->take(50);
        
      

        return view('pages.captura.search', compact('search'));
    }
    /******************/
    public function redirect_to_pag($movimiento) {

        switch( intval($movimiento)){
            case 3001:
            case 3004:$pageid ='pages.captura.edit.tres';
                break;
            case 4003:
            case 4005:
                $pageid ='pages.captura.edit.altas';
                break;
            case 5001:
            case 5002:
            case 5501:
                $pageid ='pages.captura.edit_promociones';
                break;
            default: $pageid ='pages.captura.edit';break;
        }

        return $pageid;
    }
    /**********************************************************************/
    public function generate_fomope($request, $n){
        //dd($request);
        switch(intval($request->grupo)) {
            case 1:
                $fmp = new FomopeBajas($request);
                $fmp->fomope();
                break;
            case 2:
                $fmp= new FomopeLicencias($request);
                $fmp->fomope();
                break;
            case 3:
                $fmp = new FomopeReanudaciones($request);
                $fmp->fomope();
                break;
            case 4:
                $fmp = new FomopeAltas($request);
                $fmp->fomope();
                break;
             case 9: $fmp = new FomopeTitularizacion($request);
                $fmp->fomope();
                break;
            case 5:
                $fmp = new FomopePromociones($request);
                $fmp->fomope();
                break;
            default: break;
        }
        //
        dd($fmp);   
        //$n = new Captura();
        /* Aplicar herencia para general el objeto con los datos requeridos */
        $n->rfc = $fmp->get_rfc();
        $n->nombre = $fmp->get_nombre();
        $n->curp = $fmp->get_curp();
        // Datos del Domicilios
        $n->calle= $fmp->get_calle();
        $n->numero_ext= $fmp->get_numero_ext();
        $n->numero_int= $fmp->get_numero_int();
        $n->colonia= $fmp->get_colonia();
        $n->codigo_postal= $fmp->get_postal();
        $n->municipio= $fmp->get_municipio();
        $n->estado= $fmp->get_estado();
        $n->telefono = $fmp->get_telefono();
        $n->genero = $fmp->get_genero();
        $n->civil = $fmp->get_civil();
        $n->hijos = $fmp->get_hijos();
        //
        $n->clave_presupuestal = $fmp->get_clave_presupuestal();
        $n->cr = $fmp->get_cr();
        $n->estructura = $fmp->get_estructura();
        $n->tipo_trabajador = $fmp->get_trabajador();
        // Datos del sustituto
        $n->rfc_sustituto = $fmp->get_rfc_sustituto();
        $n->nombre_sustituto = $fmp->get_nombre_sustituto();
        $n->curp_sustituto = $fmp->get_curp_sustituto();
        $n->clave_sustituto = $fmp->get_clave_sustituto();
        $n->cr_sustituto = $fmp->get_cr_sustituto();
        $n->efectos_del = $fmp->get_efectos_del();
        $n->estructura_sustituto = $fmp->get_estructura_sustituto();
        $n->efectos_al = $fmp->get_efectos_al();
        $n->motivo = $fmp->get_motivo();
        $n->elaboracion = $fmp->get_elaboracion();
        // Datos del fomope
        $n->lote = $fmp->get_lote();
        $n->documento = $fmp->get_documento();
        $n->horas = $fmp->get_horas();
        $n->movimiento = $fmp->get_movimiento();
        //$t = $fmp->get_tipo_movimiento($n->movimiento);
        $n->tipo_movimiento= $fmp->get_grupo_movimiento($n->movimiento);
        $n->vigencia_del = $fmp->get_vigencia_del();
        $n->vigencia_al = $fmp->get_vigencia_al();
        $n->justificacion = $fmp->get_justificacion();
        $n->anio = $fmp->get_anio();
        $n->quincena = $fmp->get_quincena();
        
        // datos del pie de fomope
        $n->elabora_nombre = $fmp->get_elabora_nombre();
        $n->elabora_cargo = $fmp->get_elabora_cargo();
        $n->vobo_nombre = $fmp->get_vobo_nombre();
        $n->vobo_cargo = $fmp->get_vobo_cargo();
        $n->autoriza_nombre = $fmp->get_autoriza_nombre();
        $n->autoriza_cargo = $fmp->get_autoriza_cargo();
        $n->rubricas = $fmp->get_rubricas();
       //
        $n->quinquenio = $fmp->get_quinquenio();
        //dd($n);

        return $n;
    }
}
